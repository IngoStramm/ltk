<?php

add_shortcode('ltk-produto-desc-tec', 'ltk_produto_cmb_desc_tec');

function ltk_produto_cmb_desc_tec()
{

    $post_id = get_the_ID();
    $meta = get_post_meta($post_id, '', true);
    $ltk_desc_tec = get_post_meta($post_id, 'ltk_desc_tec', true);

    // ltk_debug($ltk_desc_tec);

    $output = '';
    if ($ltk_desc_tec) {

        $output .= '<section class="ltk-descricao-tecnica-section"><h2 class="ltk-title">' . __('Descrição Técnica', 'ltk') . '</h2>';

        $output .= '<table class="ltk-table"><tbody>';

        foreach ($ltk_desc_tec as $desc) {

            $output .= '<tr><td>' . $desc . '</td></tr>';
        }

        $output .= '</tbody></table></section>';
    }

    return $output;
}

add_shortcode('ltk-produto-info-ext', 'ltk_produto_cmb_info_ext');
function ltk_produto_cmb_info_ext()
{

    $post_id = get_the_ID();
    $meta = get_post_meta($post_id, '', true);
    $ltk_inf_extra = get_post_meta($post_id, 'ltk_inf_extra', true);

    // ltk_debug($ltk_inf_extra);

    $output = '';
    if ($ltk_inf_extra) {

        $output .= '<section class="ltk-descricao-tecnica-section"><h2 class="ltk-title">' . __('Informação Extra', 'ltk') . '</h2>';

        $output .= '<table class="ltk-table"><tbody>';

        foreach ($ltk_inf_extra as $info) {

            $output .= '<tr><td>' . $info . '</td></tr>';
        }

        $output .= '</tbody></table></section>';
    }

    return $output;
}

add_shortcode('ltk-welcome-msg', 'ltk_welcome_msg');
function ltk_welcome_msg()
{
    $wp_user = wp_get_current_user();
    $output = '';
    if ($wp_user->ID === 0) {
        $output .= __('Entre ou cadastre-se', 'ltk');
    } else {
        $output .= sprintf(__('Seja bem-vindo, %s'), $wp_user->display_name);
    }
    $wc_my_account_page_id = get_option('woocommerce_myaccount_page_id');
    if($wc_my_account_page_id) {
        $wc_my_account_page_url = get_permalink($wc_my_account_page_id);
        $output = '<a href="' . $wc_my_account_page_url . '"><span class="elementor-icon-list-text">' . $output . '</span></a>';
    }

    return $output;
}
