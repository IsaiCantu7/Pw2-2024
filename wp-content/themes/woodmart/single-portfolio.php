<?php
/**
 * The template for displaying single project
 *
 */

get_header(); ?>

<?php 
	
	// Get content width and sidebar position
	$content_class = woodmart_get_content_class();

?>


<div class="site-content <?php echo esc_attr( $content_class ); ?>" role="main">

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

				<div class="portfolio-single-content">
					<?php the_content( esc_html__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'woodmart' ) ); ?>
				</div>

				<?php if ( woodmart_get_opt( 'portfolio_navigation' ) ) woodmart_posts_navigation(); ?>

				<?php
				$args = woodmart_get_related_projects_args( get_the_ID() );

				$query = new WP_Query( $args );

				if ( woodmart_get_opt( 'portfolio_related' ) ) {
					$style = woodmart_get_opt( 'portoflio_style' );

					if ( 'parallax' === $style ) {
						woodmart_enqueue_js_library( 'panr-parallax-bundle' );
						woodmart_enqueue_js_script( 'portfolio-effect' );
					}

					woodmart_enqueue_portfolio_loop_styles( $style );

					woodmart_enqueue_js_library( 'photoswipe-bundle' );
					woodmart_enqueue_inline_style( 'photoswipe' );
					woodmart_enqueue_js_script( 'portfolio-photoswipe' );
					echo woodmart_generate_posts_slider(
						array(
							'title'                   => esc_html__( 'Related projects', 'woodmart' ),
							'slides_per_view'         => 3,
							'hide_pagination_control' => 'yes',
							'custom_sizes'            => apply_filters( 'woodmart_portfolio_related_custom_sizes', false ),
							'spacing'                 => woodmart_get_opt( 'portfolio_spacing' ),
							'spacing_tablet'          => woodmart_get_opt( 'portfolio_spacing_tablet', '' ),
							'spacing_mobile'          => woodmart_get_opt( 'portfolio_spacing_mobile', '' ),
						),
						$query
					);
				}
				?>
		<?php endwhile; ?>

</div><!-- .site-content -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>