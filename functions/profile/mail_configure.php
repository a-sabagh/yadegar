<?php

function rng_phpmailer_init(PHPMailer $phpmailer) {
    $phpmailer->Host = 'mail.yadegar.co';
    $phpmailer->Port = 25;
    $phpmailer->Username = 'info@yadegarchick.com';
    $phpmailer->Password = 'B%em.L=1xCB=';
    $phpmailer->SMTPAuth = true;
    $phpmailer->IsSMTP();
}

add_action('phpmailer_init', 'rng_phpmailer_init');

function my_mail_from_name($name) {
    return "گروه تولیدی یادگار";
}

add_filter('wp_mail_from_name', 'my_mail_from_name');

function my_mail_from($email) {
    return "info@yadegarchick.com";
}

add_filter('wp_mail_from', 'my_mail_from');

function rng_mail_content_type() {
    return "text/html";
}

add_filter("wp_mail_content_type", "rng_mail_content_type");
