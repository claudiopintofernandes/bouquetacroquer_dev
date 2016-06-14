/**
 * TonyTheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the OSL-3.0
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @author    TonyTheme
 * @copyright TonyTheme
 * @license   Open Software License v. 3.0 (OSL-3.0)
 */
$(document).ready(function () {
    $('body').click(function (e) {
        var id = $(e.target).attr("id");
        if (id != 'tonysocialauth-frm-email' && id != 'tonysocialauth-frm-sbmt')
            $("#soc-auth-msg").hide();
    });

});
function socialauth_error() {
    $("#soc-auth-msg").find(".message").addClass("error");
    $("#soc-auth-msg").show();
}
function socialauth_success() {
    $("#soc-auth-msg").find(".message").addClass("success");
    $("#soc-auth-msg").show();
}
function socialauth_email() {
    $("#soc-auth-msg").find(".message").addClass("form");
    $("#soc-auth-msg").show();
}
