<?php

class Payboxca extends PaymentModule
{
    protected $pbx_test_link = null;
    protected $pbx_production_link = null;
    protected $pbx_retour = null;
    protected $pbx_test_info = null;
    protected $ps_url = null;

	public function __construct()
	{
		$this->name = 'payboxca';
		$this->version = '3.4.2';
		$this->author = 'PrestaShop';
		if (version_compare(_PS_VERSION_, '1.4.0.0') >= 0)
				$this->tab = 'payments_gateways';
		else
			$this->tab = 'Payment';
		$this->module_key = 'd965d25320bc491d0b18b37153156556';

		parent::__construct();

		/** Backward compatibility */
		require(_PS_MODULE_DIR_.'/payboxca/backward_compatibility/backward.php');

		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('Paybox Credit Agricole');
		$this->description = $this->l('This payment module for banks using Paybox Credit Agricole allows your customers to pay by Credit Card');
        $this->ps_url = Tools::getCurrentUrlProtocolPrefix().htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__;

        $this->pbx_test_link = "https://preprod-tpeweb.paybox.com/cgi/MYchoix_pagepaiement.cgi";
        $this->pbx_production_link = "https://tpeweb.paybox.com/cgi/MYchoix_pagepaiement.cgi";
        $this->pbx_retour = "m:M;r:R;t:T;a:A;b:B;p:P;c:C;s:S;y:Y;e:E;f:F;g:G;n:N;j:J;i:I;w:W;d:D;k:K";
        $this->pbx_test_info = array(
            "site" => '1999888',
            "rang" => '32',
            "id" => '2',
            "hmac" => '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF'
        );
	}

	public function install()
	{
		return (parent::install() && $this->registerHook('payment') && $this->registerHook('orderConfirmation'));
	}

	public function hookOrderConfirmation($params)
	{
		global $smarty;

		if ($params['objOrder']->module != $this->name)
			return;

		if ($params['objOrder']->valid || $params['objOrder']->current_state == _PS_OS_PAYMENT_)
			$smarty->assign(array('status' => 'ok', 'id_order' => $params['objOrder']->id));
		else
			$smarty->assign('status', 'failed');

		return $this->display(__FILE__, 'hookorderconfirmation.tpl');
	}

	public function getContent()
	{
		$html = '';
		if (Tools::isSubmit('submitPaybox'))
		{
			Configuration::updateValue('PBX_SITE', trim(Tools::getValue('PBX_SITE')));
			Configuration::updateValue('PBX_RANG', trim(Tools::getValue('PBX_RANG')));
			Configuration::updateValue('PBX_ID', trim(Tools::getValue('PBX_ID')));
			Configuration::updateValue('PBX_DEMO_MODE', (int)Tools::getValue('demo_mode'));
			Configuration::updateValue('PBX_HMAC', trim(Tools::getValue('PBX_HMAC')));
			$html .= $this->displayConfirmation($this->l(' Configuration updated'));
		}
		if (Tools::isSubmit('submitPaybox2'))
		{
			Configuration::updateValue('PBX_3X', Tools::getValue('PBX_3X'));
			Configuration::updateValue('PBX_DELAY', Tools::getValue('PBX_DELAY'));
			$html .= $this->displayConfirmation($this->l(' Options updated'));
		}

		$html .= '<h2>'.$this->displayName.'</h2>
		<div class="clear masked_field">&nbsp;</div>
		<form action="'.htmlentities($_SERVER['REQUEST_URI']).'" method="post">
		<fieldset><legend>'.$this->l('Settings').'</legend>
			<label class="masked_field">'.$this->l('Site number (TPE)').'</label>
			<div class="margin-form masked_field">
				<input type="text" name="PBX_SITE" value="'.Tools::getValue('PBX_SITE', Configuration::get('PBX_SITE')).'" />
			</div>
			<div class="clear masked_field">&nbsp;</div>
			<label class="masked_field">'.$this->l('Rang (2 digits)').'</label>
			<div class="margin-form masked_field">
				<td><input type="text" name="PBX_RANG" value="'.Tools::getValue('PBX_RANG', Configuration::get('PBX_RANG')).'" />
			</div>
			<div class="clear masked_field">&nbsp;</div>
			<label class="masked_field">'.$this->l('Paybox ID').'</label>
			<div class="margin-form masked_field">
				<input type="text" name="PBX_ID" value="'.Tools::getValue('PBX_ID', Configuration::get('PBX_ID')).'" />
			</div>
			<div class="clear masked_field">&nbsp;</div>
			<label>'.$this->l('HMAC Key').'</label>
			<div class="margin-form">
				<input type="text" name="PBX_HMAC" size="100" value="'.Tools::getValue('PBX_HMAC', Configuration::get('PBX_HMAC')).'" />
			</div>
			<div class="clear">&nbsp;</div>
			<div class="margin-form">
				<input type="radio" id="test_mode" name="demo_mode" value="0" style="vertical-align: middle;" '.(!Tools::getValue('demo_mode', Configuration::get('PBX_DEMO_MODE')) ? 'checked="checked"' : '').' />
				<b><span style="color: #900;">'.$this->l('Test').'</span></b>&nbsp;
				<input type="radio"id="production_mode" name="demo_mode" value="1" style="vertical-align: middle;" '.(Tools::getValue('demo_mode', Configuration::get('PBX_DEMO_MODE')) ? 'checked="checked"' : '').' />
				<b><span style="color: #080;">'.$this->l('Production').'</span></b><br /><br />
				'.$this->l('URL of the merchand test account backoffice : https://preprod-admin.paybox.com/').'<br />
				'.$this->l('The username and password are the same that for your production account.').'<br /><br />
				'.$this->l('Here are the test informations you have to use on test mode :').'<br />
				'.$this->l('Site Number (TPE)          1999888').'<br />
				'.$this->l('Rang       32').'<br />
				'.$this->l('Paybox ID   2').'<br /><br />
				<b><span style="color: #900;">'.$this->l('Before moving paybox into production mode, you must first set your Paybox account into production mode otherwise you will get a payment error.').'</span></b>
			</div>

			<div class="margin-form">
				<input class="button" name="submitPaybox" value="'.$this->l('Update settings').'" type="submit" />
			</div>
		</form>
		</fieldset>
		<div class="clear">&nbsp;</div>
		<fieldset>
			<legend>PrestaShop Addons</legend>
			<b>'.$this->l('Thank you for choosing a module developed by the Addons Team of PrestaShop.').'</a></b><br /><br />
			'.$this->l('If you encounter a problem using the module, our team is at your service via the ').' <a href="http://addons.prestashop.com/contact-form.php">'.$this->l('contact form').'</a>.

		</fieldset>';

		return $html;
	}

	public function loadKey($keyfile, $pub=true, $pass='')
	{
		$keyfile = dirname(__FILE__).'/pubkey.pem';
		$fpk = $filedata = $key = false;                         // initialisation variables
		$fsize =  filesize( $keyfile );                         // taille du fichier
		if( !$fsize ) return false;                             // si erreur on quitte de suite
		$fpk = fopen( $keyfile, 'r' );                           // ouverture fichier
		if( !$fpk ) return false;                                // si erreur ouverture on quitte
		$filedata = fread( $fpk, $fsize );                       // lecture contenu fichier
		fclose( $fpk );                                          // fermeture fichier
		if( !$filedata ) return false;                          // si erreur lecture, on quitte
		if( $pub )
			$key = openssl_pkey_get_public( $filedata );        // recuperation de la cle publique
		else                                                    // ou recuperation de la cle privee
			$key = openssl_pkey_get_private( array( $filedata, $pass ));
		return $key;                                            // renvoi cle ( ou erreur )
	}

	// comme precise la documentation Paybox, la signature doit �tre
	// obligatoirement en derni�re position pour que cela fonctionne

	public function GetSignedData( $qrystr, &$data, &$sig, $url )      // renvoi les donnes signees et la signature
	{
		$pos = strrpos( $qrystr, '&' );                         // cherche dernier separateur
		$data = substr( $qrystr, 0, $pos );                     // et voila les donnees signees
		$pos= strpos( $qrystr, '=', $pos ) + 1;                 // cherche debut valeur signature
		$sig = substr( $qrystr, $pos );                         // et voila la signature
		if( $url ) $sig = urldecode( $sig );                    // decodage signature url
		$sig = base64_decode( $sig );                           // decodage signature base 64
	}

	// $querystring = chaine enti�re retourn�e par Paybox lors du retour au site (m�thode GET)
	// $keyfile = chemin d'acc�s complet au fichier de la cl� publique Paybox

	public function PbxVerSign( $qrystr, $keyfile, $url )             // verification signature Paybox
	{
		$key = self::loadKey($keyfile);                             // chargement de la cle
		if( !$key ) return -1;                                  // si erreur chargement cle
		//  penser � openssl_error_string() pour diagnostic openssl si erreur
		self::GetSignedData( $qrystr, $data, $sig, $url );            // separation et recuperation signature et donnees
		return openssl_verify( $data, $sig, $key );             // verification : 1 si valide, 0 si invalide, -1 si erreur
	}

    /**
     * @param $params
     * @return bool|mixed|string
     */
    public function hookPayment($params)
    {
        global $cart, $smarty;

        $msg = '';
        $hash = 'SHA512';
        $pbx_ipn =	$this->ps_url.'modules/'.$this->name.'/validation.php';
        $pbx_total = (int)($cart->getOrderTotal()* 100);

        $pbx_hmac = Configuration::get('PBX_HMAC');
        if (empty($pbx_hmac) || $this->pbx_test_info['hmac'] == $pbx_hmac)
            $key_test = $this->pbx_test_info['hmac'];
        else
            $key_test = $pbx_hmac;

        $customer = new Customer((int)$cart->id_customer);
        if (!Validate::isLoadedObject($customer))
            die(Tools::displayError());

        $pbx_retour_url = $this->getPayboxRetourUrl($customer);
        $currency = new Currency((int)$cart->id_currency);
        $pbx_devise = $currency->iso_code_num;
        $date = date('c');
        $lang = $this->getLang();
        // Create the HMAC string
        $bin_key = pack('H*', $key_test);

        $msg .= $this->getModeMsg();
        $msg .= '&PBX_TOTAL='.intval($pbx_total);
        $msg .= '&PBX_DEVISE='.$pbx_devise;
        $msg .= '&PBX_CMD='.(int)$cart->id;
        $msg .= '&PBX_PORTEUR='.$customer->email;
        $msg .= '&PBX_RETOUR='.$this->pbx_retour;
        $msg .= '&PBX_HASH='.$hash;
        $msg .= '&PBX_TIME='.$date;
        $msg .= '&PBX_LANGUE='.$lang;
        $msg .= '&PBX_ANNULE='.$pbx_retour_url['cancel'];
        $msg .= '&PBX_EFFECTUE='.$pbx_retour_url['confirm'];
        $msg .= '&PBX_REFUSE='.$pbx_retour_url['confirm'];
        $msg .= '&PBX_REPONDRE_A='.$pbx_ipn;
        $hmac = Tools::strtoupper(hash_hmac('sha512', $msg, $bin_key));

        $this->assignModeVars();

        $smarty->assign(array(
            'PBX_TOTAL' => intval($pbx_total),
            'PBX_DEVISE' => $pbx_devise,
            'PBX_CMD' => (int)$cart->id,
            'PBX_PORTEUR' => $customer->email,
            'PBX_RETOUR' => $this->pbx_retour,
            'PBX_HASH' => $hash,
            'PBX_TIME' => $date,
            'PBX_LANGUE' => $lang,
            'PBX_ANNULE' => $pbx_retour_url['cancel'],
            'PBX_EFFECTUE' => $pbx_retour_url['confirm'],
            'PBX_REFUSE' => $pbx_retour_url['confirm'],
            'PBX_REPONDRE_A' => $pbx_ipn,
            'PBX_HMAC' => $hmac,
            'pbx_picture' => 'payboxca',
            'pbx_text' => $this->l('Pay by credit card with Paybox')
        ));
        return $this->display(__FILE__, '/hookpayment.tpl');
    }

    /**
     *
     */
    public function assignModeVars()
    {
        global $smarty;
        $pbx_hmac = Configuration::get('PBX_HMAC');
        $pbx_demo_mode = Configuration::get('PBX_DEMO_MODE');

        // Test mode
        if ((int)$pbx_demo_mode == 0)
        {
            if ($pbx_hmac == $this->pbx_test_info['hmac'] || empty($pbx_hmac))
            {
                $smarty->assign(array(
                    'PBX_PAYBOX' => $this->pbx_test_link,
                    'PBX_SITE' => $this->pbx_test_info['site'],
                    'PBX_RANG' => $this->pbx_test_info['rang'],
                    'PBX_IDENTIFIANT' => $this->pbx_test_info['id'],
                    'pbx_link' => $this->pbx_test_link
                ));
            }
            else
            {
                $smarty->assign(array(
                    'PBX_PAYBOX' => $this->pbx_test_link,
                    'PBX_SITE' => Configuration::get('PBX_SITE'),
                    'PBX_RANG' => Configuration::get('PBX_RANG'),
                    'PBX_IDENTIFIANT' => Configuration::get('PBX_ID'),
                    'pbx_link' => $this->pbx_test_link
                ));
            }
        }
        // Production mode
        else
        {
            $smarty->assign(array(
                'PBX_PAYBOX' => $this->pbx_production_link,
                'PBX_SITE' => Configuration::get('PBX_SITE'),
                'PBX_RANG' => Configuration::get('PBX_RANG'),
                'PBX_IDENTIFIANT' => Configuration::get('PBX_ID'),
                'pbx_link' => $this->pbx_production_link
            ));
        }
    }

    /**
     * @return string
     */
    public function getModeMsg()
    {
        $msg = '';
        $pbx_hmac = Configuration::get('PBX_HMAC');
        $pbx_demo_mode = Configuration::get('PBX_DEMO_MODE');

        // Test mode
        if ((int)$pbx_demo_mode == 0)
        {
            if ($pbx_hmac == $this->pbx_test_info['hmac'] || empty($pbx_hmac))
            {
                $msg = 'PBX_SITE='.$this->pbx_test_info['site'];
                $msg .= '&PBX_RANG='.$this->pbx_test_info['rang'];
                $msg .= '&PBX_IDENTIFIANT='.$this->pbx_test_info['id'];
            }
            else
            {
                $msg = 'PBX_SITE='.Configuration::get('PBX_SITE');
                $msg .= '&PBX_RANG='.Configuration::get('PBX_RANG');
                $msg .= '&PBX_IDENTIFIANT='.Configuration::get('PBX_ID');
            }
        }
        // Production mode
        else
        {
            $msg = 'PBX_SITE='.Configuration::get('PBX_SITE');
            $msg .= '&PBX_RANG='.Configuration::get('PBX_RANG');
            $msg .= '&PBX_IDENTIFIANT='.Configuration::get('PBX_ID');
        }
        return $msg;
    }

    public function getLang()
    {
        global $cart;
        $pbx_langue = '';
        $language = new Language((int)$cart->id_lang);
        switch ($language->iso_code)
        {
            case 'fr':
                $pbx_langue = 'FRA';
                break;
            case 'es':
                $pbx_langue = 'ESP';
                break;
            case 'de':
                $pbx_langue = 'DEU';
                break;
            case 'it':
                $pbx_langue = 'ITA';
                break;
            case 'nl':
                $pbx_langue = 'NLD';
                break;
            case 'sv':
                $pbx_langue = 'SWE';
                break;
            case 'en-us':
            default:
                $pbx_langue = 'GBR';
                break;
        }
        unset($language);
        return $pbx_langue;
    }

    /**
     * @param $customer
     * @return array
     */
    public function getPayboxRetourUrl($customer)
    {
        global $cart;
        $retourUrls = array();

        if (version_compare(_PS_VERSION_, '1.5', '>'))
        {
            $retourUrls['confirm'] = $this->ps_url.'index.php?controller=order-confirmation?id_cart='.(int)$cart->id.'&id_module='.(int)$this->id.'&key='.$customer->secure_key;
            $retourUrls['cancel'] = $this->ps_url.'index.php?controller=order';
        }
        else
        {
            $retourUrls['confirm'] = $this->ps_url.'order-confirmation.php?id_cart='.(int)$cart->id.'&id_module='.(int)$this->id.'&key='.$customer->secure_key;
            $retourUrls['cancel'] = $this->ps_url.'order.php?step=3';
        }
        return $retourUrls;
    }

}