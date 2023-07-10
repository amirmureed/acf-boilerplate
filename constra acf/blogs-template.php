<?php

/**
 * Template Name: Blogs Page
 */

    get_header();
?>

<?php

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 1,
    'paged'          => $paged
);

$loop = new WP_Query( $args );

?>

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <?php if ( $loop->have_posts() ) { ?>
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <?php while ( $loop->have_posts() ) { $loop->the_post(); ?>
                        <div class="post">
                            <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                                <div class="post-media post-image">
                                    <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="post-image">
                                </div>
                            <?php } ?>
                            <div class="post-body">
                                <div class="entry-header">
                                <div class="post-meta">
                                    <?php $author_id = get_the_author_meta( 'ID' );  ?>
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a href="<?php echo get_author_posts_url($author_id); ?>"> <?php the_author(); ?></a>
                                    </span>
                                    <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            $first_category = $categories[0];
                                            ?>
                                            <span class="post-cat">
                                                <i class="far fa-folder-open"></i><a href="<?php echo esc_url( get_category_link( $first_category->term_id ) ); ?>"> <?php echo $first_category->name; ?></a>
                                            </span>
                                        <?php } ?>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i> <?php the_date(); ?></span>
                                    <span class="post-comment"><i class="far fa-comment"></i> <?php comments_number(); ?>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                </div><!-- header end -->

                                <div class="entry-content">
                                    <p><?php the_excerpt(); ?> ...</p>
                                </div>

                                <div class="post-footer">
                                <a href=" <?php the_permalink(); ?> " class="btn btn-primary">Continue Reading</a>
                                </div>
                            </div><!-- post-body end -->
                        </div><!-- 1st post end -->
                    <?php
                        wp_reset_postdata();
                        } ?>
                    <nav class="paging" aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php if($loop->max_num_pages > 1){
                                kriesi_pagination( $loop->max_num_pages );
                            }
                            ?>
                        </ul>
                    </nav>
                </div><!-- Content Col end -->
            <?php } ?>

                <div class="col-lg-4">
                    <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Posts</h3>                  
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3
                            );

                            $recentPostsLoop = new WP_Query( $args );
                        ?>
                        <ul class="list-unstyled">
                            <?php while ( $recentPostsLoop->have_posts() ) { $recentPostsLoop->the_post(); ?>
                                <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                        <a href="#"><img loading="lazy" alt="img" src="<?php the_post_thumbnail_url(); ?>"></a>
                                        </div>
                                        <div class="post-info">
                                        <h4 class="entry-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        </div>
                                </li><!-- 1st post end-->
                            <?php } ?>
                        </ul>
                    </div><!-- Recent post end -->
                    <?php 
                        $categories = get_categories( array(
                            'hide_empty' => false
                        ) );
                    ?>
                    <?php if($categories) { ?>
                        <div class="widget">
                            <h3 class="widget-title">Categories</h3>
                            <ul class="arrow nav nav-tabs">
                                <?php $count = 1; ?>
                                <?php foreach ( $categories as $category ) { ?>
                                    <?php if($count < 6){ ?>
                                        <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></li>
                                    <?php }
                                    $count = $count+1;
                                    ?>
                                <?php } ?>
                            </ul>
                        </div><!-- Categories end -->
                    <?php } ?>

                    <?php 
                        $args = array(
                            'type' => 'monthly',
                            'limit' => 6,
                            'echo' => 0
                        );

                    $archives = wp_get_archives( $args );
                    
                    if($archives) {
                        $archives = preg_replace('/<\/a>&nbsp;\((\d+)\)/','</a>',$archives);
                    
                    ?>
                        <div class="widget">
                            <h3 class="widget-title">Archives </h3>
                                <ul class="arrow nav nav-tabs">
                                    <?php
                                        echo strip_tags( $archives, '<a><li>' );
                                    ?>
                                </ul>
                        </div><!-- Archives end -->
                    <?php } ?>
                    <?php
                        $tags = get_tags();
                        if ($tags) { ?>
                            <div class="widget widget-tags">
                                <h3 class="widget-title">Tags </h3>
                                <ul class="list-unstyled">
                                    <?php foreach($tags as $tag){ ?>
                                        <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div><!-- Tags end -->
                    <?php } ?>
                    </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->
        </div><!-- Main row end -->
    </div><!-- Container end -->
</section><!-- Main container end -->

<?php
    get_footer();
?>