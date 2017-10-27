<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates 
*/

global $language;
?>

<select type="selectbox" name="cityChange" id="cityChange" onchange="cityChange('<?php print $language->prefix;?>',this);">
<option value="">All Cities</option>
<?php foreach ($rows as $id => $row): 
$row=trim(filter_xss($row)); ?>
<?php 

if(drupal_strtolower(arg(1)) == drupal_strtolower($row)) {
  print '<option value="'.drupal_strtolower($row).'" selected>'.t($row).'</option>'; 
} else {
  print '<option value="'.drupal_strtolower($row).'">'.t($row).'</option>'; 
}

?>
<?php endforeach; ?>
</select>
