<?php
/**
 * @package WordPress
 * @subpackage Bugis
 */
?>

<?php if ( ! comments_open() && get_comments_number() == 0 && ! is_page() ) : ?>

<?php else : ?>

    <?php include(get_template_directory() . '/comments.php'); ?>
    
<?php endif; ?>