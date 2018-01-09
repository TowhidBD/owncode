<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


function asif_meta_box_option( $options  ) {
    $options      = array(); // remove old options
    $options[]    = array(
        'id'        => 'asif_page_options',
        'title'     => 'Page Options',
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'high',
        'sections'  => array(
            // begin: a section
            array(
 'name' => 'asif_page_options_meta',
            'icon'  => 'fa fa-cog',
            // begin: fields
            'fields' => array(
                // begin: a field
                array(
                  'id'    => 'enable_title',
                  'type'  => 'switcher',
                  'default' => true,
                  'title' => 'Enable Title',
                  'desc'  => esc_html__('If you want to enable title, select on', 'asif-billah')
                ),
                array(
                  'id'    => 'enable_content',
                  'type'  => 'switcher',
                  'default' => false,
                  'title' => 'Enable Content',
                  'desc'  => esc_html__('If you want to enable Content, select on', 'stock_aminulhchy')
                ),
            // end: a field
            ), // end: a section
        ),
    )
);
return $options;
}
add_filter( 'cs_metabox_options', 'asif_meta_box_option' );
