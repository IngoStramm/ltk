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
