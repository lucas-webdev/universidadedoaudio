<?php function viaggio_header_select(){
		if(cs_get_option('header_section_selector') == 'value-1'){
			?>
			<header id="header-style1" class="header_1">
				<!--TOP BAR STARTS-->
				<?php viaggio_top_bar();?>
				<!--TOP BAR ENDS-->
				<!--BRANDS STARTS-->
				<div id="brand" class="brand_container">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php viaggio_site_brand(); ?>
							</div>
						</div>
					</div>
				</div>
				<!--BRANDS ENDS-->
			</header>
			<nav id="menu" class='main_menu'>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php
					   /**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$args = array(
							'theme_location' => 'primary',
							'menu' => '',
							'container' => '',
							'container_class' => '',
							'container_id' => '',
							'menu_class' => 'primary-menu',
							'menu_id' => 'mainmenu',
							'echo' => true,
							'fallback_cb' => 'wp_page_menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
							'depth' => 0,
							'walker' => ''
						);
					
						wp_nav_menu( $args );
				?>
						</div>
					</div>
				</div>
			</nav>
		<?php }else{ ?>
			<header id="header-style2" class="header_2">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<?php if(cs_get_option('header_top_social')) : ?>
									<ul class="top_social">
										<?php echo viaggio_social_icons(); ?>
									</ul>
								<?php endif; ?>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="brand_container"><?php viaggio_site_brand(); ?></div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="search_menu">
								<?php if(cs_get_option('header_off_canvas_menu')) :?>
								<span id="toggle-off-canvas"><i class="fa fa-navicon"></i></span>
								<?php endif;?>
								
								<?php if(cs_get_option('header_top_search')) :?>
								<span class="search_top"><i class="fa fa-search"></i></span>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>				
			</header>
			<nav id="menu" class='nav_alter'>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						<?php
					   /**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$args = array(
							'theme_location' => 'primary',
							'menu' => '',
							'container' => '',
							'container_class' => '',
							'container_id' => '',
							'menu_class' => 'primary-menu',
							'menu_id' => 'mainmenu',
							'echo' => true,
							'fallback_cb' => 'wp_page_menu',
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
							'depth' => 0,
							'walker' => ''
						);
					
						wp_nav_menu( $args );
				?>
			</div>
		</div>
	</div>
			</nav>
<?php }
	}
	function header_search(){
		?>
<div class="top_search">
	<span id="search_close"><img src="<?php echo get_template_directory_uri();?>/assets/images/cancel_white.png" alt=""></span>
	<div class="search_holder">
		<form action="<?php echo esc_url(home_url('/'));?>" method="post">
			<div class="search_box">
			<input type="text" placeholder='<?php esc_html_e( 'Search', 'viaggio' );?>' name='s' value='<?php echo get_search_query();?>'>
			<button><i class="fa fa-search"></i></button>
			</div>
		</form>
	</div>					
</div>	
<?php } ?>