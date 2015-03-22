<?php
namespace Transit4WP;
class ThemeSetup{
   private static $options;

   public function __construct(){
      //Load Vendors
      $filePath = '/includes/vendors/wordpress-fieldmanager-master/fieldmanager.php';
      $fieldManagerPath = ( file_exists( get_stylesheet_directory() . $filePath ) ? get_stylesheet_directory() : get_template_directory() ) . $filePath;

      if( file_exists( $fieldManagerPath ) ){
         require_once( $fieldManagerPath );
         fieldmanager_set_baseurl( get_stylesheet_directory_uri() . '/includes/vendors/wordpress-fieldmanager-master/' );
      }

      //Set Metaboxes
      $this->setMetaboxes();
      //Get Option Values
      //self::$options = $this->getOptions();
   }

   public static function init(){
      //Support for Thumbnails
      add_theme_support( 'post-thumbnails' );

      //Custom Post Formats
      add_theme_support( 'post-formats', ot_get_option( 'post_formats', array() ) );

      //Register Filters
      self::registerFilters();

      //Set Wordpress Filters
      self::setWordPressFilters();
      //Enqueue Styles
      self::enqueueStyles();
      //Enqueue Scripts
      self::enqueueScripts();
      //Register Menus
      self::registerMenus();
      //Register Sidebars
      self::registerSidebars();
   }

   public static function registerFilters(){
      //Load Metadata into the post object
      add_action( 'the_post', array( 'Transit4WP\LoadMetadata', 'init' ) );
   }

   public static function getResourcesPath( $filePath = 'js/init.js', $echo = true ){
      $resourcesPath = get_stylesheet_directory_uri() .'/resources/';
      if( !file_exists( $resourcesPath . $filePath ) ){
         $resourcesPath = get_template_directory_uri() . '/resources/';
      }

      if ($echo) {
         echo $resourcesPath;
      } else{
         return $resourcesPath;
      }
   }

   public function setMetaboxes( $postTypes = array('post', 'page') ){

      $controls = array( 'banner_title' => new \Fieldmanager_TextField( __('Banner Heading', 'transit4wp' ) ) );
      $controls['banner_subtitle']  = new \Fieldmanager_TextField( __( 'Banner Subtitle', 'transit4wp' ) );
      $controls['banner_hero']      = new \Fieldmanager_Media( __( 'Hero Image', 'transit4wp' ) );
      $controls['action_text']      = new \Fieldmanager_TextField( __( 'Action Text', 'transit4wp' ) );
      $controls['action_link']      = new \Fieldmanager_Link( __( 'Action Link', 'transit4wp' ) );
      $controls['action_target']    = new \Fieldmanager_TextField( __( 'Action Target', 'transit4wp' ) );
      $controls['action_class']     = new \Fieldmanager_TextField( __( 'Action Class', 'transit4wp' ) );

      $fields = new \Fieldmanager_Group( array( 'name' => 'transit4wp_banner_meta', 'children' => $controls ) );
      $fields->add_meta_box( __( 'Post Banner', 'transit4wp' ), $postTypes );

   }

   public static function getMainMenu( $properties = null, $echo = true ){
      $attributes = array( 'theme_location'  => 'mainMenu',
                           'menu'            => '',
                           'container'       => false,
                           'container_class' => false,
                           'container_id'    => '',
                           'menu_class'      => '',
                           'menu_id'         => '',
                           'echo'            => $echo,
                           'fallback_cb'     => 'wp_page_menu',
                           'before'          => '',
                           'after'           => '',
                           'link_before'     => '',
                           'link_after'      => '',
                           'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                           'depth'           => 0,
                           'walker'          => '');

      if ( !empty($properties) ){
         $attributes = wp_parse_args( $attributes, $properties );
      }

      return wp_nav_menu( $attributes );
   }

   public static function registerMenus(){
      register_nav_menus(
         array(
            'mainMenu' => __( 'Main Menu', 'transit4wp' ),
            'footerMenu01' => __( 'First Footer Menu', 'transit4wp' ),
            'footerMenu02' => __( 'Second Footer Menu', 'transit4wp' ),
            'footerMenu03' => __( 'Third Footer Menu', 'transit4wp' ),
            'footerMenu04' => __( 'Fourth Footer Menu', 'transit4wp' ),
         )
      );
   }

   public static function registerSidebars(){
      //Register Blog Sidebar
      self::registerWPSidebar( array( 'id' => 'transit4wp_sidebar', 'name' => 'Blog Sidebar', 'class' => 'blogSidebar' ) );

      //Register Footer Sections
      foreach( range(1, 4) as $index ){
         self::registerWPSidebar( array( 'name' => __( 'Footer Section'  , 'transit4wp' ) . sprintf(' %02d', $index),
                                          'class' => 'unstyled',
                                          'id' => 'transit4wp_footer_section_' . sprintf('%02d', $index) ) );
      }
   }

   private static function registerWPSidebar( $properties ){
      $attributes = array( 'name'          => __( 'Sidebar name', 'transit4wp' ),
                           'id'            => 'unique-sidebar-id',
                           'description'   => '',
                           'class'         => '',
                           'before_widget' => '', #'<li id="%1$s" class="widget %2$s">',
                           'after_widget'  => '', #'</li>',
                           'before_title'  => '<h3 class="widgettitle">',
                           'after_title'   => '</h3>');

      $attributes = wp_parse_args( $properties, $attributes );
      register_sidebar( $attributes );
   }

   public static function enqueueStyles(){
      $mediaPath = get_stylesheet_directory_uri() . '/resources/css/%s';
      wp_register_style( 'cssTransit4WP',  get_stylesheet_directory_uri().'/style.css' );
      wp_register_style( 'semantic-ui-cards', sprintf( $mediaPath, 'semantic-ui/card.min.css' ) );
      wp_register_style( 'semantic-ui-comment', sprintf( $mediaPath, 'semantic-ui/comment.min.css' ) );
      wp_register_style( 'semantic-ui-segment', sprintf( $mediaPath, 'semantic-ui/segment.min.css' ) );

      wp_enqueue_style( 'cssTransit4WP' );
      wp_enqueue_style( 'semantic-ui-cards' );
      wp_enqueue_style( 'semantic-ui-comment' );
      wp_enqueue_style( 'semantic-ui-segment' );
   }

   public static function enqueueScripts(){
      $scriptsInFooter = ThemeOptions::getOption('scriptsInFooter');

      wp_enqueue_script('jquery',false, array(), false, $scriptsInFooter);
      //Enqueue Skel Scripts
      $scripts = array( 'html5Shiv' => 'html5shiv.js',  'skel' => 'skel.min.js', 'skelLayers' => 'skel-layers.min.js' );
      if( !preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ){
         unset($scripts['html5Shiv']);
      }

      foreach( $scripts as $name => $file ){
         $scriptPath = get_stylesheet_directory_uri() . '/resources/js/';
         if( !file_exists( $scriptPath . $file ) ){
            $scriptPath = get_template_directory_uri() . '/resources/js/';
         }
         wp_register_script( $name . '_Transit4WP', $scriptPath . $file , array('jquery') );
         wp_enqueue_script( $name . '_Transit4WP', false, array('jquery'), false, $scriptsInFooter );
      }
   }

   public static function setNavigationLinkAttributes($atts, $item, $args, $depth){
      //Filter for: nav_menu_link_attributes
      //Ads class to the link
      //$atts['class'] = 'button special';
      return $atts;
   }

   public static function setWordPressFilters(){
      add_filter( 'nav_menu_link_attributes', array( 'Transit4WP\ThemeSetup', 'setNavigationLinkAttributes'), 10, 4 );
   }

}