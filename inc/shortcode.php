<?php

// ----- [insert_template id='xxx'] -----
function xz_shortcode_insert_template($atts){
	$a = shortcode_atts( array(
		'id' => 'form',	//设置默认值
	), $atts );
	ob_start();
	get_template_part('template-parts/parts', $a['id'] );
	return ob_get_clean();
}
add_shortcode('insert_template', 'xz_shortcode_insert_template'); 

// ----- [insert_table id='xxx'] -----
// function xz_shortcode_insert_table($atts){
// 	$a = shortcode_atts( array(
// 		'id' => 'table1',	//设置默认值
// 	), $atts );
// 	ob_start();
// 	the_field($a['id']);
// 	return ob_get_clean();
// }
// add_shortcode('insert_table', 'xz_shortcode_insert_table'); 
