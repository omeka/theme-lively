<?php
    $contactInfoPosition = get_theme_option('contact_info_position');
    $contactInfoPhone = get_theme_option('contact_info_phone') ?? '';
    $contactInfoEmail = get_theme_option('contact_info_email') ?? '';
    $contactInfoLocation = get_theme_option('contact_info_location') ?? '';
?>

<div class="main-header__top-bar">
    <div class="container">
        <?php if (is_array($contactInfoPosition) && in_array('top_header', $contactInfoPosition)) : ?>
            <div class="top-bar__info">
                <?php if ($contactInfoLocation) : ?>
                    <div class="contact_info contact_info_location"><?php echo $contactInfoLocation; ?></div>
                <?php endif; ?>
                <?php if ($contactInfoPhone) : ?>
                    <div class="contact_info contact_info_phone"><a href="tel:<?php echo $contactInfoPhone; ?>"><?php echo $contactInfoPhone; ?></a></div>
                <?php endif; ?>
                <?php if ($contactInfoEmail) : ?>
                    <div class="contact_info contact_info_email"><a target="_blank" href="mailto:<?php echo $contactInfoEmail; ?>"><?php echo $contactInfoEmail; ?></a></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php echo link_to_item_search('Advanced Search', ['class' => 'top-bar__advanced-search']); ?>

    </div>
</div>

