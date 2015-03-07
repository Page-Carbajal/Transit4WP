<?php
namespace Transit4WP;
class ThemeSetup{

   private static $options;

   public function __construct(){
      //Load Vendors
      $fieldManagerPath = '../vendors/wordpress-fieldmanager-master/fieldmanager.php';
      if( file_exists( $fieldManagerPath ) ){
         require_once( $fieldManagerPath );
      }

      self::$options = $this->getOptions();
   }

   public static function init(){
      //Support for Thumbnails
      add_theme_support( 'post-thumbnails' );

      //Custom Post Formats
      add_theme_support( 'post-formats', ot_get_option( 'post_formats', array() ) );

      //Enqueue Scripts
      self::enqueueScripts();
      //Register Menus
      self::registerMenus();
      //Register Sidebars
      self::registerSidebars();
   }

   public static function getOptions(){
      if ( !empty( self::$options ) ){
         return self::$options;
      }

      $options = new \stdClass();
      $options->scriptsInFooter = ( ot_get_option( 'load_scripts_in_footer' ) === 'on' );

      return self::$options;
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
         $attributes = shortcode_atts( $attributes, $properties );
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
      foreach( range(1, 4) as $index ){
         self::registerWPSidebar( array( 'name' => __( 'Footer Section'  , 'transit4wp' ) . sprintf(' %02d', $index) , 'id' => 'transit4wp_footer_section_' . sprintf('%02d', $index) ) );
      }
   }

   private static function registerWPSidebar( $properties ){
      $attributes = array( 'name'          => __( 'Sidebar name', 'theme_text_domain' ),
                           'id'            => 'unique-sidebar-id',
                           'description'   => '',
                           'class'         => '',
                           'before_widget' => '', #'<li id="%1$s" class="widget %2$s">',
                           'after_widget'  => '', #'</li>',
                           'before_title'  => '<h2 class="widgettitle">',
                           'after_title'   => '</h2>');

      $attributes = shortcode_atts( $attributes, $properties );
      register_sidebar( $attributes );
   }

   public static function enqueueScripts(){
      $themeOptions = ThemeSetup::getOptions();

      wp_enqueue_script('jquery',false, array(), false, $themeOptions->scriptsInFooter);
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
         wp_enqueue_script( $name . '_Transit4WP', false, array('jquery'), false, $themeOptions->scriptsInFooter );
      }

   }

}