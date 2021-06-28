<?php get_header(); ?>
<div id="hpLogo" class="container-fluid hp-logo">
	<img src="<?php bloginfo('template_directory');?>/img/hp-logo-large.png" alt="Fit Dad Logo" />
</div>
<div class="d-none d-md-block hp-blocks">
	<div class="container">
		<div class="row">
			<div class="d-none d-md-block col-md-4 col-lg-3 hp-block hp-block-pic1">
				<div class="hp-block-content">
				</div>
			</div>
			<div class="d-none d-md-block col-md-4 col-lg-3 hp-block hp-block-text1">
				<div class="hp-block-content">
					Eat
				</div>
			</div>
			<div class="d-none d-md-block col-md-4 col-lg-3 hp-block hp-block-pic2">
				<div class="hp-block-content">
				</div>
			</div>
			<div class="d-none d-lg-block col-lg-3 hp-block hp-block-text2">
				<div class="hp-block-content">
					Sleep
				</div>
			</div>
		</div>
		<div class="row">
			<div class="d-none d-md-block d-lg-none col-md-4 col-lg-3 hp-block hp-block-text2">
				<div class="hp-block-content">
					Sleep
				</div>
			</div>
			<div class="d-none d-lg-block col-lg-3 hp-block hp-block-text3">
				<div class="hp-block-content">
					Train
				</div>
			</div>
			<div class="d-none d-md-block col-md-4 col-lg-3 hp-block hp-block-pic3">
				<div class="hp-block-content">
				</div>
			</div>
			<div class="d-none d-md-block d-lg-none col-md-4 hp-block hp-block-text3">
				<div class="hp-block-content">
					Train
				</div>
			</div>
			<div class="d-none d-lg-block col-lg-3 hp-block hp-block-text4">
				<div class="hp-block-content">
					Repeat
				</div>
			</div>
			<div class="d-none d-lg-block col-lg-3 hp-block hp-block-pic4">
				<div class="hp-block-content">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="d-none d-md-block d-lg-none col-md-4 hp-block hp-block-pic4">
				<div class="hp-block-content">
				</div>
			</div>
			<div class="d-none d-md-block d-lg-none col-md-4 hp-block hp-block-text4">
				<div class="hp-block-content">
					Repeat
				</div>
			</div>
			<div class="d-none d-md-block d-lg-none col-md-4 hp-block hp-block-pic4">
				<div class="hp-block-content">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hp-welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Welcome</h2>
				<hr />
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<h3>
					Hi I'm Nick, husband to Phil, father to Jack and lover of running, beer, pizza and Counting Crows.
					This is my fitness and lifestyle blog recording my journey from fat lad to fit dad.
				</h3>
				<p>
					This site is meant to be a light hearted log of my progress, what training programmes / techniques I'm partaking in and how I fit it in
					around the most important thing in my life....my family. If you are easily offended then I would advise you to jog on (no pun intended)
					as I won't be holding any punches. I will be telling it like it is. To find out more about why I can even be arsed click the button below.
				</p>
				<a href="#" class="btn btn-info">Tell me more...</a>
			</div>
			<div class="col-md-4 mt-4 mt-md-0">
				<div class="d-md-none advert-before">Advert</div>
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Fit Dad Square -->
					<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-2933900882310913"
						data-ad-slot="9880151769"
						data-ad-format="auto"
						data-full-width-responsive="true"></ins>
				<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
				<div class="d-md-none advert-after"></div>
			</div>
		</div>
	</div>
</div>
<div class="hp-featured">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php
					$sticky = get_option( 'sticky_posts' );
					$featured_args = array(
						'posts_per_page' => 1,
						'post__in' => $sticky,
						'ignore_sticky_posts' => 1
					);
					$featured = new WP_Query( $featured_args );
					if ( isset( $sticky[0] ) ) {
						echo "<h2>Featured Post</h2>";
					} 
					else {
						echo "<h2>Latest Post</h2>";
					}
				?>
				<hr />
			</div>
		</div>
		<div class="row post-list">
			<?php
				if ( $featured -> have_posts() ) {
					while ( $featured -> have_posts()) {
						$featured -> the_post(); // Get the post

						echo "<div class=\"col-md-6\">";

						// Check if there is a thumbnail image
						if ( has_post_thumbnail() ) {
							// Display the thumbnail
							echo "<a href=\"", get_the_permalink(), "\"><img src=\"", get_the_post_thumbnail_url(), "\" class=\"img-fluid mb-2 mb-md-0\" alt=\"", get_the_title(), "\" /></a>";
						}
						else {
							// No thumbnail image so lets display the default one from the template
							echo "<a href=\"", get_the_permalink(), "\"><img src=\"", bloginfo('template_directory'), "/img/default-post-image.jpg\" class=\"img-fluid mb-2 mb-md-0\" alt=\"", get_the_title(), "\" /></a>";
						}

						echo "</div><div class=\"col-md-6\"><a href=\"", get_the_permalink(), "\">";

						// Display the title
						echo "<h3>", get_the_title(), "</h3>";
						echo "<p class=\"post-datetime\">", get_post_time('d M Y H:i'), "</p>";

						// Display the excerpt
						echo "<p>", get_the_excerpt(), "</p></a>";

						//

						echo "<ul class=\"postdetails\">";
						echo "<li><i class=\"fas fa-user-circle\"></i> ", get_the_author_meta('display_name'), " |&nbsp;</li>";
						echo "<li><i class=\"far fa-comments\"></i> ", get_comments_number(), " comments</li>";
						echo "</ul>";
						// Display the button to link to the post
						//echo "<a href=\"", get_the_permalink(), "\" class=\"btn btn-info\">Read Post</a>";
						
						echo "</div>";
					}
				}
			?>
		</div>
	</div>
</div>
<div class="hp-latest">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Latest Posts</h2>
				<hr />
			</div>
		</div>
		<div class="row">
			<?php
				$latest_args = array(
					'posts_per_page' => 3,
					'post__not_in' => $sticky
				);
				$latest = new WP_Query( $latest_args );
				if ( $latest -> have_posts() ) {
					// Declare a counter for the while loop
					$latest_post = 1;

					while ( $latest -> have_posts()) {
						$latest -> the_post(); // Get the post

						// Turn the post into a columns
						if ( $latest_post == 1 ) {
							echo "<div class=\"col-md-4 post-list\"><a href=\"", get_the_permalink(), "\">";
						}
						else {
							echo "<div class=\"col-md-4 mt-4 mt-md-0 post-list\"><a href=\"", get_the_permalink(), "\">";
						}
						

						// Check if there is a thumbnail image
						if ( has_post_thumbnail() ) {
							// Display the thumbnail
							echo "<img src=\"", get_the_post_thumbnail_url(), "\" class=\"img-fluid post-stacked\" alt=\"", get_the_title(), "\" />";
						}
						else {
							// No thumbnail image so lets display the default one from the template
							echo "<img src=\"", bloginfo('template_directory'), "/img/default-post-image.jpg\" class=\"img-fluid post-stacked\" alt=\"", get_the_title(), "\" />";
						}

						// Display the title
						echo "<h3>", get_the_title(), "</h3>";
						echo "<p class=\"post-datetime\">", get_post_time('d M Y H:i'), "</p>";

						// Display the excerpt
						echo "<p>", get_the_excerpt(), "</p></a>";

						echo "<ul class=\"postdetails\">";
						echo "<li><i class=\"fas fa-user-circle\"></i> ", get_the_author_meta('display_name'), " |&nbsp;</li>";
						echo "<li><i class=\"far fa-comments\"></i> ", get_comments_number(), " comments</li>";
						echo "</ul>";

						echo "</div>";

						// Increment the counter
						$latest_post++;
					}
				}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>