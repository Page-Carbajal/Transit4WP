<!-- Footer -->
<footer id="footer">
   <div class="container">
      <section class="links">
         <div class="row">
            <section class="3u 6u(medium) 12u$(small)">
               <?php dynamic_sidebar( '' ); ?>
            </section>
            <section class="3u 6u$(medium) 12u$(small)">
               <h3>Culpa quia, nesciunt</h3>
               <ul class="unstyled">
                  <li><a href="#">Lorem ipsum dolor sit</a></li>
                  <li><a href="#">Reiciendis dicta laboriosam enim</a></li>
                  <li><a href="#">Corporis, non aut rerum</a></li>
                  <li><a href="#">Laboriosam nulla voluptas, harum</a></li>
                  <li><a href="#">Facere eligendi, inventore dolor</a></li>
               </ul>
            </section>
            <section class="3u 6u(medium) 12u$(small)">
               <h3>Neque, dolore, facere</h3>
               <ul class="unstyled">
                  <li><a href="#">Lorem ipsum dolor sit</a></li>
                  <li><a href="#">Distinctio, inventore quidem nesciunt</a></li>
                  <li><a href="#">Explicabo inventore itaque autem</a></li>
                  <li><a href="#">Aperiam harum, sint quibusdam</a></li>
                  <li><a href="#">Labore excepturi assumenda</a></li>
               </ul>
            </section>
            <section class="3u$ 6u$(medium) 12u$(small)">
               <h3>Illum, tempori, saepe</h3>
               <ul class="unstyled">
                  <li><a href="#">Lorem ipsum dolor sit</a></li>
                  <li><a href="#">Recusandae, culpa necessita nam</a></li>
                  <li><a href="#">Cupiditate, debitis adipisci blandi</a></li>
                  <li><a href="#">Tempore nam, enim quia</a></li>
                  <li><a href="#">Explicabo molestiae dolor labore</a></li>
               </ul>
            </section>
         </div>
      </section>
      <div class="row">
         <div class="8u 12u$(medium)">
            <ul class="copyright">
               <li>&copy; Untitled. All rights reserved.</li>
               <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
               <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
            </ul>
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
   <script id="skelInitScript" src="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>js/init.js" data-mediapath="http://buquit.loc/media/themes/transit-for-wordpress/resources/"></script>
<?php } ?>

</body>
</html>