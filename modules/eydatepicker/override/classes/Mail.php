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



class Mail extends MailCore

{

	public static function Send($id_lang, $template, $subject, $template_vars, $to, $to_name = null, $from = null, $from_name = null, $file_attachment = null, $mode_smtp = null, $template_path = _PS_MAIL_DIR_, $die = false, $id_shop = null)

	{

		switch ($template)

		{

			case 'order_conf':

			case 'cliente':

			case 'new_order':

				$cart_id = (int)Context::getContext()->cart->id;



				require_once(realpath(dirname(__FILE__).'/../../modules/eydatepicker/models/AppModel.php'));

				$delivery_info = AppModel::loadModel('Deliveryinf');

				$delivery_info = $delivery_info->getDeliveryInfoByCartId($cart_id);



				if (!empty($delivery_info))

				{

					$template_vars['{ey_date}'] = date(Context::getContext()->language->date_format_lite, strtotime($delivery_info['shipping_date']));

					$template_vars['{ey_hour}'] = $delivery_info['shipping_hour'];

				} 

				else

				{

					$template_vars['{ey_date}'] = '';

					$template_vars['{ey_hour}'] = '';

				}

				break;

		}

		return parent::Send($id_lang, $template, $subject, $template_vars, $to, $to_name, $from, $from_name, $file_attachment, $mode_smtp, $template_path, $die, $id_shop);

	}



}

