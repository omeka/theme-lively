 <div class="footer-contact-info container">
    <div class="footer-contact-info__content">
        <?php if ($contactInfo['location']) : ?>
            <div class="contact_info contact_info_location">
                <?php echo html_escape($contactInfo['location']); ?>
            </div>
        <?php endif; ?>
        <?php if ($contactInfo['phone']) : ?>
            <div class="contact_info contact_info_phone">
                <a href="tel:<?php echo html_escape($contactInfo['phone']); ?>">
                    <?php echo html_escape($contactInfo['phone']); ?>
                </a>
            </div>
        <?php endif; ?>
        <?php if ($contactInfo['email']) : ?>
            <div class="contact_info contact_info_email">
                <a target="_blank" href="mailto:<?php echo html_escape($contactInfo['email']); ?>">
                    <?php echo html_escape($contactInfo['email']); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
