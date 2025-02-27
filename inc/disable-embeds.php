<?php

// ---------- 移除顶部多余信息 ----------
remove_action('wp_head', 'index_rel_link');//当前文章的索引
remove_action('wp_head', 'feed_links_extra', 3);// 额外的feed,例如category, tag页
remove_action('wp_head', 'start_post_rel_link', 10, 0);// 开始篇
remove_action('wp_head', 'parent_post_rel_link', 10, 0);// 父篇
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // 上、下篇.
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//rel=pre
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );//rel=shortlink
remove_action('wp_head','rsd_link');//移除head中的rel="EditURI"
remove_action('wp_head','wlwmanifest_link');//移除head中的rel="wlwmanifest"
remove_action('wp_head','rsd_link');//rsd_link移除XML-RPC
remove_filter('the_content', 'wptexturize');//禁用半角符号自动转换为全角
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'locale_stylesheet' );
remove_action('wp_head', 'noindex', 1 );
remove_action('wp_head', 'wp_generator' );//显示WP版本
remove_action('wp_head', 'print_emoji_detection_script', 7);
//禁用 REST API、移除 wp-json
add_filter('rest_enabled', '_return_false');
add_filter('rest_jsonp_enabled', '_return_false');
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );


function disable_embeds_init() {
    /* @var WP $wp */
    global $wp;
    // Remove the embed query var.
    $wp->public_query_vars = array_diff( $wp->public_query_vars, array(
    'embed',
    ) );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    // Turn off
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
    // Remove all embeds rewrite rules.
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
 
add_action( 'init', 'disable_embeds_init', 9999 );
 
/**
* Removes the 'wpembed' TinyMCE plugin.
*
* @since 1.0.0
*
* @param array $plugins List of TinyMCE plugins.
* @return array The modified list.
*/
function disable_embeds_tiny_mce_plugin( $plugins ) {
    return array_diff( $plugins, array( 'wpembed' ) );
}
 
/**
* Remove all rewrite rules related to embeds.
*
* @since 1.2.0
*
* @param array $rules WordPress rewrite rules.
* @return array Rewrite rules without embeds rules.
*/
function disable_embeds_rewrites( $rules ) {
    foreach ( $rules as $rule => $rewrite ) {
        if ( false !== strpos( $rewrite, 'embed=true' ) ) {
            unset( $rules[ $rule ] );
        }
    }
    return $rules;
}
 
/**
* Remove embeds rewrite rules on plugin activation.
*
* @since 1.2.0
*/
function disable_embeds_remove_rewrite_rules() {
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
    flush_rewrite_rules();
}
 
register_activation_hook( __FILE__, 'disable_embeds_remove_rewrite_rules' );
 
/**
* Flush rewrite rules on plugin deactivation.
*
* @since 1.2.0
*/
function disable_embeds_flush_rewrite_rules() {
    remove_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
    flush_rewrite_rules();
}
 
register_deactivation_hook( __FILE__, 'disable_embeds_flush_rewrite_rules' );