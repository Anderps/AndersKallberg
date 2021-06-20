<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Brooklyn Lite
 */

$brooklyn_lite_hide_thumb 	= get_theme_mod( 'index_hide_thumb' );
$brooklyn_lite_layout 		= brooklyn_lite_blog_layout();

if($brooklyn_lite_layout['type'] == "layout-two-columns"){
	$post_class[] = 'col-md-6';	
}
$post_class[] = $brooklyn_lite_layout['type'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( implode( ' ', $post_class ) ); ?>>
	<div class="post-inner">
		<!-- <div class="d-flex"> -->
		    <?php if ( $brooklyn_lite_hide_thumb == '' ){
		    	if( has_post_thumbnail() ){ ?>
			    	<header class="entry-header">
					    <div class="entry-thumbnail">
					        <?php brooklyn_lite_post_thumbnail(); ?>
					    </div><!-- /.entry-thumbnail -->
					</header>
				<?php }
				} ?>

			<div class="post-info <?php echo esc_attr( $brooklyn_lite_layout['item_inner_cols'] ); ?>">
				<div class="entry-content">
					<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
						
						if(is_single()){
							the_content();
						}else{
							the_excerpt();	
						}
						

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brooklyn-lite' ),
								'after'  => '</div>',
							)
						);
					?>
				</div><!-- .entry-content -->

				
				<?php if ( 'post' === get_post_type() ) : ?>

					<footer class="entry-footer">
						<div class="post-bottom">
							<?php 
								if(get_theme_mod('index_hide_author') == '' ){
									if( $brooklyn_lite_layout['type'] != 'layout-grid'){
										brooklyn_lite_blog_post_author_avatar();
									}
								}
								brooklyn_lite_entry_footer();	
								
								if(!is_single()){
									if(get_theme_mod('index_hide_read_more') == '' ){
										if( $brooklyn_lite_layout['type'] != 'layout-grid'){
											brooklyn_lite_read_more();
										}
									}
								}
							?>
						</div>
					</footer><!-- .entry-footer -->

				<?php endif; ?>
			</div>

		<!-- </div> -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
