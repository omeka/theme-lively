<?php
$title = __('Browse Exhibits');

queue_js_file(array('masonry.pkgd.min', 'browse'));
queue_js_file(array('imagesloaded.pkgd.min', 'browse'));

$layoutSetting = get_theme_option('browse_layout') ?? 'grid';
$gridState = ($layoutSetting == 'togglegrid') ? 'disabled' : '';
$listState = ($layoutSetting == 'togglelist') ? 'disabled': '';
$isGrid = (strpos($layoutSetting, 'grid') !== false) ? true : false;
$excludeTag = 'record_type';

echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>

<?php if (count($exhibits) > 0): ?>

    <nav class="navigation secondary-nav">
        <?php echo nav(array(
            array(
                'label' => __('Browse All'),
                'uri' => url('exhibits')
            ),
            array(
                'label' => __('Browse by Tag'),
                'uri' => url('exhibits/tags')
            )
        )); ?>
        <?php echo lively_exhibit_search_filters(); ?>
    </nav>

    <div class="browse-controls">

        <?php if (strpos($layoutSetting, 'toggle') !== false) : ?>
            <div class="layout-toggle">
                <?php echo $this->translate('View as:'); ?>
                <button type="button" aria-label="<?php echo $this->translate('Grid'); ?>" class="grid" <?php echo $gridState; ?>><?php echo $this->translate('Grid'); ?></button>
                <span class="layout-toggle-separator"></span>
                <button type="button" aria-label="<?php echo $this->translate('List'); ?>" class="list" <?php echo $listState; ?>><?php echo $this->translate('List'); ?></button>
            </div>
        <?php endif; ?>

        <?php
        $sortLinks[__('Title')] = 'title';
        $sortLinks[__('Date Added')] = 'added';
        ?>
        <div id="sort-links">
            <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
        </div>

    </div>

    <div class="resources <?php echo ($isGrid) ? 'resource-grid' : 'resource-list'; ?>">
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        <?php
        foreach (loop('exhibit') as $exhibit) {
            echo $this->partial('exhibit-builder/exhibits/single.php', array('exhibit' => $exhibit, 'isGrid' => $isGrid, 'excludeTag' => $excludeTag));
        }
        ?>
    </div>

    <?php echo pagination_links(); ?>

<?php else: ?>
    <p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
