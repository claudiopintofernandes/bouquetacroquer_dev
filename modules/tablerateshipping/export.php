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
require_once(dirname(__FILE__).'/classes/CarrierTableRate.php');
require_once(dirname(__FILE__).'/classes/TRSCSV.php');

if (Tools::substr(Tools::encrypt('tablerateshipping/getstates'), 0, 10) != Tools::getValue('token')
    || !Module::isInstalled('tablerateshipping')
) {
    die('Bad token');
}

if (Tools::getValue('condition_name', false) != false && Tools::getValue('csv_separator', false) != false) {
    $carrier_table_rate = new CarrierTableRate();
    $table_rates = $carrier_table_rate->getTableRates(Context::getContext()->language->id,
        Tools::getValue('selected_carrrier_id'), Tools::getValue('condition_name'), false, '', '',
        'ct.id_carrier_table_rate', 'ASC');

    if (count($table_rates) != 0) {
        $counter = 0;
        $collection = array();

        foreach ($table_rates as $table_rate) {
            $collection[$counter] = new stdClass();

            $condition_from = Tools::getValue('condition_name').'_from';
            $condition_to = Tools::getValue('condition_name').'_to';

            $collection[$counter]->zone = ($table_rate['zone'] == '') ? '*' : $table_rate['zone'];
            $collection[$counter]->country = ($table_rate['c_iso_code'] == '') ? '*' : $table_rate['c_iso_code'];
            $collection[$counter]->state = ($table_rate['s_iso_code'] == '') ? '*' : $table_rate['s_iso_code'];
            $collection[$counter]->city = ($table_rate['dest_city'] == '') ? '*' : $table_rate['dest_city'];
            $collection[$counter]->zip_from = ($table_rate['dest_zip_from'] == '') ? '*' : $table_rate['dest_zip_from'];
            $collection[$counter]->zip_to = ($table_rate['dest_zip_to'] == '') ? '*' : $table_rate['dest_zip_to'];
            $collection[$counter]->$condition_from = $table_rate['condition_value_from'];
            $collection[$counter]->$condition_to = $table_rate['condition_value_to'];
            $collection[$counter]->price = $table_rate['price'];
            $collection[$counter]->comment = $table_rate['comment'];

            $counter++;
        }

        $csv = new TRSCSV($collection, 'export-'.Tools::getValue('condition_name'), Tools::getValue('csv_separator'));
        $csv->export();
    } else {
        echo 'No records found';
    }
}

die();