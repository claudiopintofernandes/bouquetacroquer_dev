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

ini_set('max_execution_time', 0);

/**
 * Class CarrierTableRate
 */
class CarrierTableRate extends ObjectModel
{
    public $id_shop;

    public $id_carrier;

    public $id_zone;

    public $id_country;

    public $id_state;

    public $dest_city;

    public $dest_zip_from;

    public $dest_zip_to;

    public $condition_name;

    public $condition_value_from;

    public $condition_value_to;

    public $price;

    public $cost;

    public $comment;

    public static $error_message = array(
        'id_carrier' => 'Invalid `Carrier Id`',
        'id_zone' => 'Invalid `Zone`',
        'id_country' => 'Invalid `Country`',
        'id_state' => 'Invalid `State`',
        'dest_city' => 'Invalid `City`',
        'dest_zip_from' => 'Invalid `Zip/Post code from`',
        'dest_zip_to' => 'Invalid `Zip/Post code to`',
        'condition_name' => 'Invalid `Condition`',
        'price' => 'Invalid `Price`',
        'comment' => 'Invalid `Comment`',
        'dest_zip_from_less_then_dest_zip_to' => '`Zip/Post code from` should be less than `Zip/Post code to`',
        'condition_value_from_less_than_condition_value_to' => '`%s` should be less than `%s`',
        'no_range_if_wildcard' => 'You cannot specify range if wildcard is used in zip/post code',
        'csv_invalid_format' => 'CSV not properly formatted, please check sample CSV for exact format',
        'no_records_found' => 'No records found',
        'total_records_success_error' => 'Total Records: `%d`, success: `%d`, error: `%d`',
        'please_select_carrier' => 'Please select carrier'
    );

    public static $definition = array(
        'table' => 'carrier_table_rate',
        'primary' => 'id_carrier_table_rate',
        'multishop' => true,
        'fields' => array(
            'id_carrier' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_zone' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_country' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'id_state' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'dest_city' => array('type' => self::TYPE_STRING, 'validate' => 'isCityName', 'size' => 64),
            'dest_zip_from' => array('type' => self::TYPE_STRING, 'size' => 12),
            'dest_zip_to' => array('type' => self::TYPE_STRING, 'size' => 12),
            'condition_name' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isGenericName',
                'values' =>
                    array('weight', 'price', 'quantity', 'volume'),
                'default' => 'weight'
            ),
            'condition_value_from' => array('type' => self::TYPE_FLOAT),
            'condition_value_to' => array('type' => self::TYPE_FLOAT),
            'price' => array('type' => self::TYPE_STRING, 'size' => 255),
            'cost' => array('type' => self::TYPE_FLOAT),
            'comment' => array('type' => self::TYPE_STRING, 'size' => 255)
        )
    );

    public function validateFields($die = true, $error_return = false)
    {
        $message = parent::validateFields($die, $error_return);

        if ($message != 1) {
            foreach (CarrierTableRate::$definition['fields'] as $field_name => $field_rules) {
                if (array_key_exists('validate', $field_rules)) {
                    preg_match('/->'.$field_name.' /', $message, $matches);

                    if (count($matches) != 0) {
                        return CarrierTableRate::$error_message[$field_name];
                    }
                }
            }
        }

        if ($this->id_zone != '') {
            if (!($zone = new Zone($this->id_zone)) || !Validate::isLoadedObject($zone)) {
                return CarrierTableRate::$error_message['id_zone'];
            } else {
                if ($this->id_country != '') {
                    if (!($country = new Country($this->id_country)) || !Validate::isLoadedObject($country)) {
                        return CarrierTableRate::$error_message['id_country'];
                    }

                    if ($this->id_state != '' && (!($state = new State($this->id_state)) || !Validate::isLoadedObject($state)
                            || $state->id_country != $this->id_country)
                    ) {
                        return CarrierTableRate::$error_message['id_state'];
                    }

                    if ($this->dest_zip_from != '' && $country->zip_code_format
                        && !$this->checkZipCode($this->dest_zip_from, $country->zip_code_format, $country->iso_code)
                    ) {
                        return CarrierTableRate::$error_message['dest_zip_from'];
                    }

                    if ($this->dest_zip_to != '' && $country->zip_code_format
                        && !$this->checkZipCode($this->dest_zip_to, $country->zip_code_format, $country->iso_code)
                    ) {
                        return CarrierTableRate::$error_message['dest_zip_to'];
                    }
                } else {
                    if ($this->id_state != '') {
                        return CarrierTableRate::$error_message['id_state'];
                    }
                }
            }
        }

        if ($this->dest_zip_from != '' && $this->dest_zip_to != '' && $this->dest_zip_to < $this->dest_zip_from) {
            return CarrierTableRate::$error_message['dest_zip_from_less_then_dest_zip_to'];
        }

        if ($this->dest_zip_from != '' && $this->dest_zip_to != ''
            && (strpos($this->dest_zip_from, '*') != false || strpos($this->dest_zip_to, '*') != false)
        ) {
            return CarrierTableRate::$error_message['no_range_if_wildcard'];
        }

        if ($this->condition_value_to < $this->condition_value_from) {
            return CarrierTableRate::$error_message['condition_value_from_less_than_condition_value_to'];
        }

        $carrier_ids = unserialize(Configuration::get('TABLERATESHIPPING_CARRIER_ID'));

        if (!in_array($this->id_carrier, $carrier_ids)) {
            return CarrierTableRate::$error_message['please_select_carrier'];
        }

        $eqparser = new EqParser();

        $vars = array(
            'tw' => 0,
            'tp' => 0,
            'tq' => 0,
            'tv' => 0,
            'cv' => 0,
            'cvf' => 0,
            'cvt' => 0,
            'cvi' => 0,
            // 'c' is depricated use 'cvi' instead
            'c' => 0
        );

        try {
            $eqparser->solveIF($this->price, $vars);
        } catch (Exception $e) {
            return CarrierTableRate::$error_message['price'];
        }

        return $message;
    }

    public function checkZipCode($zip_code, $zip_code_format, $iso_code)
    {
        $iso_code_wildcard = preg_replace('/./i', '\*', $iso_code);

        $zip_regexp = '/^'.$zip_code_format.'$/ui';
        $zip_regexp = str_replace(' ', '( |)', $zip_regexp);
        $zip_regexp = str_replace('-', '(-|)', $zip_regexp);
        $zip_regexp = str_replace('N', '[0-9*]', $zip_regexp);
        $zip_regexp = str_replace('L', '[a-zA-Z*]', $zip_regexp);
        $zip_regexp = str_replace('C', '(('.$iso_code.')|('.$iso_code_wildcard.'))', $zip_regexp);

        return (bool)preg_match($zip_regexp, $zip_code);
    }

    public static function getNumRows($id_carrier = null, $condition_name = '')
    {
        $sql = new DbQuery();
        $sql->select('count(id_carrier_table_rate) as total');
        $sql->from('carrier_table_rate');

        if ($condition_name != '') {
            $sql->where('condition_name = "'.$condition_name.'"');
        }

        if ($id_carrier != null) {
            $sql->where('id_carrier="'.$id_carrier.'"');
        }

        $result = Db::getInstance()->executeS($sql);

        return $result[0]['total'];
    }

    public function getTableRates(
        $id_lang = null,
        $id_carrier = null,
        $condition_name = '',
        $limit = false,
        $offset = 0,
        $row_count = 10,
        $orderby = '',
        $order = ''
    ) {
        $sql = new DbQuery();
        $sql->select('ct.id_carrier_table_rate, ct.id_carrier, ct.id_zone, ct.id_country, ct.id_state, c.iso_code as c_iso_code, z.name as zone,
			cl.name as country, s.name as state, s.iso_code as s_iso_code, ct.dest_city, ct.dest_zip_from, ct.dest_zip_to, ct.condition_value_from, 
			ct.condition_value_to, ct.price, ct.comment');
        $sql->from('carrier_table_rate', 'ct');
        $sql->leftJoin('zone', 'z', 'ct.id_zone = z.id_zone');
        $sql->leftJoin('country', 'c', 'ct.id_country = c.id_country');
        $sql->leftJoin('country_lang', 'cl', 'ct.id_country = cl.id_country AND cl.id_lang = '.(int)$id_lang);
        $sql->leftJoin('state', 's', 'ct.id_state = s.id_state');

        if ($limit) {
            $sql->limit($offset, $row_count);
        }

        if ($orderby != '') {
            $sql->orderBy(trim($orderby.' '.$order));
        }

        if ($id_carrier != null) {
            $sql->where('ct.id_carrier="'.$id_carrier.'"');
        }

        if ($condition_name != '') {
            $sql->where('ct.condition_name="'.$condition_name.'"');
        }

        $cache_id = 'CarrierTableRate::getTableRates_'.md5($sql);

        if (!Cache::isStored($cache_id)) {
            $table_rates = Db::getInstance()->executeS($sql);
            Cache::store($cache_id, $table_rates);
        }

        return Cache::retrieve($cache_id);
    }

    public function getTableRate($id_carrier_table_rate = null, $id_lang = null)
    {
        if ($id_carrier_table_rate == null) {
            return false;
        }

        $sql = new DbQuery();
        $sql->select('ct.id_carrier_table_rate, ct.id_carrier, ct.id_zone, ct.id_country, ct.id_state, c.iso_code as c_iso_code, z.name as zone,
			cl.name as country, s.name as state, s.iso_code as s_iso_code, ct.dest_city, ct.dest_zip_from, ct.dest_zip_to, ct.condition_value_from, 
			ct.condition_value_to, ct.price, ct.comment');
        $sql->from('carrier_table_rate', 'ct');
        $sql->leftJoin('zone', 'z', 'ct.id_zone = z.id_zone');
        $sql->leftJoin('country', 'c', 'ct.id_country = c.id_country');
        $sql->leftJoin('country_lang', 'cl', 'ct.id_country = cl.id_country AND cl.id_lang = '.(int)$id_lang);
        $sql->leftJoin('state', 's', 'ct.id_state = s.id_state');
        $sql->where('ct.id_carrier_table_rate="'.$id_carrier_table_rate.'"');

        $table_rate = Db::getInstance()->executeS($sql);

        return $table_rate[0];
    }

    public static function setCarrierForTableRate($carrier_id = array(), $module_name = '')
    {
        if ($module_name == '') {
            return false;
        }

        CarrierTableRate::clearCarrierFromTableRate($module_name);

        if (is_array($carrier_id) && count($carrier_id) > 0) {
            Db::getInstance()->update('carrier', array(
                'is_module' => 1,
                'shipping_external' => 1,
                'need_range' => 1,
                'external_module_name' => $module_name
            ), 'id_carrier IN ('.implode(',', $carrier_id).')');
        }
    }

    public static function updateIdCarrier($old_id_carrier = null, $new_id_carrier = null)
    {
        Db::getInstance()->update('carrier_table_rate', array(
            'id_carrier' => $new_id_carrier
        ), 'id_carrier = "'.$old_id_carrier.'"');
    }

    public static function clearCarrierFromTableRate($module_name = '')
    {
        Db::getInstance()->update('carrier', array(
            'is_module' => 0,
            'shipping_external' => 0,
            'need_range' => 0,
            'external_module_name' => ''
        ), 'external_module_name = "'.$module_name.'"');
    }

    public static function getShippingPrice(
        $id_carrier = null,
        $zone_id,
        $country_id,
        $state_id,
        $city,
        $zip,
        $condition_name,
        $condition_value
    ) {
        $zip = str_replace('-', '', str_replace(' ', '', $zip));

        $sql = new DbQuery();
        $sql->select('condition_value_from, condition_value_to, price');
        $sql->from('carrier_table_rate');
        $sql->where('
			condition_name = "'.$condition_name.'" AND
			(id_zone = "'.$zone_id.'" OR id_zone = "0") AND
			(id_country = "'.$country_id.'" OR id_country = "0") AND
			(id_state = "'.$state_id.'" OR id_state = "0") AND
			(dest_city = "'.$city.'" OR dest_city = "") AND
			(
			(dest_zip_from = "" AND
			dest_zip_to = "")
			OR
			(dest_zip_from = "" AND
			"'.$zip.'" LIKE REPLACE(REPLACE(REPLACE(dest_zip_to, "*", "_"), " ", ""), "-", ""))
			OR
			("'.$zip.'" LIKE REPLACE(REPLACE(REPLACE(dest_zip_from, "*", "_"), " ", ""), "-", "") AND
			dest_zip_to = "")
			OR
			(dest_zip_from != "" AND
			dest_zip_to != "" AND
			REPLACE(REPLACE(dest_zip_from, " ", ""), "-", "") <= "'.$zip.'" AND
			REPLACE(REPLACE(dest_zip_to, " ", ""), "-", "") >= "'.$zip.'")
			) AND 
			(condition_value_from <= "'.$condition_value.'" AND 
			condition_value_to >= "'.$condition_value.'")');

        if ($id_carrier != null) {
            $sql->where('id_carrier="'.$id_carrier.'"');
        }

        $prices = Db::getInstance()->executeS($sql);

        if (!empty($prices) && isset($prices[0]['price'])) {
            return $prices[0];
        } else {
            return false;
        }
    }

    public static function bulkDelete(
        $id_carrier_table_rate = array(),
        $delete_all = false,
        $id_carrier = null,
        $condition_name = ''
    ) {
        if ($delete_all) {
            if ($condition_name == '' || $id_carrier == null) {
                return false;
            } else {
                return Db::getInstance()->delete('carrier_table_rate',
                    'id_carrier = "'.$id_carrier.'" AND condition_name = "'.$condition_name.'"');
            }
        } else {
            if (!is_array($id_carrier_table_rate) || count($id_carrier_table_rate) == 0) {
                return false;
            } else {
                return Db::getInstance()->delete('carrier_table_rate',
                    'id_carrier_table_rate IN ('.implode(',', $id_carrier_table_rate).')');
            }
        }
    }

    public static function deleteUnwanted($not_ids_carrier = array())
    {
        if (!is_array($not_ids_carrier) || count($not_ids_carrier) == 0) {
            Db::getInstance()->delete('carrier_table_rate');
        } else {
            Db::getInstance()->delete('carrier_table_rate',
                'id_carrier NOT IN ('.implode(',', $not_ids_carrier).')');
        }
    }

    public static function importCSV($file = '', $file_separator = ',', $id_carrier = null, $condition_name = 'Weight')
    {
        if ($file == '' || $id_carrier == null) {
            return false;
        }

        $save_success = 0;
        $save_error = 0;
        $msg = '';
        $first_record = true;

        if (($handle = fopen($file, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, $file_separator)) !== false) {
                if ($first_record) {
                    if (count($data) != 10 || $data[0] != 'zone' || $data[1] != 'country' || $data[2] != 'state'
                        || $data[3] != 'city' || $data[4] != 'zip_from' || $data[5] != 'zip_to'
                        || $data[6] != Tools::strtolower($condition_name.'_from')
                        || $data[7] != Tools::strtolower($condition_name.'_to')
                        || $data[8] != 'price' || $data[9] != 'comment'
                    ) {
                        return array(
                            'status' => 0,
                            'msg' => CarrierTableRate::$error_message['csv_invalid_format']
                        );
                    }

                    $first_record = false;

                    continue;
                }

                $table_rate_shipping = new CarrierTableRate();
                $table_rate_shipping->id_carrier = $id_carrier;
                $table_rate_shipping->id_zone = (($data[0] == '*') ? '' : Zone::getIdByName($data[0]));
                $table_rate_shipping->id_country = (($data[1] == '*') ? '' : Country::getByIso($data[1]));
                $table_rate_shipping->id_state = (($data[2] == '*') ? '' : State::getIdByIso($data[2],
                    $table_rate_shipping->id_country));
                $table_rate_shipping->dest_city = (($data[3] == '*') ? '' : $data[3]);
                $table_rate_shipping->dest_zip_from = (($data[4] == '*') ? '' : $data[4]);
                $table_rate_shipping->dest_zip_to = (($data[5] == '*') ? '' : $data[5]);
                $table_rate_shipping->condition_name = $condition_name;
                $table_rate_shipping->condition_value_from = $data[6];
                $table_rate_shipping->condition_value_to = $data[7];
                $table_rate_shipping->price = $data[8];
                $table_rate_shipping->comment = $data[9];

                $valid_fields = $table_rate_shipping->validateFields(false, true);

                if ($valid_fields == 1) {
                    try {
                        $table_rate_shipping->save();
                        $save_success++;
                    } catch (Exception $e) {
                        $save_error++;
                    }
                } else {
                    $save_error++;
                }
            }

            fclose($handle);
        }

        if (($save_success + $save_error) == 0) {
            $status = 0;
            $msg = CarrierTableRate::$error_message['no_records_found'];
        } else {
            if ($save_success == 0) {
                $status = 0;
            } else {
                if ($save_error == 0) {
                    $status = 1;
                } else {
                    $status = 2;
                }
            }

            $msg = sprintf(CarrierTableRate::$error_message['total_records_success_error'],
                $save_success + $save_error, $save_success, $save_error);
        }

        return array(
            'status' => $status,
            'msg' => $msg
        );
    }
}