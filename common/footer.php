<?php
$contactInfo = array(
    'position' => get_theme_option('contact_info_position'),
    'location' => get_theme_option('contact_info_location') ?? '',
    'phone'    => get_theme_option('contact_info_phone') ?? '',
    'email'    => get_theme_option('contact_info_email') ?? ''
);

$classes = array('main-footer');
$hasContactInfo = false;

if (is_array($contactInfo['position'])
    && in_array('footer', $contactInfo['position'])
    && ($contactInfo['location'] || $contactInfo['phone'] || $contactInfo['email'])) {

    $hasContactInfo = true;
    $classes[] = 'has-contact-info';
}
?>

    </div><!-- end content -->

    <footer class="<?php echo implode(' ', $classes); ?>">
        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

        <?php
            if ($hasContactInfo) {
                echo $this->partial('common/footer/footer-contact-info.php', array('contactInfo' => $contactInfo));
            }
        ?>
        <?php echo $this->partial('common/footer/footer-top.php'); ?>
        <?php echo $this->partial('common/footer/footer-bottom.php'); ?>

    </footer>

    <script>
        jQuery(document).ready(function(){
            Omeka.skipNav();
        });
    </script>

</body>
</html>
