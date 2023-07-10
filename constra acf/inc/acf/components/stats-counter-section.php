<?php

$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$totalProjectsTitle        = get_sub_field('stats_counter_total_projects_title');
$totalProjectsNumber       = get_sub_field('stats_counter_total_projects_number');
$staffMembersTitle         = get_sub_field('stats_counter_staff_members_title');
$staffMembersNumber        = get_sub_field('stats_counter_staff_members_number');
$hoursOfWorkTitle          = get_sub_field('stats_counter_hours_of_work_title');
$hoursOfWorkNumber         = get_sub_field('stats_counter_hours_of_work_number');
$countriesExperienceTitle  = get_sub_field('stats_counter_countries_experience_title');
$countriesExperienceNumber = get_sub_field('stats_counter_countries_experience_number');

?>

<section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="facts-wrapper">
        <div class="row">
            <?php if($totalProjectsTitle || $totalProjectsNumber) { ?>
            <div class="col-md-3 col-sm-6 ts-facts">
                <div class="ts-facts-img">
                    <img loading="lazy" src="<?php echo get_template_directory_uri() . '/'; ?>images/icon-image/fact1.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                    <h2 class="ts-facts-num"><span class="counterUp" data-count="<?php echo $totalProjectsNumber; ?>">0</span></h2>
                    <h3 class="ts-facts-title"><?php echo $totalProjectsTitle; ?></h3>
                </div>
            </div><!-- Col end -->
            <?php } ?>
            <?php if($staffMembersTitle || $staffMembersNumber){ ?>
            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                <div class="ts-facts-img">
                    <img loading="lazy" src="<?php echo get_template_directory_uri() . '/'; ?>images/icon-image/fact2.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                    <h2 class="ts-facts-num"><span class="counterUp" data-count="<?php echo $staffMembersNumber; ?>">0</span></h2>
                    <h3 class="ts-facts-title"><?php echo $staffMembersTitle; ?></h3>
                </div>
            </div><!-- Col end -->
            <?php } ?>

            <?php if($hoursOfWorkTitle || $hoursOfWorkNumber) { ?>
            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                <div class="ts-facts-img">
                    <img loading="lazy" src="<?php echo get_template_directory_uri() . '/'; ?>images/icon-image/fact3.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                    <h2 class="ts-facts-num"><span class="counterUp" data-count="<?php echo $hoursOfWorkNumber; ?>">0</span></h2>
                    <h3 class="ts-facts-title"><?php echo $hoursOfWorkTitle; ?></h3>
                </div>
            </div><!-- Col end -->
            <?php } ?>
            <?php if($countriesExperienceTitle){ ?>
            <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                <div class="ts-facts-img">
                    <img loading="lazy" src="<?php echo get_template_directory_uri() . '/'; ?>images/icon-image/fact4.png" alt="facts-img">
                </div>
                <div class="ts-facts-content">
                    <h2 class="ts-facts-num"><span class="counterUp" data-count="<?php echo $countriesExperienceNumber; ?>">0</span></h2>
                    <h3 class="ts-facts-title"><?php echo $countriesExperienceTitle; ?></h3>
                </div>
            </div><!-- Col end -->
            <?php } ?>

        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->