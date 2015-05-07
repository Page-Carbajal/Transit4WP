<?php
global $post, $authordata;
$authorURL = get_author_posts_url( $post->post_author );
$authorPosts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );
?>

<section id="author-feed" class="wrapper style2 special">
   <div class="ui secondary compact segment">
      <div class="ui feed">
         <div class="event">
            <a class="label" href="<?php echo $authorURL; ?>">
               <?php echo get_avatar( $authordata->data->user_email ); ?>
            </a>
            <div class="content">
               <div class="summary"> <?php _e( 'Writen by: ', 'transit4wp' ); ?>
                  <a class="user" href="<?php echo $authorURL; ?>">
                     <?php echo $authordata->data->display_name; ?>
                  </a>
                  <div class="date">
                     <?php echo __( ' on ', 'transit4wp' ), Date( __( 'M d, Y', 'transit4wp' ), strtotime( $post->post_date ) );  ?>
                  </div>
               </div>
               <div class="meta">
                  <a href="<?php echo $authorURL; ?>"><?php echo __( 'View all posts by ', 'transit4wp' ), $authordata->data->display_name; ?></a>
               </div>
            </div>
         </div>

         <?php if( $authorPosts ){ ?>
            <h4 class="ui header"><?php echo __( 'More awesome articles by ', 'transit4wp' ), $authordata->data->display_name; ?></h4>
         <?php }

         foreach( $authorPosts as $article ){
            $articleLink = get_permalink( $article->ID );
            ?>

            <div class="event">
               <a class="label" href="<?php echo $articleLink; ?>">
                  <i class="circular inverted pencil icon"></i>
               </a>
               <div class="content">
                  <div class="summary">
                     <a class="user" href="<?php echo $articleLink; ?>">
                        <?php echo $article->post_title; ?>
                     </a>
                  </div>
                  <div class="meta">
                     <span><?php echo __( ' Published on ', 'transit4wp' ), Date( __( 'M d, Y', 'transit4wp' ), strtotime( $article->post_date ) );  ?></span>
                  </div>
               </div>
            </div>


         <?php } ?>


      </div>
   </div>
</section>
