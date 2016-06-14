<?php
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

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

if (Tools::substr(Tools::encrypt('tablerateshipping/getstates'), 0, 10) != Tools::getValue('token')
    || !Module::isInstalled('tablerateshipping')
) {
    die('Bad token');
}

if (Tools::getValue('country_id') != '' && Tools::getValue('country_id') != '0') {
    $states = State::getStatesByIdCountry((int)Tools::getValue('country_id'));

    echo '<option value="">*</option>';

    foreach ($states as $state) {
        echo '<option'.(($state['id_state'] == Tools::getValue('state_id')) ? ' selected="selected"' : '').
            ' value="'.$state['id_state'].'">'.$state['name'].'</option>';
    }
} else {
    echo '<option value="">*</option>';
}

die();