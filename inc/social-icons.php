<?php

//----------------------------------------------------------------------------------
// Setup array with all social accounts available for icons in the Customizer
//----------------------------------------------------------------------------------
if (! function_exists('ct_mission_news_social_array')) {
    function ct_mission_news_social_array()
    {
        $social_sites = array(
            'twitter'       => 'ct_mission_news_twitter_profile',
            'facebook'      => 'ct_mission_news_facebook_profile',
            'instagram'     => 'ct_mission_news_instagram_profile',
            'tiktok'      	=> 'ct_mission_news_tiktok_profile',
            'linkedin'      => 'ct_mission_news_linkedin_profile',
            'pinterest'     => 'ct_mission_news_pinterest_profile',
            'youtube'       => 'ct_mission_news_youtube_profile',
            'email'         => 'ct_mission_news_email_profile',
            'phone'         => 'ct_mission_news_phone_profile',
            'email-form'    => 'ct_mission_news_email_form_profile',
            'amazon'        => 'ct_mission_news_amazon_profile',
            'artstation'    => 'ct_mission_news_artstation_profile',
            'bandcamp'      => 'ct_mission_news_bandcamp_profile',
            'behance'       => 'ct_mission_news_behance_profile',
            'bitbucket'     => 'ct_mission_news_bitbucket_profile',
            'codepen'       => 'ct_mission_news_codepen_profile',
            'delicious'     => 'ct_mission_news_delicious_profile',
            'deviantart'    => 'ct_mission_news_deviantart_profile',
            'diaspora'      => 'ct_mission_news_diaspora_profile',
            'digg'          => 'ct_mission_news_digg_profile',
            'discord'       => 'ct_mission_news_discord_profile',
            'dribbble'      => 'ct_mission_news_dribbble_profile',
            'etsy'          => 'ct_mission_news_etsy_profile',
            'flickr'        => 'ct_mission_news_flickr_profile',
            'foursquare'    => 'ct_mission_news_foursquare_profile',
            'github'        => 'ct_mission_news_github_profile',
            'goodreads' 	=> 'ct_mission_news_goodreads_profile',
            'google-wallet' => 'ct_mission_news_google_wallet_profile',
            'hacker-news'   => 'ct_mission_news_hacker-news_profile',
            'imdb'   		=> 'ct_mission_news_imbd_profile',
            'mastodon'      => 'ct_mission_news_mastodon_profile',
            'medium'        => 'ct_mission_news_medium_profile',
            'meetup'        => 'ct_mission_news_meetup_profile',
            'mixcloud'      => 'ct_mission_news_mixcloud_profile',
            'ok-ru'         => 'ct_mission_news_ok_ru_profile',
            'orcid'         => 'ct_mission_news_orcid_profile',
            'patreon'       => 'ct_mission_news_patreon_profile',
            'paypal'        => 'ct_mission_news_paypal_profile',
            'pocket'        => 'ct_mission_news_pocket_profile',
            'podcast'       => 'ct_mission_news_podcast_profile',
            'quora'         => 'ct_mission_news_quora_profile',
            'qq'            => 'ct_mission_news_qq_profile',
            'ravelry'       => 'ct_mission_news_ravelry_profile',
            'reddit'        => 'ct_mission_news_reddit_profile',
            'researchgate'  => 'ct_mission_news_researchgate_profile',
            'rss'           => 'ct_mission_news_rss_profile',
            'skype'         => 'ct_mission_news_skype_profile',
            'slack'         => 'ct_mission_news_slack_profile',
            'slideshare'    => 'ct_mission_news_slideshare_profile',
            'snapchat'      => 'ct_mission_news_snapchat_profile',
            'soundcloud'    => 'ct_mission_news_soundcloud_profile',
            'spotify'       => 'ct_mission_news_spotify_profile',
            'stack-overflow' => 'ct_mission_news_stack_overflow_profile',
            'steam'         => 'ct_mission_news_steam_profile',
            'stumbleupon'   => 'ct_mission_news_stumbleupon_profile',
            'strava'   		=> 'ct_mission_news_strava_profile',
            'telegram'      => 'ct_mission_news_telegram_profile',
            'tencent-weibo' => 'ct_mission_news_tencent_weibo_profile',
            'tumblr'        => 'ct_mission_news_tumblr_profile',
            'twitch'        => 'ct_mission_news_twitch_profile',
            'untappd'       => 'ct_mission_news_untappd_profile',
            'vimeo'         => 'ct_mission_news_vimeo_profile',
            'vine'          => 'ct_mission_news_vine_profile',
            'vk'            => 'ct_mission_news_vk_profile',
            'wechat'        => 'ct_mission_news_wechat_profile',
            'weibo'         => 'ct_mission_news_weibo_profile',
            'whatsapp'      => 'ct_mission_news_whatsapp_profile',
            'xing'          => 'ct_mission_news_xing_profile',
            'yahoo'         => 'ct_mission_news_yahoo_profile',
            'yelp'          => 'ct_mission_news_yelp_profile',
            '500px'         => 'ct_mission_news_500px_profile',
            'social_icon_custom_1' => 'ct_mission_news_social_icon_custom_1_profile',
            'social_icon_custom_2' => 'ct_mission_news_social_icon_custom_2_profile',
            'social_icon_custom_3' => 'ct_mission_news_social_icon_custom_3_profile'
        );

        return apply_filters('ct_mission_news_social_array_filter', $social_sites);
    }
}

//----------------------------------------------------------------------------------
// Output social icons based on user's Customizer settings
//----------------------------------------------------------------------------------
if (! function_exists('ct_mission_news_social_icons_output')) {
    function ct_mission_news_social_icons_output($source = 'header')
    {
        if ($source == 'header' && get_theme_mod('social_icons_header') == 'no') {
            return;
        }
        if ($source == 'footer' && get_theme_mod('social_icons_footer') == 'no') {
            return;
        }

        $social_sites = ct_mission_news_social_array();

        // store the site name and url
        foreach ($social_sites as $social_site => $profile) {
            if (strlen(get_theme_mod($social_site)) > 0) {
                $active_sites[ $social_site ] = $social_site;
            }
        }

        if (! empty($active_sites)) {
            if ($source == 'header') {
                echo "<ul id='social-media-icons' class='social-media-icons'>";
            } else {
                echo "<ul class='social-media-icons'>";
            }

            foreach ($active_sites as $key => $active_site) {
                if ($active_site == 'rss') {
                    $class = 'fas fa-rss';
                } elseif ($active_site == 'email-form') {
                    $class = 'far fa-envelope';
                } elseif ($active_site == 'podcast') {
                    $class = 'fas fa-podcast';
                } elseif ($active_site == 'ok-ru') {
                    $class = 'fab fa-odnoklassniki';
                } elseif ($active_site == 'wechat') {
                    $class = 'fab fa-weixin';
                } elseif ($active_site == 'pocket') {
                    $class = 'fab fa-get-pocket';
                } elseif ($active_site == 'phone') {
                    $class = 'fas fa-phone';
                } else {
                    $class = 'fab fa-' . $active_site;
                }

                echo '<li>';
                if ($active_site == 'email') { ?>
					<a class="email" target="_blank"
					   href="mailto:<?php echo antispambot(is_email(get_theme_mod($key))); ?>">
						<i class="fas fa-envelope" title="<?php esc_attr_e('email', 'mission-news'); ?>"></i>
					</a>
				<?php } elseif ($active_site == 'skype') { ?>
					<a class="<?php echo esc_attr($active_site); ?>" target="_blank"
					   href="<?php echo esc_url(get_theme_mod($key), array( 'http', 'https', 'skype' )); ?>">
						<i class="<?php echo esc_attr($class); ?>"
						   title="<?php echo esc_attr($active_site); ?>"></i>
					</a>
				<?php } elseif ($active_site == 'phone') { ?>
					<a class="<?php echo esc_attr($active_site); ?>" target="_blank"
							href="<?php echo esc_url(get_theme_mod($active_site), array( 'tel' )); ?>">
						<i class="<?php echo esc_attr($class); ?>"></i>
						<span class="screen-reader-text"><?php echo esc_html($active_site);  ?></span>
					</a>
				<?php } elseif ($active_site == 'social_icon_custom_1' || $active_site == 'social_icon_custom_2' || $active_site == 'social_icon_custom_3') { ?>
					<a class="custom-icon" target="_blank"
					href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
					<img class="icon" src="<?php echo esc_url(get_theme_mod($active_site .'_image')); ?>" style="width: 19px;" />
						<span class="screen-reader-text"><?php echo esc_html(get_theme_mod($active_site .'_name'));  ?></span>
					</a>
				<?php } else { ?>
					<a class="<?php echo esc_attr($active_site); ?>" target="_blank"
					   href="<?php echo esc_url(get_theme_mod($key)); ?>">
						<i class="<?php echo esc_attr($class); ?>"
						   title="<?php echo esc_attr($active_site); ?>"></i>
					</a>
					<?php
                }
                echo '</li>';
            }
            echo "</ul>";
        }
    }
}
