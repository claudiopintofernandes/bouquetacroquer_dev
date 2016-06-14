<?php

error_reporting(E_ALL ^ E_NOTICE);
if (!defined('_PS_VERSION_')) exit;

class tonythemesettings extends Module
{

	var $m_google_fonts = array('Default', 'Abel', 'Abril Fatface', 'Aclonica', 'Actor', 'Adamina', 'Aguafina Script', 'Aladin', 'Aldrich', 'Alice', 'Alike Angular', 'Alike', 'Allan', 'Allerta Stencil', 'Allerta', 'Amaranth', 'Amatic SC', 'Andada', 'Andika', 'Annie Use Your Telescope', 'Anonymous Pro', 'Antic', 'Anton', 'Arapey', 'Architects Daughter', 'Arimo', 'Artifika', 'Arvo', 'Asset', 'Astloch', 'Atomic Age', 'Aubrey', 'Bangers', 'Bentham', 'Bevan', 'Bigshot One', 'Bitter', 'Black Ops One', 'Bowlby One SC', 'Bowlby One', 'Brawler', 'Bubblegum Sans', 'Buda', 'Butcherman Caps', 'Cabin Condensed', 'Cabin Sketch', 'Cabin', 'Cagliostro', 'Calligraffitti', 'Candal', 'Cantarell', 'Cardo', 'Carme', 'Carter One', 'Caudex', 'Cedarville Cursive', 'Changa One', 'Cherry Cream Soda', 'Chewy', 'Chicle', 'Chivo', 'Coda Caption', 'Coda', 'Comfortaa', 'Coming Soon', 'Contrail One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Cousine', 'Coustard', 'Covered By Your Grace', 'Crafty Girls', 'Creepster Caps', 'Crimson Text', 'Crushed', 'Cuprum', 'Damion', 'Dancing Script', 'Dawning of a New Day', 'Days One', 'Delius Swash Caps', 'Delius Unicase', 'Delius', 'Devonshire', 'Didact Gothic', 'Dorsa', 'Dr Sugiyama', 'Droid Sans Mono', 'Droid Sans', 'Droid Serif', 'EB Garamond', 'Eater Caps', 'Expletus Sans', 'Fanwood Text', 'Federant', 'Federo', 'Fjord One', 'Fondamento', 'Fontdiner Swanky', 'Forum', 'Francois One', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar Fill', 'Geostar', 'Give You Glory', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Goudy Bookletter 1911', 'Gravitas One', 'Gruppo', 'Hammersmith One', 'Herr Von Muellerhoff', 'Holtwood One SC', 'Homemade Apple', 'IM Fell DW Pica SC', 'IM Fell DW Pica', 'IM Fell Double Pica SC', 'IM Fell Double Pica', 'IM Fell English SC', 'IM Fell English', 'IM Fell French Canon SC', 'IM Fell French Canon', 'IM Fell Great Primer SC', 'IM Fell Great Primer', 'Iceland', 'Inconsolata', 'Indie Flower', 'Irish Grover', 'Istok Web', 'Jockey One', 'Josefin Sans', 'Josefin Slab', 'Judson', 'Julee', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kameron', 'Kelly Slab', 'Kenia', 'Knewave', 'Kranky', 'Kreon', 'Kristi', 'La Belle Aurore', 'Lancelot', 'Lato', 'League Script', 'Leckerli One', 'Lekton', 'Lemon', 'Limelight', 'Linden Hill', 'Lobster Two', 'Lobster', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Luckiest Guy', 'Maiden Orange', 'Mako', 'Marck Script', 'Marvel', 'Mate SC', 'Mate', 'Maven Pro', 'Meddon', 'MedievalSharp', 'Megrim', 'Merienda One', 'Merriweather', 'Metrophobic', 'Michroma', 'Miltonian Tattoo', 'Miltonian', 'Miss Fajardose', 'Miss Saint Delafield', 'Modern Antiqua', 'Molengo', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montez', 'Mountains of Christmas', 'Mr Bedford', 'Mr Dafoe', 'Mr De Haviland', 'Mrs Sheppards', 'Muli', 'Neucha', 'Neuton', 'News Cycle', 'Niconne', 'Nixie One', 'Nobile', 'Nosifer Caps', 'Nothing You Could Do', 'Nova Cut', 'Nova Flat', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Old Standard TT', 'Open Sans Condensed', 'Open Sans', 'Orbitron', 'Oswald', 'Over the Rainbow', 'Ovo', 'PT Sans Caption', 'PT Sans Narrow', 'PT Sans', 'PT Serif Caption', 'PT Serif', 'Pacifico', 'Passero One', 'Patrick Hand', 'Paytone One', 'Permanent Marker', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Play', 'Playfair Display', 'Podkova', 'Poller One', 'Poly', 'Pompiere', 'Prata', 'Prociono', 'Puritan', 'Quattrocento Sans', 'Quattrocento', 'Questrial', 'Quicksand', 'Radley', 'Raleway', 'Rammetto One', 'Rancho', 'Rationale', 'Redressed', 'Reenie Beanie', 'Ribeye Marrow', 'Ribeye', 'Righteous', 'Rochester', 'Rock Salt', 'Rokkitt', 'Rosario', 'Ruslan Display', 'Salsa', 'Sancreek', 'Sansita One', 'Satisfy', 'Schoolbell', 'Shadows Into Light', 'Shanti', 'Short Stack', 'Sigmar One', 'Signika Negative', 'Signika', 'Six Caps', 'Slackey', 'Smokum', 'Smythe', 'Sniglet', 'Snippet', 'Sorts Mill Goudy', 'Special Elite', 'Spinnaker', 'Spirax', 'Stardos Stencil', 'Sue Ellen Francisco', 'Sunshiney', 'Supermercado One', 'Swanky and Moo Moo', 'Syncopate', 'Tangerine', 'Tenor Sans', 'Terminal Dosis', 'The Girl Next Door', 'Tienne', 'Tinos', 'Tulpen One', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ubuntu', 'Ultra', 'UnifrakturCook', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Varela Round', 'Varela', 'Vast Shadow', 'Vibur', 'Vidaloka', 'Volkhov', 'Vollkorn', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Wire One', 'Yanone Kaffeesatz', 'Yellowtail', 'Yeseva One', 'Zeyada');

	public function __construct()
	{
		$this->name = 'tonythemesettings';
		$this->tab = 'Other';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Tonytheme Settings module');
		$this->description = $this->l('Modify Tonytheme settings');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		$this->m_settings = array('TONY_GENERAL_STYLE' => array('site_style', '', $this->l('Site style'), 'general', $this->l('General'), ' size="50"'), 'TONY_GENERAL_THEME_COLOR' => array('theme_color', '#9D3BC6', $this->l('Theme color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for buttons, icons and backgrounds'), 'TONY_GENERAL_THEME_HOVER_COLOR' => array('theme_hover_color', '#9D3BC6', $this->l('Theme Hover color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for mouse over for buttons, icons and backgrounds'), 'TONY_GENERAL_THEME_INPUT_BCOL' => array('theme_input_border_color', '#F0F0F1', $this->l('Input border color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for input border'), 'TONY_GENERAL_THEME_INPUT_TCOL' => array('theme_input_text_color', '#000000', $this->l('Input text color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for input text'), 'TONY_GENERAL_THEME_BUTT_DARK' => array('theme_butt_dark_color', '#333', $this->l('Button dark color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set dark color for buttons'), 'TONY_GENERAL_THEME_INPUT_HOVER' => array('theme_input_hover', '#9D3BC6', $this->l('Input hover color (focus border)'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for focus input border'), 'TONY_GENERAL_THEME_TEXT_COLOR' => array('theme_text_color', '#000000', $this->l('Text Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default text color for all blocks'), 'TONY_GENERAL_THEME_LINK_COLOR' => array('theme_link_color', '#000000', $this->l('Link Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default link color for all blocks'), 'TONY_GENERAL_THEME_LINK_HOVER' => array('theme_link_hover', '#000000', $this->l('Link Hover Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default link hover color for all blocks'), 'TONY_GENERAL_THEME_BACK_COLOR' => array('theme_back_color', '#ffffff', $this->l('Background Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set background color for all blocks'), 'TONY_GENERAL_THEME_BACK_IMAGE' => array('theme_back_image', '', $this->l('Background Image (All pages)'), 'general', $this->l('General'), '', 'Upload background image/pattern for all blocks (JPG, PNG or GIF image)'), 'TONY_GENERAL_THEME_BACK_IMG_MD' => array('theme_back_image_mode', 'repeat', $this->l('Background Image display mode'), 'general', $this->l('General'), '', 'Set background image display mode'), 'TONY_GENERAL_THEME_FONT' => array('theme_font', 'Default', $this->l('Theme Font'), 'general', $this->l('General'), '', 'Theme use Google font\'s library. Find out more here - <a href="http://www.google.com/fonts/">Google web fonts free library</a>'), 'TONY_GENERAL_THEME_CAPT_FONT' => array('theme_caption_font', 'Oswald', $this->l('Caption Font'), 'general', $this->l('General'), '', 'Select font which will be used for headings, buttons, block titles etc.'), 'TONY_GENERAL_THEME_CAPT_COLOR' => array('theme_caption_color', '#000000', $this->l('Caption Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HOME_LEFT_MENU' => array('theme_home_left_menu', '0', $this->l('Left menu on home page'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_TXT_COLOR' => array('theme_header_txt_color', '#9B9B9B', $this->l('Text Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_LINK_COLOR' => array('theme_header_link_color', '#9D3BC6', $this->l('Link Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_LHOVER_COLOR' => array('theme_header_link_hover_color', '#9D3BC6', $this->l('Link Hover Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_BG_COLOR' => array('theme_header_bg_color', '#333333', $this->l('Background Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_PHONE_COLOR' => array('theme_header_phone_color', '#ffffff', $this->l('Phone Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_FIXED_SCROLL' => array('theme_menu_fixed_scroll', '1', $this->l('Fixed menu on scroll'), 'Main menu', $this->l('Main menu'), '', ''), 'TONY_MENU_FONT' => array('theme_menu_font', 'Oswald', $this->l('Level1 Menu Font'), 'Main menu', $this->l('Main menu'), '', 'Select font which will be used for main menu'), 'TONY_MENU_COLOR_L1' => array('theme_menu_color_l1', '#000000', $this->l('Level 1 link color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_HCOLOR_L1' => array('theme_menu_hover_color_l1', '#9D3BC6', $this->l('Level 1 link hover color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BGHCOLOR_L1' => array('theme_menu_bgh_color_l1', '#ffffff', $this->l('Level 1 link hover background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_FONT2' => array('theme_menu_font2', 'Default', $this->l('Level2 Menu Font'), 'Main menu', $this->l('Main menu'), '', 'Select font which will be used for sub menu'), 'TONY_MENU_COLOR_L2' => array('theme_menu_color_l2', '#000000', $this->l('Level 2 link color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_HCOLOR_L2' => array('theme_menu_hover_color_l2', '#000000', $this->l('Level 2 link hover color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BGHCOLOR_L2' => array('theme_menu_bg_color_l2', '#f0f0f0', $this->l('Level 2 link hover background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_TEXT_COLOR' => array('theme_menu_text_color', '#000000', $this->l('Text color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BG_COLOR' => array('theme_menu_bg_color', '#ffffff', $this->l('Background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BADGES_BG_COLOR' => array('theme_menu_badges_bg_color', '#FF391C', $this->l('Categories badges background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BADGES_TXT_COLOR' => array('theme_menu_badges_txt_color', '#ffffff', $this->l('Categories badges text color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_TOP_PHONE' => array('header_phone', '+1234567890', $this->l('Phone number'), 'header', $this->l('Header'), ' size="50"'), 'TONY_TOP_WELCOME_MSG' => array('header_welcome_msg', 'Welcome!', $this->l('Welcome message'), 'header', $this->l('Header'), ' size="50"'), 'TONY_FOOTER_TXT_COLOR' => array('theme_footer_txt_color', '#808080', $this->l('Text Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set text color for footer line'), 'TONY_FOOTER_LINK_COLOR' => array('theme_footer_link_color', '#9D3BC6', $this->l('Link Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link color for footer line'), 'TONY_FOOTER_LINK_HCOLOR' => array('theme_footer_link_hcolor', '#9D3BC6', $this->l('Link Hover Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link hover color for footer line'), 'TONY_FOOTER_BUTTON_COLOR' => array('theme_footer_button_color', '#808080', $this->l('Social button Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set social button color for footer line'), 'TONY_FOOTER_BUTTON_HCOLOR' => array('theme_footer_button_hcolor', '#9D3BC6', $this->l('Social button Hover Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set social button hover color for footer line'), 'TONY_FOOTER_BG_COLOR' => array('theme_footer_bg_color', '#333333', $this->l('Background Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set background color for footer line'), 'TONY_PFOOTER_DISPLAY' => array('footer_display', 'show', $this->l('Display options'), 'footer_popup', $this->l('Footer Popup'), ' size="50"'), 'TONY_PFOOTER_TXT_COLOR' => array('theme_pfooter_txt_color', '#808080', $this->l('Text Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set text color for footer popup'), 'TONY_PFOOTER_CAPT_COLOR' => array('theme_pfooter_capt_color', '#ffffff', $this->l('Caption Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set caption color for footer popup'), 'TONY_PFOOTER_LINK_COLOR' => array('theme_pfooter_link_color', '#808080', $this->l('Link Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link color for footer popup'), 'TONY_PFOOTER_LINK_HCOLOR' => array('theme_pfooter_link_hcolor', '#808080', $this->l('Link Hover Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link hover color for footer popup'), 'TONY_PFOOTER_BG_COLOR' => array('theme_pfooter_bg_color', '0,0,0,0.85', $this->l('Background Color'), 'footer_popup', $this->l('Footer Popup'), ' ', 'Set background color for footer popup (RGBA value)'), //'TONY_PFOOTER_BG_TRANS'=>array('theme_pfooter_bg_trans','0,0,0,0.85',$this->l('Background color'),'footer_popup',$this->l('Footer Popup'),' size="5"' ,'RGBA value'),
			'TONY_PRODUCTS_IMAGE_DIMENSIONS' => array('products_img_dimensions', 'big', $this->l('Products images dimension'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_REDIRECT_AFTER_ADDING_PRODUCT_TO_CART' => array('products_redirect_after_adding_product_to_cart', 0, $this->l('Redirect after adding product to cart'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_LEFT_COLUMN' => array('products_left_column', 'show', $this->l('Products listing left column'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_VIEW_MODE' => array('product_view_mode', 'grid', $this->l('Default products listing mode'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_SHOW_MODE' => array('products_show_mode', 'reach', $this->l('Products listing show mode'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS' => array('products_img_viewer', 'coudzoom', $this->l('Products image viewer'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_HOVER_MODE' => array('products_img_hover_mode', 'reach', $this->l('Products listing hover'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_PNAME_COLOR' => array('products_product_color', '#000000', $this->l('Product name color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PNAME_HCOLOR' => array('products_product_hcolor', '#000000', $this->l('Product name hover color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREVPNAME_COLOR' => array('products_preview_product_color', '#000000', $this->l('Product name color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREVPNAME_HCOLOR' => array('products_preview_product_hcolor', '#000000', $this->l('Product name hover color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_NAMEI_COLOR' => array('products_product_page_color', '#000000', $this->l('Product name color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_BORDER_COLOR' => array('products_border_color', '0, 0, 0, 0.27', $this->l('Product box border color'), 'products', $this->l('Products'), '', 'RGBA value'), 'TONY_PRODUCTS_BOX_BG_COLOR' => array('products_box_bg_color', '#ffffff', $this->l('Product box background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_PRODUCTS_BORDER_HCOLOR' => array('products_border_hover_color', '0, 0, 0, 0.27', $this->l('Product border hover color'), 'products', $this->l('Products'), '', 'RGBA value'), 'TONY_PRODUCTS_PBOX_BG_COLOR' => array('products_pbox_bg_color', '#ffffff', $this->l('Product hover box background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_PRODUCTS_PRICE_COLOR_REG' => array('products_price_color_reg', '#4D4D4D', $this->l('Regular Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR_SP' => array('products_price_color_spec', '#D40000', $this->l('Special Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR_OLD' => array('products_price_color_old', '#4D4D4D', $this->l('Old Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_REG' => array('products_preview_price_color_reg', '#000000', $this->l('Regular Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_SP' => array('products_preview_price_color_spec', '#D40000', $this->l('Special Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_OLD' => array('products_preview_price_color_old', '#000000', $this->l('Old Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR' => array('products_price_color', '#e60000', $this->l('Regular Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PAGE_PRICE_COLOR_SP' => array('products_page_price_color_spec', '#e60000', $this->l('Special Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PAGE_PRICE_COLOR_OLD' => array('products_page_price_color_old', '#000000', $this->l('Old Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_FONT' => array('products_price_font', 'Default', $this->l('Price font'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_DISC_LABELS' => array('products_discount_labels', 'show', $this->l('Discount Labels'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_DISC_LABELS_BG_COLOR' => array('products_discount_labels_bg_color', '#9D3BC6', $this->l('Discount Labels background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_DISC_LABELS_TXT_COLOR' => array('products_discount_labels_txt_color', '#ffffff', $this->l('Discount Labels text color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_QUICK_VIEW' => array('products_quick_view', 'show', $this->l('Quick View Link'), 'products', $this->l('Products'), ''), 'TONY_DELIM_CONTENT_COLOR' => array('delim_content_color', '#ececec', $this->l('Delimiter Content Color'), 'delimiters', $this->l('Delimiters'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Delimiter color'), 'TONY_DELIM_CONTENT' => array('delim_content_img', '', $this->l('Delimiter Content Image'), 'delimiters', $this->l('Delimiters'), '', 'Upload delimiter content image (JPG, PNG or GIF image)'), 'TONY_DELIM_CONTENT_H' => array('delim_content_h', '1', $this->l('Delimiter Content Height'), 'delimiters', $this->l('Delimiters'), '', 'px'), 'TONY_DELIM_FOOTER_COLOR' => array('delim_footer_color', '#ececec', $this->l('Delimiter Footer Color'), 'delimiters', $this->l('Delimiters'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Delimiter color'), 'TONY_DELIM_FOOTER' => array('delim_footer_img', '', $this->l('Delimiter Footer Image'), 'delimiters', $this->l('Delimiters'), '', 'Upload delimiter footer image (JPG, PNG or GIF image)'), 'TONY_DELIM_FOOTER_H' => array('delim_footer_h', '', $this->l('Delimiter Footer Height'), 'delimiters', $this->l('Delimiters'), '', 'px'), 'TONY_NOTIF_ADDCART_BG_COLOR' => array('add_to_cart_bg_color', '#333', $this->l('Notification background color'), 'notif', $this->l('Notifications'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Background color of the notification window'), 'TONY_NOTIF_ADDCART_TXT_COLOR' => array('add_to_cart_txt_color', '#fff', $this->l('Notification text color'), 'notif', $this->l('Notifications'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Text color of the notification window'), 'TONY_NOTIF_ADDCART_OPACITY' => array('add_to_cart_opacity', '0.85', $this->l('Background transparency'), 'notif', $this->l('Notifications'), '', 'Set background transparency <br />[0...1]'), 'TONY_COUNT_DOWN' => array('count_down', '1', $this->l('Enable countdown'), 'count_down', $this->l('Countdown'), '', ''), 'TONY_COUNT_DOWN_BG_COLOR' => array('count_down_bg_color', '#9D3BC6', $this->l('Background color'), 'count_down', $this->l('Countdown'), 'class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_COUNT_DOWN_TXT_COLOR' => array('count_down_txt_color', '#ffffff', $this->l('Text color'), 'count_down', $this->l('Countdown'), 'class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_COUNT_DOWN_TXT_FONT' => array('count_down_txt_font', 'Default', $this->l('Text font'), 'count_down', $this->l('Countdown'), '', 'Theme use Google font\'s library. Find out more here - <a href="http://www.google.com/fonts/">Google web fonts free library</a>'),);

		$this->m_settings_dark = array('TONY_GENERAL_STYLE' => array('site_style', '', $this->l('Site style'), 'general', $this->l('General'), ' size="50"'), 'TONY_GENERAL_THEME_COLOR' => array('theme_color', '#FF6000', $this->l('Theme color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for buttons, icons and backgrounds'), 'TONY_GENERAL_THEME_HOVER_COLOR' => array('theme_hover_color', '#FF6000', $this->l('Theme Hover color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for mouse over for buttons, icons and backgrounds'), 'TONY_GENERAL_THEME_INPUT_BCOL' => array('theme_input_border_color', '#F0F0F1', $this->l('Input border color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for input border'), 'TONY_GENERAL_THEME_INPUT_TCOL' => array('theme_input_text_color', '#000000', $this->l('Input text color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for input text'), 'TONY_GENERAL_THEME_BUTT_DARK' => array('theme_butt_dark_color', '#333', $this->l('Button dark color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set dark color for buttons'), 'TONY_GENERAL_THEME_INPUT_HOVER' => array('theme_input_hover', '#FF6000', $this->l('Input hover color (focus border)'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for focus input border'), 'TONY_GENERAL_THEME_TEXT_COLOR' => array('theme_text_color', '#ffffff', $this->l('Text Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default text color for all blocks'), 'TONY_GENERAL_THEME_LINK_COLOR' => array('theme_link_color', '#ffffff', $this->l('Link Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default link color for all blocks'), 'TONY_GENERAL_THEME_LINK_HOVER' => array('theme_link_hover', '#ffffff', $this->l('Link Hover Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default link hover color for all blocks'), 'TONY_GENERAL_THEME_BACK_COLOR' => array('theme_back_color', '#ffffff', $this->l('Background Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set background color for all blocks'), 'TONY_GENERAL_THEME_BACK_IMAGE' => array('theme_back_image', 'body_bg_dark_r.png', $this->l('Background Image (All pages)'), 'general', $this->l('General'), '', 'Upload background image/pattern for all blocks (JPG, PNG or GIF image)'), 'TONY_GENERAL_THEME_BACK_IMG_MD' => array('theme_back_image_mode', 'repeat', $this->l('Background Image display mode'), 'general', $this->l('General'), '', 'Set background image display mode'), 'TONY_GENERAL_THEME_FONT' => array('theme_font', 'Default', $this->l('Theme Font'), 'general', $this->l('General'), '', 'Theme use Google font\'s library. Find out more here - <a href="http://www.google.com/fonts/">Google web fonts free library</a>'), 'TONY_GENERAL_THEME_CAPT_FONT' => array('theme_caption_font', 'Oswald', $this->l('Caption Font'), 'general', $this->l('General'), '', 'Select font which will be used for headings, buttons, block titles etc.'), 'TONY_GENERAL_THEME_CAPT_COLOR' => array('theme_caption_color', '#FF6000', $this->l('Caption Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HOME_LEFT_MENU' => array('theme_home_left_menu', '0', $this->l('Left menu on home page'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_TXT_COLOR' => array('theme_header_txt_color', '#ffffff', $this->l('Text Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_LINK_COLOR' => array('theme_header_link_color', '#ffffff', $this->l('Link Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_LHOVER_COLOR' => array('theme_header_link_hover_color', '#ffffff', $this->l('Link Hover Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_BG_COLOR' => array('theme_header_bg_color', '#FF6000', $this->l('Background Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_PHONE_COLOR' => array('theme_header_phone_color', '#ffffff', $this->l('Phone Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_FIXED_SCROLL' => array('theme_menu_fixed_scroll', '1', $this->l('Fixed menu on scroll'), 'Main menu', $this->l('Main menu'), '', ''), 'TONY_MENU_FONT' => array('theme_menu_font', 'Oswald', $this->l('Level1 Menu Font'), 'Main menu', $this->l('Main menu'), '', 'Select font which will be used for main menu'), 'TONY_MENU_COLOR_L1' => array('theme_menu_color_l1', '#ffffff', $this->l('Level 1 link color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_HCOLOR_L1' => array('theme_menu_hover_color_l1', '#FF6000', $this->l('Level 1 link hover color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BGHCOLOR_L1' => array('theme_menu_bgh_color_l1', '', $this->l('Level 1 link hover background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_FONT2' => array('theme_menu_font2', 'Default', $this->l('Level2 Menu Font'), 'Main menu', $this->l('Main menu'), '', 'Select font which will be used for sub menu'), 'TONY_MENU_COLOR_L2' => array('theme_menu_color_l2', '#000000', $this->l('Level 2 link color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_HCOLOR_L2' => array('theme_menu_hover_color_l2', '#000000', $this->l('Level 2 link hover color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BGHCOLOR_L2' => array('theme_menu_bg_color_l2', '#f0f0f0', $this->l('Level 2 link hover background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_TEXT_COLOR' => array('theme_menu_text_color', '#000000', $this->l('Text color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BG_COLOR' => array('theme_menu_bg_color', '#ffffff', $this->l('Background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BADGES_BG_COLOR' => array('theme_menu_badges_bg_color', '#FF391C', $this->l('Categories badges background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BADGES_TXT_COLOR' => array('theme_menu_badges_txt_color', '#ffffff', $this->l('Categories badges text color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_TOP_PHONE' => array('header_phone', '+1234567890', $this->l('Phone number'), 'header', $this->l('Header'), ' size="50"'), 'TONY_TOP_WELCOME_MSG' => array('header_welcome_msg', 'Welcome!', $this->l('Welcome message'), 'header', $this->l('Header'), ' size="50"'), 'TONY_FOOTER_TXT_COLOR' => array('theme_footer_txt_color', '#808080', $this->l('Text Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set text color for footer line'), 'TONY_FOOTER_LINK_COLOR' => array('theme_footer_link_color', '#FF6000', $this->l('Link Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link color for footer line'), 'TONY_FOOTER_LINK_HCOLOR' => array('theme_footer_link_hcolor', '#FF6000', $this->l('Link Hover Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link hover color for footer line'), 'TONY_FOOTER_BUTTON_COLOR' => array('theme_footer_button_color', '#808080', $this->l('Social button Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set social button color for footer line'), 'TONY_FOOTER_BUTTON_HCOLOR' => array('theme_footer_button_hcolor', '#FF6000', $this->l('Social button Hover Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set social button hover color for footer line'), 'TONY_FOOTER_BG_COLOR' => array('theme_footer_bg_color', '', $this->l('Background Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set background color for footer line'), 'TONY_PFOOTER_DISPLAY' => array('footer_display', 'show_static', $this->l('Display options'), 'footer_popup', $this->l('Footer Popup'), ' size="50"'), 'TONY_PFOOTER_TXT_COLOR' => array('theme_pfooter_txt_color', '#ffffff', $this->l('Text Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set text color for footer popup'), 'TONY_PFOOTER_CAPT_COLOR' => array('theme_pfooter_capt_color', '#ffffff', $this->l('Caption Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set caption color for footer popup'), 'TONY_PFOOTER_LINK_COLOR' => array('theme_pfooter_link_color', '#ffffff', $this->l('Link Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link color for footer popup'), 'TONY_PFOOTER_LINK_HCOLOR' => array('theme_pfooter_link_hcolor', '#ffffff', $this->l('Link Hover Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link hover color for footer popup'), 'TONY_PFOOTER_BG_COLOR' => array('theme_pfooter_bg_color', '0,0,0,0.85', $this->l('Background Color'), 'footer_popup', $this->l('Footer Popup'), ' ', 'Set background color for footer popup (RGBA value)'), //'TONY_PFOOTER_BG_TRANS'=>array('theme_pfooter_bg_trans','0,0,0,0.85',$this->l('Background color'),'footer_popup',$this->l('Footer Popup'),' size="5"' ,'RGBA value'),
			'TONY_PRODUCTS_IMAGE_DIMENSIONS' => array('products_img_dimensions', 'big', $this->l('Products images dimension'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_REDIRECT_AFTER_ADDING_PRODUCT_TO_CART' => array('products_redirect_after_adding_product_to_cart', 0, $this->l('Redirect after adding product to cart'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_LEFT_COLUMN' => array('products_left_column', 'show', $this->l('Products listing left column'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_VIEW_MODE' => array('product_view_mode', 'grid', $this->l('Default products listing mode'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_SHOW_MODE' => array('products_show_mode', 'reach', $this->l('Products listing show mode'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS' => array('products_img_viewer', 'coudzoom', $this->l('Products image viewer'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_HOVER_MODE' => array('products_img_hover_mode', 'simple', $this->l('Products listing hover'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_PNAME_COLOR' => array('products_product_color', '#ffffff', $this->l('Product name color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PNAME_HCOLOR' => array('products_product_hcolor', '#ffffff', $this->l('Product name hover color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREVPNAME_COLOR' => array('products_preview_product_color', '#000000', $this->l('Product name color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREVPNAME_HCOLOR' => array('products_preview_product_hcolor', '#000000', $this->l('Product name hover color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_NAMEI_COLOR' => array('products_product_page_color', '#ffffff', $this->l('Product name color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_BORDER_COLOR' => array('products_border_color', '0, 0, 0, 0.27', $this->l('Product box border color'), 'products', $this->l('Products'), '', 'RGBA value'), 'TONY_PRODUCTS_BOX_BG_COLOR' => array('products_box_bg_color', '', $this->l('Product box background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_PRODUCTS_BORDER_HCOLOR' => array('products_border_hover_color', '0, 0, 0, 0.27', $this->l('Product border hover color'), 'products', $this->l('Products'), '', 'RGBA value'), 'TONY_PRODUCTS_PBOX_BG_COLOR' => array('products_pbox_bg_color', '#ffffff', $this->l('Product hover box background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_PRODUCTS_PRICE_COLOR_REG' => array('products_price_color_reg', '#ffffff', $this->l('Regular Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR_SP' => array('products_price_color_spec', '#D40000', $this->l('Special Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR_OLD' => array('products_price_color_old', 'grey', $this->l('Old Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_REG' => array('products_preview_price_color_reg', '#000000', $this->l('Regular Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_SP' => array('products_preview_price_color_spec', '#D40000', $this->l('Special Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_OLD' => array('products_preview_price_color_old', '#000000', $this->l('Old Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR' => array('products_price_color', '#e60000', $this->l('Regular Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PAGE_PRICE_COLOR_SP' => array('products_page_price_color_spec', '#e60000', $this->l('Special Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PAGE_PRICE_COLOR_OLD' => array('products_page_price_color_old', 'grey', $this->l('Old Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_FONT' => array('products_price_font', 'Default', $this->l('Price font'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_DISC_LABELS' => array('products_discount_labels', 'show', $this->l('Discount Labels'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_DISC_LABELS_BG_COLOR' => array('products_discount_labels_bg_color', '#FF6000', $this->l('Discount Labels background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_DISC_LABELS_TXT_COLOR' => array('products_discount_labels_txt_color', '#ffffff', $this->l('Discount Labels text color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_QUICK_VIEW' => array('products_quick_view', 'show', $this->l('Quick View Link'), 'products', $this->l('Products'), ''), 'TONY_DELIM_CONTENT_COLOR' => array('delim_content_color', '#ececec', $this->l('Delimiter Content Color'), 'delimiters', $this->l('Delimiters'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Delimiter color'), 'TONY_DELIM_CONTENT' => array('delim_content_img', '', $this->l('Delimiter Content Image'), 'delimiters', $this->l('Delimiters'), '', 'Upload delimiter content image (JPG, PNG or GIF image)'), 'TONY_DELIM_CONTENT_H' => array('delim_content_h', '0', $this->l('Delimiter Content Height'), 'delimiters', $this->l('Delimiters'), '', 'px'), 'TONY_DELIM_FOOTER_COLOR' => array('delim_footer_color', '#ececec', $this->l('Delimiter Footer Color'), 'delimiters', $this->l('Delimiters'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Delimiter color'), 'TONY_DELIM_FOOTER' => array('delim_footer_img', '', $this->l('Delimiter Footer Image'), 'delimiters', $this->l('Delimiters'), '', 'Upload delimiter footer image (JPG, PNG or GIF image)'), 'TONY_DELIM_FOOTER_H' => array('delim_footer_h', '', $this->l('Delimiter Footer Height'), 'delimiters', $this->l('Delimiters'), '', 'px'), 'TONY_NOTIF_ADDCART_BG_COLOR' => array('add_to_cart_bg_color', '#ffffff', $this->l('Notification background color'), 'notif', $this->l('Notifications'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Background color of the notification window'), 'TONY_NOTIF_ADDCART_TXT_COLOR' => array('add_to_cart_txt_color', '#000000', $this->l('Notification text color'), 'notif', $this->l('Notifications'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Text color of the notification window'), 'TONY_NOTIF_ADDCART_OPACITY' => array('add_to_cart_opacity', '0.85', $this->l('Background transparency'), 'notif', $this->l('Notifications'), '', 'Set background transparency <br />[0...1]'), 'TONY_COUNT_DOWN' => array('count_down', '1', $this->l('Enable countdown'), 'count_down', $this->l('Countdown'), '', ''), 'TONY_COUNT_DOWN_BG_COLOR' => array('count_down_bg_color', '#FF6000', $this->l('Background color'), 'count_down', $this->l('Countdown'), 'class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_COUNT_DOWN_TXT_COLOR' => array('count_down_txt_color', '#ffffff', $this->l('Text color'), 'count_down', $this->l('Countdown'), 'class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_COUNT_DOWN_TXT_FONT' => array('count_down_txt_font', 'Default', $this->l('Text font'), 'count_down', $this->l('Countdown'), '', 'Theme use Google font\'s library. Find out more here - <a href="http://www.google.com/fonts/">Google web fonts free library</a>'),);

		$this->m_settings_vsecret = array('TONY_GENERAL_STYLE' => array('site_style', '', $this->l('Site style'), 'general', $this->l('General'), ' size="50"'), 'TONY_GENERAL_THEME_COLOR' => array('theme_color', '#F389B0', $this->l('Theme color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for buttons, icons and backgrounds'), 'TONY_GENERAL_THEME_HOVER_COLOR' => array('theme_hover_color', '#F3679A', $this->l('Theme Hover color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for mouse over for buttons, icons and backgrounds'), 'TONY_GENERAL_THEME_INPUT_BCOL' => array('theme_input_border_color', '#F0F0F1', $this->l('Input border color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for input border'), 'TONY_GENERAL_THEME_INPUT_TCOL' => array('theme_input_text_color', '#000000', $this->l('Input text color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for input text'), 'TONY_GENERAL_THEME_BUTT_DARK' => array('theme_butt_dark_color', '#333', $this->l('Button dark color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set dark color for buttons'), 'TONY_GENERAL_THEME_INPUT_HOVER' => array('theme_input_hover', '#F389B0', $this->l('Input hover color (focus border)'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set color for focus input border'), 'TONY_GENERAL_THEME_TEXT_COLOR' => array('theme_text_color', '#000000', $this->l('Text Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default text color for all blocks'), 'TONY_GENERAL_THEME_LINK_COLOR' => array('theme_link_color', '#000000', $this->l('Link Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default link color for all blocks'), 'TONY_GENERAL_THEME_LINK_HOVER' => array('theme_link_hover', '#F389B0', $this->l('Link Hover Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set default link hover color for all blocks'), 'TONY_GENERAL_THEME_BACK_COLOR' => array('theme_back_color', '#F7F7F7', $this->l('Background Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set background color for all blocks'), 'TONY_GENERAL_THEME_BACK_IMAGE' => array('theme_back_image', '', $this->l('Background Image (All pages)'), 'general', $this->l('General'), '', 'Upload background image/pattern for all blocks (JPG, PNG or GIF image)'), 'TONY_GENERAL_THEME_BACK_IMG_MD' => array('theme_back_image_mode', 'repeat', $this->l('Background Image display mode'), 'general', $this->l('General'), '', 'Set background image display mode'), 'TONY_GENERAL_THEME_FONT' => array('theme_font', 'Default', $this->l('Theme Font'), 'general', $this->l('General'), '', 'Theme use Google font\'s library. Find out more here - <a href="http://www.google.com/fonts/">Google web fonts free library</a>'), 'TONY_GENERAL_THEME_CAPT_FONT' => array('theme_caption_font', 'Oswald', $this->l('Caption Font'), 'general', $this->l('General'), '', 'Select font which will be used for headings, buttons, block titles etc.'), 'TONY_GENERAL_THEME_CAPT_COLOR' => array('theme_caption_color', '#000000', $this->l('Caption Color'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HOME_LEFT_MENU' => array('theme_home_left_menu', '1', $this->l('Left menu on home page'), 'general', $this->l('General'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_TXT_COLOR' => array('theme_header_txt_color', '#ffffff', $this->l('Text Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_LINK_COLOR' => array('theme_header_link_color', '#ffffff', $this->l('Link Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_LHOVER_COLOR' => array('theme_header_link_hover_color', '#ffffff', $this->l('Link Hover Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_BG_COLOR' => array('theme_header_bg_color', '#F389B0', $this->l('Background Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_GENERAL_HT_PHONE_COLOR' => array('theme_header_phone_color', '#ffffff', $this->l('Phone Color'), 'Header tool line', $this->l('Header tool line'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_FIXED_SCROLL' => array('theme_menu_fixed_scroll', '1', $this->l('Fixed menu on scroll'), 'Main menu', $this->l('Main menu'), '', ''), 'TONY_MENU_FONT' => array('theme_menu_font', 'Oswald', $this->l('Level1 Menu Font'), 'Main menu', $this->l('Main menu'), '', 'Select font which will be used for main menu'), 'TONY_MENU_COLOR_L1' => array('theme_menu_color_l1', '#000000', $this->l('Level 1 link color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_HCOLOR_L1' => array('theme_menu_hover_color_l1', '#F389B0', $this->l('Level 1 link hover color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BGHCOLOR_L1' => array('theme_menu_bgh_color_l1', '#ffffff', $this->l('Level 1 link hover background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_FONT2' => array('theme_menu_font2', 'Default', $this->l('Level2 Menu Font'), 'Main menu', $this->l('Main menu'), '', 'Select font which will be used for sub menu'), 'TONY_MENU_COLOR_L2' => array('theme_menu_color_l2', '#000000', $this->l('Level 2 link color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_HCOLOR_L2' => array('theme_menu_hover_color_l2', '#000000', $this->l('Level 2 link hover color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BGHCOLOR_L2' => array('theme_menu_bg_color_l2', '#f0f0f0', $this->l('Level 2 link hover background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_TEXT_COLOR' => array('theme_menu_text_color', '#000000', $this->l('Text color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BG_COLOR' => array('theme_menu_bg_color', '#ffffff', $this->l('Background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BADGES_BG_COLOR' => array('theme_menu_badges_bg_color', '#FF391C', $this->l('Categories badges background color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_MENU_BADGES_TXT_COLOR' => array('theme_menu_badges_txt_color', '#ffffff', $this->l('Categories badges text color'), 'Main menu', $this->l('Main menu'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_TOP_PHONE' => array('header_phone', '+1234567890', $this->l('Phone number'), 'header', $this->l('Header'), ' size="50"'), 'TONY_TOP_WELCOME_MSG' => array('header_welcome_msg', 'Welcome!', $this->l('Welcome message'), 'header', $this->l('Header'), ' size="50"'), 'TONY_FOOTER_TXT_COLOR' => array('theme_footer_txt_color', '#ffffff', $this->l('Text Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set text color for footer line'), 'TONY_FOOTER_LINK_COLOR' => array('theme_footer_link_color', '#ffffff', $this->l('Link Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link color for footer line'), 'TONY_FOOTER_LINK_HCOLOR' => array('theme_footer_link_hcolor', '#F3679A', $this->l('Link Hover Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link hover color for footer line'), 'TONY_FOOTER_BUTTON_COLOR' => array('theme_footer_button_color', '#ffffff', $this->l('Social button Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set social button color for footer line'), 'TONY_FOOTER_BUTTON_HCOLOR' => array('theme_footer_button_hcolor', '#ffffff', $this->l('Social button Hover Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set social button hover color for footer line'), 'TONY_FOOTER_BG_COLOR' => array('theme_footer_bg_color', '#F389B0', $this->l('Background Color'), 'footer', $this->l('Footer'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set background color for footer line'), 'TONY_PFOOTER_DISPLAY' => array('footer_display', 'show_static', $this->l('Display options'), 'footer_popup', $this->l('Footer Popup'), ' size="50"'), 'TONY_PFOOTER_TXT_COLOR' => array('theme_pfooter_txt_color', '#000000', $this->l('Text Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set text color for footer popup'), 'TONY_PFOOTER_CAPT_COLOR' => array('theme_pfooter_capt_color', '#000000', $this->l('Caption Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set caption color for footer popup'), 'TONY_PFOOTER_LINK_COLOR' => array('theme_pfooter_link_color', '#000000', $this->l('Link Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link color for footer popup'), 'TONY_PFOOTER_LINK_HCOLOR' => array('theme_pfooter_link_hcolor', '#000000', $this->l('Link Hover Color'), 'footer_popup', $this->l('Footer Popup'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Set link hover color for footer popup'), 'TONY_PFOOTER_BG_COLOR' => array('theme_pfooter_bg_color', '255,255,255,1', $this->l('Background Color'), 'footer_popup', $this->l('Footer Popup'), ' ', 'Set background color for footer popup (RGBA value)'), //'TONY_PFOOTER_BG_TRANS'=>array('theme_pfooter_bg_trans','0,0,0,0.85',$this->l('Background color'),'footer_popup',$this->l('Footer Popup'),' size="5"' ,'RGBA value'),
			'TONY_PRODUCTS_IMAGE_DIMENSIONS' => array('products_img_dimensions', 'big', $this->l('Products images dimension'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_REDIRECT_AFTER_ADDING_PRODUCT_TO_CART' => array('products_redirect_after_adding_product_to_cart', 0, $this->l('Redirect after adding product to cart'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_LEFT_COLUMN' => array('products_left_column', 'show', $this->l('Products listing left column'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_VIEW_MODE' => array('product_view_mode', 'grid', $this->l('Default products listing mode'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_SHOW_MODE' => array('products_show_mode', 'reach', $this->l('Products listing show mode'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS' => array('products_img_viewer', 'coudzoom', $this->l('Products image viewer'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_HOVER_MODE' => array('products_img_hover_mode', 'reach', $this->l('Products listing hover'), 'products', $this->l('Products'), ' size="50"'), 'TONY_PRODUCTS_PNAME_COLOR' => array('products_product_color', '#000000', $this->l('Product name color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PNAME_HCOLOR' => array('products_product_hcolor', '#000000', $this->l('Product name hover color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREVPNAME_COLOR' => array('products_preview_product_color', '#000000', $this->l('Product name color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREVPNAME_HCOLOR' => array('products_preview_product_hcolor', '#000000', $this->l('Product name hover color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_NAMEI_COLOR' => array('products_product_page_color', '#000000', $this->l('Product name color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_BORDER_COLOR' => array('products_border_color', '0, 0, 0, 0.27', $this->l('Product box border color'), 'products', $this->l('Products'), '', 'RGBA value'), 'TONY_PRODUCTS_BOX_BG_COLOR' => array('products_box_bg_color', '#ffffff', $this->l('Product box background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_PRODUCTS_BORDER_HCOLOR' => array('products_border_hover_color', '0, 0, 0, 0.27', $this->l('Product border hover color'), 'products', $this->l('Products'), '', 'RGBA value'), 'TONY_PRODUCTS_PBOX_BG_COLOR' => array('products_pbox_bg_color', '#ffffff', $this->l('Product hover box background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_PRODUCTS_PRICE_COLOR_REG' => array('products_price_color_reg', '#4D4D4D', $this->l('Regular Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR_SP' => array('products_price_color_spec', '#D40000', $this->l('Special Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR_OLD' => array('products_price_color_old', '#4D4D4D', $this->l('Old Price color (listing)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_REG' => array('products_preview_price_color_reg', '#000000', $this->l('Regular Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_SP' => array('products_preview_price_color_spec', '#D40000', $this->l('Special Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PREV_PRICE_COLOR_OLD' => array('products_preview_price_color_old', '#000000', $this->l('Old Price color (preview)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_COLOR' => array('products_price_color', '#e60000', $this->l('Regular Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PAGE_PRICE_COLOR_SP' => array('products_page_price_color_spec', '#e60000', $this->l('Special Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PAGE_PRICE_COLOR_OLD' => array('products_page_price_color_old', '#000000', $this->l('Old Price color (product page)'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_PRICE_FONT' => array('products_price_font', 'Default', $this->l('Price font'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_DISC_LABELS' => array('products_discount_labels', 'show', $this->l('Discount Labels'), 'products', $this->l('Products'), ''), 'TONY_PRODUCTS_DISC_LABELS_BG_COLOR' => array('products_discount_labels_bg_color', '#F389B0', $this->l('Discount Labels background color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_DISC_LABELS_TXT_COLOR' => array('products_discount_labels_txt_color', '#ffffff', $this->l('Discount Labels text color'), 'products', $this->l('Products'), ' class="color mColorPickerInput mColorPicker" data-hex="true"'), 'TONY_PRODUCTS_QUICK_VIEW' => array('products_quick_view', 'show', $this->l('Quick View Link'), 'products', $this->l('Products'), ''), 'TONY_DELIM_CONTENT_COLOR' => array('delim_content_color', '#ececec', $this->l('Delimiter Content Color'), 'delimiters', $this->l('Delimiters'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Delimiter color'), 'TONY_DELIM_CONTENT' => array('delim_content_img', '', $this->l('Delimiter Content Image'), 'delimiters', $this->l('Delimiters'), '', 'Upload delimiter content image (JPG, PNG or GIF image)'), 'TONY_DELIM_CONTENT_H' => array('delim_content_h', '1', $this->l('Delimiter Content Height'), 'delimiters', $this->l('Delimiters'), '', 'px'), 'TONY_DELIM_FOOTER_COLOR' => array('delim_footer_color', '#ececec', $this->l('Delimiter Footer Color'), 'delimiters', $this->l('Delimiters'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Delimiter color'), 'TONY_DELIM_FOOTER' => array('delim_footer_img', '', $this->l('Delimiter Footer Image'), 'delimiters', $this->l('Delimiters'), '', 'Upload delimiter footer image (JPG, PNG or GIF image)'), 'TONY_DELIM_FOOTER_H' => array('delim_footer_h', '', $this->l('Delimiter Footer Height'), 'delimiters', $this->l('Delimiters'), '', 'px'), 'TONY_NOTIF_ADDCART_BG_COLOR' => array('add_to_cart_bg_color', '#333', $this->l('Notification background color'), 'notif', $this->l('Notifications'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Background color of the notification window'), 'TONY_NOTIF_ADDCART_TXT_COLOR' => array('add_to_cart_txt_color', '#fff', $this->l('Notification text color'), 'notif', $this->l('Notifications'), ' class="color mColorPickerInput mColorPicker" data-hex="true"', 'Text color of the notification window'), 'TONY_NOTIF_ADDCART_OPACITY' => array('add_to_cart_opacity', '0.85', $this->l('Background transparency'), 'notif', $this->l('Notifications'), '', 'Set background transparency <br />[0...1]'), 'TONY_COUNT_DOWN' => array('count_down', '1', $this->l('Enable countdown'), 'count_down', $this->l('Countdown'), '', ''), 'TONY_COUNT_DOWN_BG_COLOR' => array('count_down_bg_color', '#F389B0', $this->l('Background color'), 'count_down', $this->l('Countdown'), 'class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_COUNT_DOWN_TXT_COLOR' => array('count_down_txt_color', '#ffffff', $this->l('Text color'), 'count_down', $this->l('Countdown'), 'class="color mColorPickerInput mColorPicker" data-hex="true"', ''), 'TONY_COUNT_DOWN_TXT_FONT' => array('count_down_txt_font', 'Default', $this->l('Text font'), 'count_down', $this->l('Countdown'), '', 'Theme use Google font\'s library. Find out more here - <a href="http://www.google.com/fonts/">Google web fonts free library</a>'),);

		/* $this->m_settings_dark = array();
		  foreach($this->m_settings as $sett_name=>$data)
		  {
		  $this->m_settings_dark[$sett_name] = $data;
		  } */

		$this->m_sett_values = unserialize(Configuration::get('TONYTHEME_SETTINGS'));

		if (!is_array($this->m_sett_values))
		{//Get default value
			$this->m_sett_values = array();
			foreach ($this->m_settings as $sett_name => $data)
			{
				$this->m_sett_values['normal'][$sett_name] = $data[1];
			}
			foreach ($this->m_settings_dark as $sett_name => $data)
			{
				$this->m_sett_values['dark'][$sett_name] = $data[1];
			}
			foreach ($this->m_settings_vsecret as $sett_name => $data)
			{
				$this->m_sett_values['vsecret'][$sett_name] = $data[1];
			}
		}


		$this->m_theme_scheme = Configuration::get('TONYTHEME_SCHEME_COLOR');
		if (isset($_POST['site_color_scheme']))
		{
			$this->m_theme_scheme = Tools::getValue('site_color_scheme');
		}

		if ($this->m_theme_scheme == 'normal') $this->m_theme_scheme = 'normal';
		elseif ($this->m_theme_scheme == 'dark') $this->m_theme_scheme = 'dark';
		elseif ($this->m_theme_scheme == 'vsecret') $this->m_theme_scheme = 'vsecret';
		else
			$this->m_theme_scheme = 'normal';

		$this->m_values = $this->m_sett_values[$this->m_theme_scheme];

		if ($this->m_theme_scheme == 'normal') $default_settings = $this->m_settings;
		elseif ($this->m_theme_scheme == 'vsecret') $default_settings = $this->m_settings_vsecret;
		else
			$default_settings = $this->m_settings_dark;

		foreach ($default_settings as $sett_name => $sett_data)
		{
			if (!isset($this->m_values[$sett_name]))
			{
				$this->m_values[$sett_name] = $sett_data[1];
			}
		}
	}

	function save()
	{
		$this->context->smarty->clearAllCache();

		$c = Configuration::get('TONYTHEME_SCHEME_COLOR');
		$this->m_sett_values[$c] = $this->m_values;

		Configuration::updateValue('TONYTHEME_PRODUCT_HOVER_MODE', $this->m_values['TONY_PRODUCTS_HOVER_MODE']);
		Configuration::updateValue('TONYTHEME_LEFT_MENU', $this->m_values['TONY_GENERAL_HOME_LEFT_MENU']);

		return Configuration::updateValue('TONYTHEME_SETTINGS', serialize($this->m_sett_values), true);
	}

	public function install()
	{
		if (Shop::isFeatureActive()) Shop::setContext(Shop::CONTEXT_ALL);

		$ret = parent::install() && $this->registerHook('header') && $this->registerHook('productListAssign') && $this->registerHook('displayAdminHomeQuickLinks');
		$ret &= Configuration::updateValue('TONYTHEME_SETTINGS', '', true) && Configuration::updateValue('TONYTHEME_SETTINGS', serialize($this->m_sett_values), true);
		$ret &= Configuration::updateValue('TONYTHEME_SCHEME_COLOR', 'normal');
		$ret &= Configuration::updateValue('TONYTHEME_PRODUCT_HOVER_MODE', 'reach');

		$this->update_css();

		return $ret;
	}

	public function uninstall()
	{
		$ret = parent::uninstall();

		$ret &= Configuration::deleteByName('TONYTHEME_SETTINGS');
		$ret &= Configuration::deleteByName('TONYTHEME_SCHEME_COLOR');

		return $ret;
	}

	public function displayForm()
	{
		$do = Tools::getValue('do');
		$default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		$languages = $this->context->controller->getLanguages();
		$id_lang = (int)Context::getContext()->language->id;

		switch ($do)
		{
			case 'TONY_DELIM_CONTENT':
			case 'TONY_DELIM_FOOTER':
			case 'TONY_GENERAL_THEME_BACK_IMAGE':
			{
				$image = $this->m_values[$do];
				@unlink(_PS_MODULE_DIR_.$this->name.'/images/'.$image);

				$this->m_values[$do] = '';
				$this->save();

				Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
			}
				break;
		}

		$cfg_content = '';
		$curr_section = 'general';
		foreach ($this->m_settings as $sett_name => $data)
		{
			$var_name = $data[0];
			$value = $this->m_values[$sett_name];
			$var_title = $data[2];
			$section_id = $data[3];
			$section_title = $data[4];
			$input_params = $data[5];
			$comments = $data[6];

			if ($section_id != $curr_section)
			{
				$cfg_content .= '
</table>
</fieldset>          
<fieldset class="conf-set">
<legend>'.$section_title.'</legend>
<table class="conf-table">          
          ';
				$curr_section = $section_id;
			}

			switch ($sett_name)
			{
				case 'TONY_GENERAL_HOME_LEFT_MENU':
				case 'TONY_MENU_FIXED_SCROLL':
				case 'TONY_COUNT_DOWN':
				case 'TONY_PRODUCTS_REDIRECT_AFTER_ADDING_PRODUCT_TO_CART':
				{
					$opt_html = '';

					foreach (array(1 => 'Yes', 0 => 'No') as $id => $title)
					{
						$selected = ($id == $value) ? 'selected' : '';
						$opt_html .= '<option value="'.$id.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;

				case 'TONY_TOP_PHONE':
				case 'TONY_TOP_WELCOME_MSG':
				{
					$input = '';
					if (!is_array($value))
					{
						$v = array();
						$v[$default_language] = $value;
						$value = $v;
					}


					foreach ($languages as $i => $language)
					{
						$input .= '
<div id="'.$var_name.'_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
  <input type="text" name="'.$var_name.'['.(int)$language['id_lang'].']" value="'.$value[$language['id_lang']].'" size="50">
</div>';
					}
					//$input = '<input type="text" name="'.$var_name.'" '.$input_params.' value="'.$value.'">';
					if (count($languages) > 1) $input = $this->displayFlags($languages, (int)$id_lang, $var_name, $var_name, true).'</div><p style="clear: both;"> </p>'.$input;
				}
					break;

				case 'TONY_GENERAL_THEME_CAPT_FONT':
				case 'TONY_GENERAL_THEME_FONT':
				case 'TONY_PRODUCTS_PRICE_FONT':
				case 'TONY_MENU_FONT':
				case 'TONY_MENU_FONT2':
				case 'TONY_COUNT_DOWN_TXT_FONT':
				{
					$opt_html = '';
					foreach ($this->m_google_fonts as $index => $font)
					{
						$selected = ($font == $value) ? 'selected' : '';
						$opt_html .= '<option value="'.$font.'" '.$selected.'>'.$font.'</option>';
					}
					$v = $this->m_values[$sett_name.'-google-font-subset'];
					$subset_value = $v;

					$input = '<select name="'.$var_name.'" class="font-changer" rel="'.$sett_name.'">'.$opt_html.'</select>
            subsets: <input type="text" name="'.$sett_name.'-google-font-subset" style="width:100px;" value="'.$subset_value.'">
            <span id="'.$sett_name.'" style="font-size:30px;line-height: 30px; display:block;padding:8px 0 0 0">Lorem ipsum $99.99</span>';
				}
					break;

				case 'TONY_GENERAL_THEME_BACK_IMG_MD':
				{
					$params = array('Center' => 'center', 'Repeat' => 'repeat', 'Fixed' => 'fixed');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;
				case 'TONY_DELIM_CONTENT':
				case 'TONY_DELIM_FOOTER':
				case 'TONY_GENERAL_THEME_BACK_IMAGE':
				{
					$input = '<input type="file" name="'.$var_name.'">';
					if (strlen($value))
					{
						$input .= '<div><img src="'._MODULE_DIR_.$this->name.'/images/'.$value.'" width="50"></a>[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do='.$sett_name.'">'.$this->l('Delete').'</a>]</div>';
					}
				}
					break;
				case 'TONY_PFOOTER_DISPLAY':
				{
					$params = array('Show as popup' => 'show', 'Show static' => 'show_static');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;
				case 'TONY_PRODUCTS_HOVER_MODE':
				{
					$params = array('Popup with additional images' => 'reach', '2 images with 3D effect' => 'simple');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;
				case 'TONY_PRODUCTS_IMAGE_DIMENSIONS':
				{
					$params = array('Big (235x250)' => 'big', 'Small (160x170)' => 'small');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;
				case 'TONY_PRODUCTS_VIEW_MODE':
				{
					$params = array('Grid view' => 'grid', 'List view' => 'list');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;

				case 'TONY_PRODUCTS_SHOW_MODE':
				{
					$params = array('Image,title,price' => 'reach', 'Image only' => 'poor');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;

				case 'TONY_PRODUCTS_DISC_LABELS':
				case 'TONY_PRODUCTS_LEFT_COLUMN':
				case 'TONY_PRODUCTS_QUICK_VIEW':
				{
					$params = array('Show' => 'show', 'Hide' => 'hide');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;

				case 'TONY_PRODUCTS':
				{
					$params = array('Default Viewer' => 'default', 'Cloud Zoom' => 'coudzoom');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;
				case 'TONY_GENERAL_STYLE':
				{
					$params = array('---' => '', 'Christmas style' => 'christmas', 'Christmas snow' => 'christmas_snow', 'Helloween style' => 'helloween', 'St. Patrick\'s day' => 'patriks_day', 'Thanksgiving' => 'thanksgiving');
					$opt_html = '';
					foreach ($params as $title => $val)
					{
						$selected = ($value == $val) ? 'selected' : '';
						$opt_html .= '<option value="'.$val.'" '.$selected.'>'.$title.'</option>';
					}
					$input = '<select name="'.$var_name.'">'.$opt_html.'</select>';
				}
					break;

				default:
					{
					$input = '<input type="text" name="'.$var_name.'" '.$input_params.' value="'.$value.'">';
					}
			}

			if (strlen($comments))
			{
				$comments = '<div class="comments">'.$comments.'</div>';
			}

			$cfg_content .= '
<tr>
    <td class="conf-title">'.$var_title.':</td>
    <td class="conf-value">'.$input.$comments.'</td>
  </tr>        
        ';
		}

		$scheme_opts = '';
		$schemes = array('Default' => 'normal', 'Dark' => 'dark', 'VSecret' => 'vsecret');
		$color_scheme = Configuration::get('TONYTHEME_SCHEME_COLOR');
		if (isset($_POST['site_color_scheme']))
		{
			$color_scheme = Tools::getValue('site_color_scheme');
		}


		foreach ($schemes as $title => $id)
		{
			$selected = ($color_scheme == $id) ? 'selected' : '';
			$scheme_opts .= '<option value="'.$id.'" '.$selected.'>'.$title.'</option>';
		}

		$content = '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;vertical-align:top;padding-top:3px;}
.conf-table td{padding:0 5px 10px 0;}
.comments{font-size:11px;}
.language_flags {
	display: none;
	float: left;
	background: #FFF;
	margin: 4px;
	padding: 8px;
	width: 80px;
	border: 1px solid #555;
}

.pointer {
	cursor: pointer;
}
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
  
  $("#scheme-selector").change(function(){
    $("#sett-form").submit();
  });
});
  
</script>
<form method="post" enctype="multipart/form-data" id="sett-form">
<fieldset class="conf-set">
<legend>'.$this->l('General').'</legend>
<table class="conf-table">
<tr>
    <td class="conf-title">'.$this->l('Color scheme').':</td>
    <td class="conf-value"><select name="site_color_scheme" id="scheme-selector">'.$scheme_opts.'</select></td>
</tr>
        
'.$cfg_content.'
</table>

<div style="float:left;"><input type="submit" name="savesett" value="'.$this->l('Save').'" class="button" style="cursor:pointer;"></div>
<div style="float:right;"><input type="submit" name="restoredefaults" value="'.$this->l('Restore Defaults').'" class="button" style="cursor:pointer;"></div>
</fieldset>

</form>
      ';
		$this->context->controller->addJS(_PS_JS_DIR_.'jquery/plugins/jquery.colorpicker.js');


		$content .= '
<script type="text/javascript">
$(document).ready(function() {
  $(".mColorPicker").mColorPicker();
});  
</script>      
      ';
		return $content;
	}

	public function getContent()
	{
		$message = '';
		if (Tools::isSubmit('restoredefaults'))
		{
			if ($this->m_theme_scheme == 'normal') $sett = $this->m_settings;
			elseif ($this->m_theme_scheme == 'dark') $sett = $this->m_settings_dark;
			elseif ($this->m_theme_scheme == 'vsecret') $sett = $this->m_settings_vsecret;

			foreach ($sett as $sett_name => $data)
			{
				$def_value = $data[1];
				$this->m_values[$sett_name] = $def_value;
			}

			$this->save();
			$this->update_css();
			$message = $this->displayConfirmation($this->l('Settings updated'));
		}

		if (Tools::isSubmit('savesett'))
		{
			foreach ($this->m_settings as $sett_name => $data)
			{
				if ($sett_name == 'TONY_GENERAL_THEME_BACK_IMAGE' || $sett_name == 'TONY_DELIM_CONTENT' || $sett_name == 'TONY_DELIM_FOOTER'
				) continue;
				$var_name = $data[0];
				$value = Tools::getValue($var_name);
				$this->m_values[$sett_name] = $value;

				switch ($sett_name)
				{
					case 'TONY_GENERAL_THEME_CAPT_FONT':
					case 'TONY_GENERAL_THEME_FONT':
					case 'TONY_PRODUCTS_PRICE_FONT':
					case 'TONY_MENU_FONT':
					case 'TONY_MENU_FONT2':
					case 'TONY_COUNT_DOWN_TXT_FONT':
					{
						$var_name = $sett_name.'-google-font-subset';
						$value = Tools::getValue($var_name);
						$this->m_values[$var_name] = $value;
					}
						break;
				}
			}

			Configuration::updateValue('TONYTHEME_SCHEME_COLOR', Tools::getValue('site_color_scheme'));
			$this->save();
			$message = $this->displayConfirmation($this->l('Settings updated'));

			$errors = '';
			if (isset($_FILES['theme_back_image']) && isset($_FILES['theme_back_image']['tmp_name']) && !empty($_FILES['theme_back_image']['tmp_name']))
			{
				if ($error = ImageManager::validateUpload($_FILES['theme_back_image'], Tools::convertBytes(ini_get('upload_max_filesize')))) $errors .= $this->l('File upload error.');
				else
				{
					$file_name = $_FILES['theme_back_image']['name'];

					if (!move_uploaded_file($_FILES['theme_back_image']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/images/'.$file_name)) $errors .= $this->l('File upload error.');
					else
					{
						Configuration::updateValue('TONY_GENERAL_THEME_BACK_IMAGE', $file_name);
						$this->m_values['TONY_GENERAL_THEME_BACK_IMAGE'] = $file_name;
						$this->save();
					}
				}
			}

			if (isset($_FILES['delim_content_img']) && isset($_FILES['delim_content_img']['tmp_name']) && !empty($_FILES['delim_content_img']['tmp_name']))
			{
				if ($error = ImageManager::validateUpload($_FILES['delim_content_img'], Tools::convertBytes(ini_get('upload_max_filesize')))) $errors .= $this->l('File upload error.');
				else
				{
					$file_name = $_FILES['delim_content_img']['name'];

					if (!move_uploaded_file($_FILES['delim_content_img']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/images/'.$file_name)) $errors .= $this->l('File upload error.');
					else
					{
						$this->m_values['TONY_DELIM_CONTENT'] = $file_name;
						$this->save();
					}
				}
			}

			if (isset($_FILES['delim_footer_img']) && isset($_FILES['delim_footer_img']['tmp_name']) && !empty($_FILES['delim_footer_img']['tmp_name']))
			{
				if ($error = ImageManager::validateUpload($_FILES['delim_footer_img'], Tools::convertBytes(ini_get('upload_max_filesize')))) $errors .= $this->l('File upload error.');
				else
				{
					$file_name = $_FILES['delim_footer_img']['name'];

					if (!move_uploaded_file($_FILES['delim_footer_img']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/images/'.$file_name)) $errors .= $this->l('File upload error.');
					else
					{
						$this->m_values['TONY_DELIM_FOOTER'] = $file_name;
						$this->save();
					}
				}
			}

			$this->update_css();
		}
		return $message.$this->displayForm();
	}

	function hookHeader($params)
	{
		global $cookie;

		$cfg = array();
		$current_language = $this->context->language->id;

		foreach ($this->m_settings as $sett_name => $data)
		{
			if (is_array($this->m_values[$sett_name])) $val = $this->m_values[$sett_name][$current_language];
			else
				$val = $this->m_values[$sett_name];

			$cfg[$data[0]] = $val;
		}
		if (isset($_GET['vmode']))
		{
			$cfg['product_view_mode'] = ($_GET['vmode'] == 'list') ? 'list' : 'grid';
			$cookie->vmode = $cfg['product_view_mode'];
			$cookie->write();
		}
		else if ($cookie->vmode != '') $cfg['product_view_mode'] = $cookie->vmode;

		if ($cfg['products_img_dimensions'] == 'big')
		{
			$cfg['products_img_normal'] = 'tonytheme_product';
			$cfg['products_img_big'] = 'tonytheme_large_default';
		}
		else
		{
			$cfg['products_img_normal'] = 'tonytheme_product_small';
			$cfg['products_img_big'] = 'tonytheme_large_small_default';
		}

		$cookie->products_img_normal = $cfg['products_img_normal'];
		$cookie->products_img_big = $cfg['products_img_big'];
		$cookie->products_img_dimensions = $cfg['products_img_dimensions'];
		$cookie->products_show_mode = $cfg['products_show_mode'];
		$cookie->products_img_hover_mode = $cfg['products_img_hover_mode'];
		$cookie->products_quick_view = $cfg['products_quick_view'];
		$cookie->products_discount_labels = $cfg['products_discount_labels'];
		$cookie->write();

		$fonts = array();
		$theme_font = $this->m_values['TONY_GENERAL_THEME_FONT'];
		$fonts[$theme_font] .= ','.$this->m_values['TONY_GENERAL_THEME_FONT-google-font-subset'];
		$theme_font = $this->m_values['TONY_GENERAL_THEME_CAPT_FONT'];
		$fonts[$theme_font] .= ','.$this->m_values['TONY_GENERAL_THEME_CAPT_FONT-google-font-subset'];
		$theme_font = $this->m_values['TONY_MENU_FONT'];
		$fonts[$theme_font] .= ','.$this->m_values['TONY_MENU_FONT-google-font-subset'];
		$theme_font2 = $this->m_values['TONY_MENU_FONT2'];
		$fonts[$theme_font2] .= ','.$this->m_values['TONY_MENU_FONT2-google-font-subset'];
		$theme_font = $this->m_values['TONY_PRODUCTS_PRICE_FONT'];
		$fonts[$theme_font] .= ','.$this->m_values['TONY_PRODUCTS_PRICE_FONT-google-font-subset'];

		$theme_font = $this->m_values['TONY_COUNT_DOWN_TXT_FONT'];
		$fonts[$theme_font] .= ','.$this->m_values['TONY_COUNT_DOWN_TXT_FONT-google-font-subset'];
		$countdown_font = $this->m_values['TONY_COUNT_DOWN_TXT_FONT'];

		$google_css = array();

		foreach ($fonts as $font => $subset)
		{
			if ($font != 'Default')
			{
				$subsets = explode(',', trim($subset));
				$subset = array();
				if (is_array($subsets))
				{
					foreach ($subsets as $f)
					{
						if (strlen($f)) $subset[] = $f;
					}
					$subset = implode(',', $subset);
				}

				$url = $this->context->link->protocol_content.'fonts.googleapis.com/css?family='.urlencode($font);
				if (strlen($subset)) $url .= '&subset='.$subset;
				$google_css[] = $url;
			}
		}
		$cfg['google_fonts_css'] = $google_css;


		$current = Context::getContext()->controller;
		$page_name = Dispatcher::getInstance()->getController();

		$css_files = array('reset.css', 'bootstrap.css', 'bootstrap-responsive.css', 'flexslider.css', 'flexslider_new.css', /* 'andepict.css', */
			'product-slider.css', 'jquery.selectbox.css', 'nouislider.css', 'cloud-zoom.css', 'spy-menu.css', 'animate.css', 'isotope.css', 'countdown.css',);

		foreach ($css_files as $css)
		{
			/* if ($css == 'flexslider.css' && $page_name != 'product')
			  continue; */
			if ($css == 'cloud-zoom.css' && $page_name != 'product') continue;
			if ($css == 'cloud-zoom.css' && $page_name == 'product' && $cfg['products_img_viewer'] != 'coudzoom') continue;
			if ($css == 'spy-menu.css' && $cfg['theme_menu_fixed_scroll'] != '1') continue;
			if ($css == 'countdown.css' && $cfg['count_down'] != '1') continue;


			$this->context->controller->addCSS($this->_path.'css/'.$css, 'tonytheme');
		}

		$js_files = array('jquery.mousewheel.js', 'jquery.flexslider.js', 'modernizr.custom.js', 'jquery.elastislide.js', 'jquery.selectbox-0.2.js', 'jquery.nouislider.js', 'cloud-zoom.1.0.2.js', 'jquery.easing-1.3.js', 'jquery.masonry.min.js', 'custom.js', 'custom_new.js', 'bootstrap.js', /* 'jquery-ui.min.js', */
			'retina-replace.js', 'quick-view.js', 'jquery.cookie.js', 'spy-menu.js', 'jquery.inview.js', 'animation.js', 'jquery.isotope.min.js',

			'jquery.plugin.min.js', 'jquery.countdown.min.js',);

		foreach ($js_files as $js)
		{
			if ($js == 'cloud-zoom.1.0.2.js' && $page_name != 'product') continue;
			if ($js == 'cloud-zoom.1.0.2.js' && $page_name == 'product' && $cfg['products_img_viewer'] != 'coudzoom') continue;
			if ($js == 'spy-menu.js' && $cfg['theme_menu_fixed_scroll'] != '1') continue;
			if (($js == 'jquery.plugin.min.js' || $js == 'jquery.countdown.min.js') && $cfg['count_down'] != '1') continue;

			$this->context->controller->addJS($this->_path.'js/'.$js);
		}

		$cfg['color_scheme'] = Configuration::get('TONYTHEME_SCHEME_COLOR');

		$cfg['is_ssl'] = (array_key_exists('HTTPS', $_SERVER) && $_SERVER['HTTPS'] == "on" ? 1 : 0);

		$this->context->controller->addjqueryPlugin('fancybox');

		$link = new Link();
		$cfg['order_process_url'] = $link->getPageLink(Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order');

		$this->context->smarty->assign(array('tony_cfg' => $cfg));
	}

	public function hookProductListAssign($params)
	{
		return $this->hookHeader($params);
	}

	function hookdisplayAdminHomeQuickLinks($params)
	{
		$code = '
<li>
 <a href="index.php?controller=adminmodules&configure=tonythemesettings&token='.Tools::getAdminTokenLite('AdminModules').'" style="background: url(../modules/tonythemesettings/logo.png) no-repeat scroll center 25px #F8F8F8;"><h4>Tonytheme Settings</h4></a>
 
</li>      
      ';

		return $code;
	}

	function update_css()
	{
		$css_files = array('customization.css', 'styleie9.css');
		@chmod(_PS_THEME_DIR_.'/css', 0755);

		$theme_back_image = '';
		$img = $this->m_values['TONY_GENERAL_THEME_BACK_IMAGE'];
		$position = $this->m_values['TONY_GENERAL_THEME_BACK_IMG_MD'];
		if (strlen($img))
		{
			$theme_back_image = 'background-image: url("'.$this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/images/'.$img.'");';
			if ($position == 'center') $theme_back_image .= 'background-position: center top; background-repeat: no-repeat;';
			elseif ($position == 'fixed') $theme_back_image .= 'background-attachment: fixed; background-position: center top; background-repeat: no-repeat;';
		}

		$h = (int)$this->m_values['TONY_DELIM_CONTENT_H'];
		if ($h)
		{
			$theme_content_delim = 'height:'.$h.'px;border-top:1px solid '.$this->m_values['TONY_DELIM_CONTENT_COLOR'].';';
		}
		$img = $this->m_values['TONY_DELIM_CONTENT'];
		if (strlen($img))
		{
			$h = (int)$this->m_values['TONY_DELIM_CONTENT_H'];
			if ($h <= 0) $h = 40;
			$theme_content_delim = 'background: url("'.$this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/images/'.$img.'") repeat-x scroll 0 0 transparent;height:'.$h.'px;';
		}

		$theme_footer_delim = 'height:1px;';
		$img = $this->m_values['TONY_DELIM_FOOTER'];
		if (strlen($img))
		{
			$h = (int)$this->m_values['TONY_DELIM_FOOTER_H'];
			if ($h <= 0) $h = 40;
			$theme_footer_delim = 'background: url("'.$this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/images/'.$img.'") repeat-x scroll 0 0 transparent;height:'.$h.'px;';
		}

		$theme_font = $this->m_values['TONY_GENERAL_THEME_FONT'];
		$caption_font = $this->m_values['TONY_GENERAL_THEME_CAPT_FONT'];
		$theme_menu_font = $this->m_values['TONY_MENU_FONT'];
		$theme_menu_font2 = $this->m_values['TONY_MENU_FONT2'];
		$price_font = $this->m_values['TONY_PRODUCTS_PRICE_FONT'];
		$countdown_font = $this->m_values['TONY_COUNT_DOWN_TXT_FONT'];

		if ($theme_font == 'Default' || $theme_font == '') $theme_font = 'Arial,Helvetica,sans-serif';

		if ($caption_font == 'Default' || $caption_font == '') $caption_font = 'Arial,Helvetica,sans-serif';

		if ($theme_menu_font == 'Default' || $theme_menu_font == '') $theme_menu_font = 'Arial,Helvetica,sans-serif';

		if ($theme_menu_font2 == 'Default' || $theme_menu_font2 == '') $theme_menu_font2 = 'Arial,Helvetica,sans-serif';

		if ($price_font == 'Default' || $price_font == '') $price_font = 'Arial,Helvetica,sans-serif';

		if ($countdown_font == 'Default' || $countdown_font == '') $countdown_font = 'Arial,Helvetica,sans-serif';


		$search = array(1 => '{$theme_color}', 2 => '{$theme_hover_color}', 3 => '{$theme_input_hover}', 4 => '{$theme_text_color}', 5 => '{$theme_link_color}', 6 => '{$theme_link_hover}', 7 => '{$theme_back_color}', 8 => '{$theme_back_image}', 9 => '{$theme_font}', 10 => '{$caption_font}', 11 => '{$caption_color}', 12 => '{$theme_header_txt_color}', 13 => '{$theme_header_link_color}', 14 => '{$theme_header_link_hover_color}', 15 => '{$theme_header_bg_color}', 16 => '{$theme_header_phone_color}', 17 => '{$theme_menu_color_l1}', 18 => '{$theme_menu_hover_color_l1}', 20 => '{$theme_menu_bgh_color_l1}', 21 => '{$theme_menu_color_l2}', 22 => '{$theme_menu_hover_color_l2}', 23 => '{$theme_menu_bg_color_l2}', 24 => '{$theme_menu_text_color}', 25 => '{$theme_menu_bg_color}', 26 => '{$theme_menu_font}', 27 => '{$theme_footer_txt_color}', 28 => '{$theme_footer_link_color}', 29 => '{$theme_footer_link_hcolor}', 30 => '{$theme_footer_bg_color}', 31 => '{$theme_pfooter_txt_color}', 32 => '{$theme_pfooter_capt_color}', 33 => '{$theme_pfooter_link_color}', 34 => '{$theme_pfooter_link_hcolor}', 35 => '{$theme_pfooter_bg_color}', 36 => '{$theme_pfooter_bg_trans}', 37 => '{$theme_content_delim}', 38 => '{$theme_footer_delim}', 39 => '{$theme_content_delim_color}', 40 => '{$theme_footer_delim_color}', 41 => '{$products_border_color}', 42 => '{$products_border_hover_color}', 43 => '{$products_price_color_reg}', 44 => '{$products_price_color_spec}', 45 => '{$products_price_color}', 46 => '{$price_font}', 47 => '{$theme_input_border_color}', 48 => '{$products_product_color}', 49 => '{$products_product_hcolor}', 50 => '{$products_product_page_color}', 51 => '{$theme_butt_dark_color}', 52 => '{$products_price_color_old}', 53 => '{$theme_input_text_color}', 54 => '{$products_preview_product_color}', 55 => '{$products_preview_product_hcolor}', 56 => '{$products_preview_price_color_reg}', 57 => '{$products_preview_price_color_spec}', 58 => '{$products_preview_price_color_old}', 59 => '{$products_page_price_color_spec}', 60 => '{$products_page_price_color_old}', 61 => '{$theme_footer_button_color}', 62 => '{$theme_footer_button_hcolor}', 63 => '{$add_to_cart_bg_color}', 64 => '{$add_to_cart_txt_color}', 65 => '{$add_to_cart_opacity}', 66 => '{$theme_menu_font2}', 67 => '{$products_box_bg_color}', 68 => '{$products_pbox_bg_color}', 69 => '{$products_discount_labels_bg_color}', 70 => '{$products_discount_labels_txt_color}', 71 => '{$theme_menu_badges_bg_color}', 72 => '{$theme_menu_badges_txt_color}', 73 => '{$countdown_font}', 74 => '{$countdown_bg_color}', 75 => '{$countdown_txt_color}',);

		$products_border_color = strlen($this->m_values['TONY_PRODUCTS_BORDER_COLOR']) ? $this->m_values['TONY_PRODUCTS_BORDER_COLOR'] : 'none';
		$replace = array(1 => $this->m_values['TONY_GENERAL_THEME_COLOR'], 2 => $this->m_values['TONY_GENERAL_THEME_HOVER_COLOR'], 3 => $this->m_values['TONY_GENERAL_THEME_INPUT_HOVER'], 4 => $this->m_values['TONY_GENERAL_THEME_TEXT_COLOR'], 5 => $this->m_values['TONY_GENERAL_THEME_LINK_COLOR'], 6 => $this->m_values['TONY_GENERAL_THEME_LINK_HOVER'], 7 => $this->m_values['TONY_GENERAL_THEME_BACK_COLOR'], 8 => $theme_back_image, 9 => $theme_font, 10 => $caption_font, 11 => $this->m_values['TONY_GENERAL_THEME_CAPT_COLOR'], 12 => $this->m_values['TONY_GENERAL_HT_TXT_COLOR'], 13 => $this->m_values['TONY_GENERAL_HT_LINK_COLOR'], 14 => $this->m_values['TONY_GENERAL_HT_LHOVER_COLOR'], 15 => $this->m_values['TONY_GENERAL_HT_BG_COLOR'], 16 => $this->m_values['TONY_GENERAL_HT_PHONE_COLOR'], 17 => $this->m_values['TONY_MENU_COLOR_L1'], 18 => $this->m_values['TONY_MENU_HCOLOR_L1'], 20 => $this->m_values['TONY_MENU_BGHCOLOR_L1'], 21 => $this->m_values['TONY_MENU_COLOR_L2'], 22 => $this->m_values['TONY_MENU_HCOLOR_L2'], 23 => $this->m_values['TONY_MENU_BGHCOLOR_L2'], 24 => $this->m_values['TONY_MENU_TEXT_COLOR'], 25 => $this->m_values['TONY_MENU_BG_COLOR'], 26 => $theme_menu_font, 27 => $this->m_values['TONY_FOOTER_TXT_COLOR'], 28 => $this->m_values['TONY_FOOTER_LINK_COLOR'], 29 => $this->m_values['TONY_FOOTER_LINK_HCOLOR'], 30 => $this->m_values['TONY_FOOTER_BG_COLOR'], 31 => $this->m_values['TONY_PFOOTER_TXT_COLOR'], 32 => $this->m_values['TONY_PFOOTER_CAPT_COLOR'], 33 => $this->m_values['TONY_PFOOTER_LINK_COLOR'], 34 => $this->m_values['TONY_PFOOTER_LINK_HCOLOR'], 35 => $this->m_values['TONY_PFOOTER_BG_COLOR'], 36 => $this->m_values['TONY_PFOOTER_BG_TRANS'], 37 => $theme_content_delim, 38 => $theme_footer_delim, 39 => $this->m_values['TONY_DELIM_CONTENT_COLOR'], 40 => $this->m_values['TONY_DELIM_FOOTER_COLOR'], 41 => $products_border_color, 42 => $this->m_values['TONY_PRODUCTS_BORDER_HCOLOR'], 43 => $this->m_values['TONY_PRODUCTS_PRICE_COLOR_REG'], 44 => $this->m_values['TONY_PRODUCTS_PRICE_COLOR_SP'], 45 => $this->m_values['TONY_PRODUCTS_PRICE_COLOR'], 46 => $price_font, 47 => $this->m_values['TONY_GENERAL_THEME_INPUT_BCOL'], 48 => $this->m_values['TONY_PRODUCTS_PNAME_COLOR'], 49 => $this->m_values['TONY_PRODUCTS_PNAME_HCOLOR'], 50 => $this->m_values['TONY_PRODUCTS_NAMEI_COLOR'], 51 => $this->m_values['TONY_GENERAL_THEME_BUTT_DARK'], 52 => $this->m_values['TONY_PRODUCTS_PRICE_COLOR_OLD'], 53 => $this->m_values['TONY_GENERAL_THEME_INPUT_TCOL'], 54 => $this->m_values['TONY_PRODUCTS_PREVPNAME_COLOR'], 55 => $this->m_values['TONY_PRODUCTS_PREVPNAME_HCOLOR'], 56 => $this->m_values['TONY_PRODUCTS_PREV_PRICE_COLOR_REG'], 57 => $this->m_values['TONY_PRODUCTS_PREV_PRICE_COLOR_SP'], 58 => $this->m_values['TONY_PRODUCTS_PREV_PRICE_COLOR_OLD'], 59 => $this->m_values['TONY_PRODUCTS_PAGE_PRICE_COLOR_SP'], 60 => $this->m_values['TONY_PRODUCTS_PAGE_PRICE_COLOR_OLD'], 61 => $this->m_values['TONY_FOOTER_BUTTON_COLOR'], 62 => $this->m_values['TONY_FOOTER_BUTTON_HCOLOR'], 63 => $this->m_values['TONY_NOTIF_ADDCART_BG_COLOR'], 64 => $this->m_values['TONY_NOTIF_ADDCART_TXT_COLOR'], 65 => $this->m_values['TONY_NOTIF_ADDCART_OPACITY'], 66 => $theme_menu_font2, 67 => $this->m_values['TONY_PRODUCTS_BOX_BG_COLOR'], 68 => $this->m_values['TONY_PRODUCTS_PBOX_BG_COLOR'], 69 => $this->m_values['TONY_PRODUCTS_DISC_LABELS_BG_COLOR'], 70 => $this->m_values['TONY_PRODUCTS_DISC_LABELS_TXT_COLOR'], 71 => $this->m_values['TONY_MENU_BADGES_BG_COLOR'], 72 => $this->m_values['TONY_MENU_BADGES_TXT_COLOR'], 73 => $countdown_font, 74 => $this->m_values['TONY_COUNT_DOWN_BG_COLOR'], 75 => $this->m_values['TONY_COUNT_DOWN_TXT_COLOR'],);

		foreach ($css_files as $file)
		{
			@chmod(_PS_THEME_DIR_.'/css/'.$file, 0755);

			$file_content = file_get_contents(_PS_THEME_DIR_.'/css/template_'.$file);
			$file_content = str_replace($search, $replace, $file_content);
			file_put_contents(_PS_THEME_DIR_.'/css/'.$file, $file_content);
		}
	}

}
