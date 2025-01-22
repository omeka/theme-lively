 <div class="footer-contact-info container">
    <div class="footer-contact-info__content">
        <?php if ($contactInfo['location']) : ?>
            <h5 class="contact_info contact_info_location"><?php echo $contactInfo['location']; ?></h5>
        <?php endif; ?>
        <?php if ($contactInfo['phone']) : ?>
            <h5 class="contact_info contact_info_phone"><a href="tel:<?php echo $contactInfo['phone']; ?>"><?php echo $contactInfo['phone']; ?></a></h5>
        <?php endif; ?>
        <?php if ($contactInfo['email']) : ?>
            <h5 class="contact_info contact_info_email"><a target="_blank" href="mailto:<?php echo $contactInfo['email']; ?>"><?php echo $contactInfo['email']; ?></a></h5>
        <?php endif; ?>
    </div>
</div>
