Drupal.behaviors.cleartrip = {
  attach: function (context, settings) {
    if (typeof Drupal.settings.cleartrip !== 'undefined' && typeof Drupal.settings.cleartrip.page_type_ !== 'undefined' ) {
		document.title = Drupal.settings.cleartrip.page_type_;
	}
  }
};
