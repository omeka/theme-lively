<?php
/**
 * The public browse view for Timeline.
 */

queue_js_file(array('masonry.pkgd.min', 'browse'));
queue_js_file(array('imagesloaded.pkgd.min', 'browse'));
 
$head = array('bodyclass' => 'timelines primary',
              'title' => html_escape(__('Browse Timelines')));
echo head($head);

$layoutSetting = get_theme_option('browse_layout') ?? 'grid';
$gridState = ($layoutSetting == 'togglegrid') ? 'disabled' : '';
$listState = ($layoutSetting == 'togglelist') ? 'disabled': '';
$isGrid = (strpos($layoutSetting, 'grid') !== false) ? true : false;
?>

<h1><?php echo __('Browse Timelines'); ?></h1>

<div class="browse-controls">

    <?php if (strpos($layoutSetting, 'toggle') !== false) : ?>
        <div class="layout-toggle">
            <?php echo $this->translate('View as:'); ?>
            <button type="button" aria-label="<?php echo $this->translate('Grid'); ?>" class="grid" <?php echo $gridState; ?>><?php echo $this->translate('Grid'); ?></button>
            <span class="layout-toggle-separator"></span>
            <button type="button" aria-label="<?php echo $this->translate('List'); ?>" class="list" <?php echo $listState; ?>><?php echo $this->translate('List'); ?></button>
        </div>
    <?php endif; ?>

</div>

<?php if ($timelines) : ?>
    <div class="timelines resources <?php echo ($isGrid) ? 'resource-grid' : 'resource-list'; ?>">
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        <?php
        foreach ($timelines as $timeline) {
            echo $this->partial('timeline/timelines/single.php', array('timeline' => $timeline, 'isGrid' => $isGrid));
        }
        ?>
    </div>

    <?php echo pagination_links(); ?>
<?php else: ?>
    <p><?php echo __('You have no timelines.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
