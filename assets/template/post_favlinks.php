<?php
$url = get_post_meta($post->ID,"site_url",true);$description = get_post_meta($post->ID,"site_description",true);$color = get_post_meta($post->ID,"site_color",true) ? get_post_meta($post->ID,"site_color",true) : '#99a9bf';$shadowColor = hex2rgba($color,0.5);$char = mb_substr(get_the_title(),0,1,"UTF-8");$icon = get_post_meta($post->ID,"site_icon",true);$target = get_post_meta($post->ID,"target_blank",true) ? '_blank' : '_self';$icon_size = get_post_meta($post->ID,"site_icon_width",true).'px '.get_post_meta($post->ID,"site_icon_height",true).'px';?><div class="col-sm-6 col-lg-3"><div class="favlink-card" style="border-top: 3px solid <?php echo $color; ?>"><a class="title" href="<?php echo $url; ?>" target="_blank"><?php the_title(); ?></a><div class="description"><?php echo $description; ?></div><?php if ($icon) { ?><a
class="icon"
style="background-color: <?php echo $color; ?>;box-shadow: 0 3px 8px <?php echo $shadowColor; ?>;background-image: url(<?php echo $icon; ?>);background-size:<?php echo $icon_size;?>"
href="<?php echo $url; ?>"
target="<?php echo $target; ?>"
></a><?php } else { ?><a
class="icon"
style="background-color: <?php echo $color; ?>;box-shadow: 0 3px 8px <?php echo $shadowColor; ?>;"
href="<?php echo $url; ?>"
target="<?php echo $target; ?>"
><?php echo $char; ?></a><?php } ?></div></div>