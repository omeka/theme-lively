<button class="o-icon-search main-search-button" aria-label="Search"></button>

<div class="main-header-search">
    <?php echo search_form(array('form_attributes' => array('id' => 'search-form', 'role' => 'search'))); ?>

    <?php echo link_to_item_search('Advanced Search', ['class' => 'main-header-search__advanced-search']); ?>
</div>