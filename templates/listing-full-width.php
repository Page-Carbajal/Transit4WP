      <div class="bodyContent">
         <?php
         while( have_posts() ){
            the_post(); ?>
            <div <?php post_class('row box'); ?>>
            <?php loadPostEntryTemplate(); ?>
            </div>
         <?php } ?>
      </div>
