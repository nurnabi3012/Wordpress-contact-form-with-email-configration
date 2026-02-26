<?php 

/*
*Security check
*/
add_action('init', 'wpnc_handle_form_submit');
function wpnc_handle_form_submit(){

    if( ! isset( $_POST['C_sumbit'] ) ){
            return;
    }

    if( 
        ! isset( $_POST['wpnc_contact_nonce']) ||
        ! wp_verify_nonce( $_POST['wpnc_contact_nonce'], 'wpnc_contact_form')
    ){
        return;
    }

    do_action('handle_wpnc_form');
}


/*
* after loaded database auto create 
*/
add_action('plugins_loaded', 'wpnc_create_table');
function wpnc_create_table(){
    global $wpdb;
    //table name
    $table_name = $wpdb->prefix . 'wpnc_form_data';
    $charset_collate = $wpdb->get_charset_collate();

    //SQL query
    $sql = "CREATE TABLE $table_name (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        company varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        message text NOT NULL,
        created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    //dbdelta load
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}


/*
* database data save
*/
add_action('handle_wpnc_form', 'wpnc_data_save');

function wpnc_data_save(){
    //secqrity check
    // if( 
    //     ! isset( $_POST['wpnc_contact_nonce'] ) ||
    //     ! wp_verify_nonce( $_POST['wpnc_contact_nonce'] ,
    //     'wpnc_contact_form')
    // ){
    //     return;
    // }

    global $wpdb;
    $table = $wpdb->prefix . 'wpnc_form_data'; 

    //data collect
    $name       = sanitize_text_field( $_POST['full_name'] );
    $company    = sanitize_text_field( $_POST['company'] );
    $email      = sanitize_email( $_POST['C_email'] );
    $phone      = sanitize_text_field( $_POST['C_phone'] );
    $message    = sanitize_textarea_field( $_POST['C_massage'] );

    //database insert
    $wpdb->insert($table,[
        'name'      => $name,
        'company'   => $company,
        'email'     => $email,
        'phone'     => $phone,
        'message'   => $message,
    ]);

    //Email section
    $admin_email   = get_option('admin_email');
    $admin_subject = 'New contact form submission';
    $admin_message = "
    Name:    $name
    Company: $company
    Email:   $email
    Phone:   $phone
    Message:
    $message
    ";

    $admin_headers =['Content-Type: text/plain; charset=UTF-8'];
    wp_mail( $admin_email, $admin_subject, $admin_message, $admin_headers);

    //visitor mail
    $visitor_subject = get_option('wpnc_user_email_subject');
    $visitor_message = get_option('wpnc_user_email_message');

    wp_mail($email, $visitor_subject, $visitor_message, $admin_headers);



    add_action( 'wp_footer', function(){
        echo '<p class="wpnc-success">Form submitted successfully</p>';
    });
}