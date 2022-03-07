<?php
add_action('wp_print_scripts', 'ltk_dequeue_script', 100);

function ltk_dequeue_script()
{
    wp_deregister_script('jquery-mask');
    // wp_dequeue_script('jquery-mask');
}
