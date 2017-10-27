<?php

function cleartrip_preprocess_page(&$variables) {
if(arg(0) == 'node' && arg(1) >0 ) {
    $type = db_select("field_data_field_page_type", "pt")
  ->fields("pt", array("field_page_type_value"))
  ->condition("pt.entity_id", arg(1))
  ->execute()
  ->fetchField();
  if($type=="blank") {

    drupal_add_js(drupal_get_path('theme', 'cleartrip') . '/cleartrip1.js'); 
    drupal_add_js(array('cleartrip' => array('page_type_' => drupal_get_title())), array('type' => 'setting'));
    $variables['scripts'] = drupal_get_js();
    print($variables['scripts']);
  }
 
}
}
/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 * 
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "cleartrip" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "cleartrip".
 * 2. Uncomment the required function to use.
 */


/**
 * Preprocess variables for the html template.
 */
/* -- Delete this line to enable.
function cleartrip_preprocess_html(&$vars) {
  global $theme_key;

  // Two examples of adding custom classes to the body.
  
  // Add a body class for the active theme name.
  // $vars['classes_array'][] = drupal_html_class($theme_key);

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  // $vars['classes_array'][] = css_browser_selector();

}
// */


/**
 * Process variables for the html template.
 */
/* -- Delete this line if you want to use this function
function cleartrip_process_html(&$vars) {
}
// */


/**
 * Override or insert variables for the page templates.
 */
/* -- Delete this line if you want to use these functions
function cleartrip_preprocess_page(&$vars) {
}
function cleartrip_process_page(&$vars) {
}
// */


/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function cleartrip_preprocess_node(&$vars) {
}
function cleartrip_process_node(&$vars) {
}
// */


/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function cleartrip_preprocess_comment(&$vars) {
}
function cleartrip_process_comment(&$vars) {
}
// */


/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function cleartrip_preprocess_block(&$vars) {
}
function cleartrip_process_block(&$vars) {
}
// */
