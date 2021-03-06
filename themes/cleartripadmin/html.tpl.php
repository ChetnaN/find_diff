<?php
/**
 * @file
 * Adaptivetheme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Adaptivetheme Variables:
 * - $html_attributes: structure attributes, includes the lang and dir attributes
 *   by default, use $vars['html_attributes_array'] to add attributes in preprcess
 * - $polyfills: prints IE conditional polyfill scripts enabled via theme
 *   settings.
 * - $skip_link_target: prints an ID for the skip navigation target, set in
 *   theme settings.
 * - $is_mobile: Bool, requires the Browscap module to return TRUE for mobile
 *   devices. Use to test for a mobile context.
 *
 * Available Variables:
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
 * @see adaptivetheme_preprocess_html()
 * @see adaptivetheme_process_html()
 */
/*global $base_url;
$bu = "";
if (strpos($base_url, 'https') !== false) {
  $bu = $base_url;
}
else {
  $bu = str_replace("http","https",$base_url);
}
$baseURL = "<base href='".$bu."/' >";
$scripts = str_replace($base_url."/","",$scripts);
$styles = str_replace($base_url."/","",$styles);
//$polyfills = str_replace($base_url."/","",$polyfills);
$head = str_replace($base_url."/","",$head);*/
?>
<?php global $language; ?>
<?php $pattern = array('http://'=>'//', 'https://'=>'//')?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"<?php //print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"<?php //print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"<?php //print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9"<?php //print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html<?php print ($language->language=='ar' ? 'lang="ar" dir="rtl"' : '') . strtr($rdf_namespaces, $pattern); /*$html_attributes . $rdf_namespaces;*/ ?>><!--<![endif]-->
<head>
<?php //print $baseURL; ?>
<?php print strtr($head, $pattern); ?>
<title><?php print $head_title; ?></title>
<?php print strtr($styles, $pattern); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>    


<?php print strtr($scripts, $pattern); ?>
<?php //print $polyfills; ?>
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div id="skip-link">
    <!--<a href="<?php //print $skip_link_target; ?>" class="element-invisible element-focusable"><?php //print t('Skip to main content'); ?></a>-->
  </div>
  <?php print strtr($page_top, $pattern); ?>
  <?php print strtr($page, $pattern); ?>
  <?php print strtr($page_bottom, $pattern); ?>
</body>
</html>
