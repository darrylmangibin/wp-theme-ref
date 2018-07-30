 <!-- footer -->
   <div class="site-footer pt-5">
   		<div class="container">
   			 <div class="row">
   			 	<div class="col-md-4 pb-4">
   			 		<?php 
              if(is_active_sidebar( 'footer_widget_1' )):
                dynamic_sidebar('footer_widget_1');
              endif;
             ?>
   			 	</div>
   			 	<div class="col-md-4 pb-4">
   			 		<?php 
              if(is_active_sidebar('footer_widget_2')):
                dynamic_sidebar('footer_widget_2');
              endif;
             ?>
   			 	</div>
   			 	<div class="col-md-4 pb-4">
   			 		<?php 
              if(is_active_sidebar('footer_widget_3')) :
                dynamic_sidebar('footer_widget_3');
              endif;
            ?>

            <?php 

            $args = (array(
              'theme_location' => 'primary_social',
              'container' => 'nav',
              'container_class' => 'socials text-center text-lg-right pt-3',
              'menu_class' => false,
              'link_before' => '<span class="sr-only">',
              'link_after' => '</span>',
            ));

            wp_nav_menu($args);

           ?>

   			 		<!-- <nav class="socials text-center text-lg-right pt-3">
                  <ul>
                    <li><a href="https://facebook.com" target="_blank"><span class="sr-only">Facebook</span></a></li>
                    <li><a href="https://twitter.com" target="_blank"><span class="sr-only">Twitter</span></a></li>
                    <li><a href="https://instagram.com" target="_blank"><span class="sr-only">Instagram</span></a></li>
                    <li><a href="https://pinterest.com" target="_blank"><span class="sr-only">Pinterest</span></a></li>
                    <li><a href="https://youtube.com" target="_blank"><span class="sr-only">Youtube</span></a></li>
                  </ul>        
               </nav> -->
   			 	</div>
   			 	<div class="w-100">
   			 		<hr class="footer-hr w-100">
   			 		<p class="copyright text-center"><?php echo bloginfo('name') .  ' &copy; ' . date('Y'); ?></p>
   			 	</div>
   			 </div>
   		</div>
   </div>

   <!-- <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> -->
   <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
   <!-- <script type="text/javascript" src="js/main.js"></script> -->
   <?php wp_footer(); ?>
</body>
</html>