<?php
get_header();
if ( have_posts() ) { ?>
<section id="main-container" class="main-container pb-2">
  <div class="container">
  <h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
    <div class="row">
        <?php 
            while ( have_posts() ) { the_post(); ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <?php if(get_the_post_thumbnail_url()){ ?>
                            <div class="ts-service-image-wrapper">
                                <img loading="lazy" class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="service-image">
                            </div>
                        <?php } ?>
                        <div class="d-flex">
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
<?php }else{ ?>
<section id="main-container" class="main-container pb-2">
  <div class="container">
  <h1>No results found for '<?php echo get_search_query(); ?>'</h1>
  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<?php } ?>

<?php
get_footer();
?>