<?php

class tonyflashcloud extends Module
{

	function __construct()
	{
		$this->name = 'tonyflashcloud';
		$this->tab = 'Other';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Flash Cloud');
		$this->description = $this->l('Flash tag cloud');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
	}

	public function install()
	{
		if (Shop::isFeatureActive())
			Shop::setContext(Shop::CONTEXT_ALL);
		parent::install();

		if (!$this->registerHook('LeftColumn'))
			return false;

		$newoptions['nTags'] = '10';
		$newoptions['minFont'] = '10';
		$newoptions['maxFont'] = '18';
		$newoptions['width'] = '100%';
		$newoptions['height'] = '180';
		$newoptions['tcolor'] = '#9D3BC6';
		$newoptions['tcolor2'] = '#9D3BC6';
		$newoptions['hicolor'] = '#9D3BC6';
		$newoptions['bgcolor'] = '#ffffff';
		$newoptions['speed'] = '100';
		$newoptions['trans'] = 'true';
		$newoptions['distr'] = 'true';
		$newoptions['args'] = '';
		$newoptions['compmode'] = 'false';
		$newoptions['showwptags'] = 'true';
		$newoptions['mode'] = 'tags';
		$newoptions['sortdir'] = 'true';

		return Configuration::updateValue($this->name.'_options', serialize($newoptions));
	}

	public function uninstall()
	{
		Configuration::deleteByName($this->name.'_options');

		parent::uninstall();
	}

	public function getContent()
	{
		if (Tools::isSubmit('submit'))
		{
			$this->_postValidation();

			if (!sizeof($this->_postErrors))
			{
				$newoptions = unserialize(Configuration::get($this->name.'_options'));
				$newoptions['nTags'] = Tools::getValue('nTags');
				$newoptions['sortdir'] = (Tools::getValue('sortdir') ? 'true' : 'false');
				$newoptions['minFont'] = Tools::getValue('minFont');
				$newoptions['maxFont'] = Tools::getValue('maxFont');
				$newoptions['width'] = Tools::getValue('width');
				$newoptions['height'] = Tools::getValue('height');
				$newoptions['tcolor'] = Tools::getValue('tcolor');
				$newoptions['tcolor2'] = Tools::getValue('tcolor2');
				$newoptions['hicolor'] = Tools::getValue('hicolor');
				$newoptions['bgcolor'] = Tools::getValue('bgcolor');
				$newoptions['speed'] = Tools::getValue('speed');
				$newoptions['trans'] = (Tools::getValue('trans') ? 'true' : 'false');
				$newoptions['distr'] = (Tools::getValue('distr') ? 'true' : 'false');
				$newoptions['compmode'] = (Tools::getValue('compmode') ? 'true' : 'false');
				Configuration::updateValue($this->name.'_options', serialize($newoptions));
				$this->_html .= '<div class="conf confirm">'.$this->l('Settings updated').'</div>';
			}
			else
			{
				foreach ($this->_postErrors AS $err)
				{
					$this->_html .= '<div class="alert error">'.$err.'</div>';
				}
			}
		}

		$this->_displayForm();

		return $this->_html;
	}

	private function _displayForm()
	{
		$this->context->controller->addJS(_PS_JS_DIR_.'jquery/plugins/jquery.colorpicker.js');
		$options = unserialize(Configuration::get($this->name.'_options'));
		$this->_html .= '
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<fieldset>
				<legend><img src="../img/admin/cog.gif" alt="" class="middle" />'.$this->l('Standard Settings').'</legend>
					<label>'.$this->l('Number of Tags').'</label>
					<div class="margin-form">
						<input type="text" name="nTags" value="'.Tools::getValue('nTags', $options['nTags']).'" />
						<p class="clear">'.$this->l('Maximum number of tags to use (default 10)').'</p>
					</div>
					
					<label>'.$this->l('Minimum font size').'</label>
					<div class="margin-form">
						<input type="text" name="minFont" value="'.Tools::getValue('minFont', $options['minFont']).'" />
						<p class="clear">'.$this->l('Minimum font to use (will be scaled: default 10)').'</p>
					</div>
					<label>'.$this->l('Maximum font size').'</label>
					<div class="margin-form">
						<input type="text" name="maxFont" value="'.Tools::getValue('maxFont', $options['maxFont']).'" />
						<p class="clear">'.$this->l('Maximum font to use (will be scaled: default 18)').'</p>
					</div>
					<label>'.$this->l('Width of Cloud').'</label>
					<div class="margin-form">
						<input type="text" name="width" value="'.Tools::getValue('width', $options['width']).'" />
						<p class="clear">'.$this->l('Width in pixels (500 or more is recommended)').'</p>
					</div>
					<label>'.$this->l('Height of Cloud').'</label>
					<div class="margin-form">
						<input type="text" name="height" value="'.Tools::getValue('height', $options['height']).'" />
						<p class="clear">'.$this->l('Height in pixels (ideally around 3/4 of the width)').'</p>
					</div>
					<label>'.$this->l('Tag color').'</label>
					<div class="margin-form">
						<input type="text" name="tcolor" value="'.Tools::getValue('tcolor', $options['tcolor']).'" class="color mColorPickerInput mColorPicker" data-hex="true"/>
					</div>
					<label>'.$this->l('Tag color for gradient').'</label>
					<div class="margin-form">
						<input type="text" name="tcolor2" value="'.Tools::getValue('tcolor2', $options['tcolor2']).'" class="color mColorPickerInput mColorPicker" data-hex="true"/>
					</div>
					<label>'.$this->l('Highlight color').'</label>
					<div class="margin-form">
						<input type="text" name="hicolor" value="'.Tools::getValue('hicolor', $options['hicolor']).'" class="color mColorPickerInput mColorPicker" data-hex="true"/>
					</div>
					<label>'.$this->l('Background color').'</label>
					<div class="margin-form">
						<input type="text" name="bgcolor" value="'.Tools::getValue('bgcolor', $options['bgcolor']).'" class="color mColorPickerInput mColorPicker" data-hex="true"/>
					</div>
					<label>'.$this->l('Use transparent mode').'</label>
					<div class="margin-form">
						<input type="checkbox" name="trans" value="'.(Tools::getValue('trans', $options['trans']) ? "true" : "false").'"'.
				($options['trans'] == "true" ? ' checked="checked"' : '').' />
						<p class="clear">'.$this->l('Switches on Flash\'s wmode-transparent setting').'</p>
					</div>
					<label>'.$this->l('Rotation speed').'</label>
					<div class="margin-form">
						<input type="text" name="speed" value="'.Tools::getValue('speed', $options['speed']).'" />
						<p class="clear">'.$this->l('Speed (percentage, default is 100)').'</p>
					</div>
					<label>'.$this->l('Even distribution').'</label>
					<div class="margin-form">
						<input type="checkbox" name="distr" value="'.(Tools::getValue('distr', $options['distr']) ? "true" : "false").'"'.
				($options['distr'] == "true" ? ' checked="checked"' : '').' />
						<p class="clear">'.$this->l('Places tags at equal intervals instead of random').'</p>
					</div>
					<label>'.$this->l('Compatibility mode').'</label>
					<div class="margin-form">
						<input type="checkbox" name="compmode" value="'.(Tools::getValue('compmode', $options['compmode']) ? "true" : "false").'"'.
				($options['compmode'] == "true" ? ' checked="checked"' : '').' />
						<p class="clear">'.$this->l('Enabling this option switches the plugin to a different way of embedding Flash into the page. Use this if your page has markup errors or if you\'re having trouble getting flash to display correctly.').'</p>
					</div>
				<input type="submit" name="submit" value="'.$this->l('Update').'" class="button" style="cursor:pointer;" />			
			</fieldset>
		</form>
		<script type="text/javascript">
		$(document).ready(function() {
		  $(".mColorPicker").mColorPicker();
		});  
		</script>		
    ';
	}

	private function isHexColor($color)
	{
		return !$color OR preg_match('/[a-f 0-9]{6}/ui', $color);
	}

	private function _postValidation()
	{
		if (!Validate::isUnsignedInt(Tools::getValue('nTags')))
			$this->_postErrors[] = $this->l('Number of tags must be a postive integer');
		if (!Validate::isUnsignedInt(Tools::getValue('minFont')))
			$this->_postErrors[] = $this->l('Minimum font width must be a postive integer');
		if (!Validate::isUnsignedInt(Tools::getValue('maxFont')))
			$this->_postErrors[] = $this->l('Maximum font width must be a postive integer');
		if (!Validate::isUnsignedInt(Tools::getValue('height')))
			$this->_postErrors[] = $this->l('Height must be a postive integer');
		if (!$this->isHexColor(Tools::getValue('tcolor')))
			$this->_postErrors[] = $this->l('Tag color is invalid');
		if (!$this->isHexColor(Tools::getValue('tcolor2')))
			$this->_postErrors[] = $this->l('Optional Gradient color is invalid');
		if (!$this->isHexColor(Tools::getValue('hicolor')))
			$this->_postErrors[] = $this->l('Highlight color is invalid');
		if (!$this->isHexColor(Tools::getValue('bgcolor')))
			$this->_postErrors[] = $this->l('Background color is invalid');
		if (!Validate::isUnsignedInt(Tools::getValue('speed')))
			$this->_postErrors[] = $this->l('Speed must be a postive integer');
	}

	private function _createflashcode($tagcloud)
	{
		// get the options
		$options = unserialize(Configuration::get($this->name.'_options'));
		$soname = "so";
		$divname = "tonyflashcloud";

		$movie = $this->_path.'tagcloud.swf';
		$path = $this->_path;

		// add random seeds to so name and movie url to avoid collisions and force reloading (needed for IE)
		$soname .= rand(0, 9999999);
		$movie .= '?r='.rand(0, 9999999);
		// write flash tag
		if ($options['compmode'] != 'true')
		{
			$flashtag = '';
			$flashtag .= '<script type="text/javascript" src="'.$path.'swfobject.js"></script>';
			$flashtag .= '<div id="'.$divname.'">';
			if ($options['showwptags'] == 'true')
			{
				$flashtag .= '<p>';
			}
			else
			{
				$flashtag .= '<p style="display:none;">';
			};
			$flashtag .= urldecode($tagcloud).'</div>';
			$flashtag .= '<script type="text/javascript">';
			$flashtag .= 'var '.$soname.' = new SWFObject("'.$movie.'", "tagcloudflash", "'.$options['width'].'", "'.$options['height'].'", "9", "'.$options['bgcolor'].'");';
			if ($options['trans'] == 'true')
			{
				$flashtag .= $soname.'.addParam("wmode", "transparent");';
			}
			$flashtag .= $soname.'.addParam("allowScriptAccess", "always");';
			$flashtag .= $soname.'.addVariable("tcolor", "0x'.str_replace('#', '', $options['tcolor']).'");';
			$flashtag .= $soname.'.addVariable("tcolor2", "0x'.($options['tcolor2'] == "" ? str_replace('#', '', $options['tcolor']) : str_replace('#', '', $options['tcolor2'])).'");';
			$flashtag .= $soname.'.addVariable("hicolor", "0x'.($options['hicolor'] == "" ? str_replace('#', '', $options['tcolor']) : str_replace('#', '', $options['hicolor'])).'");';
			$flashtag .= $soname.'.addVariable("tspeed", "'.$options['speed'].'");';
			$flashtag .= $soname.'.addVariable("distr", "'.$options['distr'].'");';
			$flashtag .= $soname.'.addVariable("mode", "'.$options['mode'].'");';
			$flashtag .= $soname.'.addVariable("tagcloud", "'.urlencode('<tags>').$tagcloud.urlencode('</tags>').'");';
			$flashtag .= $soname.'.write("'.$divname.'");';
			$flashtag .= '</script>';
		}
		else
		{
			$flashtag = '<object type="application/x-shockwave-flash" data="'.$movie.'" width="'.$options['width'].'" height="'.$options['height'].'">';
			$flashtag .= '<param name="movie" value="'.$movie.'" />';
			$flashtag .= '<param name="bgcolor" value="'.$options['bgcolor'].'" />';
			$flashtag .= '<param name="AllowScriptAccess" value="always" />';
			if ($options['trans'] == 'true')
			{
				$flashtag .= '<param name="wmode" value="transparent" />';
			}
			$flashtag .= '<param name="flashvars" value="';
			$flashtag .= 'tcolor=0x'.str_replace('#', '', $options['tcolor']);
			$flashtag .= '&tcolor2=0x'.str_replace('#', '', $options['tcolor2']);
			$flashtag .= '&hicolor=0x'.str_replace('#', '', $options['hicolor']);
			$flashtag .= '&tspeed='.$options['speed'];
			$flashtag .= '&distr='.$options['distr'];
			$flashtag .= '&mode='.$options['mode'];
			$flashtag .= '&tagcloud='.urlencode('<tags>').$tagcloud.urlencode('</tags>');
			$flashtag .= '" />';
			$flashtag .= '<p>'.urldecode($tagcloud).'</p>';
			$flashtag .= '</object>';
		}
		return '<div style="background-color:'.($options['trans'] == 'true' ? 'transparent' : $options['bgcolor']).';">'.$flashtag.'</div>';
	}

	public function hookRightColumn($params)
	{
		$options = unserialize(Configuration::get($this->name.'_options'));
		$numberTags = $options['nTags'];
		$tags = Tag::getMainTags((int)($params['cookie']->id_lang), (int)$numberTags);

		if (!sizeof($tags))
			return '';
		$maxFontSize = $options['maxFont'];
		$minFontSize = $options['minFont'];
		$maxNumber = 0;
		foreach ($tags AS $tag)
			$maxNumber = max($maxNumber, intval($tag['times']));

		$classPrefix = 'tag-link-';
		foreach ($tags AS $tag)
		{
			$tag['fontSize'] = floor(($maxFontSize * $tag['times']) / $maxNumber);
			if ($tag['fontSize'] < $minFontSize)
				$tag['fontSize'] = $minFontSize;
			// 2nd version: use CSS class
			$cssSizeclass = round($maxNumber / $tag['times']);
			if ($cssSizeclass > 10)
				$tag['class'] = $classPrefix.'10';
			else
				$tag['class'] = $classPrefix.$cssSizeclass;

			$url = $this->context->link->getPageLink('search', true, null, 'tag='.$tag['name']);
			$tagcloud .= urlencode('<a href ="'.$url.'" class="'.$tag['class'].'" style="font-size:'.$tag['fontSize'].';">'.$tag['name'].'</a>').'%0A';
		}

		$code = $this->_createflashcode($tagcloud);
		return $code;
	}

	public function hookLeftColumn($params)
	{
		return $this->hookRightColumn($params);
	}

	public function hookHome($params)
	{
		return $this->hookRightColumn($params);
	}

	public function hookTop($params)
	{
		return $this->hookRightColumn($params);
	}

	public function hookFooter($params)
	{
		return $this->hookRightColumn($params);
	}

}
