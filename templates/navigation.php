<!-- NAVIGATION -->
   <div class="navigation py-1 mt-4">
   		<nav class="main-nav py-1 navbar navbar-expand-lg navbar-light bg-faded" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/img/border_horizontal.png),
                 url(<?php echo get_template_directory_uri() ?>/assets/img/border_horizontal.png);">
            <button onclick="hamMenu(this)" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
               <span>
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
               </span>
            </button>

            <?php 

               $args = (array(
                  'theme_location' => 'primary_menu',
                  'container' => 'div',
                  'container_class' => 'collapse navbar-collapse',
                  'container_id' => 'main-navigation',
                  'menu_class' => 'w-100 nav nav-justified flex-column flex-lg-row',
               ));

               wp_nav_menu($args);

             ?>

   			<!-- <div class="collapse navbar-collapse" id="main-navigation">
   				<ul class="w-100 nav nav-justified flex-column flex-lg-row">
   					<li class="nav-item">
   						<a href="index.php" class="nav-link">Home</a>
   					</li>
   					<li class="nav-item">
   						<a href="about.php" class="nav-link">About Us</a>
   					</li>
   					<li class="nav-item">
   						<a href="services.php" class="nav-link">Services</a>
   					</li>
   					<li class="nav-item">
   						<a href="products.php" class="nav-link">Products</a>
   					</li>
   					<li class="nav-item">
   						<a href="contact.php" class="nav-link">Contact Us</a>
   					</li>
   				</ul>
   			</div>
   		</nav> -->
   </div>