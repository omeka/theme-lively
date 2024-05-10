<?php
/**
 * Homepage template.
 */

queue_js_file(array('masonry.pkgd.min', 'browse'));
queue_js_file(array('imagesloaded.pkgd.min', 'browse'));

$homepage_text = get_theme_option('homepage_text') ?? '';
?>

<?php echo head(array('bodyid' => 'home')); ?>

<?php if ($homepage_text) : ?>
    <section id="intro">
        <?php echo $homepage_text;  ?>
    </section>
<?php endif; ?>

<?php echo $this->partial('home/featured-records.php'); ?>
<?php echo $this->partial('home/recent-records.php'); ?>
<?php echo $this->partial('home/tagcloud.php'); ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>
    
<?php echo foot(); ?>
