      <div class="bodyContent">
         <?php
         while( have_posts() ){
            the_post();
            loadPostEntryTemplate();
         }
         ?>
      </div>
