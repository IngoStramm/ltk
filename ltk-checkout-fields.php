<?php
// Alguns dados dos campos do endereço precisam ser alterados através deste filtro
add_filter('woocommerce_default_address_fields', 'ltk_override_default_address_fields');

function ltk_override_default_address_fields($fields)
{
    $fields['company']['label'] = __('Razão Social', 'ltk');
    $fields['company']['required'] = true;
    $fields['address_1']['label'] = __('Nome do Logradouro', 'ltk');
    $fields['address_1']['placeholder'] = '';
    $fields['address_2']['priority'] = 51;
    $fields['address_2']['label_class'] = '';


    // unset($fields['country']);

    return $fields;
}

// Billing Fields do WC Extra Checkout Fields for Brazil
add_filter('wcbcf_billing_fields', 'ltk_override_wcbcf_billing_fields');

function ltk_override_wcbcf_billing_fields($fields)
{
    // ltk_debug($fields);
    $fields['billing_neighborhood']['class'] = array('form-row-last');
    $fields['billing_city']['class'] = array('form-row-first');
    $fields['billing_phone']['priority'] = 23;
    $fields['billing_phone']['class'] = array('form-row-last');
    $fields['billing_email']['priority'] = 21;
    // $fields['shipping_email']['priority'] = 21;


    $fields['billing_ddd'] = array(
        'label'     => __(
            'DDD',
            'ltk'
        ),
        'required'  => true,
        'class'     => array('form-row-first'),
        'priority' => 23
    );

    $fields['billing_nome_fantasia'] = array(
        'label'     => __('Nome Fantasia', 'ltk'),
        'required'  => false,
        'class'     => array(
            'form-row-wide', 'clear'
        ),
        'priority' => 25
    );

    $fields['billing_empresa_isenta'] = array(
        'label'     => __('Empresa Isenta', 'ltk'),
        'required'  => true,
        'class'     => array(
            'form-row-wide', 'clear'
        ),
        'priority' => 24,
        'type'      => 'select',
        'options'   => array(
            'Não'    => 'Não',
            'Sim'    => 'Sim'
        )
    );

    $fields['billing_tipo_logradouro'] = array(
        'label'     => __('Tipo de Logradouro', 'ltk'),
        'type'      => 'select',
        'options'   => array(
            'Aeroporto' => 'Aeroporto',
            'Alameda' => 'Alameda',
            'Área' => 'Área',
            'Avenida' => 'Avenida',
            'Chácara' => 'Chácara',
            'Colônia' => 'Colônia',
            'Condomínio' => 'Condomínio',
            'Conjunto' => 'Conjunto',
            'Distrito' => 'Distrito',
            'Esplanada' => 'Esplanada',
            'Estação' => 'Estação',
            'Estrada' => 'Estrada',
            'Favela' => 'Favela',
            'Fazenda' => 'Fazenda',
            'Feira' => 'Feira',
            'Jardim' => 'Jardim',
            'Ladeira' => 'Ladeira',
            'Lago' => 'Lago',
            'Lagoa' => 'Lagoa',
            'Largo' => 'Largo',
            'Loteamento' => 'Loteamento',
            'Morro' => 'Morro',
            'Núcleo' => 'Núcleo',
            'Parque' => 'Parque',
            'Passarela' => 'Passarela',
            'Pátio' => 'Pátio',
            'Praça' => 'Praça',
            'Quadra' => 'Quadra',
            'Recanto' => 'Recanto',
            'Residencial' => 'Residencial',
            'Rodovia' => 'Rodovia',
            'Rua' => 'Rua',
            'Setor' => 'Setor',
            'Sítio' => 'Sítio',
            'Travessa' => 'Travessa',
            'Trecho' => 'Trecho',
            'Trevo' => 'Trevo',
            'Via' => 'Via',
            'Viaduto' => 'Viaduto',
            'Viela' => 'Viela',
            'Vila' => 'Vila',
        ),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'priority' => 49
    );

    $fields['billing_municipio'] = array(
        'label'     => __('Município', 'ltk'),
        'required'  => false,
        'class'     => array('form-row-wide'),
        'priority' => 71
    );

    return $fields;
}

// Shipping Fields do WC Extra Checkout Fields for Brazil
add_filter('wcbcf_shipping_fields', 'ltk_override_wcbcf_shipping_fields');

function ltk_override_wcbcf_shipping_fields($fields)
{
    $fields['shipping_neighborhood']['class'] = array('form-row-last');
    return $fields;
}

// Removes Order Notes Title

add_filter('woocommerce_enable_order_notes_field', '__return_false', 9999);

// Valida os novos campos
add_action('woocommerce_checkout_process', 'ltk_checkout_field_process');

function ltk_checkout_field_process()
{
    if (!$_POST['billing_ddd'])
        wc_add_notice('<strong>' . __('O campo "DDD" do endereço de faturamento', 'ltk') . '</strong> ' . __('é um campo obrigatório', 'ltk'), 'error');

    if (!$_POST['billing_tipo_logradouro'])
        wc_add_notice('<strong>' . __('O campo "Tipo de Logradouro" do endereço de faturamento', 'ltk') . '</strong> ' . __('é um campo obrigatório', 'ltk'), 'error');
}

// Salva os novos campos
add_action('woocommerce_checkout_update_order_meta', 'ltk_checkout_field_update_order_meta');

function ltk_checkout_field_update_order_meta($order_id)
{
    if (!empty($_POST['billing_ddd'])) {
        update_post_meta($order_id, '_billing_ddd', sanitize_text_field($_POST['billing_ddd']));
    }

    if (!empty($_POST['billing_empresa_isenta'])) {
        update_post_meta($order_id, '_billing_empresa_isenta', sanitize_text_field($_POST['billing_empresa_isenta']));
    }

    if (!empty($_POST['billing_nome_fantasia'])) {
        update_post_meta($order_id, '_billing_nome_fantasia', sanitize_text_field($_POST['billing_nome_fantasia']));
    }

    if (!empty($_POST['billing_tipo_logradouro'])) {
        update_post_meta($order_id, '_billing_tipo_logradouro', sanitize_text_field($_POST['billing_tipo_logradouro']));
    }

    if (!empty($_POST['billing_municipio'])) {
        update_post_meta($order_id, '_billing_municipio', sanitize_text_field($_POST['billing_municipio']));
    }
}

// Exibe os novos campos na tela de edição do pedido
add_action('woocommerce_admin_order_data_after_shipping_address', 'ltk_checkout_field_display_admin_order_meta', 10, 1);

function ltk_checkout_field_display_admin_order_meta($order)
{
    $meta = get_post_meta($order->get_id(), '', true);
    // ltk_debug($meta);
    $output = '';
    $output .= '<p>';
    $output .= '<strong>' . __('DDD', 'ltk') . ':</strong> ' . get_post_meta($order->get_id(), '_billing_ddd', true) . '<br />';

    $output .= '<strong>' . __('Nome Fantasia', 'ltk') . ':</strong> ' . get_post_meta($order->get_id(), '_billing_nome_fantasia', true) . '<br />';

    $output .= '<strong>' . __('Empresa Isenta', 'ltk') . ':</strong> ' . get_post_meta($order->get_id(), '_billing_empresa_isenta', true) . '<br />';

    $output .= '<strong>' . __('Tipo de Logradouro', 'ltk') . ':</strong> ' . get_post_meta($order->get_id(), '_billing_tipo_logradouro', true) . '<br />';

    $output .= '<strong>' . __('Município', 'ltk') . ':</strong> ' . get_post_meta($order->get_id(), '_billing_municipio', true) . '<br />';

    $output .= '</p>';

    echo $output;
}
