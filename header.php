<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Bloggar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	 <?php require_once( get_template_directory(). '/assets/css/bootstrap.min.css.php' );?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php 
		$header_layout = get_theme_mod( 'nav_bar_settings', 'logo_left');
		$primary_menu = blogger_get_menu_by_location('primary_menu');
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$custom_logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	?>
	<header class='bloggar-header-section'>
		<div class="container">
			<nav class="navbar navbar-expand-sm">
	  			<div class="container-fluid ">
					<a class="navbar-brand" href="<?php echo home_url();?>">
						<?php if(!empty($custom_logo )):?>
							<img src="<?php echo $custom_logo[0]; ?>" alt="" style='width:200px;'>
						<?php else:?>
							<span><?php echo get_bloginfo('name'); ?></span>
						<?php endif;?>
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  				<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse " id="navbarSupportedContent">
					  	<ul class="navbar-nav ms-auto">
							<?php foreach($primary_menu as $menu):?>
								<li class="nav-item  <?php echo ( $menu['has_children'] == true ? 'dropdown' : '')?>">
									<a class="nav-link fw-bold menu-link  <?php echo ( $menu['has_children'] == true ? 'dropdown-toggle' : '')?>" href="<?php echo esc_url( $menu['menu_item']->url ); ?>"><?php echo esc_html( $menu['menu_item']->title ); ?></a>
									<?php if( $menu['has_children']):?>
										<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            								<?php foreach($menu['children'] as $child):?>
												<li>
													<a class="dropdown-item" href="<?php echo esc_url( $child['menu_item']->url ); ?>">
														<?php echo esc_html( $child['menu_item']->title ); ?>
													</a>
												</li>
											<?php endforeach;?>
          								</ul>
									<?php endif;?>
								</li>
							<?php endforeach;?>	
					  	</ul>		  
					</div>
	 			 </div>
			</nav>
		</div>
	</header>