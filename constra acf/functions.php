<?php

// Theme Support
add_theme_support('woocommerce');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'author' );

// Enqueue Stylesheets and Scripts
include('inc/enqueue.php');
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

// Include ACF JSON and Components
include('inc/acf/acf.php');
include('inc/acf/lib-page-components.php');

// Add defer attribute to some scripts
function add_defer_attribute( $tag, $handle, $src ) {
    if ( 'shuffle' === $handle || 'map-plugin' === $handle || 'map-api' === $handle  || 'bootstrap-jquery' === $handle) {
        $tag = str_replace( ' src', ' defer src', $tag );
    }
    return $tag;
}

add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 3 );


// Enqueue Customizer File

include('inc/customizer.php');
add_action( 'customize_register', 'header_customize_options' );
add_action( 'customize_register', 'footer_customize_options' );


// Menu Registration

function register_my_menu() {
    register_nav_menu('header', 'Header Menu' );
    register_nav_menu('mainfooter', 'Main Footer Menu' );
    register_nav_menu('footer', 'Copyright Section Menu' );
}

add_action( 'after_setup_theme', 'register_my_menu' );


function form_sortcode_function() {
    ob_start();  ?>
    <form id="contact-form" action="#" method="post" role="form">
        <div class="error-container"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label>Name</label>
                <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label>Email</label>
                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                    required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label>Subject</label>
                <input class="form-control form-control-subject" name="subject" id="subject" placeholder="" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10"
                required></textarea>
        </div>
        <div class="text-right"><br>
            <button class="btn btn-primary solid blank" type="submit">Send Message</button>
        </div>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'contact_form', 'form_sortcode_function' );


// WP Pagination

function kriesi_pagination($pages = '', $range = 2)
{  
    $showitems = ($range * 2)+1;  

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }   

    if(1 != $pages)
    {
        echo "<ul class='pagination'>";
        // Add previous icon
        echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($paged - 1)."' aria-label='Previous'><i class='fas fa-angle-double-left'></i></a></li>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link(1)."'>&laquo;</a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='page-item activepagination'><a href='".get_pagenum_link($i)."' class='page-link' >".$i."</a></li>":"<li class='page-item'><a href='".get_pagenum_link($i)."' class='page-link' >".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
        // Add next icon
        if ($paged == $pages) {
            echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($paged)."' aria-label='Next'><i class='fas fa-angle-double-right'></i></a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($paged + 1)."' aria-label='Next'><i class='fas fa-angle-double-right'></i></a></li>";
        }
        echo "</ul>\n";
    }
}


// Breadcrumbs Function

function wp_breadcrumbs() {
    $delimiter = "&nbsp; / &nbsp;";
    $home = 'Home';
    $showCurrent = 1;
    $before = '<span class="current">';
    $after = '</span>';

    global $post;
    $homeLink = get_bloginfo('url');

    if (is_home() || is_front_page()) {

        if ($showCurrent == 1) echo '<li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a></li>';

    } else {

        echo '<li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . ' ';

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, $delimiter);
            echo $before . single_cat_title('', false) . $after;
        } elseif ( is_search() ) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;

        } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter;
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, $delimiter);
                echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, $delimiter);
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter;
            echo $before . get_the_title() . $after;
        }

        if ( get_query_var('paged') ) {
            echo ' (' . __('Page', 'text-domain') . ' ' . get_query_var('paged') . ')';
        }elseif ( is_page() && !$post->post_parent ) {
        echo $before . get_the_title() . $after;
        }elseif ( is_page() && $post->post_parent ) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_post($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) echo $crumb . $delimiter;
        echo $before . get_the_title() . $after;
        }elseif ( is_tag() ) {
        echo $before . __('Posts tagged', 'text-domain') . ' "' . single_tag_title('', false) . '"' . $after;
        }elseif ( is_author() ) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . __('Articles posted by', 'text-domain') . ' ' . $userdata->display_name . $after;
        }elseif ( is_404() ) {
        echo $before . '404' . $after;
        }

        if ( get_query_var('paged') ) {
            echo ' (' . __('Page', 'text-domain') . ' ' . get_query_var('paged') . ')';
        }

        echo '</li>';
    }
}



// Get Nav Menu Items Function

function wp_get_menu_array($current_menu) {
    $menu_name = $current_menu;
    $locations = get_nav_menu_locations();
    $menuObj = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $array_menu = wp_get_nav_menu_items( $menuObj->term_id, array( 'order' => 'DESC' ) );
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']          =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']      =   $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
}


// Add custom fields on WP admin Panel

// Add custom meta boxes to post editor screen
function add_custom_meta_boxes() {
    // Add banner title meta box
    add_meta_box(
        'banner_title_meta_box',
        'Banner Title',
        'display_banner_title_meta_box',
        'post',
        'normal',
        'default'
    );

    // Add banner image meta box
    add_meta_box(
        'banner_image_meta_box',
        'Banner Image',
        'display_banner_image_meta_box',
        'post',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');

// Display banner title meta box
function display_banner_title_meta_box($post) {
    $banner_title = get_post_meta($post->ID, '_banner_title', true);
    ?>
    <label for="banner_title">Banner Title:</label>
    <input type="text" id="banner_title" name="banner_title" value="<?php echo esc_attr($banner_title); ?>">
    <?php
}

// Display banner image meta box
function display_banner_image_meta_box($post) {
    $banner_image = get_post_meta($post->ID, '_banner_image', true);
    ?>
    <label for="banner_image">Banner Image:</label>
    <input type="text" id="banner_image" name="banner_image" value="<?php echo esc_attr($banner_image); ?>">
    <button class="upload-banner-image button">Upload Image</button>
    <div class="banner-image-preview">
        <?php if (!empty($banner_image)) : ?>
            <img src="<?php echo esc_url($banner_image); ?>" alt="Banner Image Preview">
        <?php endif; ?>
    </div>
    <?php
}

// Save custom meta box data when post is saved
function save_custom_meta_box_data($post_id) {
    // Check if the banner_title field is present in the $_POST array.
    if (array_key_exists('banner_title', $_POST)) {
        update_post_meta(
            $post_id,
            '_banner_title',
            sanitize_text_field($_POST['banner_title'])
        );
    }

    // Check if the banner_image field is present in the $_POST array.
    if (array_key_exists('banner_image', $_POST)) {
        update_post_meta(
            $post_id,
            '_banner_image',
            sanitize_text_field($_POST['banner_image'])
        );
    }
}
add_action('save_post', 'save_custom_meta_box_data');

// Enqueue necessary scripts and styles for the meta boxes
function enqueue_custom_meta_box_scripts() {
    // Enqueue script for media uploader
    wp_enqueue_media();
    // Enqueue custom JS script to handle banner image uploading
    wp_enqueue_script('banner-image-uploader', get_template_directory_uri() . '/js/banner-image-uploader.js', array('jquery'), null, true);
    // Enqueue custom CSS for the meta boxes
    wp_enqueue_style('custom-meta-box-styles', get_template_directory_uri() . '/css/meta-box-styles.css');
}
add_action('admin_enqueue_scripts', 'enqueue_custom_meta_box_scripts');
