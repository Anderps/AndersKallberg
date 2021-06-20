<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Brooklyn Lite
 */

get_header();

$layout = brooklyn_lite_blog_layout();
?>

<section id="primary" class="blog-posts">
    <div class="padding">
    
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr( $layout['type'] ); ?> <?php echo esc_attr( $layout['cols'] ); ?>">
                    <?php if($layout['type'] == "layout-two-columns" || $layout['type'] == "layout-grid") echo '<div class="row">';?>
    					<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); 
    							/* Include the Post-Format-specific template for the content.
    							 * If you want to override this in a child theme, then include a file
    							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    							 */
    							get_template_part( 'template-parts/content', get_post_format() );
    						
    						} } else { 
    							get_template_part( 'template-parts/content', 'none' ); 
    						}

                            if( $layout['type'] != 'layout-grid'){
                                echo function_exists('brooklyn_lite_pagination') ? brooklyn_lite_pagination() : posts_nav_link(); 
                            }
                        ?>
                    <?php if($layout['type'] == "layout-two-columns") echo '</div>';?>
                </div>

                <?php if( $layout['type'] == 'layout-grid'){
                    echo function_exists('brooklyn_lite_pagination') ? brooklyn_lite_pagination() : posts_nav_link();
                }?>


                <?php if ( $layout['sidebar'] ) { ?>
                    <div class="col-md-3">
                        <?php get_sidebar('blog-sidebar');?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div><!-- /.padding -->
</section><!-- /.blog-posts -->

<?php
get_footer();