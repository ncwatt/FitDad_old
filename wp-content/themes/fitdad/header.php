<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<?php wp_head(); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<link href="<?php bloginfo('template_directory');?>/css/fontawesome.all.min.css" rel="stylesheet" />
	<!-- Fav / Touch Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory');?>/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory');?>/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory');?>/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_directory');?>/icons/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_directory');?>/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/Icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>
<body <?php body_class(); ?>>

<header>
	<nav id="topNavigation" class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top navbar-top admin-bar-padding">
		<div class="container">
			<a id="brandLink" class="brandlink" href="<?php bloginfo('url'); ?>">
				<img id="topNavLogo" src="<?php bloginfo('template_directory');?>/img/navbar-top-logo.png" class="img-fluid navbar-logo navbar-logo-show" alt="FitDad Logo" />
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php 
					wp_nav_menu (
						array ( 
							'theme_location'	=> 'top-menu',
							'container'			=> 'div',
							'container_class'	=> 'me-auto mb-2 mb-lg-0',
							'menu_class'		=> 'top-menu navbar-nav',
							'add_li_class'		=> 'nav-item'
						)
					); 
				?>
				<form class="d-flex d-none">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>
</header>