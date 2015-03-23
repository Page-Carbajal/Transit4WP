<div class="row 150% box">
   <div class="4u 12u$(medium)">

      <div class="ui fluid card">
         <div class="image">
            <?php echo getPostThumbnailHTML( null, 'full', array( 'width'=>'100%', 'class' => '' ) ); ?>
         </div>
         <div class="meta">
            <?php echo __( 'By: ', 'transit4wp' ); ?><a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo get_the_author() ?></a>
         </div>
         <div class="meta">
            <?php echo __( 'On: ', 'transit4wp' ) .  Date( __( 'Y M, d', 'transit4wp'), strtotime( $post->post_date ) ); ?>
         </div>
      </div>

   </div>
   <div class="8u 12u$(medium)">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
      <div class="ui inverted blue menu">
         <a class="header item" href="<?php the_permalink(); ?>">
            <?php _e( 'Read More', 'transit4wp' ); ?>
            <i class="right arrow icon"></i>
         </a>
         <div class="right menu">
            <i class="item">
               <?php _e( 'Share on: ', 'transit4wp' ); ?>
            </i>
            <a class="facebook item" data-target-url="<?php echo esc_url( sprintf( '%s?utm_source=%s&amp;utm_medium=%s&amp;utm_campaign=%s&amp;utm_term=%s', get_permalink(), 'facebook', 'organic', 'blog-index', preg_replace( '/\s+/', '%20', $post->post_title ) ) ); ?>">
               <i class="facebook icon"></i>
            </a>
            <a class="twitter item" data-target-url="<?php echo esc_url( sprintf( '%s?utm_source=%s&amp;utm_medium=%s&amp;utm_campaign=%s&amp;utm_term=%s', get_permalink(), 'twitter', 'organic', 'blog-index', preg_replace( '/\s+/', '%20', $post->post_title ) ) ); ?>" data-title="<?php the_title(); ?>">
               <i class="twitter icon"></i>
            </a>
            <a class="linkedin item" data-target-url="<?php echo esc_url( sprintf( '%s?utm_source=%s&amp;utm_medium=%s&amp;utm_campaign=%s&amp;utm_term=%s', get_permalink(), 'linkedin', 'organic', 'blog-index', preg_replace( '/\s+/', '%20', $post->post_title ) ) ); ?>">
               <i class="linkedin icon"></i>
            </a>
         </div>
      </div>
   </div>
</div>
