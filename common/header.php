<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($author = option('author')) : ?>
    <meta name="author" content="<?php echo $author; ?>" />
    <?php endif; ?>
    <?php if ($copyright = option('copyright')) : ?>
    <meta name="copyright" content="<?php echo $copyright; ?>" />
    <?php endif; ?>
    <?php if ($description = option('description')) : ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Header and Banner values -->
    <?php
    $bannerHeading = get_theme_option('banner_heading');
    $bannerDescription = get_theme_option('banner_description');
    $bannerHeightProperty = $bannerHeading || $bannerDescription ? 'min-height' : 'height';
    $primaryColor = get_theme_option('primary_color') ?? '#d62d6a';
    $secondaryColor = get_theme_option('secondary_color') ?? '#4D1068';
    $accentColor = get_theme_option('accent_color') ?? '#0a4f9e';
    $complementaryColor = get_theme_option('complementary_color') ?? '#F0B247';
    ?>

    <!-- Plugin Stuff -->

    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts','style'));
    queue_css_url('//fonts.googleapis.com/css2?family=Sen:wght@400;500;700;800&display=swap');
    
    queue_css_string(
        '
        :root {
            --primary: ' . $primaryColor . ';
            --primary-dark: ' . lively_shade_color($primaryColor, -10) . ';
            --secondary: ' . $secondaryColor . ';
            --secondary-dark: ' . lively_shade_color($secondaryColor, -10) . ';
            --accent: ' . $accentColor . ';
            --complementary: ' . $complementaryColor . ';
        }'


    );
    
    echo head_css();

    echo theme_header_background();
    ?>

    
    <!-- JavaScripts -->
    <?php
    queue_js_file(array('globals', 'navigation', 'script'));

    echo head_js();
    ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    
    <a id="skipnav" href="#main-content"><?php echo __('Skip to main content'); ?></a>

    <?php echo $this->partial('common/partials/main-header.php'); ?>
    <?php echo $this->partial('common/partials/banner.php'); ?>

    <div id="main-content" class="container" role="main">
    <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
