<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/i/378 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
	
	<title><?php print $head_title; ?></title>
	
	<?php print $head; ?>

	<meta name="viewport" content="width=device-width">
	<?php print $styles; ?>
    <?php print $scripts; ?>
    <?php global $base_url; ?>
    <link href="//cloud.webtype.com/css/ddfd0183-1894-4be9-8575-711315961ca7.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo $base_url; ?>/sites/all/themes/tufts/css/boilerplate.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/sites/all/themes/tufts/css/style.css">
	
	<script src="<?php echo $base_url; ?>/sites/all/themes/tufts/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

<!-- JavaScript -->
    <script src="<?php echo $base_url; ?>/sites/all/themes/tufts/js/libs/jquery.cycle.all.js"></script>
	<script src="<?php echo $base_url; ?>/sites/all/themes/tufts/js/responsive-tables.js"></script>
    <script src="<?php echo $base_url; ?>/sites/all/themes/tufts/js/plugins.js"></script>
	<script src="<?php echo $base_url; ?>/sites/all/themes/tufts/js/script.js"></script>
	<!-- end scripts -->
	
 	<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID 
  	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
  	</script>
  	-->
</body>
</html>

