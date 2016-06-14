<?php
if (! defined('_PS_VERSION_')) exit;

class tonyflexslider extends Module
{
	var $m_google_fonts = array('Default', 'Abel', 'Abril Fatface', 'Aclonica', 'Actor', 'Adamina', 'Aguafina Script', 'Aladin', 'Aldrich', 'Alice', 'Alike Angular', 'Alike', 'Allan', 'Allerta Stencil', 'Allerta', 'Amaranth', 'Amatic SC', 'Andada', 'Andika', 'Annie Use Your Telescope', 'Anonymous Pro', 'Antic', 'Anton', 'Arapey', 'Architects Daughter', 'Arimo', 'Artifika', 'Arvo', 'Asset', 'Astloch', 'Atomic Age', 'Aubrey', 'Bangers', 'Bentham', 'Bevan', 'Bigshot One', 'Bitter', 'Black Ops One', 'Bowlby One SC', 'Bowlby One', 'Brawler', 'Bubblegum Sans', 'Buda', 'Butcherman Caps', 'Cabin Condensed', 'Cabin Sketch', 'Cabin', 'Cagliostro', 'Calligraffitti', 'Candal', 'Cantarell', 'Cardo', 'Carme', 'Carter One', 'Caudex', 'Cedarville Cursive', 'Changa One', 'Cherry Cream Soda', 'Chewy', 'Chicle', 'Chivo', 'Coda Caption', 'Coda', 'Comfortaa', 'Coming Soon', 'Contrail One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Cousine', 'Coustard', 'Covered By Your Grace', 'Crafty Girls', 'Creepster Caps', 'Crimson Text', 'Crushed', 'Cuprum', 'Damion', 'Dancing Script', 'Dawning of a New Day', 'Days One', 'Delius Swash Caps', 'Delius Unicase', 'Delius', 'Devonshire', 'Didact Gothic', 'Dorsa', 'Dr Sugiyama', 'Droid Sans Mono', 'Droid Sans', 'Droid Serif', 'EB Garamond', 'Eater Caps', 'Expletus Sans', 'Fanwood Text', 'Federant', 'Federo', 'Fjord One', 'Fondamento', 'Fontdiner Swanky', 'Forum', 'Francois One', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar Fill', 'Geostar', 'Give You Glory', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Goudy Bookletter 1911', 'Gravitas One', 'Gruppo', 'Hammersmith One', 'Herr Von Muellerhoff', 'Holtwood One SC', 'Homemade Apple', 'IM Fell DW Pica SC', 'IM Fell DW Pica', 'IM Fell Double Pica SC', 'IM Fell Double Pica', 'IM Fell English SC', 'IM Fell English', 'IM Fell French Canon SC', 'IM Fell French Canon', 'IM Fell Great Primer SC', 'IM Fell Great Primer', 'Iceland', 'Inconsolata', 'Indie Flower', 'Irish Grover', 'Istok Web', 'Jockey One', 'Josefin Sans', 'Josefin Slab', 'Judson', 'Julee', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kameron', 'Kelly Slab', 'Kenia', 'Knewave', 'Kranky', 'Kreon', 'Kristi', 'La Belle Aurore', 'Lancelot', 'Lato', 'League Script', 'Leckerli One', 'Lekton', 'Lemon', 'Limelight', 'Linden Hill', 'Lobster Two', 'Lobster', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Luckiest Guy', 'Maiden Orange', 'Mako', 'Marck Script', 'Marvel', 'Mate SC', 'Mate', 'Maven Pro', 'Meddon', 'MedievalSharp', 'Megrim', 'Merienda One', 'Merriweather', 'Metrophobic', 'Michroma', 'Miltonian Tattoo', 'Miltonian', 'Miss Fajardose', 'Miss Saint Delafield', 'Modern Antiqua', 'Molengo', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montez', 'Mountains of Christmas', 'Mr Bedford', 'Mr Dafoe', 'Mr De Haviland', 'Mrs Sheppards', 'Muli', 'Neucha', 'Neuton', 'News Cycle', 'Niconne', 'Nixie One', 'Nobile', 'Nosifer Caps', 'Nothing You Could Do', 'Nova Cut', 'Nova Flat', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Old Standard TT', 'Open Sans Condensed', 'Open Sans', 'Orbitron', 'Oswald', 'Over the Rainbow', 'Ovo', 'PT Sans Caption', 'PT Sans Narrow', 'PT Sans', 'PT Serif Caption', 'PT Serif', 'Pacifico', 'Passero One', 'Patrick Hand', 'Paytone One', 'Permanent Marker', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Play', 'Playfair Display', 'Podkova', 'Poller One', 'Poly', 'Pompiere', 'Prata', 'Prociono', 'Puritan', 'Quattrocento Sans', 'Quattrocento', 'Questrial', 'Quicksand', 'Radley', 'Raleway', 'Rammetto One', 'Rancho', 'Rationale', 'Redressed', 'Reenie Beanie', 'Ribeye Marrow', 'Ribeye', 'Righteous', 'Rochester', 'Rock Salt', 'Rokkitt', 'Rosario', 'Ruslan Display', 'Salsa', 'Sancreek', 'Sansita One', 'Satisfy', 'Schoolbell', 'Shadows Into Light', 'Shanti', 'Short Stack', 'Sigmar One', 'Signika Negative', 'Signika', 'Six Caps', 'Slackey', 'Smokum', 'Smythe', 'Sniglet', 'Snippet', 'Sorts Mill Goudy', 'Special Elite', 'Spinnaker', 'Spirax', 'Stardos Stencil', 'Sue Ellen Francisco', 'Sunshiney', 'Supermercado One', 'Swanky and Moo Moo', 'Syncopate', 'Tangerine', 'Tenor Sans', 'Terminal Dosis', 'The Girl Next Door', 'Tienne', 'Tinos', 'Tulpen One', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ubuntu', 'Ultra', 'UnifrakturCook', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Varela Round', 'Varela', 'Vast Shadow', 'Vibur', 'Vidaloka', 'Volkhov', 'Vollkorn', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Wire One', 'Yanone Kaffeesatz', 'Yellowtail', 'Yeseva One', 'Zeyada');

	public function __construct()
	{
		$this->name = 'tonyflexslider';
		$this->tab = 'Other';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Home page slider');
		$this->description = $this->l('Adds an image slider to your home page');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

	}

	public function install()
	{
		if (Shop::isFeatureActive()) Shop::setContext(Shop::CONTEXT_ALL);

		$cfg['button_color'] = '#F4F4F4';
		$cfg['button_hover_color'] = '#9D3BC6';
		$cfg = serialize($cfg);
		$ret = parent::install() && $this->registerHook('home') && $this->registerHook('header') && $this->installDb() && Configuration::updateValue($this->name.'_settings', $cfg);
		$this->update_css();

		return $ret;
	}

	public function installDb()
	{
		$default_language = (int)Configuration::get('PS_LANG_DEFAULT');

		$query = '
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonyhomeslider` (
			`slide_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			`new_window` TINYINT( 1 ) NOT NULL,
			image varchar(255),
			link text,
			slide_group varchar(150),
			sort_order int default 0,
			font varchar(50),
			image_width int default 0,
			image_height int default 0,
			INDEX (`id_shop`)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;      
      ';

		$query2 = '
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonyhomeslider_texts` (
			`slide_id` INT UNSIGNED NOT NULL,
			`id_lang` INT(11) UNSIGNED NOT NULL,
      txt1 varchar(255), 
      txt2 varchar(255),
      position1 text,
			KEY(slide_id,id_lang)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;      
      ';


		$ret = Db::getInstance()->execute($query) && Db::getInstance()->execute($query2);
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (3, 1, 0, 'slider3_1.jpg', '', '1', 1, 'Over the Rainbow',584,498)");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (4, 1, 0, 'slider3_2.jpg', '', '1', 2, NULL,288,251);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (5, 1, 0, 'slider3_3.jpg', '123', '1', 4, NULL,288,247);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (6, 1, 0, 'slider3_4.jpg', '', '1', 3, 'Creepster Caps',298,498);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (7, 1, 1, 'slider2_1.jpg', '', '2', 1, NULL,593,498);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (8, 1, 0, 'slider2_2.jpg', '', '2', 2, NULL,577,263);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (9, 1, 0, 'slider2_3.jpg', '', '2', 3, NULL,288,235);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (10, 1, 0, 'slider2_4.jpg', '', '2', 4, NULL,289,235);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (11, 1, 0, 'slider4_1.jpg', '', '3', 1, NULL,575,498);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (12, 1, 0, 'slider4_2.jpg', '', '3', 2, NULL,287,251);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (13, 1, 0, 'slider4_3.jpg', '', '3', 4, NULL,287,247);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (14, 1, 0, 'slider4_4.jpg', '', '3', 3, NULL,308,496);");
		$ret &= Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."tonyhomeslider` VALUES (15, 1, 0, 'slider1.jpg', '', '4', 1, NULL,1170,490);");

		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (3, '.$default_language.', \'FASHION FEATURE\', \'2013 HOTTEST TREND\', \'a:7:{s:3:"top";s:3:"50%";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:16:"margin-top:-25px";s:6:"color1";s:0:"";s:6:"color2";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (4, '.$default_language.', \'long awaited\', \'NEW ARRIVALS\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:2:"20";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (5, '.$default_language.', \'HOT SUMMER\', \'BEACH COLLECTION\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (6, '.$default_language.', \'This weekend\', \'BIGGEST SALES\', \'a:7:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";s:6:"color1";s:3:"red";s:6:"color2";s:3:"red";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (7, '.$default_language.', \'FASHION FEATURE\', \'Fit for a queen\', \'a:5:{s:3:"top";s:3:"50%";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:16:"margin-top:-25px";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (8, '.$default_language.', \'SHOP NOW\', \'HOT SEXY SET\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (9, '.$default_language.', \'COLLECTION 2013\', \'Autumn Winter\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (10, '.$default_language.', \'SS13 TREND\', \'BASIC LINGERIE\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (11, '.$default_language.', \'FASHION FEATURE\', \'TURN UP THE HEAT\', \'a:5:{s:3:"top";s:3:"50%";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:16:"margin-top:-25px";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (12, '.$default_language.', \'SAVE 25% OFF\', \'SALES OF THE DAY\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (13, '.$default_language.', \'NEW ARRIVALS\', \'FASHION UPDATES\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (14, '.$default_language.', \'LUXURY WATCHES 2013\', \'DESIGNER COLLECTIONS\', \'a:5:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:1:"0";s:4:"left";s:1:"0";s:6:"custom";s:0:"";}\');');
		$ret &= Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonyhomeslider_texts` VALUES (15, '.$default_language.', \'LUXURY WATCHES 2013\', \'DESIGNER COLLECTIONS\', \'a:5:{s:3:"top";s:5:"100px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"200px";s:6:"custom";s:0:"";}\');');

		return $ret;

	}

	private function uninstallDb()
	{
		Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'tonyhomeslider`');
		Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'tonyhomeslider_texts`');
		return true;
	}

	public function uninstall()
	{
		Configuration::deleteByName($this->name.'_settings');
		if (! parent::uninstall() || ! $this->uninstallDB()) return false;
		return true;
	}

	public function hookHeader()
	{
		$this->context->controller->addCSS(($this->_path).'css/iosslider.css', 'all');
		$this->context->controller->addCSS(($this->_path).'css/customization.css', 'all');
		$this->context->controller->addJS(($this->_path).'js/jquery.iosslider.js');
		$this->context->controller->addJS(($this->_path).'js/slider.js');

		$cfg = unserialize(Configuration::get($this->name.'_settings'));
		$font = $cfg['label_font'];
		/*if ($font != 'Default')
			  $this->context->controller->addCSS($this->context->link->protocol_content.'fonts.googleapis.com/css?family='.urlencode($font), 'all');*/
	}

	public function displayForm()
	{
		$do = Tools::getValue('do');

		switch ($do)
		{
			case 'removeslide':
			case 'removeslideimage':
			{
				$ssid = (int)Tools::getValue('ssid');
				$query = "select image from "._DB_PREFIX_."tonyhomeslider where slide_id='$ssid'";
				$rows = Db::getInstance()->executeS($query);
				$image = $rows[0]['image'];

				@unlink(_PS_MODULE_DIR_.$this->name.'/slides/'.$image);

				if ($do == 'removeslideimage')
				{
					$query = "update "._DB_PREFIX_."tonyhomeslider set image='' where slide_id='$ssid'";
					Db::getInstance()->execute($query);

					Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$ssid);
				}
				else
				{
					$query = "delete from "._DB_PREFIX_."tonyhomeslider where slide_id='$ssid'";
					Db::getInstance()->execute($query);
					$query = "delete from "._DB_PREFIX_."tonyhomeslider_texts where slide_id='$ssid'";
					Db::getInstance()->execute($query);

					Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
				}

			}
				break;
			case 'addnewslide':
			{
				$ssid = (int)Tools::getValue('ssid');
				$this->_clearCache('tonyflexslider.tpl');
				$content = $this->_add_new_slide($ssid);
			}
				break;
			default:
				$content = $this->_main();
		}

		return $content;
	}

	function _add_new_slide($id = 0)
	{
		$languages = $this->context->controller->getLanguages();
		$default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		$id_lang = (int)Context::getContext()->language->id;
		$path = _MODULE_DIR_.$this->name.'/slides/';
		$id_shop = (int)Shop::getContextShopID();
		$def_values = array();
		$uploaded_image = '';

		if ($id != 0)
		{
			$query = "select * from "._DB_PREFIX_."tonyhomeslider where slide_id='$id'";
			$rows = Db::getInstance()->executeS($query);

			$def_values = $rows[0];

			if (strlen($def_values['image'])) $uploaded_image = '<img src="'.$path.$def_values['image'].'">&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslideimage&ssid='.$id.'">'.$this->l('Delete image').'</a>]';

			$query = "select * from "._DB_PREFIX_."tonyhomeslider_texts where slide_id='{$def_values['slide_id']}'";
			$rows = Db::getInstance()->executeS($query);

			foreach ($rows as $row)
			{
				$def_values['txt1'][$row['id_lang']] = $row['txt1'];
				$def_values['position1'][$row['id_lang']] = unserialize($row['position1']);
				$def_values['txt2'][$row['id_lang']] = $row['txt2'];
			}
		}


		$message = '';
		$image_sql = '';

		$hidden_inputs = '';
		if (Tools::isSubmit('addnew'))
		{
			$link = Tools::getValue('link');
			$new_win = (int)Tools::getValue('new_window');
			$sort_order = (int)Tools::getValue('sort_order');
			$image_width = (int)Tools::getValue('image_width');
			$image_height = (int)Tools::getValue('image_height');
			$font = mysql_escape_string(Tools::getValue('font'));
			$slide_group = Tools::getValue('slide_group');

			$def_values['link'] = $link;
			$def_values['new_window'] = $new_win;
			$def_values['sort_order'] = $sort_order;
			$def_values['slide_group'] = $slide_group;
			$def_values['font'] = $font;
			$def_values['image_width'] = $iamge_width;
			$def_values['image_height'] = $iamge_height;

			if (isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && ! empty($_FILES['image']['tmp_name']))
			{
				if ($error = ImageManager::validateUpload($_FILES['image'], Tools::convertBytes(ini_get('upload_max_filesize')))) $errors .= $error;
				else
				{
					$file_name = $_FILES['image']['name'];

					if (! move_uploaded_file($_FILES['image']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/slides/'.$file_name)) $errors .= $this->l('File upload error.');
					else
					{
						$hidden_inputs .= '<input type="hidden" name="uploaded_file" value="'.$file_name.'">';
						$uploaded_image = '<img src="'.$path.$file_name.'">';
						$image_sql = "image='{$file_name}',";
					}
				}
			}
			elseif (strlen($def_values['image']) == 0) $errors .= $this->l('You need to upload slide image');

			if (! $errors)
			{
				$link = mysql_escape_string($link);
				$slide_group = mysql_escape_string($slide_group);
				if ($id != 0)
				{
					$query = "update "._DB_PREFIX_."tonyhomeslider set id_shop='{$id_shop}',new_window='$new_win',link='$link',{$image_sql}slide_group='$slide_group',sort_order='$sort_order',font='$font',image_width='$image_width',image_height='$image_height' where slide_id='$id'";
					Db::getInstance()->execute($query);
					$slide_id = $id;
				}
				else
				{
					$query = "insert into "._DB_PREFIX_."tonyhomeslider set id_shop='{$id_shop}',new_window='$new_win',{$image_sql}link='$link',slide_group='$slide_group',sort_order='$sort_order',font='$font',image_width='$image_width',image_height='$image_height'";
					Db::getInstance()->execute($query);
					$slide_id = Db::getInstance()->Insert_ID();

				}


				if (is_array($_POST['txt1_']))
				{
					foreach ($_POST['txt1_'] as $lng_id => $data)
					{
						$data1 = Db::getInstance()->_escape($data);
						$data2 = Db::getInstance()->_escape($_POST['txt2_'][$lng_id]);
						$position1 = array();
						$position1['top'] = $_POST['txt1_pos_top'][$lng_id];
						$position1['right'] = $_POST['txt1_pos_right'][$lng_id];
						$position1['bottom'] = $_POST['txt1_pos_bottom'][$lng_id];
						$position1['left'] = $_POST['txt1_pos_left'][$lng_id];
						$position1['custom'] = $_POST['txt1_pos_custom'][$lng_id];
						$position1['color1'] = $_POST['txt1_color'][$lng_id];
						$position1['color2'] = $_POST['txt2_color'][$lng_id];
						$position1 = Db::getInstance()->_escape(serialize($position1));

						$prefix = _DB_PREFIX_;
						$eid = Db::getInstance()->_escape($slide_id);
						$exists = Db::getInstance()->executeS("select slide_id from {$prefix}tonyhomeslider_texts where slide_id='{$eid}' and id_lang='{$lng_id}'");
						if ($exists) $query = "update "._DB_PREFIX_."tonyhomeslider_texts set txt1='$data1',txt2='$data2',position1='$position1' where slide_id='$eid' and id_lang='$lng_id'";
						else
							$query = "insert into "._DB_PREFIX_."tonyhomeslider_texts set slide_id='$eid',id_lang='$lng_id',txt1='$data1',txt2='$data2',position1='$position1'";

						Db::getInstance()->execute($query);

						$def_values['txt1'][$lng_id] = $data;
						$def_values['txt2'][$lng_id] = $_POST['txt2_'][$lng_id];
					}

				}

				Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$slide_id.'&updated');

			}

		}

		if (isset($_GET['updated'])) $message = $this->displayConfirmation($this->l('Updated'));

		$content = $message;

		if (isset($errors)) $content .= $this->displayError($errors);

		$group_opts = '';
		for ($i = 1; $i <= 20; $i ++)
		{
			$selected = ($def_values['slide_group'] == $i) ? 'selected' : '';
			$group_opts .= '<option value="'.$i.'" '.$selected.'>'.$this->l('Group').' '.$i.'</option>';
		}

		$txt_inputs = '';
		foreach ($languages as $language)
		{
			$txt_inputs .= '
<div id="html_block_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
				<div>
						<table>
              <tr><td>'.$this->l('Row #1').' </td><td><input type="text" name="txt1_['.(int)$language['id_lang'].']" size="50" value="'.$def_values['txt1'][$language['id_lang']].'"></td>
              <td>
                '.$this->l('color').' <input type="text" name="txt1_color['.(int)$language['id_lang'].']" value="'.$def_values['position1'][$language['id_lang']]['color1'].'" class="color mColorPickerInput mColorPicker" data-hex="true">
              </td>
              </tr>
            </table>  
						<table>
              <tr>
              <td>'.$this->l('Row #2').' </td>
              <td><input type="text" name="txt2_['.(int)$language['id_lang'].']" size="50" value="'.$def_values['txt2'][$language['id_lang']].'">
                '.$this->l('color').' <input type="text" name="txt2_color['.(int)$language['id_lang'].']" value="'.$def_values['position1'][$language['id_lang']]['color2'].'" class="color mColorPickerInput mColorPicker" data-hex="true">
               </td>
              </tr>
            </table>
            
            <table>
            <tr><td style="vertical-align:top;">
              <b>'.$this->l('Text Position').':</b></td>
              <td>  '.$this->l('top').' <input type="text" name="txt1_pos_top['.(int)$language['id_lang'].']" size="3" value="'.$def_values['position1'][$language['id_lang']]['top'].'">
                '.$this->l('right').' <input type="text" name="txt1_pos_right['.(int)$language['id_lang'].']" size="3" value="'.$def_values['position1'][$language['id_lang']]['right'].'">
                '.$this->l('bottom').' <input type="text" name="txt1_pos_bottom['.(int)$language['id_lang'].']" size="3" value="'.$def_values['position1'][$language['id_lang']]['bottom'].'">
                '.$this->l('left').' <input type="text" name="txt1_pos_left['.(int)$language['id_lang'].']" size="3" value="'.$def_values['position1'][$language['id_lang']]['left'].'">
                '.$this->l('Custom css code').' <input type="text" name="txt1_pos_custom['.(int)$language['id_lang'].']" size="20" value="'.$def_values['position1'][$language['id_lang']]['custom'].'">
                <div class="comment">CSS parameters</div>
            </td></tr>
            </table>
			  </div>
			  </div>		    
        ';
		}

		$font_opts = '';
		foreach ($this->m_google_fonts as $index => $font)
		{
			$selected = ($font == $def_values['font']) ? 'selected' : '';
			$font_opts .= '<option value="'.$font.'" '.$selected.'>'.$font.'</option>';
		}

		$content .= '
			<style>
			.conf-set{margin-bottom:10px;}
			.conf-title{width:200px;font-weight:bold;text-align:right;vertical-align:top;padding-top:6px;}
			.conf-table td{padding-bottom:10px;}
			.comment{font-size:11px;}
			.conf-value{background-color:#e4e4e4;padding:5px 0 5px 0;}
			</style>
			<script type="text/javascript">
			$(document).ready(function(){
			  jQuery(".font-changer").change(function(){
			    var vid = $(this).attr("rel");
			    if ($(this).val() == \'Default\') return true;
			      jQuery("#"+vid).css({ fontFamily: $(this).val().replace("+"," ") });
			      jQuery("<link />",{href:"http://fonts.googleapis.com/css?family="+$(this).val(),rel:"stylesheet",type:"text/css"}).appendTo("head");
			  }).keyup(function(){
			  var vid = $(this).attr("rel");
			  if ($(this).val() == \'Default\') return true;
			      jQuery("#"+vid).css({ fontFamily: $(this).val().replace("+"," ") });
			      jQuery("<link />",{href:"http://fonts.googleapis.com/css?family="+$(this).val(),rel:"stylesheet",type:"text/css"}).appendTo("head");
			  }).keydown(function(){
			  var vid = $(this).attr("rel");
			  if ($(this).val() == \'Default\') return true;
			      jQuery("#"+vid).css({ fontFamily: $(this).val().replace("+"," ") });
			      jQuery("<link />",{href:"http://fonts.googleapis.com/css?family="+$(this).val(),rel:"stylesheet",type:"text/css"}).appendTo("head");
			  });

			  $(".font-changer").trigger("change");
			});

			</script>
			<form method="post" enctype="multipart/form-data">
			'.$hidden_inputs.'
			<fieldset class="conf-set">
			<legend>'.$this->l('Add new slide').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

			<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><input type="button" value="'.$this->l('Back').'" class="button" style="cursor:pointer;"></a>
			<table class="conf-table">
			<tr>
			    <td class="conf-title">'.$this->l('Image').':</td>
			    <td class="conf-value"><input type="file" name="image"><br />'.$uploaded_image.'</td>
			</tr>
			<tr>
			    <td class="conf-title">'.$this->l('Link').':</td>
			    <td class="conf-value"><input type="text" name="link" size="100" value="'.$def_values['link'].'"></td>
			</tr>
			<tr>
			    <td class="conf-title">'.$this->l('Open target in new window').':</td>
			    <td class="conf-value"><input type="checkbox" name="new_window" value="1" '.($def_values['new_window'] == 1 ? 'checked' : '').'></td>
			</tr>
			<tr>
			    <td class="conf-title">'.$this->l('Sort order').':</td>
			    <td class="conf-value"><input type="text" name="sort_order" size="10" value="'.$def_values['sort_order'].'"></td>
			</tr>
			<tr>
			    <td class="conf-title">'.$this->l('Slide group').':</td>
			    <td class="conf-value"><select name="slide_group">'.$group_opts.'</select></td>
			</tr>
			<tr>
			    <td class="conf-title" style="vertical-align:top;">'.$this->l('Text').':</td>
			    <td class="conf-value">
			    <div>'.$this->displayFlags($languages, (int)$id_lang, 'html_block', 'html_block', true).'</div><p style="clear: both;"> </p>
			      '.$txt_inputs.'
			    </td>
			</tr>
			<tr>
			    <td class="conf-title" style="vertical-align:top;">'.$this->l('Font').':</td>
			    <td class="conf-value"><select name="font" rel="font-preview" class="font-changer">'.$font_opts.'</select><span id="font-preview" style="font-size:30px;line-height: 30px; display:block;padding:8px 0 0 0">Lorem ipsum $99.99</span></td>
			</tr>
			<tr>
			    <td class="conf-title">'.$this->l('Image width').':</td>
			    <td class="conf-value"><input type="text" name="image_width" size="10" value="'.$def_values['image_width'].'"></td>
			</tr>
			<tr>
			    <td class="conf-title">'.$this->l('Image height').':</td>
			    <td class="conf-value"><input type="text" name="image_height" size="10" value="'.$def_values['image_height'].'"></td>
			</tr>
			</table>

			<input type="submit" name="addnew" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
			</fieldset>

			</form>
      ';

		return $content;
	}

	function _main()
	{
		$id_shop = (int)Shop::getContextShopID();
		$img_path = _MODULE_DIR_.$this->name.'/slides/';

		$query = "select * from "._DB_PREFIX_."tonyhomeslider where id_shop='$id_shop' order by slide_group asc, sort_order asc";
		$rows = Db::getInstance()->executeS($query);

		$slides = array();

		$content = '';
		foreach ($rows as $row)
		{
			$slides[$row['slide_group']][] = $row;
		}
		ksort($slides);

		foreach ($slides as $group => $rows)
		{
			$content .= '<fieldset class="conf-set"><legend>'.$this->l('Group').' '.$group.'</legend>';
			foreach ($rows as $row)
			{
				$content .= '
<div class="slider-div">          
<img src="'.$img_path.$row['image'].'" width="200"><br />
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide&ssid='.$row['slide_id'].'">'.$this->l('Edit').'</a>]
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslide&ssid='.$row['slide_id'].'">'.$this->l('Delete').'</a>]
</div>         
         ';
			}

			$content .= '</fieldset>';

		}


		/*$opt_html = '';
		  $sett_name = 'font-label';
		  foreach($this->m_google_fonts as $index=>$font)
		  {
			$selected = ($font == $cfg['label_font']) ? 'selected' : '';
			$opt_html .= '<option value="'.$font.'" '.$selected.'>'.$font.'</option>';
		  }
		  $input = '<select name="label_font" class="font-changer" rel="'.$sett_name.'">'.$opt_html.'</select><span id="'.$sett_name.'" style="font-size:30px;line-height: 30px; display:block;padding:8px 0 0 0">Lorem ipsum $99.99</span>';*/


		$cfg = unserialize(Configuration::get($this->name.'_settings'));

		if (! is_array($cfg)) $cfg = array();

		$content = '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:250px;font-weight:bold;text-align:right;}
.conf-table td{padding-bottom:10px;}
.slider-div{float:left;text-align:center;padding:10px;}
.comments{font-size:11px;}
</style>
<script type="text/javascript">
$(document).ready(function(){

  jQuery(".font-changer").change(function(){
    var vid = $(this).attr("rel");
      jQuery("#"+vid).css({ fontFamily: $(this).val().replace("+"," ") });
      jQuery("<link />",{href:"http://fonts.googleapis.com/css?family="+$(this).val(),rel:"stylesheet",type:"text/css"}).appendTo("head");
  }).keyup(function(){
  var vid = $(this).attr("rel");
      jQuery("#"+vid).css({ fontFamily: $(this).val().replace("+"," ") });
      jQuery("<link />",{href:"http://fonts.googleapis.com/css?family="+$(this).val(),rel:"stylesheet",type:"text/css"}).appendTo("head");
  }).keydown(function(){
  var vid = $(this).attr("rel");
      jQuery("#"+vid).css({ fontFamily: $(this).val().replace("+"," ") });
      jQuery("<link />",{href:"http://fonts.googleapis.com/css?family="+$(this).val(),rel:"stylesheet",type:"text/css"}).appendTo("head");
  });
  
  $(".font-changer").trigger("change");
});
  
</script>
<form method="post">
<fieldset class="conf-set">
<legend>'.$this->l('Slider configuration').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<fieldset class="conf-set">
<legend>'.$this->l('Color options').'</legend>
<table class="conf-table">      
<tr>
    <td class="conf-title">'.$this->l('Button color').':</td>
    <td class="conf-value"><input type="text" name="button_color" value="'.$cfg['button_color'].'" class="color mColorPickerInput mColorPicker" data-hex="true"><div class="comment">Set color for navigation buttons</div></td>
</tr>
<tr>
    <td class="conf-title">'.$this->l('Button hover color').':</td>
    <td class="conf-value"><input type="text" name="button_hover_color" value="'.$cfg['button_hover_color'].'" class="color mColorPickerInput mColorPicker" data-hex="true"><div class="comment">Set hover color for navigation buttons</div></td>
</tr>
</table>
<input type="submit" name="savesett" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>

'.$content.'

<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide'.'"><input type="button" name="addnew" value="'.$this->l('Add slide').'" class="button"></a>
</fieldset>

</form>
      ';
		return $content;
	}

	public function getContent()
	{
		if (Tools::isSubmit('savesett'))
		{
			$cfg = array();

			$cfg['button_color'] = Tools::getValue('button_color');
			$cfg['button_hover_color'] = Tools::getValue('button_hover_color');
			$cfg = serialize($cfg);
			Configuration::updateValue($this->name.'_settings', $cfg);
			$this->_clearCache('tonyflexslider.tpl');

			$this->update_css();
		}

		$this->context->controller->addJS(_PS_JS_DIR_.'jquery/plugins/jquery.colorpicker.js');
		$js = '
<script type="text/javascript">
$(document).ready(function() {
  $(".mColorPicker").mColorPicker();
});  
</script>      
      ';
		return $js.$this->displayForm();
	}

	public function hookDisplayHome($params)
	{
		$current_language = $this->context->language->id;
		$id_shop = (int)Shop::getContextShopID();

		$query = "select * from "._DB_PREFIX_."tonyhomeslider where id_shop='$id_shop' order by slide_group asc, sort_order asc";
		$rows = Db::getInstance()->executeS($query);

		$slider = array();
		$google_fonts = array();

		foreach ($rows as $row)
		{
			$query = "select * from "._DB_PREFIX_."tonyhomeslider_texts where slide_id='{$row['slide_id']}' and id_lang='$current_language'";
			$rows2 = Db::getInstance()->executeS($query);
			$texts = $rows2[0];
			$position = unserialize($texts['position1']);
			$style = array();

			if (strlen($position['top'])) $style[] = 'top:'.$position['top'];
			if (strlen($position['right'])) $style[] = 'right:'.$position['right'];
			if (strlen($position['bottom'])) $style[] = 'bottom:'.$position['bottom'];
			if (strlen($position['left'])) $style[] = 'left:'.$position['left'];
			if (strlen($position['custom'])) $style[] = $position['custom'];
			if (strlen($row['font']) && $row['font'] != 'Default')
			{
				$google_fonts[] = $this->context->link->protocol_content.'fonts.googleapis.com/css?family='.urlencode($row['font']);
			}

			if (count($style)) $style_html = implode(';', $style);
			else
				$style_html = 'top:50%;';

			$slider[$row['slide_group']][] = @array('new_window' => $row['new_window'], 'image' => $this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/slides/'.$row['image'], 'w' => (int)$row['image_width'], 'h' => (int)$row['image_height'], 'link' => $row['link'], 'txt1' => $texts['txt1'], 'txt2' => $texts['txt2'], 'color1' => $position['color1'], 'color2' => $position['color2'], 'font' => $row['font'], 'style' => $style_html,);
		}

		ksort($slider);
		$this->context->smarty->assign(array('tonyslider' => $slider, 'google_fonts' => $google_fonts,));

		return ($this->display(__FILE__, 'tonyflexslider.tpl'));
	}

	function update_css()
	{
		$css_files = array('customization.css');
		@chmod(_PS_MODULE_DIR_.$this->name.'/css', 0755);
		$cfg = unserialize(Configuration::get($this->name.'_settings'));
		if (! is_array($cfg)) $cfg = array();

		$search = array('{$button_color}', '{$button_hover_color}');
		$replace = array($cfg['button_color'], $cfg['button_hover_color']);

		foreach ($css_files as $file)
		{
			@chmod(_PS_MODULE_DIR_.$this->name.'/css/'.$file, 0755);

			$file_content = file_get_contents(_PS_MODULE_DIR_.$this->name.'/css/template_'.$file);
			$file_content = str_replace($search, $replace, $file_content);
			file_put_contents(_PS_MODULE_DIR_.$this->name.'/css/'.$file, $file_content);
		}
	}

}