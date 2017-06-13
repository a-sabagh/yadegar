<?php
function rng_add_ticket(){
    if(isset($_POST['ticket_send']) && isset($_POST['ticket_send_hidden']) && $_POST['ticket_send_hidden'] == 'true'){
        $is_valid_nonce = (isset($_POST['ticket_send_nonce']) && wp_verify_nonce($_POST['ticket_send_nonce'], 'nonce_ticket_send_true')) ? TRUE : FALSE;
        if($is_valid_nonce){
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
            $subject = $_POST['ticket_subject'];
            $department = $_POST['ticket_department'];
            $date = jdate("Y/m/d H:i:s");
            $text = $_POST['ticket_text'];
            $ticket = implode(',' , array($subject , $department , $date , $text));
            $meta_key = 'ticket';
            add_user_meta($user_id, $meta_key, $ticket);
        }
    }
}
add_action('template_redirect' , 'rng_add_ticket');
