<?php

if( isset( $_POST['user_setting_submit'] ) ){
    update_option(
        'wpnc_user_email_subject', sanitize_text_field( $_POST['user_mail_sub'] )
    );
    update_option( 
        'wpnc_user_email_message', sanitize_textarea_field( $_POST['user_mail_massage'] )
    );

    echo '<p> Setting updated  </p>';
}


$subject = get_option('wpnc_user_email_subject' , 'Thank you for connacting us.');
$message = get_option('wpnc_user_email_message', 'We received your message');

?>
<style> 
    .wpnc_visitor_mail table{
        width: 100%;
    }
    .wpnc_visitor_mail th{
        text-align: start;
    }
    .wpnc_visitor_mail input{
        padding: 10px 15px;
        height: 100px;
        width: 100%;
        max-width: 90%;
        margin-bottom: 20px;
    }
    .wpnc_visitor_mail .button{
        width: auto !important;
        height: auto !important;
        padding: 5px 30px;
        color: #FFFF;
        background: #6d5dfc;
    }
</style>
<h2>User mail setup</h2>
<form class="wpnc_visitor_mail" method="post">
    <table>
        <tr>
            <th> <label for="user_mail_sub">User Email Subject</label></th>
        </tr>
        <tr>
            <td>
                <input type="text" name="user_mail_sub" value="<?php echo esc_attr( $subject ) ?>">
            </td>
        </tr>
        <tr>
            <th><label for="user_mail_massage">User Email Message</label></th>
        </tr>
        <tr>
            <td>
                <input type="text" name="user_mail_massage" value="<?php echo esc_attr( $message ) ?>">
            </td>
        </tr>
    </table>
    <input class="button" type="submit" name="user_setting_submit" value="Save Settings">
</form>
<?php


