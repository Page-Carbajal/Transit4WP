<?php
get_header();

while( have_posts() ){
   the_post();
   if ( !empty($post->banner) && $post->banner->isValid ){
      get_template_part('templates/post','banner');
   } ?>
   <section id="title" class="wrapper style3 special">
      <header class="major">
         <h1><?php the_title(); ?></h1>
      </header>
   </section>
   <section id="main" class="wrapper style2 special fontSizeLarge">
      <div class="container textAlignLeft">
         <?php if( \Transit4WP\ThemeOptions::getOption('showBlogSidebar') == 'on' ) { ?>
            <div class="row">
               <div class="7u 12u$(medium)">
                  <?php the_content(); ?>
               </div>
               <div class="5u 12u$(medium)">
                  <?php get_sidebar( 'single' ); ?>
               </div>
            </div>
         <?php } else { ?>
            <div class="row">
               <div class="10u -1u 12u$(medium)">
                  <?php the_content(); ?>
               </div>
            </div>
         <?php } ?>
      </div>
   </section>

   <div class="container">
      <div class="row">
         <div class="7u 12u$(medium)">

            <?php if ( comments_open() || get_comments_number() ) {
               comments_template();
            } else{
               echo '&nbsp;';
            } ?>

         </div>
         <div class="5u 12u$(medium)">
            <?php get_template_part( 'templates/author', 'feed' ); ?>
         </div>
      </div>
   </div>


<?php
}

get_footer(); ?>
