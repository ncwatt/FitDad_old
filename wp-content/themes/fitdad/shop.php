<?php get_header(); 
/*
Template Name: Shop Page
*/
?>
<div class="container">
	<div class="row">
		<div class="col-12">

			<h1><?php the_title(); ?></h1>

			<?php
				if(have_posts()) : while(have_posts()) : the_post();
					the_content();
				endwhile; else : endif;
			?>
		</div>
	</div>
</div class>
<?php get_footer(); ?>