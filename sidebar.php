<?php
if (is_single() & get_post_type() == 'gallery') {
$sidebar_path = 'assets/template/sidebar_gallery_single.php';} else {
$sidebar_path = 'assets/template/sidebar_default.php';}include($sidebar_path);?>