      <div class="bodyContent">
         <div class="row">
            <div class="9u 12u$(medium)">
               <?php
               while( have_posts() ){ ?>
               <div class="row box">
                  <?php
                  the_post();
                  if( has_post_thumbnail() ){
                     get_template_part( 'templates/post', 'entry-with-thumbnail' );
                  } else {
                     get_template_part( 'templates/post', 'entry' );
                  } ?>
               </div>
               <?php } ?>
            </div>
            <div class="3u 12u$(meidum)">
               <?php get_sidebar(); ?>
            </div>
         </div>
      </div>
