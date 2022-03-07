<?php

add_action('wp_enqueue_scripts', 'ltk_frontend_scripts');

function ltk_frontend_scripts()
{

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';

    if (empty($min)) :
        wp_enqueue_script('ltk-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    // Remove o include 'jquery-mask' adicionado pelo plugin "Extra Checkout Fields for Brazil"
    // wp_deregister_script('jquery-mask');

    // Adiciona um JS vazio, com o nome de 'jquery-mask', para o plugin "Extra Checkout Fields for Brazil" continuar chamando os scripts que dependem dele
    // wp_register_script('jquery-mask',LTK_URL . 'assets/js/jquery-mask.js', array(), false, 'all');

    // Máscaras em JS para os campos (sem jQuery)
    wp_enqueue_script('vanilla-masker', LTK_URL . 'assets/js/vanilla-masker.min.js', array(), false, 'all');

    wp_register_script('ltk-script', LTK_URL . 'assets/js/ltk' . $min . '.js', array('jquery', 'vanilla-masker'), '1.0.0', true);
    wp_enqueue_script('ltk-script');
    wp_localize_script('ltk-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_enqueue_style('ltk-style', LTK_URL . 'assets/css/ltk.css', array(), false, 'all');
}
