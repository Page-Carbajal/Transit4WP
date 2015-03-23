<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => __( 'General', 'transit4wp' )
      ),
      array(
        'id'          => 'performance',
        'title'       => __( 'Performance', 'transit4wp' )
      ),
      array(
        'id'          => 'social_media',
        'title'       => __( 'Social Media', 'transit4wp' )
      ),
      array(
        'id'          => 'custom_content',
        'title'       => __( 'Custom Settings', 'transit4wp' )
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'blog_header_image',
        'label'       => __( 'Blog Header Image', 'transit4wp' ),
        'desc'        => __( 'This image is used for sites without a front page.', 'transit4wp' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'post_formats',
        'label'       => __( 'Additional Post Formats', 'transit4wp' ),
        'desc'        => __( 'Select the post formats you want to activate', 'transit4wp' ),
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'audio',
            'label'       => __( 'Audio', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'asite',
            'label'       => __( 'Aside', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'chat',
            'label'       => __( 'Chat', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'gallery',
            'label'       => __( 'Gallery', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'image',
            'label'       => __( 'Image', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'link',
            'label'       => __( 'Link', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'quote',
            'label'       => __( 'Quote', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'status',
            'label'       => __( 'Status', 'transit4wp' ),
            'src'         => ''
          ),
          array(
            'value'       => 'video',
            'label'       => __( 'Video', 'transit4wp' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'show_blog_sidebar',
        'label'       => __( 'Show Blog Sidebar', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'load_scripts_in_footer',
        'label'       => __( 'Load Scripts in Footer', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'performance',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'facebook_link',
        'label'       => __( 'Facebook Link', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'twitter_link',
        'label'       => __( 'Twitter Link', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'linkedin_link',
        'label'       => __( 'LinkedIn Link', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'googleplus_link',
        'label'       => __( 'GooglePlus Link', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_404_message',
        'label'       => __( 'Custom 404 Message', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'custom_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_styles',
        'label'       => __( 'Custom Styles', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'custom_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_scripts',
        'label'       => __( 'Custom Scripts', 'transit4wp' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'custom_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}