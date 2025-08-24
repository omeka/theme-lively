<?php
/**
 * Item Single template part.
 */

$isGrid = $isGrid ?? false;
$excludeTag = $excludeTag ?? '';
$primary = $primary ?? false;
$title = metadata($item, 'rich_title', array('no_escape' => true));
$imageFile = $item->getFile(0);
$altText = $imageFile->alt_text ?: metadata($item, 'display_title');
$primaryMedia = item_image('fullsize', ['alt' => $altText], 0, $item);
$description = metadata($item, array('Dublin Core', 'Description'));
$truncateDesc = get_theme_option('truncate_body_property') ?? 'ellipsis';
$style = '';

if ($primary) {
    $style = 'background-image: url(' . record_image_url($item, 'fullsize') . ');';
    $truncateDesc = 'full';
}
?>

<div class="item resource <?php echo ($isGrid) ? '' : 'media-object'; ?>" style="<?php echo $style; ?>">
    <!-- Thumbnail -->
    <?php if ($primaryMedia) : ?>
        <div class="resource__thumbnail">
            <?php echo link_to($item, 'show', $primaryMedia, array('class' => 'thumbnail')); ?>
        </div>
    <?php endif; ?>

    <!-- Content -->
    <div class="resource__content">
        <?php echo lively_record_tags($item, '', $excludeTag); ?>
        <!-- Metadata -->
        <div class="resource__meta <?php echo ($isGrid) ? '' : 'media-object-section'; ?>">
            <h3 class="resource__heading"><?php echo link_to($item, 'show', $title); ?></h3>
            <?php if ($description) : ?>
                <div class="description <?php echo $truncateDesc; ?>"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
