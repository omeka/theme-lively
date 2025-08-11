<?php
$closeText = $this->translate('Close');
$previousText = $this->translate('Previous');
?>
<nav id="menu-drawer" class="menu-drawer" aria-hidden="true" inert style="display: none;">
    <div class="wrap">

        <div class="navigation-controls">
            <a href="."
                id="menu-backer"
                class="menu-backer is-empty"
                aria-hidden="true"
                tabindex="-1"
                title="<?php echo $closeText; ?>"
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

<script>
    const closeText = <?php echo json_encode($closeText); ?>;
    const previousText = <?php echo json_encode($previousText); ?>;
</script>
