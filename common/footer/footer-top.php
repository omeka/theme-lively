<?php
$footerLogo      	= get_theme_option( 'footer_logo' );
$footerSiteInfo  	= get_theme_option( 'footer_site_info' );
$footerMenu      	= get_theme_option( 'footer_menu' );
$footerMenuTitle 	= get_theme_option('footer_menu_title');
$footerContentTitle = get_theme_option('footer_content_title');
$footerContent   	= get_theme_option( 'footer_content' );
$socialNetworks  	= array( 'facebook', 'twitter', 'linkedin', 'instagram', 'youtube', 'mastodon' );

$additional_classes = '';

if ( ! $footerMenu ) {
	$additional_classes .= ' no-menu';
} elseif ( ! $footerLogo && ! $footerSiteInfo && ! $footerContent ) {
	$additional_classes .= ' menu-only';
}

if ( $footerMenu && ( $footerLogo || $footerSiteInfo ) && $footerContent ) {
	$additional_classes .= ' all-columns';
}

$hasFooterTopColumns = false;
if ( $footerLogo || $footerSiteInfo || $footerMenu || $footerContent ) {
	$hasFooterTopColumns = true;
}

$hasSocialNetworks = false;
foreach ( $socialNetworks as $social_network ) {
	if ( get_theme_option( "{$social_network}_url" ) ) {
		$hasSocialNetworks = true;
		break;
	}
}
?>

<div class="main-footer__top">
    <?php if ( $hasFooterTopColumns ) : ?>
        <div class="main-footer__top-container container <?php echo $additional_classes; ?>">

            <!-- Column 1 -->
            <?php if ( $footerLogo || $footerSiteInfo ) : ?>

                <div class="main-footer__col1">
                    <?php if ( $footerLogo ): ?>
                        <img
                            src="<?php echo lively_asset_uri('footer_logo'); ?>"
                            alt="<?php echo html_escape(option('site_title')); ?>"
                            style="<?php echo $footerSiteInfo ? 'margin-bottom: 30px;' : ''; ?>" />
                    <?php endif; ?>

                    <div class="footer_site_info">
                        <?php if ( $footerSiteInfo ) : ?>
                            <?php echo $footerSiteInfo; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
            <?php endif; ?>

            <!-- Column 2 -->
            <?php if ( $footerMenu ) : ?>
            
                <div class="main-footer__col2">
                    <?php if ( $footerMenuTitle ) : ?>
                        <h2 class="main-footer__heading"><?php echo $footerMenuTitle; ?></h2>
                    <?php endif; ?>

                    <?php echo public_nav_main(); ?>
                </div>

            <?php endif; ?>

            <!-- Column 3 -->
            <?php if ( $footerContent ) : ?>

                <div class="main-footer__col3">
                    <?php if ( $footerContentTitle ) : ?>
                        <h2 class="main-footer__heading"><?php echo $footerContentTitle; ?></h2>
                    <?php endif; ?>

                    <?php if ( $footerContent ) : ?>
                        <?php echo $footerContent; ?>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

        </div>
    <?php endif; ?>

    <!-- Social Networks -->
    <?php if ($hasSocialNetworks) : ?>
        <div class="main-footer__social-network container">
            <?php foreach ( $socialNetworks as $social_network ) : ?>
                <?php if ( $social_network_url = get_theme_option( "{$social_network}_url" ) ) : ?>
                    <a href="<?php echo $social_network_url; ?>">
                        <img src="<?php echo img("{$social_network}.svg"); ?>"
                             alt="<?php echo html_escape($social_network); ?>">
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
