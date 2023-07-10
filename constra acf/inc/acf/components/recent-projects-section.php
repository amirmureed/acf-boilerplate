<?php
$class = get_sub_field('class_custom_css_class') ? : '';
$id    = get_sub_field('class_custom_css_id') ? : '';

$title           = get_sub_field('recent_projects_section_section_title');
$subTitle        = get_sub_field('recent_projects_section_section_sub_title');
$allProjectsLink = get_sub_field('recent_projects_section_projects_page_link');

?>

<section id="project-area" class="project-area solid-bg <?php echo $class; ?>">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h2 class="section-title"><?php echo $title; ?></h2>
        <h3 class="section-sub-title"><?php echo $subTitle; ?></h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-12">
        <div class="shuffle-btn-group">
          <label class="active" for="all">
            <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Show All
          </label>
          <?php 
          $categories = get_categories(array(
              'type'         => 'projects',
              'hide_empty'   => true,
          ));

          foreach ($categories as $category) { ?>
            <label for="<?php echo $category->name; ?>">
              <input type="radio" name="shuffle-filter" id="<?php echo $category->name; ?>" value="<?php echo $category->name; ?>"><?php echo $category->name; ?>
            </label>
          <?php } ?>
        </div><!-- project filter end -->

        <?php
          $args = array(
            'post_type' => 'projects',
            'posts_per_page' => 6,
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) {
        ?>
        <div class="row shuffle-wrapper">
          <div class="col-1 shuffle-sizer"></div>

          <?php
            while ($query->have_posts()) {
                $query->the_post();

                // Get the categories for this post
                $categories = get_the_category();
          ?>
          <div class="col-lg-4 col-md-6 shuffle-item" data-groups='[<?php
              $categories = get_the_category();
              $category_names = array();
              foreach ($categories as $category) {
                  $category_names[] = '"' . $category->slug . '"';
              }
              echo implode(',', $category_names);
            ?>]'>

              <div class="project-img-container">
                <a class="gallery-popup" href="<?php echo get_the_post_thumbnail_url(); ?>" aria-label="project-img">
                  <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </h3>
                    <p class="project-cat"><?php
                        $categories = get_the_category();
                        $category_names = array();
                        foreach ($categories as $category) {
                            $category_names[] = $category->name;
                        }
                        echo implode(', ', $category_names); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 1 end -->
            <?php } ?>
            <?php wp_reset_postdata(); } ?>
        </div><!-- shuffle end -->
      </div>

      <?php if($allProjectsLink){ ?>
        <div class="col-12">
          <div class="general-btn text-center">
            <a class="btn btn-primary" href="<?php echo $allProjectsLink['url']; ?>"><?php echo $allProjectsLink['title'] ?></a>
          </div>
        </div>
      <?php } ?>

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Project area end -->