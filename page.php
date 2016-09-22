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
		<nav class="nav_wrapper">
	        <ul class="nav_list clearfix">
	            <li><a href="/">LABiO</a></li>
	            <li><a href="/contact/">CONTACT</a></li>
	        </ul>
	    </nav>
		<header>
			<div class="header-text">LABiO</div>
		</header>
	    <main>
	    	<div class="post-list clearfix">
	    	</div>
			<div class="pagination-wrap">
		    	<div class="pagination">
					<a href="" class="pagination-jump">« First</a>
		    		<a href="" class="pagination-jump">‹ Prev</a>
		    		<span class="current">1</span>
		    		<a href="">2</a>
		    		<a href="">3</a>
		    		<a href="">4</a>
		    		<a href="" class="pagination-jump">Next ›</a>
		    		<a href="" class="pagination-jump">Last »</a>
		    	</div>
		    </div>
	    </main>
	    <footer>
	    	<div class="copyright">&copy; LABiO</div>
	    </footer>

		<?php wp_footer(); ?>
		<script type="text/javascript">
			(function () {
			}) ();
		</script>
	</body>
</html>


<?php get_footer(); ?>
