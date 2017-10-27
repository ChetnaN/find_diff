/**
 * cityChange used in city select box
 *
 *
 **/
function cityChange(lang, city) {
    var selected_city = city.options[city.selectedIndex].value;
    if (selected_city != "") {
        var url = location.protocol + "//" + document.domain + Drupal.settings.basePath + lang + "/cities/" + selected_city;
    } else {
        var url = location.protocol + "//" + document.domain + Drupal.settings.basePath + lang + "/hotels";
    }
    window.location.href = url;
}


jQuery(document).ready(function() {
    /*if( jQuery('body').length ) {
          var theLanguage = jQuery('html').attr('dir');
          if(theLanguage == "rtl") {
            jQuery('body').addClass("rtl");
          }
    }*/

    var flight = jQuery("#block-cleartrip-left-navigation-block ul#IconNavList li a.packages").html("<span></span>Flight + Hotel");

    if (window.location.href.indexOf("/flight-hotel") > -1) {
        jQuery("h1.page-title").text("Flight + Hotel Offers");
    }
//    console.log(flight + " raushan");
    //alert(2);

    jQuery('.selected-country').click(function() {
        jQuery(this).addClass('current');
        jQuery('#country-list ul').css("display", "block");

    });

    jQuery('#country-list ul').mouseleave(function() {
        jQuery('.selected-country').removeClass('current')
        jQuery('#country-list ul').css("display", "none");

    });
    jQuery('.field-name-field-answer').hide();
    jQuery('.field-name-field-question').click(function() {
        //if(jQuery(this).next('section').css('display') == 'none'){
        //jQuery('.field-name-field-answer').hide('fast');
        jQuery(this).next('section').slideToggle('fast');
        //}
    });

    if (jQuery('#cityChange option:selected').val() != "") {
        jQuery('#block-views-city-selection-block').css("background", "#969696");
        jQuery('#cityChange').css("color", "#ffffff");
    }
    jQuery("#hotel-checkin").datepicker({showOn: "button", buttonImage: "/sites/all/themes/cleartrip/images/calendar_icon.gif", buttonImageOnly: true});
    jQuery("#hotel-checkout").datepicker({showOn: "button", buttonImage: "/sites/all/themes/cleartrip/images/calendar_icon.gif", buttonImageOnly: true});
    jQuery('#hotel-checkin').datepicker('option', {dateFormat: 'dd/mm/yy'});
    jQuery('#hotel-checkout').datepicker('option', {dateFormat: 'dd/mm/yy'});

});

