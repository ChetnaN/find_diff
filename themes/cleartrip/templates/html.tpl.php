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
?>
<?php $pattern = array('http://'=>'//', 'https://'=>'//')?>
<?php
$pagetype = 'default';
$bodyclass = "";
if(arg(0) == 'node' && arg(1) >0 ) {
    $query = db_select('field_data_field_page_type', 't');
    $query->addField('t', 'field_page_type_value');
    $query->condition('t.entity_id', arg(1));
    $temp= $query->execute()->fetchCol();
    $pagetype = $temp[0];
}

if($pagetype == 'blank') {
    $query = db_select('field_data_body', 't');
    $query->addField('t', 'body_value');
    $query->condition('t.entity_id', arg(1));
    $temp = $query->execute()->fetchCol();
    $pagebody = $temp[0];
    print $pagebody;
   //print $page;
} elseif ($pagetype == 'offer') {
$bodyclass = 'offer-page';
?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html<?php print ($language->language=='ar' ? 'lang="ar" dir="rtl"' : '') . strtr($html_attributes, $pattern) . strtr($rdf_namespaces, $pattern); ?>><!--<![endif]-->
<head>
<?php print strtr($head, $pattern); ?>
<title><?php print $head_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>    
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,300,300italic,400italic,700,700italic,600italic,800,800italic' rel='stylesheet' type='text/css'>
<?php print strtr($styles, $pattern); ?>
<?php print strtr($scripts, $pattern); ?>
<?php print strtr($polyfills, $pattern); ?>
</head>
<body class="<?php print $classes; ?> <?php print $bodyclass; ?>"<?php print $attributes; ?>>
  <div id="skip-link">
    <a href="<?php print $skip_link_target; ?>" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print strtr($page_top, $pattern); ?>
  <?php print strtr($page, $pattern); ?>
  <?php print strtr($page_bottom, $pattern); ?>
</body>
</html>
<?php } else { ?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9"<?php print strtr($html_attributes, $pattern); ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html<?php print strtr($html_attributes, $pattern) . strtr($rdf_namespaces, $pattern); ?>><!--<![endif]-->
<head>
<?php print strtr($head, $pattern); ?>
<title><?php print $head_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>    
<!--[if lte IE 9]>
<link rel="stylesheet" type="text/css" href="www.cleartrip.com/offers/sites/all/themes/cleartrip/css/style.css" />
<![endif]-->

<!--[if !IE]><!-->
<link rel="stylesheet" type="text/css" href="//www.cleartrip.com/offers/sites/all/themes/cleartrip/css/style_new.css" />
<!--<![endif]-->

  
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,300,300italic,400italic,700,700italic,600italic,800,800italic' rel='stylesheet' type='text/css'>

<?php print strtr($styles, $pattern); ?>
<?php print strtr($scripts, $pattern); ?>
<?php print strtr($polyfills, $pattern); ?>
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div id="skip-link">
    <a href="<?php print $skip_link_target; ?>" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print strtr($page_top, $pattern); ?>
  <?php print strtr($page, $pattern); ?>
  <?php print strtr($page_bottom, $pattern); ?>
</body>
</html>
<?php } ?>

