<?php
/**
 * @package WordPress
 * @subpackage LABiO
 * @since LABiO 1.0
 */
$thumbnail_id = get_post_thumbnail_id(); 
$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'full' );
get_header(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui"/>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<script language="JavaScript" src="/wp-content/themes/labio/js/particles.min.js"  type="text/javascript"></script>
		<link rel="stylesheet" href="/wp-content/themes/labio2/style.css">
	</head>

	<body id="page_<?php echo $slug; ?>" <?php body_class(); ?>>
		<nav class="nav_wrapper">
	        <ul class="nav_list clearfix">
	            <li><a href="/">LABiO</a></li>
	            <li><a href="/member/">MEMBER</a></li>
	            <li><a href="/contact/">CONTACT</a></li>
	        </ul>
	    </nav>
		<header class="single-header">
			<img class="single-thumb" src="<?php echo $eye_img[0] ?>">
			<div class="single-title-area">
				<h2 class="single-title"><?php the_title(); ?></h2>
			</div>
		</header>
	    <main class="single-main">
	    	<article class="single-entry">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
				      if (in_category('1')) { ?>
				      <div class="post-cat-one">
				      <?php } else{ ?>
				      <div class="">
				      <?php } ?>
				        
				        <small><?php the_time('Y/n/j'); ?></small>
				        <p class="postmetadata"><?php the_category(); ?></p>
				        <div class="entry"><?php the_content(); ?></div>
						<p class="postmetadata"><?php the_category(); ?></p>
				        </div>
				    <?php endwhile; else: ?>
				      <p>記事が見つかりませんでした。</p>
				<?php endif; ?>
			</article>

			<?php 
				$next_post_id = get_next_post(true)->ID;
				$pre_post_id = get_previous_post(true)->ID;
			?>

			<div class="pagination-wrap">
		    	<div class="pagination">
				<?php if (get_previous_post(true)):　?>
		    		<a href="<?php echo apply_filters('the_permalink', get_permalink($pre_post_id)); ?>" class="pagination-jump">‹ Prev <?php echo get_post($pre_post_id)->post_title; ?></a>
				<?php endif; ?>
				<?php if (get_next_post(true)):　?>
		    		<a href="<?php echo apply_filters('the_permalink', get_permalink($next_post_id)); ?>" class="pagination-jump"><?php echo get_post($next_post_id)->post_title; ?>
		    		Next ›</a>
				<?php endif; ?>
		    	</div>
		    </div>

	    </main>
	    <footer>
	    	<div class="copyright">&copy; LABiO</div>
	    </footer>

		<?php wp_footer(); ?>
		<script type="text/javascript">
			(function () {
				AdjustPostHeight();

				function AdjustPostHeight () {
					var postWrapEle = document.getElementsByClassName('post-wrap');
					var maxHeight = 0;

					for (var i = 0; i < postWrapEle.length; i ++) {
						var height = postWrapEle[i].clientHeight;

						if (maxHeight < height) {
							maxHeight = height;
						}
					}

					for (var i = 0; i < postWrapEle.length; i ++) {
						postWrapEle[i].style.height = maxHeight + 'px';
					}
				}
			}) ();
		</script>
	</body>
</html>


<?php get_footer(); ?>
