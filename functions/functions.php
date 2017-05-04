<?php

function custom_excerpt($count) {
    $output = get_the_content();
    $output = strip_tags($output);
    $output = mb_substr($output, 0, $count);
    $output = mb_substr($output, 0, mb_strrpos($output, " "));
    $output .= "...";
    return $output;
}
