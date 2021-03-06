<?php
/**
 * @file
 * Adaptivetheme implementation to display a node.
 *
 * Adaptivetheme variables:
 * AT Core sets special time and date variables for use in templates:
 * - $submitted: Submission information created from $name and $date during
 *   adaptivetheme_preprocess_node(), uses the $publication_date variable.
 * - $datetime: datetime stamp formatted correctly to ISO8601.
 * - $publication_date: publication date, formatted with time element and
 *   pubdate attribute.
 * - $datetime_updated: datetime stamp formatted correctly to ISO8601.
 * - $last_update: last updated date/time, formatted with time element and
 *   pubdate attribute.
 * - $custom_date_and_time: date time string used in $last_update.
 * - $header_attributes: attributes such as classes to apply to the header element.
 * - $footer_attributes: attributes such as classes to apply to the footer element.
 * - $links_attributes: attributes such as classes to apply to the nav element.
 * - $is_mobile: Bool, requires the Browscap module to return TRUE for mobile
 *   devices. Use to test for a mobile context.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 * @see adaptivetheme_preprocess_node()
 * @see adaptivetheme_process_node()
 */

/**
 * Hiding Content and Printing it Separately
 *
 * Use the hide() function to hide fields and other content, you can render it
 * later using the render() function. Install the Devel module and use
 * <?php print dsm($content); ?> to find variable names to hide() or render().
 */
//dpm($content);
hide($content['comments']);
hide($content['links']);
hide($content['locations']);
hide($content['field_no_of_rooms']);
hide($content['field_floors']);
hide($content['field_check_in_time']);
hide($content['field_check_out_time']);
hide($content['field_hotel_amenities']);
hide($content['field_faqs']);
if(!empty($content['field_deal_details']['#title'])) {
    if(!empty($content['field_deal_offer']['#title']))  {
        $content['field_deal_offer']['#title'] = $content['field_deal_details']['#title'];
        $content['field_deal_details']['#title'] = "";
    }
}
else  {
    $content['field_deal_offer']['#title'] = t('Deal Details');
}    


?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>

  <?php if ($title && !$page): ?>
    <header<?php print $header_attributes; ?>>
      <?php // if ($title): ?>
        <!--<h1<?php // print $title_attributes; ?>>-->
          <!--<a href="<?php // print $node_url; ?>" rel="bookmark"><?php // print $title; ?></a>-->
        <!--</h1>-->
      <?php // endif; ?>
        <div class="about-hotels"><h2><?php print(t('Deal Details')); ?></h2></div>
    </header>
  <?php endif; ?>
    

  <?php if(!empty($user_picture) || $display_submitted): ?>
    <footer<?php print $footer_attributes; ?>>
      <?php // print $user_picture; ?>
      <p class="author-datetime"><?php // print $submitted; ?></p>
    </footer>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php print render($content); ?>
    <?php if(!empty($node->field_no_of_rooms) || !empty($node->field_floors) || !empty($node->field_check_in_time) || !empty($node->field_check_out_time)): ?>
      <div class = "bind-hotel-desc">
          <?php
            print render($content['field_no_of_rooms']);
            print render($content['field_floors']);
            print render($content['field_check_in_time']);
            print render($content['field_check_out_time']);
            ?>
      </div>
      <?php endif; ?>
      <div class ="bind-hotel-ammenities field field-name-field-hotel-amenities field-type-text-long field-label-above view-mode-full">
          <h2 class="field-label">
              <?php
              if(!empty($node->field_hotel_amenities))
              {
                  print $content['field_hotel_amenities']['#title'];
              }
              ?>
          </h2>
          <?php
          if (function_exists('cleartrip_hotel_amenities') && !empty($node->field_hotel_amenities)) {
              $out = '';
              $result = cleartrip_hotel_amenities($content['field_hotel_amenities']);
              foreach ($result as $key => $value) {
                  $out .= '<div class = "amenity-'. $key . ' ' . $value->type . '">';
                  $out .= theme('image', array('path'=> $value->path));
                  $out .= $value->name . '</div>';
              }
              print($out);
          }
          ?>
      </div>
      <?php
      drupal_add_library('system', 'ui.accordion');
      foreach ($content['field_faqs'] as $key=>$value)  {
          if (is_int($key))  {
              foreach ($value['entity']['field_collection_item'] as $inner_key => $inner_value) {
                  $content['field_faqs'][$key]['entity']['field_collection_item'][$inner_key]['field_question']['#title'] = '';
                  $content['field_faqs'][$key]['entity']['field_collection_item'][$inner_key]['field_answer']['#title'] = '';
              }
          }
          
      }
      if (!empty($node->field_faqs)) {
          print render($content['field_faqs']);
      }
      ?>
  </div>

  <?php if ($links = render($content['links'])): ?>
    <nav<?php print $links_attributes; ?>><?php print $links; ?></nav>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

  <?php print render($title_suffix); ?>
</article>
