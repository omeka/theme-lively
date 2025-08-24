<?php
/**
 * Exhibit Single template part.
 */

$isGrid = $isGrid ?? false;
$excludeTag = $excludeTag ?? '';
$primary = $primary ?? false;
$imageFile = $exhibit->getFile();
$altText = $imageFile->alt_text ?: $exhibit->title;
$exhibitImage = record_image($exhibit, 'fullsize', ['alt' => $altText]);
$description = metadata($exhibit, 'description', array('no_escape' => true));
$truncateDesc = get_theme_option('truncate_body_property') ?? 'ellipsis';
$style = '';

if ($primary) {
    $style = 'background-image: url(' . record_image_url($exhibit, 'fullsize') . ');';
    $truncateDesc = 'full';
}
?>

<div class="exhibit resource <?php echo ($isGrid) ? '' : 'media-object'; ?>" style="<?php echo $style; ?>">
    <!-- Thumbnail -->
    <?php if ($exhibitImage) : ?>
        <div class="resource__thumbnail">
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'thumbnail')); ?>
        </div>
    <?php endif; ?>

    <!-- Content -->
    <div class="resource__content">
        <?php echo lively_record_tags($exhibit, '', $excludeTag); ?>
        <!-- Metadata -->
        <div class="resource__meta <?php echo ($isGrid) ? '' : 'media-object-section'; ?>">
            <h3 class="resource__heading"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h3>
            <?php if ($description) : ?>
                <div class="description <?php echo $truncateDesc; ?>"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
