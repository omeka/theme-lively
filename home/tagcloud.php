<?php
/**
 * Homepage Tagcloud template part.
 */

$homepage_tagcloud_title = get_theme_option('homepage_tagcloud_title');
$homepage_tagcloud_count = get_theme_option("homepage_tagcloud_count");
if (!$homepage_tagcloud_title) {
    $homepage_tagcloud_title = 'Most popular tags';
}

if ($homepage_tagcloud_count === null || $homepage_tagcloud_count === '') {
    $homepage_tagcloud_count = 10;
} else {
    $homepage_tagcloud_count = (int) $homepage_tagcloud_count;
}
?>

<?php if (get_theme_option('homepage_show_tagcloud')) : ?>
    <h2 class="title"><?php echo $homepage_tagcloud_title; ?></h2>
    <?php $tags = get_records('Tag', array(), $homepage_tagcloud_count); ?>
    <?php echo lively_tag_cloud($tags, 'items/browse'); ?>
<?php endif; ?>
