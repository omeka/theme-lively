<?php
/**
 * Banner template part.
 */

$bannerImage              = lively_asset_uri('banner');
$bannerHeading            = get_theme_option('banner_heading');
$bannerDescription        = get_theme_option('banner_description');
$bannerButtonLabel        = get_theme_option('banner_button_label');
$bannerButtonLink         = get_theme_option('banner_button_link');
$bannerContentPosition    = get_theme_option('banner_content_position') ?? 'right';
$bannerVerticalPosition   = get_theme_option('banner_v_position') ?? 'center';
$bannerHorizontalPosition = get_theme_option('banner_h_position') ?? 'center';
$decoration               = get_theme_option('image_decoration');


$class = ['main-banner'];
$hasText = false;
if ($bannerHeading || $bannerDescription || $bannerButtonLink) {
    $class[] = 'has-text';
    $hasText = true;
}

$bannerHeightProperty = $hasText ? 'min-height' : 'height';

$bannerInlineStyles = "{$bannerHeightProperty}: 20vh;";
$imageInlineStyles = "object-position: {$bannerHorizontalPosition} {$bannerVerticalPosition};";
?>

<?php if ($bannerImage || $hasText) : ?>
    <div class="<?php echo implode(' ', $class); ?>" style="<?php echo $bannerInlineStyles; ?>">
        <div class="container main-banner__container main-banner__container--<?php echo $bannerContentPosition; ?>">
            <?php if ( $bannerImage ) : ?>
                <div class="main-banner__image-wrapper">
                    <div class="height-controller"></div>
                    <img
                        src="<?php echo $bannerImage; ?>"
                        role="presentation"
                        aria-hidden="true"
                        style="<?php echo $imageInlineStyles; ?>"
                    />
                </div>
                <?php if ($decoration) : ?>
                    <div class="main-banner__image-shape">
                        <?php echo lively_get_svg('banner-shape'); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="main-banner__content">
                <?php if($bannerHeading) : ?>
                    <h2 class="main-banner__heading"><?php echo html_escape($bannerHeading); ?></h2>
                <?php endif; ?>
                <?php if($bannerDescription) : ?>
                    <p class="main-banner__description"><?php echo html_escape($bannerDescription); ?></p>
                <?php endif; ?>
                <?php if($bannerButtonLink) : ?>
                    <a class="button" target="_blank" href="<?php echo $bannerButtonLink; ?>"><?php echo $bannerButtonLabel; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
