<?php
/**
* @file
*
* This is the template file for rendering the formexample nameform.
* In this file each element of the form is rendered individually
* instead of the entire form at once, giving me the ultimate control
* over how my forms are laid out. I could also print the whole form
* at once - using the predefined layout in the module by
* printing $variables['formexample_nameform_form'];
*
*/
?>
<div class="kensio-user-subscribe">
    <h2>Never miss a deal</h2>
    <p>Get deals in your inbox</p>
    <div class ="kensio-fields kensio-field-<?php $i = '1'; print ($i); $i++;?>">
        <?php print drupal_render($form['user_name']); ?>
    </div>
    <div class ="kensio-fields kensio-field-<?php print ($i); $i++;?>">
        <?php print drupal_render($form['user_email']); ?>
    </div>
    <div class ="kensio-fields kensio-field-<?php print ($i); $i++;?>">
        <?php print drupal_render($form['user_city']); ?>
    </div>
    <div class ="kensio-fields kensio-field-<?php print ($i); $i++;?>">
        <?php print drupal_render($form['submit']); ?>
    </div>
    <div class ="kensio-fields kensio-field-<?php print ($i); $i++;?>">
    <?php
    $hidden = array();
    foreach (element_children($form) as $key) {
        $type = $form[$key]['#type'];
        if ($type == 'hidden' || $type == 'token') {
            $hidden[] = drupal_render($form[$key]);
        }
    }
    print (implode($hidden));
    ?>
    </div>
</div>

