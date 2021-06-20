<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Brooklyn Lite
 */

get_header();
$brooklyn_lite_single_layout = brooklyn_lite_single_layout();
?>



<section class="blog-posts <?php echo esc_attr( $brooklyn_lite_single_layout['type'] ); ?> <?php echo esc_attr( $brooklyn_lite_single_layout['cols'] ); ?>">
    <div class="padding">
        <div class="container">
        	<?php if ( $brooklyn_lite_single_layout['sidebar'] ) { ?>
            <div class="row">
                <div class="col-md-8">
                <?php } ?>
					<?php
					while ( have_posts() ) : the_post();

						$single_layout = get_theme_mod( 'single_post_content_layout', 'layout-default' );

						if ( 'layout-default' == $single_layout ){
							get_template_part( 'template-parts/content', 'single' );
						} elseif ( 'layout-2' == $single_layout ) {
							get_template_part( 'template-parts/content-single', '2' );
						} elseif ( 'layout-3' == $single_layout ) {
							get_template_part( 'template-parts/content-single', '3' );
						}

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'brooklyn-lite' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'brooklyn-lite' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

						get_template_part( 'template-parts/author','bio' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

                

            	<?php if ( $brooklyn_lite_single_layout['sidebar'] ) { ?>
                	</div>
		                <div class="col-md-4">
		                	<?php get_sidebar('blog-sidebar');?>
		                </div>
					</div>	                
	        <?php } ?>
            
        </div>
    </div><!-- /.padding -->
</section><!-- /.blog-posts -->

<?php get_footer();
