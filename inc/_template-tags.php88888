<?php
/***********************************************
 * Custom template tags for this theme
 * 
 * Edited by koaya
 * Ver1.6
 *
 * [function list]
 * ---------------
 * 01 xizhitbu_diy_loop( $args, $loop_temp )
 * 02 xizhitbu_subcat_list( $cat, $tax='pro_cat' )
 * 03 xizhitbu_get_the_last_term( $cat )
 * 04 xizhitbu_get_thumbnail( $thumb_size )
 * 05 xizhitbu_show_tax_terms( $tax, $parent=0, $temp )
 * 06 xizhitbu_show_tax_all_terms( $tax )
 * 07 xizhitbu_related_items( $template, $selection, $taxonomy, $query_args )
 * 08 xizhi_highlight_current_term()
 * ---------------
 */
  


/**
 * 自定义Loop循环
 * $args:		the query array
 * $loop_temp:	the loop template name
 */	
function xizhitbu_diy_loop( $args, $loop_temp ) {
	$myposts = new WP_Query( $args );
	while( $myposts -> have_posts() ) : $myposts -> the_post();
		get_template_part( 'template-parts/loop', $loop_temp );
	endwhile;
	wp_reset_postdata(); 
}


/**
 * 输出子terms列表
 * $cat:		the category object
 * $tax:		default pro_cat	
 */	
function xizhitbu_subcat_list( $cat, $tax='pro_cat' ) {
	$subcats = get_term_children( $cat->term_id, $tax );
	foreach ($subcats as $subcat_id) {
		echo "<li class='cat_".get_term_field('term_id', $subcat_id, $tax)."'><a title='";
		echo get_term_field( 'name', $subcat_id, $tax );
		echo "' href='";
		echo get_term_link( $subcat_id, $tax );
		echo "'>";
		echo get_term_field( 'name', $subcat_id, $tax );
		echo "</a></li> ";
	}
}


/**
 * 获取最末层级的terms
 * $tax:		the taxonomy in which to find
 */	
function xizhitbu_get_the_last_term( $tax ) {
	//Get all terms associated with post in taxonomy 'category'
	$terms = get_the_terms(get_the_ID(),$tax);

	//Get an array of their IDs
	$term_ids = wp_list_pluck($terms,'term_id');

	//Get array of parents - 0 is not a parent
	$parents = array_filter(wp_list_pluck($terms,'parent'));

	//Get array of IDs of terms which are not parents.
	$term_ids_not_parents = array_diff($term_ids,  $parents);

	//Get corresponding term objects
	$terms_not_parents = array_values(array_intersect_key($terms,  $term_ids_not_parents));

	return $terms_not_parents;
}


/**
 * 获取缩略图，若没有设置，则显示默认图片
 * $thumb_size:		the thumbnail size name
 */	
function xizhitbu_get_thumbnail( $thumb_size ) {
	if ( get_the_post_thumbnail() ) {
		the_post_thumbnail( $thumb_size );
	} else {
		echo "<img src='";
		bloginfo('stylesheet_directory');
		echo "/img/default-thumb.jpg' alt='";
		the_title();
		echo "'>";
	}
}



/**
 * 在列表页输出指定分类法的terms菜单
 * 默认输出一级类别，可指定父分类id
 *
 * $tax:	the taxonomy
 * $parent: defalut as 0
 * $loop_temp: 	选填单项模版id，不填直接输出链接
 * 				模版项中使用变量：$term, $term_link
 */
function xizhitbu_show_tax_terms( $tax, $parent=0, $loop_temp ) {
	$args = array(
		'taxonomy'		=>	$tax,
		'hide_empty'	=> 	false,
		'parent'		=>	$parent
	);
	$terms = get_terms($args);
	$term_now = get_queried_object()->term_id;
	foreach ($terms as $term) {
		$term_link = get_term_link($term->term_id, $tax);
		if(!$loop_temp){
			echo '<li class="menu-item cat_';
			echo get_term_field('term_id', $term, $tax);
			if($term->term_id == $term_now){
				echo ' current-menu-item';
			}else if($term->term_id == wp_get_term_taxonomy_parent_id($term_now,$tax) || $term->term_id == wp_get_term_taxonomy_parent_id(wp_get_term_taxonomy_parent_id($term_now,$tax),$tax) ){
				echo ' current-menu-item';
			}
			echo '"><a href="'.$term_link.'">';
			echo $term->name;
			echo '</a></li> ';			
		}else{
			include get_theme_file_path( 'template-parts/loop-'.$loop_temp.'.php' );
		}
	}
}


/**
 * 输出指定分类法的所有terms菜单
 * 输出一级及二级(无二级则展示所有具体详情)
 *
 * $tax:	the taxonomy
 */
function xizhitbu_show_tax_all_terms( $tax ) {
	$args = array(
		'taxonomy'		=>	$tax,
		'hide_empty'	=> 	false,
		'parent'		=>	0
	);
	$terms = get_terms($args);
	$term_now = get_queried_object()->term_id;
	foreach ($terms as $term) {
		$term_link = get_term_link($term->term_id, $tax);
		echo '<li class="parent-item cat_';
		echo get_term_field('term_id', $term, $tax);
		if($term->term_id == $term_now){
			echo ' current-menu-item';
		}
		echo '"><a href="'.$term_link.'">';
		echo $term->name;
		echo '</a> <ul class="'.$tax.'-lv2">';
		if(get_term_children($term->term_id, $tax)){
			xizhitbu_show_tax_terms( $tax, $term->term_id, '' );
		}else{
			if(is_singular()){
				global $post;
				$current_id = $post->ID;
			}
			$lv2_args = array(
				'tax_query' => array( array(
					'taxonomy' => $tax,        
					'field' => 'id',            
					'terms' => $term->term_id,
					'include_children' => false,
					'operator' => 'IN'
				)),
				'posts_per_page' => -1,
			);
			$myposts = new WP_Query( $lv2_args );
			while( $myposts -> have_posts() ) : $myposts -> the_post();
				echo "<li";
				if($current_id == get_the_id()){
					echo " class='current-menu-item'";
				}
				echo ">";
				echo "<a href='".get_the_permalink()."'>";
				the_title();
				echo "</a></li>";
			endwhile;
			wp_reset_postdata(); 
		}
		echo '</ul> </li> ';
	}
}

/**
 * 输出相关推荐列表项
 * 不包含包裹元素
 *
 * $template: 	模版ID字符串
 * $selection:	可供勾选相关内容的ACF字段
 * $taxonomy:	推荐同类内容所使用的自定义分类法
 * $query_args:	查询数组，array(	'post_type' => 	xx, 
 *								'order'		=>	xx,
 *								'orderby'	=>	xx,
 *								'posts_per_page' => xx );
 */
function xizhitbu_related_items( $template, $selection, $taxonomy, $query_args  ) {
	if( $selection ) {
		$rel_posts = get_field($selection);
	}

	if( $rel_posts[0] ) {
		$query_args['post__in'] = $rel_posts;
	} else {
		$query_args['post__not_in'] = array( get_the_ID() );
		if($taxonomy){
			$term_now = xizhitbu_get_the_last_term($taxonomy);
			$query_args['tax_query'] = array(
				array(
					'taxonomy'	=>	$taxonomy,
					'field'		=>	'slug',
					'terms'		=>	$term_now[0]->slug,
					'operator'	=>	'IN'
				)
			);
		}
	}
	xizhitbu_diy_loop( $query_args, $template);
}


/**
 * 为taxonomy页面中的多级分类菜单标记当前term及祖先term
 *
 * $term_id:	term id
 * $tax:		分类法
 */
function xizhi_highlight_current_term( $term_id, $tax ) {
	if(is_tax()){
		$term_now = get_queried_object();
		if($term_now->term_id == $term_id || term_is_ancestor_of( $term_id, $term_now->term_id, $tax )){
			return " current";
		}else{
			return false;
		}
	}else{
		return false;
	}
}