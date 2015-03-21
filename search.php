<?php
get_header();

if ( is_home() ){
   $post->banner = new \Transit4WP\BannerMeta( $blogPageId );
}

if ( !empty($post->banner) && $post->banner->isValid ){
   get_template_part('templates/post','banner');
} ?>
   <!-- Main Content -->
   <section id="main" class="wrapper style1 special">
      <div class="container">
         <?php if ( empty( $post->banner ) ){ ?>
            <header class="major">
               <h1><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
            </header>
         <?php } ?>
         <!--Entries-->
         <?php if( \Transit4WP\ThemeOptions::getOption('showBlogSidebar') == 'on' ){
            get_template_part( 'templates/home', 'with-sidebar' );
         } else {
            get_template_part( 'templates/home', 'full-width' );
         } ?>
      </div>
   </section>

<?php get_footer(); ?>