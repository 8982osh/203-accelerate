<?php
/**
 * The template for displaying the archive of case studies
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

/* Create var to query posts */
$loaded_posts = $wp_the_query->posts; 

/* Return array of posts in reverse order */
$loaded_posts = array_reverse($loaded_posts); 


get_header(); ?>

	<div id="primary" class="site-content sidebar">
		<div class="main-content" role="main">
            <!-- Query posts, display in reverse -->
			<?php $wp_the_query->posts = $loaded_posts; ?>
			<?php while ( $wp_the_query->have_posts() ) : $wp_the_query->the_post(); 
				$image_1 = get_field("image_1");
                $size = "full";
                $services = get_field("services");
			?>
            
			<article class="archive-case-study">
				<aside class="archive-case-study-sidebar">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<h5><?php echo $services; ?></h5>

				    <?php the_excerpt(); ?>

				    <p class="archive-view-project"><strong><a href="<?php the_permalink(); ?>">View Project</a></strong></p>
			    </aside>


			<div class="archive-case-study-images">
				<?php if($image_1) {
					echo wp_get_attachment_image($image_1, $size);
				} ?>
			</div>
		
		    </article>
		    <p style="clear: both;">
			<?php endwhile; ?> <!-- end of the loop. -->
		</div> <!-- .main-content -->
	</div> <!-- #primary -->

<?php get_footer(); ?>
