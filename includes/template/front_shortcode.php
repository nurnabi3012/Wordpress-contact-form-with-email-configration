<?php 

    add_shortcode('wpnc_form', 'wpnc_contact_form');
    function wpnc_contact_form(){
        ob_start();
        ?>
        <style>
            .wpnc-form{
            width: 500px;
            background: rgb(230, 211, 255);
            padding: 30px;
            margin: auto;
            border-radius: 8px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            .wpnc-form h2{
                text-align: center;
                font-size: 24px
                margin-bottom: 20px;
            }
            .wpnc-form form{
            margin: 0 auto;
            border-collapse: collapse;
            }
            .wpnc-form table{
            width: 100%;
            }
            .wpnc-form table th{
            text-align: start;
            font-size: 20px;
            }
            .wpnc-form input,
            .wpnc-form textarea{
            padding: 10px 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            }
            .wpnc-form input:focus,
            .wpnc-form textarea:focus
            {
            outline: none;
            box-shadow: 1px 1px 10px 1px rgb(46, 19, 78);
            }
            .wpnc-form #text_area{
            width: 93%;
            height: 100px;
            }
            .wpnc-form .button{
                color: #ffff;
                padding: 8px 30px;
                background: #20062b;
            }
        </style>
        
        <div class="wpnc-form">
            <h2>Lets get in the touch</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <th><label for="full_name">name</label></th>
                        <th><label for="company">Company</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter your full name">
                        </td>
                        <td>
                            <input type="text" name="company" placeholder="Enter your company name">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="C_email">Email</label></th>
                        <th><label for="C_phone">Phone Number</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="C_email" placeholder="Enter your Email">
                        </td>
                        <td>
                            <input type="text" name="C_phone" placeholder="Enter your phone number">
                        </td>
                    </tr>
                    <tr>
                    <th><label for="C_massage">Your Massage</label></th>
                    </tr>
                    <tr>
                    <td colspan="2">
                        <textarea name="C_massage" id="text_area" placeholder="Write your massage..."></textarea>

                        <?php wp_nonce_field('wpnc_contact_form', 'wpnc_contact_nonce') ?>

                        <input class="button" type="submit" name="C_sumbit">
                    </td>
                    </tr>
                </table>
            </form>
        </div>
        
        <?php
        return ob_get_clean();
    }



