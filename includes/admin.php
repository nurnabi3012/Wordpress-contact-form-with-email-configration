<?php 
    /*
* Theme admin option
*/

add_action('admin_menu', 'wpnc_admin_option_reg');
function wpnc_admin_option_reg(){
    add_menu_page(
        'WP Custom Login', 
        'WPCLP', 
        'manage_options', 
        'wpnc-options', 
        'wpnc_options_page', 
        'dashicons-art', 
        80);

    add_submenu_page(
        'wpnc-options', 
        'Genarel Option', 
        'Genarel Option', 
        'manage_options', 
        'wpnc-options', 
        'wpnc_genarel_option');

    add_submenu_page(
        'wpnc-options', 
        'Contact Option', 
        'Contact Option', 
        'manage_options', 
        'contact-options', 
        'wpnc_contact_option');

    add_submenu_page(
        'wpnc-options', 
        'Frontend form', 
        'Frontend form', 
        'manage_options', 
        'frontend-form', 
        'wpnc_frontend');
    

}

function wpnc_options_page(){
    
}
function wpnc_genarel_option(){
    require MY_PLUGIN_PATH . 'includes/genarel.php';
}
function wpnc_contact_option(){
     require MY_PLUGIN_PATH . 'includes/contact.php';
}
function wpnc_frontend(){
     require MY_PLUGIN_PATH . 'includes/frontend.php';
}
?>