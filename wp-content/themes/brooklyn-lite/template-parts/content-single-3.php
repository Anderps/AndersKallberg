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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner">

			<footer class="entry-footer">
				<div class="post-bottom">
					<?php 
						if(get_theme_mod('index_hide_author') == '' ){
							if( $brooklyn_lite_layout['type'] != 'layout-grid'){
								brooklyn_lite_blog_post_author_avatar();
							}
						}
						brooklyn_lite_entry_footer();	
					?>
				</div>
			</footer>

			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
			?>

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

			</div>

		<!-- </div> -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
