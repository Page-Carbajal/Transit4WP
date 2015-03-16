<?php
get_header();
$blogPageId = get_option('page_for_posts');
$blogPage = get_post( $blogPageId );
if ( is_home() ){
   $post->banner = new \Transit4WP\BannerMeta( $blogPageId );
}
if ( !empty($post->banner) && $post->banner->isValid ){
   get_template_part('templates/post','banner');
} ?>
<!-- Main Content -->
<section id="main" class="wrapper style1 special">
   <div class="container">
      <?php if( empty($post->banner) ) { ?>
         <header class="major">
            <h1><?php echo $blogPage->post_title; ?></h1>
         </header>
      <?php } ?>
      <div class="bodyContent">
         <div class="row">
            <div class="9u 12u$(medium)">
                  <?php
                  while( have_posts() ){
                     the_post();
                     get_template_part( 'templates/index', 'post-entry' );
                  }
                  ?>
            </div>
            <div class="3u 12u$(meidum)">
               <?php get_sidebar(); ?>
            </div>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>