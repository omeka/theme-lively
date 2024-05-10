<?php
$pageTitle = __('Browse Collections');

queue_js_file(array('masonry.pkgd.min', 'browse'));
queue_js_file(array('imagesloaded.pkgd.min', 'browse'));

$layoutSetting = get_theme_option('browse_layout') ?? 'grid';
$gridState = ($layoutSetting == 'togglegrid') ? 'disabled' : '';
$listState = ($layoutSetting == 'togglelist') ? 'disabled': '';
$isGrid = (strpos($layoutSetting, 'grid') !== false) ? true : false;
$excludeTag = 'record_type';

echo head(array('title' => $pageTitle, 'bodyclass' => 'collections browse'));
?>

<h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h1>

<div class="browse-controls">

    <?php if (strpos($layoutSetting, 'toggle') !== false) : ?>
        <div class="layout-toggle">
            <?php echo $this->translate('View as:'); ?>
            <button type="button" aria-label="<?php echo $this->translate('Grid'); ?>" class="grid" <?php echo $gridState; ?>><?php echo $this->translate('Grid'); ?></button>
            <span class="layout-toggle-separator"></span>
            <button type="button" aria-label="<?php echo $this->translate('List'); ?>" class="list" <?php echo $listState; ?>><?php echo $this->translate('List'); ?></button>
        </div>
    <?php endif; ?>

    <?php if ($total_results > 0) : ?>

        <?php
        $sortLinks[__('Title')] = 'Dublin Core,Title';
        $sortLinks[__('Date Added')] = 'added';
        ?>
        <div id="sort-links">
            <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
        </div>

    <?php endif; ?>

</div>

<div class="resources <?php echo ($isGrid) ? 'resource-grid' : 'resource-list'; ?>">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>
    <?php
    foreach (loop('collections') as $collection) {
        echo $this->partial('collections/single.php', array('collection' => $collection, 'isGrid' => $isGrid, 'excludeTag' => $excludeTag));
    }
    ?>
</div>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections' => $collections, 'view' => $this)); ?>

<?php echo foot(); ?>
