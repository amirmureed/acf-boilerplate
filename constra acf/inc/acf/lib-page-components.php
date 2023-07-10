<?php

function constra_components( $post_id = 0 ){	
	if( $post_id > 0 ){
		if( get_field( "flexible_content", $post_id ) ){
			$section_count = 0;
			while( has_sub_field( "flexible_content", $post_id) ){
				$section_count++;

				$section_layout =  get_row_layout();

				if($section_layout == "ct_page_component_banner_slider"){
				    // *********************************** BANNER COMPONENT ***************************************
					__( get_template_part( "inc/acf/components/banner-slider" ) , "constratheme");
				}else if($section_layout == 'call_to_action_box'){
					__( get_template_part( "inc/acf/components/call-to-action-box" ) , "constratheme");
				}else if($section_layout == 'about_us_section'){
					__( get_template_part( "inc/acf/components/about-us-section" ) , "constratheme");
				}else if($section_layout == 'stats_counter_section'){
					__( get_template_part( "inc/acf/components/stats-counter-section" ) , "constratheme");
				}else if($section_layout == 'what_we_do_section'){
					__( get_template_part( "inc/acf/components/what-we-do-section" ) , "constratheme");
				}else if($section_layout == 'recent_projects_section'){
					__( get_template_part( "inc/acf/components/recent-projects-section" ) , "constratheme");
				}else if($section_layout == 'testimonials_and_happy_clients'){
					__( get_template_part( "inc/acf/components/testimonials-and-happy-clients" ) , "constratheme");
				}else if($section_layout == 'newsletter_section'){
					__( get_template_part( "inc/acf/components/newsletter-section" ) , "constratheme");
				}else if($section_layout == 'latest_posts_section'){
					__( get_template_part( "inc/acf/components/latest-posts-section" ) , "constratheme");
				}else if($section_layout == 'general_banner'){
					__( get_template_part( "inc/acf/components/general-banner" ) , "constratheme");
				}else if($section_layout == 'carousel_with_content'){
					__( get_template_part( "inc/acf/components/carousel-with-content" ) , "constratheme");
				}else if($section_layout == 'our_team_section'){
					__( get_template_part( "inc/acf/components/our-team-section" ) , "constratheme");
				}else if($section_layout == 'simple_testimonials'){
					__( get_template_part( "inc/acf/components/simple-testimonials" ) , "constratheme");
				}else if($section_layout == 'faq_section'){
					__( get_template_part( "inc/acf/components/faq-section" ) , "constratheme");
				}else if($section_layout == 'pricing_section'){
					__( get_template_part( "inc/acf/components/pricing-section" ) , "constratheme");
				}else if($section_layout == 'service_post_type_all'){
					__( get_template_part( "inc/acf/components/service-post-type-all" ) , "constratheme");
				}else if($section_layout == 'contact_us_section'){
					__( get_template_part( "inc/acf/components/contact-us-section" ) , "constratheme");
				}else if($section_layout == 'all_blogs_section'){
					__( get_template_part( "inc/acf/components/all-blogs-section" ) , "constratheme");
				}
			} //end-while 
		} //end-if	
	}// end-if
}