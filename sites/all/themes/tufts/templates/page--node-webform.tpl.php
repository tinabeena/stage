<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>

<div id="content-wrapper">
<header id="header">

    <div id="upper-header">
        <a href="<?php global $base_url; echo $base_url; ?>" id="homelink"><h1>Tufts University Technology Services</h1></a>
        <a href="<?php global $base_url; echo $base_url; ?>" id="homelink-small">Home</a>
        <?php print render($page['headertop']); ?>
    </div>
    <?php print render($page['header']); ?>
    
</header>

<div role="main" id="maindiv">
    
    <?php print $messages; ?>
    
    <div id="main-wrapper"><div id="main" class="clearfix">
    
      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->
      <?php endif; ?>
    
      <div id="content" class="column"><div class="section">
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        
        <?php print render($page['abovecontent']); ?>
        
        <?php if ($breadcrumb): ?>
            <div id="breadcrumb"><?php print $breadcrumb; ?> &gt; <span class="breadcrumb-current"><?php print $title; ?></span></div>
        <?php endif; ?>
        
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title">Request</h1><h2><?php print $title; ?></h2><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div></div> <!-- /.section, /#content -->
      
      <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_second']); ?>
        </div></div> <!-- /.section, /#sidebar-second -->
      <?php endif; ?>

    </div></div> <!-- /#main, /#main-wrapper -->

</div>
<!-- END #main -->

<footer id="footer" class="clearfix">
    <?php print render($page['footer']); ?>
    
    <div class="footer-column col-one clearfix">
        <h3>Stay Connected</h3>
        <p><a href="http://twitter.com/TuftsTechnology" target="_blank" class="twitter">twitter</a>
		<a href="http://www.facebook.com/TuftsTechnology" target="_blank" class="facebook">facebook</a></p>
        <p class="copyright">Copyright &copy; 2013 Tufts University</p>
    </div>
    
    <div class="footer-column col-two clearfix">
        <?php
//        $block = block_load('views', 'tag_feeds-block_2');
//        print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));;

          $block = module_invoke('views', 'block_view', 'infoboard-block_2');
          print render($block);
        ?>
    </div>
    
    <div class="footer-column col-three clearfix">
        <h3>Tufts IT Support</h3>
        <div class="left">
            <ul>
                <li><a href="http://uss.tufts.edu/stuServ/" target="_blank">A&amp;S and E Student Services</a></li>
                <li><a href="http://dental.tufts.edu/about/contact-us/dental-it-staff/" target="_blank">Dental IT</a></li>
                <li><a href="http://www.library.tufts.edu/ginn/" target="_blank">Fletcher - Ginn Library/IT</a></li>
                <li><a href="http://www.library.tufts.edu/hhsl/computing/computing.html" target="_blank">Hirsh Health Sciences Library IT</a></li>
                <li><a href="mailto:scicomp-hnrc@tufts.edu">HNRCA IT</a></li>
				<li><a href="http://medicine.tufts.edu/Who-We-Are/Administrative-Offices/Office-of-Information-Technology-Microsite" target="_blank">OIT Service Center</a></li>
            </ul>
        </div>
        <div class="right">
            <ul>
                <li><a href="http://operations.tufts.edu/IT/" target="_blank">Operations IT</a></li>
				<li><a href="http://www.library.tufts.edu/tisch/useOurServices.html" target="_blank">Tisch Library</a></li>
                <li><a title="Tusk Support" href="http://tusk.tufts.edu/view/course/HSDB/1185" target="_blank">TUSK Support</a></li>
                <li><a href="<?php echo $base_url; ?>/help-affiliation">Tufts Technology Services</a></li>
                <li><a href="http://vet.tufts.edu/its/" target="_blank">Vet ITS Support Center</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-column col-four clearfix">
        <h3 class="need-help">Need Help?</h3>
        <p><a href="https://tufts.service-now.com/tsd/login.do" target="_blank">TechConnect</a><br>
        617-627-3376<br>
        <a href="mailto:it@tufts.edu">it@tufts.edu</a></p>
        <p><a href="http://it.tufts.edu/contact-us">Contact Tufts Technology Services</a></p>
        <p><a href="<?php echo $base_url; ?>/sitemap">Sitemap</a></p>
    </div>
</footer>
</div><!-- / #content-wrapper -->