<?php
/**
 * Featured Records template part.
 */

$homepage_featured_title = get_theme_option('homepage_featured_title') ?? 'Featured Content';
$featured_record_types[0] = (get_theme_option('homepage_main_featured')) ?? 'item';
$featured_record_types[1] = (get_theme_option('homepage_second_featured')) ?? 'item';
$featured_record_types[2] = (get_theme_option('homepage_third_featured')) ?? 'item';

$total_records['item'] = 0;
$total_records['collection'] = 0;
$total_records['exhibit'] = 0;

foreach ($featured_record_types as $featured_record_type) {
    if ($featured_record_type === 'exhibit' && !plugin_is_active('ExhibitBuilder')) {
        continue;
    }
    $total_records[$featured_record_type]++;
}

foreach ($total_records as $key => $value ) {
    if ($value) {
        $record_ids[$key] = lively_random_featured_record_ids($key, $value);
    } else {
        $record_ids[$key] = array();
    }
}

$featured_records = false;

foreach ($featured_record_types as $featured_record_type) {
    if ($record_ids[$featured_record_type]) {
        $featured_records = true;
        break;
    }
}
?>

<?php if ($featured_records) : ?>

    <section class="featured-section">

        <?php if ($homepage_featured_title) : ?>
            <h2 class="title"><?php echo $homepage_featured_title; ?></h2>
        <?php endif; ?>

        <div class="featured-records">
            <?php if ($record_ids[$featured_record_types[0]]) : ?>
                <!-- Featured Records - Primary -->
                <div class="featured featured--primary">
                    <?php echo lively_featured_record_html($featured_record_types[0], $record_ids[$featured_record_types[0]][0], true); ?>
                    <?php array_shift($record_ids[$featured_record_types[0]]); ?>
                </div>
            <?php endif; ?>

            <!-- Featured Records - Secondary -->
            <div class="featured featured--secondary">

                <?php if ($record_ids[$featured_record_types[1]]) : ?>
                    <!-- Featured Record -->
                    <?php echo lively_featured_record_html($featured_record_types[1], $record_ids[$featured_record_types[1]][0]); ?>
                    <?php array_shift($record_ids[$featured_record_types[1]]); ?>
                <?php endif; ?>

                <?php if ($record_ids[$featured_record_types[2]]) : ?>
                    <!-- Featured Record -->
                    <?php echo lively_featured_record_html($featured_record_types[2], $record_ids[$featured_record_types[2]][0]); ?>
                <?php endif; ?>

            </div>
        </div>

    </section>

<?php endif; ?>