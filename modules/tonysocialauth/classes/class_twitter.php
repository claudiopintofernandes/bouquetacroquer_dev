<?php
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

class Twitter
{
	var $m_connection;

	public function __construct($oauth_token = null, $oauth_token_secret = null)
	{
		$this->m_connection = new TwitterOAuth(Configuration::get('tonysocialauth_TW_APP_KEY'), Configuration::get('tonysocialauth_TW_APP_SECRET'), $oauth_token, $oauth_token_secret);
	}

	public function isAuth()
	{
		$context = Context::getContext();
		$cookie = & $context->cookie;

		$this->tonysocialauth_tw_access_token = unserialize($cookie->tonysocialauth_tw_access_token);

		if (empty($this->tonysocialauth_tw_access_token) || empty($this->tonysocialauth_tw_access_token['oauth_token']) || empty($this->tonysocialauth_tw_access_token['oauth_token_secret'])) return false;
		else
			return true;
	}

	public function getAuthLink()
	{
		$context = Context::getContext();
		$cookie = & $context->cookie;

		$request_token = $this->m_connection->getRequestToken(Tools::getHttpHost(true, true).__PS_BASE_URI__);

		if ($this->m_connection->http_code == 200)
		{
			$cookie->tonysocialauth_oauth_token = $token = $request_token['oauth_token'];
			$cookie->tonysocialauth_oauth_secret = $request_token['oauth_token_secret'];
			$cookie->write();

			$url = $this->m_connection->getAuthorizeURL($token);
			return $url;
		}
		else
			return false;
	}

	public function verifyCallback()
	{
		$context = Context::getContext();
		$cookie = & $context->cookie;

		$access_token = $this->m_connection->getAccessToken($_REQUEST['oauth_verifier']);
		$cookie->tonysocialauth_tw_access_token = serialize($access_token);

		unset($cookie->tonysocialauth_oauth_token);
		unset($cookie->tonysocialauth_oauth_secret);
		$cookie->write();
	}

	public function getUserId()
	{
		$context = Context::getContext();
		$cookie = & $context->cookie;

		$this->tonysocialauth_tw_access_token = unserialize($cookie->tonysocialauth_tw_access_token);

		if (! $this->isAuth()) return false;
		else
			return $this->tonysocialauth_tw_access_token['user_id'];

	}

}
