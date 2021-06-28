<!DOCTYPE html>
<html lang="en">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<?php wp_head(); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<link href="<?php bloginfo('template_directory');?>/css/fontawesome.all.min.css" rel="stylesheet" />
	<?php
		if (WP_ENVIRONMENT == 'production') {
			?>
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=G-FKTYX7XETX"></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'G-FKTYX7XETX');
			</script>
			<script data-ad-client="ca-pub-2933900882310913" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<?php
		}
	?>
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