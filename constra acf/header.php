<html lang="en">
<head>

  <!-- Title Dynamic
================================================== -->
  <meta charset="utf-8">
  <title>
    <?php
      $site_description = get_bloginfo( 'description', 'display' );
      $site_name = get_bloginfo( 'name' );
      if ( $site_description && ( is_home() || is_front_page() ) ):
        echo $site_name;echo ' | '; echo  $site_description; 
      endif;
      if (!( is_home() ) && ! is_404() ):
        the_title(); echo ' | '; echo $site_name;
      endif;
    ?>
  </title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">

  <?php wp_head(); ?>
</head>
<body>
  <div class="body-inner">
    <?php
    $show_top_bar = get_theme_mod('topbar_visibility', 'show');
    if($show_top_bar == 'show') { ?>
      <div id="top-bar" class="top-bar">
          <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                  <?php
                    $top_bar_location = get_theme_mod('top_bar_location', '9051 Applicon Soft, Incorporate, USA');
                  ?>
                  <ul class="top-info text-center text-md-left">
                      <li><i class="fas fa-map-marker-alt"></i> <p class="info-text"><?php echo $top_bar_location; ?></p>
                      </li>
                  </ul>
                </div>
                <!--/ Top info end -->
                    <?php
                      $facebook_link  = get_theme_mod( 'top_bar_facebook_link', 'https://www.facebook.com/Applicontech' );
                      $twitter_link   = get_theme_mod( 'top_bar_twitter_link', 'https://www.instagram.com/applicontech/' );
                      $instagram_link = get_theme_mod( 'top_bar_instagram_link', 'https://www.linkedin.com/company/applicontech' );
                      $github_link    = get_theme_mod( 'top_bar_github_link', 'https://www.linkedin.com/company/applicontech' );
                    ?>    
                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                      <ul class="list-unstyled">
                          <li>
                            <?php if($facebook_link) { ?>
                              <a title="Facebook" href="<?php echo $facebook_link; ?>">
                                  <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                              </a>
                            <?php } ?>
                            <?php if($twitter_link) { ?>
                              <a title="Twitter" href="<?php echo $twitter_link; ?>">
                                  <span class="social-icon"><i class="fab fa-twitter"></i></span>
                              </a>
                            <?php } ?>
                            <?php if($instagram_link) { ?>
                              <a title="Instagram" href="<?php echo $instagram_link; ?>">
                                  <span class="social-icon"><i class="fab fa-instagram"></i></span>
                              </a>
                            <?php } ?>
                            <?php if($github_link){ ?>
                              <a title="Github" href="<?php echo $github_link; ?>">
                                  <span class="social-icon"><i class="fab fa-github"></i></span>
                              </a>
                            <?php } ?>
                          </li>
                      </ul>
                    </div>
                <!--/ Top social end -->
            </div>
            <!--/ Content row end -->
          </div>
          <!--/ Container end -->
      </div>
    <?php } ?>
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
              <?php
                $logo = get_theme_mod( 'custom_header_logo' );
                if ( $logo ) {
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="' . esc_url( $logo ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"></a>';
                } else {
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
                }
              ?>
            </div><!-- logo end -->
  
            <?php
              $mobile             = get_theme_mod( 'header_mobile_number', '+1 564 678 7897' );
              $email              = get_theme_mod( 'header_email', 'contact@applicontech.com' );
              $global_certificate = get_theme_mod( 'header_global_certificate', 'ISO 9001:2017' );
              $button_text        = get_theme_mod( 'header_button_anchor', 'Get A Quote' );
              $button_link        = get_theme_mod( 'header_button_link', 'https://mywebsite.com/get-quote/' );

            ?>
            <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <?php if($mobile) { ?>
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                            <p class="info-box-title">Call Us</p>
                            <p class="info-box-subtitle"> <?php echo $mobile; ?> </p>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                  <?php if($email){ ?>
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                            <p class="info-box-title">Email Us</p>
                            <p class="info-box-subtitle"><?php echo $email; ?></p>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                  <?php if($global_certificate){ ?>
                    <li class="last">
                      <div class="info-box last">
                        <div class="info-box-content">
                            <p class="info-box-title">Global Certificate</p>
                            <p class="info-box-subtitle"><?php echo $global_certificate; ?></p>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                  <?php if($button_link && $button_text) { ?>
                    <li class="header-get-a-quote">
                      <a class="btn btn-primary" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
                    </li>
                  <?php } ?>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php $menu_items = wp_get_menu_array('header'); ?>
                <div id="navbar-collapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav mr-auto">
                    <?php foreach ($menu_items as $item) : ?>
                      <?php if( !empty($item['children']) ){ ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= $item['url'] ?>" title="<?= $item['title'] ?>" data-toggle="dropdown"><?= $item['title'] ?> <i class="fa fa-angle-down"></i> </a>
                      <?php }else{ ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?= $item['url'] ?>" title="<?= $item['title'] ?>"><?= $item['title'] ?></a>
                      <?php } ?>
                        <?php if( !empty($item['children']) ):?>
                        <ul class="dropdown-menu" role="menu">
                          <?php foreach($item['children'] as $child): ?>
                            <li>
                              <a href="<?= $child['url'] ?>" title="<?= $child['title'] ?>"><?= $child['title'] ?></a>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                  <ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="nav-search" style="margin: 0px; padding: 0px;">
          <span id="search"><i class="fa fa-search"></i></span>
        </div><!-- Search end -->

        <div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
              <label>
                <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></span>
                <input type="search" class="form-control" id="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
              </label>
              <button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button' ); ?></button>
            </form>
          </label>
          <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->