<div class="8u 12u$(medium)">
   <a class="button" href="<?php the_permalink(); ?>">
      <?php _e( 'Read More', 'transit4wp' ); ?>
   </a>
</div>
<div class="4u 12u$(medium)">
   <a class="icon rounded fa-facebook" data-target-url="<?php echo esc_url( sprintf( '%s?utm_source=%s&amp;utm_medium=%s&amp;utm_campaign=%s&amp;utm_term=%s', get_permalink(), 'facebook', 'organic', 'blog-index', preg_replace( '/\s+/', '%20', $post->post_title ) ) ); ?>">
      <span class="label">Facebook</span>
   </a>
   <a class="icon rounded fa-twitter" data-target-url="<?php echo esc_url( sprintf( '%s?utm_source=%s&amp;utm_medium=%s&amp;utm_campaign=%s&amp;utm_term=%s', get_permalink(), 'twitter', 'organic', 'blog-index', preg_replace( '/\s+/', '%20', $post->post_title ) ) ); ?>" data-title="<?php the_title(); ?>">
      <span class="label">Twitter</span>
   </a>
   <a class="icon rounded fa-linkedin" data-target-url="<?php echo esc_url( sprintf( '%s?utm_source=%s&amp;utm_medium=%s&amp;utm_campaign=%s&amp;utm_term=%s', get_permalink(), 'linkedin', 'organic', 'blog-index', preg_replace( '/\s+/', '%20', $post->post_title ) ) ); ?>">
      <span class="label">LinkedIn</span>
   </a>
</div>