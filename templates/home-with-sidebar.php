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
