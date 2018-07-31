<?php
/*
Template Name: 空白页面(用户自定义全部代码)
*/
?><!DOCTYPE html><html <?php language_attributes() ?> ><head><title><?php wp_title( '-',true,'right' ); echo _wp_specialchars( get_bloginfo('name'),1 ) ?></title><meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" ><meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/><meta name="renderer" content="webkit"><link rel="pingback" href="<?php bloginfo('pingback_url') ?>" /><?php wp_head(); ?></head><body class="<?php sandbox_body_class() ?>"><main><?php the_content(); ?></main><footer><?php wp_footer() ?><?php
if (get_option('custom_javascript')) {echo "<script>try{".get_option('custom_javascript')."}catch(e){console.log(e)}</script>";}if (get_option('custom_css')) {echo "<style>".get_option('custom_css')."</style>";}?></footer></body></html>