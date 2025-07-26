<header class="main-header">
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

    <?php echo $this->partial('common/partials/top-header.php'); ?>

    <div class="main-header__main-bar container">
        <div class="main-header__site-title">
            <?php if (get_theme_option('Logo')) : ?>
                <?php $site_logo = theme_logo(); ?>
            <?php else : ?>
                <?php $site_logo = option('site_title'); ?>
            <?php endif; ?>
            <?php echo link_to_home_page($site_logo); ?>
        </div>

        <nav class="main-navigation">
            <div class="main-navigation__container">
                <?php echo public_nav_main(); ?>
            </div>
            <div class="main-navigation__toggle"
                tabindex="0"
                role="button"
                aria-expanded="false"
                aria-controls="menu-drawer"
                aria-labelledby="menu-backer">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

        <?php echo $this->partial('common/partials/menu-drawer.php'); ?>

        <?php echo $this->partial('common/partials/main-header-search.php'); ?>

    </div>

</header>
