<?php
/**
* The header for our theme
* This is the template that displays all of the <head> section and everything up until your opening main container section (i.e. <div class="main-content").
* @package CTC Capstone Theme
* @since 1.0.0
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  	<head>
       		<meta charset="<?php bloginfo( 'charset' ); ?>" />
       		<meta name="viewport" content="width=device-width, initial-scale=1" />
        		<?php wp_head(); ?>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;500;700&family=Roboto&display=swap" rel="stylesheet">
   	</head>
   	<body <?php body_class(); ?> >
       		<header>
				<div class="siteNav">
					<!-- custom logo -->
					<?php if ( ! has_custom_logo() ) { ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<!-- if your page is set to front-page or blog display the site title (appearance > customize) -->
							<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
						<?php else : ?>
								<!-- if your page is not set to front-page or blog display the site title (appearance > customize) -->
								<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
						<!-- //other wise display the custom logo. -->
					<?php } else {
						the_custom_logo();
					}?>

					<?php
						wp_nav_menu(
							//in our menu we need to use an array as there is number of arguments we can use.
							//the most important is theme_location.
							array(
								'theme_location' => 'main-menu',
								'container_class' => 'main-nav',
								'container_id'    => 'main-nav',
								'menu_class'      => 'menu-item',
								'menu_id'         => 'main-menu',
								'fallback_cb'     => ''
							)
						);
					?>
				</div>
			</header>
            <div id="content" class="site-content">


