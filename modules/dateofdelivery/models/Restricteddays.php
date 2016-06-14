<?php
/**
 * NOTICE OF LICENSE
 * 
 * A friendly notice to thank you for been honest.
 * The plugin has to be used only if purchased from https://addons.prestashop.com or directly from developer
 * Reselling, sharing or using the same licence for multiple shops is prohibited 
 * 
 *  @author    Radu G.
 *  @copyright ecommy.com
 *  @license   https://www.ecommy.com/licence.txt
 */

class Restricteddays extends AppModel
{

	public $id;
	public $table = 'restricteddays';

	public function getData($options = null)
	{
		return parent::getData(array('order' => '`month`, `day`'));
	}

}
