<?php get_header(); ?>
<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-9 post-single">
				<?php
					// Check if there is a featured image
					if ( has_post_thumbnail() ) {
						// Display the thumbnail
						echo "<img src=\"", get_the_post_thumbnail_url(), "\" class=\"img-fluid featured-image\" alt=\"", get_the_title(), "\" />";
					}
					else {
						// No thumbnail image so lets display the default one from the template
						echo "<img src=\"", bloginfo('template_directory'), "/img/default-post-image.jpg\" class=\"img-fluid featured-image\" alt=\"", get_the_title(), "\" />";
					}

					// Display the title
					echo "<h1>", get_the_title(), "</h1>";
					echo "<p class=\"post-datetime\">Posted: ", get_post_time('d M Y H:i'), "</p>";
					echo the_content();
					echo the_tags();
				?>

				<!--<php
					if(have_posts()) : while(have_posts()) : the_post();
						the_content();
					endwhile; else : endif;
				>
				<php the_tags(); >-->
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>