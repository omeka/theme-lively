<?php
/**
 * Search result record - Single template part.
 */

$record = get_record_by_id($searchText['record_type'], $searchText['record_id']);
$recordType = $searchText['record_type'];
set_current_record($recordType, $record);

$isGrid = $isGrid ?? false;
$recordImage = record_image($recordType, 'square_thumbnail');
$title = $searchText['title'] ? $searchText['title'] : '[Unknown]';

$class = ['resource'];
$class[] = ($isGrid) ? '' : 'media-object';
$class[] = strtolower($filter->filter($recordType));
?>

<li class="<?php echo implode(' ', $class); ?>">
    <!-- Thumbnail -->
    <?php if ($recordImage) : ?>
        <div class="resource__thumbnail">
            <?php echo link_to($record, 'show', $recordImage, array('class' => 'thumbnail')); ?>
        </div>
    <?php endif; ?>

    <!-- Content -->
    <div class="resource__content">
        <?php echo lively_record_tags($record); ?>
        <!-- Metadata -->
        <div class="resource__meta <?php echo ($isGrid) ? '' : 'media-object-section'; ?>">
            <h2 class="resource__heading"><?php echo link_to($record, 'show', $title); ?></h2>
        </div>
    </div>
</li>
