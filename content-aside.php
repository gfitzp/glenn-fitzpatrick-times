<?php
/**
 * @package WordPress
 * @subpackage Bugis
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap">
		<?php if (is_sticky()) echo __( '<h2 class="sticky-label">Featured</h2>', 'bugis' ); ?>
		
		<!-- hide comments speech bubble link when comments are closed -->
        <?php if ( ! comments_open() && ! is_page() ) : ?>
        
        <div class="post-type nocomment">
			<a href="<?php the_permalink(); ?>" class="post-format aside" title="Permalink"><?php _e('Permalink', 'bugis') ?></a>
		</div><!--end post-type	-->
        
        <?php else : ?>
        
		<div class="post-type">
			<a href="<?php the_permalink(); ?>" class="post-format aside" title="Permalink"><?php _e('Permalink', 'bugis') ?></a>
			<p class="post-comments"><?php comments_popup_link( __( '0', 'bugis' ), __( '1', 'bugis' ), __( '%', 'bugis' ), 'comments-link', __( 'off', 'bugis' ) ); ?></p>
		</div><!--end post-type	-->

        <?php endif; ?>

		<div class="entry-content">
			<?php the_content( __( 'Continue Reading &rarr;', 'bugis' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bugis' ), 'after' => '</div>' ) ); ?>
		</div><!-- end entry-content -->
	
		<?php if ( 'post' == $post->post_type ) : // Hide entry-meta information for pages on search results ?>
		<footer class="entry-meta">	
			<?php // Share Button (Post Shortlink, Twitter and Facebook Like). Activated on theme options page.
			$options = get_option('bugis_theme_options');
			if( $options['sharebtn'] ) : ?>
				<?php get_template_part( 'sharebtn'); ?>
			<?php endif; ?>
			
					<a href="<?php the_permalink(); ?>" class="post-date"><?php echo get_the_date(); ?></a>
					<p><span class="cat-links"><span class="cat-links-title"><?php _e( 'Categories ', 'bugis' ); ?></span><?php the_category( ', ' ); ?></span>
					<span class="tag-links"><?php the_tags( '<span class="tag-links-title">' . __( 'Tags ', 'bugis' ) . '</span>', ', ', '' ); ?></span></p>
			<?php edit_post_link( __( 'edit post &rarr;', 'bugis'), '<div class="edit-link">', '</div>'); ?>
		</footer><!-- end entry-meta -->
		<?php endif; ?>
		
	</div><!-- end entry-wrap -->
</article><!-- end  post -<?php the_ID(); ?> -->