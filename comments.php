<?php
/**
 * @package WordPress
 * @subpackage Bugis
 */
?>

<?php if ( ! comments_open() && ! is_page() ) : ?>

<?php else : ?>

    <?php include(get_template_directory() . '/comments.php'); ?>
    
<?php endif; ?>