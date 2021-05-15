<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php wp_head(); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
				<img src="<?php bloginfo('template_directory');?>/img/logo.png" class="img-fluid logo" alt="FitDad Logo" />
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php 
					wp_nav_menu (
						array ( 
							'theme_location' => 'top-menu',
							'menu_class' => 'top-menu navbar-nav',
							'add_li_class' => 'nav-item'
						)
					); 
				?>
			</div>
		</div>
	</nav>
</header>