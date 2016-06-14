/*
 * NOTICE OF LICENSE
 * 
 * A friendly notice to thank you for been honest.
 * The plugin has to be used only if purchased from https://addons.prestashop.com or directly from developer
 * Reselling, sharing or using the same licence for multiple shops is prohibited 
 * 
 * @author Radu G.
 * @copyright  Radu G.
 */

$(document).ready(function() {
	// tabs
    $("#navigation_tabs").tabs({
		beforeActivate: function( event, ui ) {
			ui.newTab.addClass('active');
			ui.oldTab.removeClass('active');
		}
	});
	
	// multishop
	$('#ids').change(function() {
		url = $('li.active a').attr('href')+'?ids='+$('#ids').val();
		$.get(url, function( data ) {
			var current_index = $("#navigation_tabs").tabs("option", "active");
			$("#navigation_tabs").tabs('load', current_index);
		});
	});	
});