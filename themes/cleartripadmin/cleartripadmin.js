jQuery(document).ready(function(e) {
   if(jQuery("form").hasClass("node-page-form")) {
    jQuery('input[type="text"]').attr("spellcheck","true");
    jQuery('textarea').attr("spellcheck","true");
   }
   if( jQuery('body').length ) {
		  var theLanguage = jQuery('html').attr('dir');
		  if(theLanguage == "rtl") {
		  	jQuery('body').addClass("rtl");
		  }
	}
});
