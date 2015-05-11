<?php
$targetURL = get_url_in_content( get_the_content() );
?>
<div class="12u">
   <?php if( has_post_thumbnail() ){ ?>
      <div class="row">
         <div class="12u">
            <a class="image fit" href="<?php echo $targetURL; ?>">
               <?php echo getPostThumbnailHTML( null, 'full', array( 'width'=>'100%', 'class' => '' ) ); ?>
               <!--
         <div class="meta">
            <?php echo __( 'By: ', 'transit4wp' ); ?><a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo get_the_author() ?></a>
         </div>
         <div class="meta">
            <?php echo __( 'On: ', 'transit4wp' ) .  Date( __( 'Y M, d', 'transit4wp'), strtotime( $post->post_date ) ); ?>
         </div>
         -->
            </div>
         </a>
      </div>
   <?php } ?>
   <div class="row">
      <div class="12u">
         <h2 class="ui blue header">
            <a href="<?php $targetURL; ?>"><?php the_title(); ?></a>
            <div class="sub header fontSizeSmall">
               <strong><?php _e( 'Categories: ', 'transit4wp' ); ?></strong>
               <?php
               foreach( wp_get_post_categories( $post->ID ) as $c ){
                  $category = get_category( $c );
                  $category->ID = $category->term_id;
                  $category->permalink = get_category_link( $category->term_id );
                  printf( '<span><a href="%s">%s</a> </span>&nbsp;', $category->permalink, $category->name );
               }
               ?>
            </div>
         </h2>
         <!--
         -->
         <?php the_content(); ?>
      </div>
   </div>
</div>
<?php //get_template_part( 'templates/post', 'entry-links' ); ?>

