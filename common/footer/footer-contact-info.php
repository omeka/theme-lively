 <div class="footer-contact-info container">
    <div class="footer-contact-info__content">
        <?php if ($contactInfo['location']) : ?>
            <div class="contact_info contact_info_location"><?php echo $contactInfo['location']; ?></div>
        <?php endif; ?>
        <?php if ($contactInfo['phone']) : ?>
            <div class="contact_info contact_info_phone"><a href="tel:<?php echo $contactInfo['phone']; ?>"><?php echo $contactInfo['phone']; ?></a></div>
        <?php endif; ?>
        <?php if ($contactInfo['email']) : ?>
            <div class="contact_info contact_info_email"><a target="_blank" href="mailto:<?php echo $contactInfo['email']; ?>"><?php echo $contactInfo['email']; ?></a></div>
        <?php endif; ?>
    </div>
</div>
