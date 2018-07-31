<?php
switch (get_post_type()) {	case 'gallery':
include('assets/template/archive_gallery.php');	break;	case 'faq':
wp_die('警告：FAQ类型不支持直接预览，请新增页面，选择“常见问题”模板！');	break;	case 'favlinks':
wp_die('警告：友情链接类型不支持直接预览，请新增页面，选择“友情链接”模板！友情链接必须隶属于某个分类才可以显示，请务必设置友链的分类！');	break;	default:
do_action('modify_archive_type',get_post_type());	break;}?>
