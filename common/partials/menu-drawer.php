<nav id="menu-drawer" class="menu-drawer" style="display: none;" aria-label="<?php echo __('Mobile navigation'); ?>">
    <div class="wrap">

        <div class="navigation-controls">
            <a href="."
                id="menu-backer"
                class="menu-backer is-empty"
                aria-label="<?php $this->translate( 'Close Menu' ); ?>"
                title="<?php $this->translate('Close Menu'); ?>"
            >
                <?php $this->translate('Close Menu'); ?>
            </a>
        </div><!-- .navigation-controls -->

        <div id="menu-clones" class="menu-container">

            <?php
            // menus placed here via Javascript (see: javascripts/navigation.js)
            ?>

        </div><!-- .menu-container -->

    </div><!-- .wrap -->
</nav><!-- menu-drawer -->
