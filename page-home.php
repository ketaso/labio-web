<?php
/**
 * @package WordPress
 * @subpackage LABiO
 * @since LABiO 1.0
 */

get_header(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui"/>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<!-- <script language="JavaScript" src="/wp-content/themes/labio/js/particles.min.js"  type="text/javascript"></script> -->
		<link rel="stylesheet" href="/wp-content/themes/labio2/style.css">
	</head>

	<body id="page_<?php echo $slug; ?>" <?php body_class(); ?>>
		<div class="bg_img_wrap">
			<img class="bg_img" src="http://free-photos-ls01.gatag.net/images/lgf01a201306170300.jpg">
		</div>
		<nav class="nav_wrapper">
			<div class="nav_contents">
				<div class="logo">LABiO</div>
				<ul class="nav_list clearfix">
					<li><a href="/">LABiO</a></li>
					<li><a href="/contact/">CONTACT</a></li>
				</ul>
			</div>
	    </nav>
		<header>
			<div class="header-text">
				<p>Innovation distinguishes</p>
				<p>between a leader and a follower.</P>
				<p class="header-text-sm">おいしいものをたくさん食べて、</p>
				<p class="header-text-sm">かっこいいデザインをして、最新技術で開発する。</p>
			</div>
		</header>
	    <main>
	    	<div class="post-list clearfix">
				<?php
					$paged = (get_query_var('page')) ? get_query_var('page') : 1;
					$offset = ($paged - 1 ) * 12 + 1;
					$args = array('posts_per_page' => 12,'offset' => $offset);
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post );
					$thumbnail_id = $post->ID;
					$eye_img = wp_get_attachment_image_src( $thumbnail_id , 'full' );
					$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				?>
					<section class="post-wrap hidden">
			    		<a href="<?php the_permalink(); ?>">
			    			<div class="post">
					    		<figure class="post-img-area">
					    			<img class="post-thumb" src="<?php echo $thumb_image_url[0]; ?>">
					    			<div class="post-date"><?php the_time('Y/m/d'); ?></div>
					    		</figure>
					    		<div "post-text">
					    			<h2 class="post-title"><?php the_title(); ?></h2>
					    			<div class="post-description"><?php echo get_the_excerpt(); ?></div>
			    				</div>
			    			</div>
			    		</a>
			    	</section>
				<?php endforeach; 
				wp_reset_postdata();?>
	    	</div>
			<div class="pagination-wrap">
		    	<div class="pagination">
					<?php my_paginate(); ?>
		    	</div>
		    </div>
	    </main>
	    <footer>
	    	<div class="copyright">&copy; LABiO</div>
	    </footer>

		<?php wp_footer(); ?>

		<script type="text/javascript">
			(function () {
				AdjustImgSize();

				function AdjustImgSize () {
					var postThumbEle = document.getElementsByClassName('post-thumb');
					var width = postThumbEle[0].clientWidth;
					var postImgAreaEle = document.getElementsByClassName('post-img-area');

					for (var i = 0; i < postThumbEle.length; i++) {
						aaa(postThumbEle[i], width, postImgAreaEle[i]); 
					}
				}

				function aaa (ele, width, ele2) {
					var img = new Image();
					img.onload = function() {
						var naturalHeight = ele.naturalHeight;
						var naturalWidth = ele.naturalWidth;

						if (naturalHeight === 0 && naturalWidth === 0) {
							ele.src = 'http://dummyimage.com/600x600/707070/ffffff.png&text=No+Image';
						}

						if (naturalHeight > naturalWidth) {
							ele.style.height = 'auto';
							ele.style.width = '100%';
						} else {
							ele.style.height = '100%';
							ele.style.width = 'auto';
						}

						ele2.style.height = width + 'px';
						// TODO: 何回も呼び出さない
						AdjustPostHeight();
					};

					img.src = ele.src;
				}

				/**
				 * 一番高い高さの枠に合わせる。
				 */
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
						postWrapEle[i].classList.remove('hidden');
					}
				}
			}) ();
		</script>
	</body>
</html>

<?php get_footer(); ?>
