<?php
/**
 * SmartBlog
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the OSL-3.0
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @author    SmartSataSoft
 * @copyright SmartSataSoft
 * @license   Open Software License v. 3.0 (OSL-3.0)
 */

session_start();
require_once(dirname(__FILE__).'../../../config/config.inc.php');
require_once(dirname(__FILE__).'../../../init.php');
require_once(_PS_MODULE_DIR_.'smartblog/smartblog.php');
switch (Tools::getValue('action'))
{
	case 'postcomment' :
		posts();
		break;
	default:
		exit;
}
exit;

function posts()
{
	$smart_blog_post = new SmartBlogPost();
	$smart_blog = new SmartBlog();

	$array_error = array();

	$id_lang = (int)Context::getContext()->language->id;
	$id_post = Tools::getValue('id_post');
	$post = $smart_blog_post->getPost($id_post, $id_lang);
	if ($post['comment_status'] == 1)
	{
		$name = Tools::getValue('name');
		$comment = Tools::getValue('comment');
		$mail = Tools::getValue('mail');
		$captcha = Tools::getvalue('smartblogcaptcha');
		$m_captcha = $_SESSION['ssmartblogcaptcha'];
		if (Tools::getValue('website') == '')
			$website = '#';
		else
			$website = Tools::getValue('website');

		$id_parent_post = (int)Tools::getValue('id_parent_post');
		//'name'=>'Name between 2 - 25 characters !',
		if (empty($name))
			$array_error['name'] = $smart_blog->l('Name is required');
		if (empty($comment))
			$array_error['comment'] = $smart_blog->l('Comment must be between 25 and 1500 characters!');
		if (! filter_var($mail, FILTER_VALIDATE_EMAIL))
			$array_error['mail'] = $smart_blog->l('E-mail address not valid !');
		if (Configuration::get('smartcaptchaoption') == '1')
			if ($captcha != $m_captcha)
				$array_error['captcha'] = $smart_blog->l('Captcha is not valid');

		if (is_array($array_error) && count($array_error))
		{
			$array_error['common'] = $smart_blog->l('Warning: Please check required form bellow!');
			die(Tools::jsonEncode(array('error' => $array_error)));
		}
		else
		{
			$array_success = array();

			$comments = array();
			$comments['name'] = $name;
			$comments['mail'] = $mail;
			$comments['comment'] = $comment;
			$comments['website'] = $website;
			if (! $id_parent_post = Tools::getvalue('comment_parent'))
				$id_parent_post = 0;
			$value = Configuration::get('smartacceptcomment');
			if (Configuration::get('smartacceptcomment') != '' && Configuration::get('smartacceptcomment') != null)
				$value = Configuration::get('smartacceptcomment');
			else
				$value = 0;
			$bc = new Blogcomment();
			$bc->id_post = (int)$id_post;
			$bc->name = $name;
			$bc->email = $mail;
			$bc->content = $comment;
			$bc->website = $website;
			$bc->id_parent = (int)$id_parent_post;
			$bc->active = (int)$value;
			$bc->created = Date('y-m-d H:i:s');
			if ($bc->add())
			{
				$array_success['common'] = $smart_blog->l('Your comment successfully submitted.');
				$array_success['success'] = $smart_blog->l('Your comment successfully submitted');
				Hook::exec('actionsbpostcomment', array('bc' => $bc));

				die(Tools::jsonEncode($array_success));

			}
		}
	}

}

function smartsendMail($sname, $semail_addr, $scomment, $slink = null)
{
	$name = Tools::stripslashes($sname);
	$e_body = 'You have Received a New Comment In Your Blog Post From '.$name.'. Comment: '.$scomment.' .Your Can reply Here : '.$slink.'';
	$email_addr = Tools::stripslashes($semail_addr);
	//$comment = Tools::stripslashes($scomment);
	$subject = 'New Comment Posted';
	$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
	$to = Configuration::get('PS_SHOP_EMAIL');
	/*
	$contactMessage = "
        				$comment 
        				Name: $name
        				IP: ".((version_compare(_PS_VERSION_, '1.3.0.0', '<')) ? $_SERVER['REMOTE_ADDR'] : Tools::getRemoteAddr());
	*/
	if (Mail::Send($id_lang, 'contact', $subject, array('{message}' => nl2br($e_body), '{email}' => $email_addr,), $to, null, $email_addr, $name)) return true;
}

?>