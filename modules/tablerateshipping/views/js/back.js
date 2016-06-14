/**
 * Overrides carrier shipping with Table Rate Shipping
 *
 * Table Rate Shipping by Kahanit(https://www.kahanit.com/) is licensed under a
 * Creative Creative Commons Attribution-NoDerivatives 4.0 International License.
 * Based on a work at https://www.kahanit.com/.
 * Permissions beyond the scope of this license may be available at https://www.kahanit.com/.
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nd/4.0/.
 *
 * @author    Amit Sidhpura <amit@kahanit.com>
 * @copyright 2015 Kahanit
 * @license   http://creativecommons.org/licenses/by-nd/4.0/
 */

$(function() {
	$('#condition_name').change(function() {
		var condition = $(this).val(),
			usePreTaxPriceFormGroup = $('#use_pre_tax_price_form_group');

		if(condition === 'price')
			usePreTaxPriceFormGroup.show();
		else
			usePreTaxPriceFormGroup.hide();
			
	}).trigger('change');
});