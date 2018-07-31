<?php
$gallery_images = get_post_meta($post->ID,"gallery_images",true);switch (get_option('gallery_thumbnail')) {	case 'first':
$thumb_img_url = $gallery_images[0];	break;	case 'last':
$thumb_img_url = $gallery_images[count($gallery_images) - 1];	break;default:
$thumb_img_url = $gallery_images[array_rand($gallery_images,1)];	break;}
?><div class="single-post-container col-lg-3 col-sm-4 col-xs-6"><div class="single-post gallery"><a href="<?php the_permalink(); ?>"><div class="thumb_img" style="background-image:url('<?php echo $thumb_img_url; ?>');"></div></a><div class="post_meta"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div></div></div>