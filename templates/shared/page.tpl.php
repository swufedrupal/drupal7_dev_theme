<?php
// $Id: page.tpl.php,v 1.9 2010/11/07 21:48:56 dries Exp $

/**
* @file
* Bartik's theme implementation to display a single Drupal page.
*
* The doctype, html, head and body tags are not in this template. Instead they
* can be found in the html.tpl.php template normally located in the
* modules/system folder.
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
* - $hide_site_name: TRUE if the site name has been toggled off on the theme
*   settings page. If hidden, the "element-invisible" class is added to make
*   the site name visually hidden, but still accessible.
* - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
*   theme settings page. If hidden, the "element-invisible" class is added to
*   make the site slogan visually hidden, but still accessible.
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
* - $page[header] = Site Header
* - $pageleft_sidebar] = Left Sidebar
* - $pagehelp] = Help
* - $pagehighlighted] = Highlighted
* - $pagefeatured] = Featured
* - $pagecontent_top] = Content Top
* - $pagecontent] = Content
* - $pagecontent_sidebar] = Content Sidebar
* - $pagecontent_bottom] = Content Bottom
* - $pagefooter] = Footer
*
* @see template_preprocess()
* @see template_preprocess_page()
* @see template_process()
*/

?>

<div id="page">
	<header>
		<div id="logo-block">
			<a href="<?php echo $front_page; ?>" title="<?php echo t('Home'); ?>" rel="home" id="logo">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			</a>
		</div>
		<?php if($page['header']) echo render($page['header']); ?>
	</header>
	<div class="page-body">
		<div id="page-left">
			<?php if($page['sidebar_left']) echo render($page['sidebar_left']); ?>
			<section>
				<?php if($breadcrumb) echo $breadcrumb; ?>
				<hgroup>
					<?php echo render($title_prefix); ?>
					<?php if($title): ?>
						<h1><?php echo $title; ?></h1>
					<?php endif; ?>
					<?php echo render($title_suffix); ?>
					<?php if ($messages && $is_admin): ?>
						<div id="messages"><?php echo $messages; ?></div>
					<?php endif; ?>
					<?php if ($page['featured']): ?>
						<div id="featured"><?php echo render($page['featured']); ?></div>
					<?php endif; ?>
				</hgroup>
				<?php if($page['content_top']) echo render($page['content_top']); ?>
				<?php if($tabs) echo render($tabs); ?>
				<?php if($page['help']) echo render($page['help']); ?>
				<?php if ($action_links) echo render($action_links); ?>
				<article id="content">
					<?php echo render($page['content']); ?>
					<?php echo $feed_icons; ?>
				</article>
				<?php if ($page['content_bottom']) echo render($page['content_bottom']); ?>
			</section>
		</div>
		<div id="page-right">
			<?php if ($page['right_sidebar']) echo render($page['right_sidebar']); ?>
		</div>
	</div>
	<footer>
		<?php if ($page['footer']) echo render($page['footer']); ?>
	</footer>
</div>