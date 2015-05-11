      <div class="bodyContent">
         <div class="row">
            <div class="9u 12u$(medium)">
               <?php
               while( have_posts() ){ ?>
               <div <?php post_class('row box'); ?>>
                  <?php
                  the_post();
                  switch( get_post_format() ){
                     case 'video':
                        get_template_part( 'templates/post', 'entry-media' );
                        break;
                     case 'image':
                        get_template_part( 'templates/post', 'entry-media' );
                        break;
                     case 'audio':
                        get_template_part( 'templates/post', 'entry-media' );
                        break;
                     case 'gallery':
                        get_template_part( 'templates/post', 'entry-media' );
                        break;
                     default:
                        if( has_post_thumbnail() ){
                           get_template_part( 'templates/post', 'entry-with-thumbnail' );
                        } else {
                           get_template_part( 'templates/post', 'entry' );
                        }
                        break;
                  }
                  ?>
               </div>
               <?php } ?>
            </div>
            <div class="3u 12u$(meidum)">
               <?php get_sidebar(); ?>
            </div>
         </div>
      </div>
