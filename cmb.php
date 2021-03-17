<?php

add_action('cmb2_admin_init', 'ltk_register_product_metabox');
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function ltk_register_product_metabox()
{
    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb = new_cmb2_box(array(
        'id'            => 'ltk_demo_metabox',
        'title'         => esc_html__('Opções Extras', 'ltk'),
        'object_types'  => array('product'), // Post type
        // 'show_on_cb' => 'ltk_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'ltk_add_some_classes', // Add classes through a callback.

        /*
		 * The following parameter is any additional arguments passed as $callback_args
		 * to add_meta_box, if/when applicable.
		 *
		 * CMB2 does not use these arguments in the add_meta_box callback, however, these args
		 * are parsed for certain special properties, like determining Gutenberg/block-editor
		 * compatibility.
		 *
		 * Examples:
		 *
		 * - Make sure default editor is used as metabox is not compatible with block editor
		 *      [ '__block_editor_compatible_meta_box' => false/true ]
		 *
		 * - Or declare this box exists for backwards compatibility
		 *      [ '__back_compat_meta_box' => false ]
		 *
		 * More: https://wordpress.org/gutenberg/handbook/extensibility/meta-box/
		 */
        // 'mb_callback_args' => array( '__block_editor_compatible_meta_box' => false ),
    ));

    $cmb->add_field(array(
        'name'       => esc_html__('Subtítulo', 'ltk'),
        'id'         => 'ltk_subtit',
        'type'       => 'text',
    ));

    $cmb->add_field(array(
        'name'       => esc_html__('Descrição Técnica', 'ltk'),
        'id'         => 'ltk_desc_tec',
        'type'       => 'text',
        'repeatable'      => true,
    ));

    $cmb->add_field(array(
        'name'       => esc_html__('Informação Extra', 'ltk'),
        'id'         => 'ltk_inf_extra',
        'type'       => 'text',
        'repeatable'      => true,
    ));
}
