<!-- Banner -->
<section id="banner" style="background-image: url('<?php echo $post->banner->heroURL; ?>');">
   <div class="bannerShade"></div>
   <h1><?php echo $post->banner->title; ?></h1>
   <p><?php echo $post->banner->subtitle; ?></p>
   <ul class="actions">
      <?php if( !empty($post->banner->actionText) ){ ?>
         <li>
            <a href="<?php echo $post->banner->actionLink ?>"
               <?php echo( empty( $post->banner->actionTarget ) ? '' : sprintf('target="%s"', $post->banner->actionTarget) ) ?>
               class="button big <?php echo $post->banner->actionClass; ?>">
               <?php echo $post->banner->actionText ?>
            </a>
         </li>
      <?php } ?>
   </ul>
</section>
