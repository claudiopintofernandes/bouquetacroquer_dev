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
require_once(dirname(__FILE__).'/classes/TRSCSV.php');

if (Tools::substr(Tools::encrypt('tablerateshipping/getstates'), 0, 10) != Tools::getValue('token')
    || !Module::isInstalled('tablerateshipping')
) {
    die('Bad token');
}

if (Tools::getValue('condition_name', false) != false && Tools::getValue('csv_separator', false) != false) {
    $condition_from = Tools::getValue('condition_name').'_from';
    $condition_to = Tools::getValue('condition_name').'_to';
    $collection = array();

    for ($i = 0; $i < 3; $i++) {
        $collection[$i] = new stdClass();

        $collection[$i]->zone = 'Asia';
        $collection[$i]->country = 'IN';
        $collection[$i]->state = 'GJ';
        $collection[$i]->city = 'Mahuva';
        $collection[$i]->zip_from = '364290';
        $collection[$i]->zip_to = '364295';
    }

    switch (Tools::getValue('condition_name')) {
        case 'weight':
            $collection[0]->$condition_from = '0';
            $collection[0]->$condition_to = '250';
            $collection[0]->price = '34';
            $collection[0]->comment = 'test comment one';

            $collection[1]->$condition_from = '251';
            $collection[1]->$condition_to = '500';
            $collection[1]->price = '40';
            $collection[1]->comment = 'test comment two';

            $collection[2]->$condition_from = '501';
            $collection[2]->$condition_to = '750';
            $collection[2]->price = '45';
            $collection[2]->comment = 'test comment three';
            break;
        case 'price':
            $collection[0]->$condition_from = '0';
            $collection[0]->$condition_to = '100';
            $collection[0]->price = '10';
            $collection[0]->comment = 'test comment one';

            $collection[1]->$condition_from = '101';
            $collection[1]->$condition_to = '200';
            $collection[1]->price = '15';
            $collection[1]->comment = 'test comment two';

            $collection[2]->$condition_from = '201';
            $collection[2]->$condition_to = '300';
            $collection[2]->price = '20';
            $collection[2]->comment = 'test comment three';
            break;
        case 'quantity':
            $collection[0]->$condition_from = '0';
            $collection[0]->$condition_to = '10';
            $collection[0]->price = '20';
            $collection[0]->comment = 'test comment one';

            $collection[1]->$condition_from = '11';
            $collection[1]->$condition_to = '20';
            $collection[1]->price = '25';
            $collection[1]->comment = 'test comment two';

            $collection[2]->$condition_from = '21';
            $collection[2]->$condition_to = '30';
            $collection[2]->price = '30';
            $collection[2]->comment = 'test comment three';
            break;
        case 'volume':
            $collection[0]->$condition_from = '0';
            $collection[0]->$condition_to = '6000';
            $collection[0]->price = '20';
            $collection[0]->comment = 'test comment one';

            $collection[1]->$condition_from = '6001';
            $collection[1]->$condition_to = '12000';
            $collection[1]->price = '25';
            $collection[1]->comment = 'test comment two';

            $collection[2]->$condition_from = '12001';
            $collection[2]->$condition_to = '18000';
            $collection[2]->price = '30';
            $collection[2]->comment = 'test comment three';
            break;
    }

    $csv = new TRSCSV($collection, 'export-'.Tools::getValue('condition_name'), Tools::getValue('csv_separator'));
    $csv->export();
}

die();