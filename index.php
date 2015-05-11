<?php
get_header();

if ( is_home() ){
   $post->banner = new \Transit4WP\BannerMeta( get_option('page_for_posts') );
}
if ( !empty($post->banner) && $post->banner->isValid ){
   get_template_part('templates/post','banner');
} ?>
   <!-- Main Content -->
   <section id="main" class="wrapper style1 special">
      <div class="container">
         <?php if ( empty( $post->banner ) ){ ?>
            <header class="major">
               <h1><?php echo $post->post_title; ?></h1>
            </header>
         <?php } ?>
         <!--Entries-->
         <?php if( \Transit4WP\ThemeOptions::getOption('showBlogSidebar') == 'on' ){
            get_template_part( 'templates/listing', 'with-sidebar' );
         } else {
            get_template_part( 'templates/listing', 'full-width' );
         }
         get_template_part( 'templates/simple', 'pagination' ); ?>
      </div>
   </section>

<?php
get_footer();