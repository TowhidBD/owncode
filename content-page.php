<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Asif
 */

if(get_post_meta($post->ID, 'stock_page_options', true)) {
	$page_meta = get_post_meta($post->ID, 'stock_page_options', true);
} else {
	$page_meta = array();
}

if(array_key_exists('enable_title', $page_meta)) {
	$enable_title = $page_meta['enable_title'];
} else {
	$enable_title = true;
}

if(array_key_exists('enable_content', $page_meta)) {
	$enable_content = $page_meta['enable_content'];
} else {
	$enable_content = false;
}



?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if($enable_title == true) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		<!-- .entry-header -->
		<?php endif() : ?>

		<?php asif_billah_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			if($enable_content == true) {
				the_content();
			}
			

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'asif-billah' ),
				'after'  => '</div>',
			) );
		?>
		</div>
		<!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'asif-billah' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer>
		<!-- .entry-footer -->
		<?php endif; ?>
	</article>
	<!-- #post-<?php the_ID(); ?> -->
