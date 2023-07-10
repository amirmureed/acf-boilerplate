<?php
    $class       = get_sub_field('class_custom_css_class') ? : '';
    $id          = get_sub_field('class_custom_css_id') ? : '';
    $postsNumber = get_sub_field('how_many_posts_you_want_to_show');
    if($postsNumber){
        $postCount = $postsNumber;
    }else{
        $postCount = -1;
    }

$args = array(
    'post_type' => 'services',
    'posts_per_page' => $postCount
);

$services_query = new WP_Query( $args );

if ( $services_query->have_posts() ) { ?>
<section id="main-container" class="main-container pb-2 <?php echo $class; ?>">
  <div class="container">
    <div class="row">
        <?php 
            while ( $services_query->have_posts() ) { $services_query->the_post(); ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <?php if(get_the_post_thumbnail_url()){ ?>
                            <div class="ts-service-image-wrapper">
                                <img loading="lazy" class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="service-image">
                            </div>
                        <?php } ?>
                        <div class="d-flex">
                            <?php
                                $service_icon = get_field('services_post_type_service_icon');
                            ?>
                            <?php if($service_icon){ ?>
                                <div class="ts-service-box-img">
                                    <img loading="lazy" src="<?php echo $service_icon ?>" alt="service-icon">
                                </div>
                            <?php } ?>
                            <div class="ts-service-info">
                                <h3 class="service-box-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p> <?php echo wp_trim_words(get_the_content(), 18, ''); ?> </p>
                                <a class="learn-more d-inline-block" href="<?php the_permalink(); ?>" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                            </div>
                        </div>
                    </div><!-- Service1 end -->
                </div><!-- Col 1 end -->
        <?php } ?>
    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<?php wp_reset_postdata();
} ?>