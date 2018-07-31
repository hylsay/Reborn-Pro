<?php
/*
Template Name: reBorn默认首页
*/
?><?php get_header() ?><?php include("assets/template/carousel.php"); ?><div class="cats_display" :class="main.carousel.type"><?php include('assets/template/nav_category.php'); ?><?php
if (get_option('index_newest') == "checked") {
echo "<div class='cat_group content-container clear-float'><h2>".get_option('newest_text')."</h2><div class='newest-container clear-float'>";	$excludeIDs = get_option('index_newes_exclude');	$minius_excludeIDs = array();	if ($excludeIDs) {	foreach ($excludeIDs as $id) {	$minius_excludeIDs[] = '-'.(string)$id;	}}$newest_num = intval(get_option('newest_num'));	$args = array('post_type' => 'post','cat' => $minius_excludeIDs,'posts_per_page' => $newest_num,);$query_posts = new WP_Query();	$query_posts->query($args);	while( $query_posts->have_posts() & $newest_num > 0 ){	$query_posts->the_post();	include("assets/template/post_newest.php");	$newest_num -= 1;}echo "</div>";	if (get_option('index_time_url')) {	echo "<div class='read_more_center col-xs-12'><a href='".get_option('index_time_url')."'>".get_option('read_more_text')."</a></div>";	}echo "</div><hr/>";	wp_reset_query();	}?><?php
$index_group = get_option('index_group');	if ($index_group) {	foreach ($index_group as $group) {	$catIDs = array();	if ($group['cats']) {	foreach ($group['cats'] as $id_num) {	$catIDs[] = (string)$id_num;	}}$args = array('post_type' => 'post','cat' => $catIDs,'posts_per_page' => intval($group['num']),'ignore_sticky_posts' => true
);$query_posts = new WP_Query();$query_posts->query($args);	$post_num_class = 'posts-'.$group['num'];	echo "<div class='cat_group content-container clear-float ".$post_num_class."'><h2>".$group['name']."</h2>";	echo "<div class='newest-container clear-float'>";	while( $query_posts->have_posts() ){	$query_posts->the_post();	switch ($group['type']) {	case 'list':
include("assets/template/post_list.php");	break;	case 'card':
include("assets/template/post_card.php");	break;	case 'cover':
include("assets/template/post_newest.php");	break;	default:
break;	}}echo "</div>";if ($group['href']) {	echo "<div class='read_more_center col-xs-12'><a href='".$group['href']."'>".get_option('read_more_text')."</a></div>";	}echo "</div><hr/>";	wp_reset_query();	}}?></div><?php get_footer() ?>