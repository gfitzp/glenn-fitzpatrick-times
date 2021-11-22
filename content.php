<?php
/**
 * @package WordPress
 * @subpackage Bugis
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrap">
		<?php if (is_sticky()) echo __( '<h2 class="sticky-label">Featured</h2>', 'bugis' ); ?>
		<?php if ( 'post' == $post->post_type ) : // Hide post-type and comments info for pages on search results ?>

		    <!-- hide comments speech bubble link when comments are closed or when user is not logged in -->
		    <?php if ( ! is_user_logged_in() || (! comments_open() && get_comments_number() == 0 && ! is_page() ) ) : ?>

                <div class="post-type nocomment">
                    <a href="<?php the_permalink(); ?>" class="post-format standard" title="Permalink"><?php _e('Permalink', 'bugis') ?></a>
                </div><!--end post-type	-->

		    <?php else : ?>

                <div class="post-type">
                    <a href="<?php the_permalink(); ?>" class="post-format standard" title="Permalink"><?php _e('Permalink', 'bugis') ?></a>
                <p class="post-comments"><?php comments_popup_link( __( '0', 'bugis' ), __( '1', 'bugis' ), __( '%', 'bugis' ), 'comments-link', __( 'off', 'bugis' ) ); ?></p>
                </div><!--end post-type	-->

			<?php endif; ?>

		<?php endif; ?>

		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bugis' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header><!--end entry-header -->

		<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- end entry-summary -->
		<?php else : ?>

		<div class="entry-content">
			<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			<?php endif; ?>
			<?php the_content( __( 'Continue Reading &rarr;', 'bugis' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bugis' ), 'after' => '</div>' ) ); ?>
		</div><!-- end entry-content -->
		<?php endif; ?>

		<?php if ( 'post' == $post->post_type ) : // Hide entry-meta information for pages on search results ?>
		<footer class="entry-meta">
			<?php // Share Button (Post Shortlink, Twitter and Facebook Like). Activated on theme options page.
			$options = get_option('bugis_theme_options');
			if( $options['sharebtn'] ) : ?>
				<?php get_template_part( 'sharebtn'); ?>
			<?php endif; ?>

			<a href="<?php the_permalink(); ?>" class="post-date"><?php echo get_the_date(); ?></a>
				<p><span class="cat-links"><span class="cat-links-title" rel="bookmark"><?php _e( 'Categories ', 'bugis' ); ?></span><?php the_category( ', ' ); ?></span>
				<span class="tag-links"><?php the_tags( '<span class="tag-links-title">' . __( 'Tags ', 'bugis' ) . '</span>', ', ', '' ); ?></span></p>
				<?php edit_post_link( __( 'edit post &rarr;', 'bugis'), '<div class="edit-link">', '</div>'); ?>
		</footer><!-- end entry-meta -->
		<?php endif; ?>

	</div><!-- end entry-wrap -->
</article><!-- end post -<?php the_ID(); ?> -->