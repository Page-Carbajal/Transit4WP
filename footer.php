<!-- Footer -->
<footer id="footer">
   <div class="container">
      <section class="links">
         <div class="row">
            <section class="3u 6u(medium) 12u$(small)">
               <?php dynamic_sidebar( 'transit4wp_footer_section_01' ); ?>
            </section>
            <section class="3u 6u$(medium) 12u$(small)">
               <?php dynamic_sidebar( 'transit4wp_footer_section_02' ); ?>
            </section>
            <section class="3u 6u(medium) 12u$(small)">
               <?php dynamic_sidebar( 'transit4wp_footer_section_03' ); ?>
            </section>
            <section class="3u$ 6u$(medium) 12u$(small)">
               <?php dynamic_sidebar( 'transit4wp_footer_section_04' ); ?>
            </section>
         </div>
      </section>
      <div class="row">
         <div class="8u 12u$(medium)">
            <p class="copyright">
               Designed by: <a href="http://templated.co">TEMPLATED</a>
               Developed by: <a href="http://iconicamarketing.com">Iconica Marketing</a>
            </p>
         </div>
         <div class="4u$ 12u$(medium)">
            <ul class="icons">
               <?php if( \Transit4WP\ThemeOptions::getOption( 'facebookLink' ) ) { ?>
                  <li>
                     <a class="icon rounded fa-facebook" href="<?php echo \Transit4WP\ThemeOptions::getOption( 'facebookLink' ); ?>"><span class="label">Facebook</span></a>
                  </li>
               <?php } if( \Transit4WP\ThemeOptions::getOption( 'twitterLink' ) ){ ?>
                  <li>
                     <a class="icon rounded fa-twitter" href="<?php echo \Transit4WP\ThemeOptions::getOption( 'twitterLink' ); ?>"><span class="label">Twitter</span></a>
                  </li>
               <?php } if( \Transit4WP\ThemeOptions::getOption( 'googlePlusLink' ) ){ ?>
                  <li>
                     <a class="icon rounded fa-google-plus" href="<?php echo \Transit4WP\ThemeOptions::getOption( 'googlePlusLink' ); ?>"><span class="label">Google+</span></a>
                  </li>
               <?php } if( \Transit4WP\ThemeOptions::getOption( 'linkedInLink' ) ){ ?>
                  <li>
                     <a class="icon rounded fa-linkedin" href="<?php echo \Transit4WP\ThemeOptions::getOption( 'linkedInLink' ); ?>"><span class="label">LinkedIn</span></a>
                  </li>
               <?php } ?>
            </ul>
         </div>
      </div>
   </div>
</footer>
<?php wp_footer();

if( \Transit4WP\ThemeOptions::getOption('scriptsInFooter') ){ ?>
   <script id="skelInitScript" src="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>js/init.js" data-mediapath="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>"></script>
<?php }

if( ( $customScripts = \Transit4WP\ThemeOptions::getOption( 'customScripts' ) ) !== false ){
   echo $customScripts;
} ?>

</body>
</html>