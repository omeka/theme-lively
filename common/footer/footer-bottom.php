<?php
$hasFooterBottomLinks = false;
if ( get_theme_option( 'footer_bottom_terms_link' ) || get_theme_option( 'footer_bottom_privacy_link' )) {
	$hasFooterBottomLinks = true;
}
?>

<div class="main-footer__bottom">
    <div class="main-footer__bottom-container container <?php echo $hasFooterBottomLinks ? 'has-links' : ''; ?>">

        <!-- Copyright -->
        <div class="main-footer__copyright">
            <?php if ( $copyright = get_theme_option( 'footer_bottom_copyright' ) ) : ?>
                <?php echo $copyright; ?>
            <?php else: ?>
                <?php echo $this->translate( 'Powered by Omeka S' ); ?>
            <?php endif; ?>
        </div>

        <!-- Footer Bottom Links -->
        <div class="main-footer__links">
            <?php if ( $terms_link = get_theme_option( 'footer_bottom_terms_link' ) ) : ?>
                <?php
                    $terms_title = get_theme_option( 'footer_bottom_terms_title' );
                    if ( !$terms_title ) {
                        $terms_title = $terms_link;
                    }
                ?>
                <a target="_blank" href="<?php echo $terms_link; ?>"><?php echo $terms_title; ?></a>
            <?php endif; ?>

            <?php if ( $privacy_link = get_theme_option( 'footer_bottom_privacy_link' ) ) : ?>
                <?php
                    $privacy_title = get_theme_option( 'footer_bottom_privacy_title' );
                    if ( !$privacy_title ) {
                        $privacy_title = $privacy_link;
                    }
                ?>
                <a target="_blank" href="<?php echo $privacy_link; ?>"><?php echo $privacy_title; ?></a>
            <?php endif; ?>
        </div>

    </div>
</div>
