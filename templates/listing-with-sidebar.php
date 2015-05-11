      <div class="bodyContent">
         <div class="row">
            <div class="9u 12u$(medium)">
               <?php
               while( have_posts() ){ ?>
               <div <?php post_class('row box'); ?>>
                  <?php
                  the_post();
                  loadPostEntryTemplate();
                  ?>
               </div>
               <?php } ?>
            </div>
            <div class="3u 12u$(meidum)">
               <?php get_sidebar(); ?>
            </div>
         </div>
      </div>
