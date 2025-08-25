<?php
/**
 * Search result record - Single template part.
 */

$record = get_record_by_id($searchText['record_type'], $searchText['record_id']);
$recordType = $searchText['record_type'];
set_current_record($recordType, $record);

$isGrid = $isGrid ?? false;
$title = $searchText['title'] ? $searchText['title'] : '[Unknown]';
$imageFile = $record->getFile();
$altText = ($imageFile && !empty($imageFile->alt_text)) ? $imageFile->alt_text : $title;
$recordImage = record_image($recordType, 'square_thumbnail', ['alt' => $altText]);

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
            <h3 class="resource__heading"><?php echo link_to($record, 'show', $title); ?></h3>
        </div>
    </div>
</li>
