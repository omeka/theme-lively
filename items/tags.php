<?php
$pageTitle = __('Browse Items by Tag');
echo head(array('title' => $pageTitle, 'bodyclass' => 'items tags'));
?>

<h1><?php echo $pageTitle; ?></h1>

<nav class="navigation items-nav secondary-nav" aria-label="<?php echo ('Item navigation'); ?>">
    <?php echo public_nav_items(); ?>
</nav>

<?php echo lively_tag_cloud($tags, 'items/browse'); ?>

<?php echo foot(); ?>
