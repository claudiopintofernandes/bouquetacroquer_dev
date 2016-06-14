<?php
  if (!defined('_PS_VERSION_'))
  	exit;
 
   class tonylayeredslider extends Module
   {
     var $m_google_fonts = array(
'Default',
'Abel',
'Abril Fatface',
'Aclonica',
'Actor',
'Adamina',
'Aguafina Script',
'Aladin',
'Aldrich',
'Alice',
'Alike Angular',
'Alike',
'Allan',
'Allerta Stencil',
'Allerta',
'Amaranth',
'Amatic SC',
'Andada',
'Andika',
'Annie Use Your Telescope',
'Anonymous Pro',
'Antic',
'Anton',
'Arapey',
'Architects Daughter',
'Arimo',
'Artifika',
'Arvo',
'Asset',
'Astloch',
'Atomic Age',
'Aubrey',
'Bangers',
'Bentham',
'Bevan',
'Bigshot One',
'Bitter',
'Black Ops One',
'Bowlby One SC',
'Bowlby One',
'Brawler',
'Bubblegum Sans',
'Buda',
'Butcherman Caps',
'Cabin Condensed',
'Cabin Sketch',
'Cabin',
'Cagliostro',
'Calligraffitti',
'Candal',
'Cantarell',
'Cardo',
'Carme',
'Carter One',
'Caudex',
'Cedarville Cursive',
'Changa One',
'Cherry Cream Soda',
'Chewy',
'Chicle',
'Chivo',
'Coda Caption',
'Coda',
'Comfortaa',
'Coming Soon',
'Contrail One',
'Convergence',
'Cookie',
'Copse',
'Corben',
'Cousine',
'Coustard',
'Covered By Your Grace',
'Crafty Girls',
'Creepster Caps',
'Crimson Text',
'Crushed',
'Cuprum',
'Damion',
'Dancing Script',
'Dawning of a New Day',
'Days One',
'Delius Swash Caps',
'Delius Unicase',
'Delius',
'Devonshire',
'Didact Gothic',
'Dorsa',
'Dr Sugiyama',
'Droid Sans Mono',
'Droid Sans',
'Droid Serif',
'EB Garamond',
'Eater Caps',
'Expletus Sans',
'Fanwood Text',
'Federant',
'Federo',
'Fjord One',
'Fondamento',
'Fontdiner Swanky',
'Forum',
'Francois One',
'Gentium Basic',
'Gentium Book Basic',
'Geo',
'Geostar Fill',
'Geostar',
'Give You Glory',
'Gloria Hallelujah',
'Goblin One',
'Gochi Hand',
'Goudy Bookletter 1911',
'Gravitas One',
'Gruppo',
'Hammersmith One',
'Herr Von Muellerhoff',
'Holtwood One SC',
'Homemade Apple',
'IM Fell DW Pica SC',
'IM Fell DW Pica',
'IM Fell Double Pica SC',
'IM Fell Double Pica',
'IM Fell English SC',
'IM Fell English',
'IM Fell French Canon SC',
'IM Fell French Canon',
'IM Fell Great Primer SC',
'IM Fell Great Primer',
'Iceland',
'Inconsolata',
'Indie Flower',
'Irish Grover',
'Istok Web',
'Jockey One',
'Josefin Sans',
'Josefin Slab',
'Judson',
'Julee',
'Jura',
'Just Another Hand',
'Just Me Again Down Here',
'Kameron',
'Kelly Slab',
'Kenia',
'Knewave',
'Kranky',
'Kreon',
'Kristi',
'La Belle Aurore',
'Lancelot',
'Lato',
'League Script',
'Leckerli One',
'Lekton',
'Lemon',
'Limelight',
'Linden Hill',
'Lobster Two',
'Lobster',
'Lora',
'Love Ya Like A Sister',
'Loved by the King',
'Luckiest Guy',
'Maiden Orange',
'Mako',
'Marck Script',
'Marvel',
'Mate SC',
'Mate',
'Maven Pro',
'Meddon',
'MedievalSharp',
'Megrim',
'Merienda One',
'Merriweather',
'Metrophobic',
'Michroma',
'Miltonian Tattoo',
'Miltonian',
'Miss Fajardose',
'Miss Saint Delafield',
'Modern Antiqua',
'Molengo',
'Monofett',
'Monoton',
'Monsieur La Doulaise',
'Montez',
'Mountains of Christmas',
'Mr Bedford',
'Mr Dafoe',
'Mr De Haviland',
'Mrs Sheppards',
'Muli',
'Neucha',
'Neuton',
'News Cycle',
'Niconne',
'Nixie One',
'Nobile',
'Nosifer Caps',
'Nothing You Could Do',
'Nova Cut',
'Nova Flat',
'Nova Mono',
'Nova Oval',
'Nova Round',
'Nova Script',
'Nova Slim',
'Nova Square',
'Numans',
'Nunito',
'Old Standard TT',
'Open Sans Condensed',
'Open Sans',
'Orbitron',
'Oswald',
'Over the Rainbow',
'Ovo',
'PT Sans Caption',
'PT Sans Narrow',
'PT Sans',
'PT Serif Caption',
'PT Serif',
'Pacifico',
'Passero One',
'Patrick Hand',
'Paytone One',
'Permanent Marker',
'Petrona',
'Philosopher',
'Piedra',
'Pinyon Script',
'Play',
'Playfair Display',
'Podkova',
'Poller One',
'Poly',
'Pompiere',
'Prata',
'Prociono',
'Puritan',
'Quattrocento Sans',
'Quattrocento',
'Questrial',
'Quicksand',
'Radley',
'Raleway',
'Rammetto One',
'Rancho',
'Rationale',
'Redressed',
'Reenie Beanie',
'Ribeye Marrow',
'Ribeye',
'Righteous',
'Rochester',
'Rock Salt',
'Rokkitt',
'Rosario',
'Ruslan Display',
'Salsa',
'Sancreek',
'Sansita One',
'Satisfy',
'Schoolbell',
'Shadows Into Light',
'Shanti',
'Short Stack',
'Sigmar One',
'Signika Negative',
'Signika',
'Six Caps',
'Slackey',
'Smokum',
'Smythe',
'Sniglet',
'Snippet',
'Sorts Mill Goudy',
'Special Elite',
'Spinnaker',
'Spirax',
'Stardos Stencil',
'Sue Ellen Francisco',
'Sunshiney',
'Supermercado One',
'Swanky and Moo Moo',
'Syncopate',
'Tangerine',
'Tenor Sans',
'Terminal Dosis',
'The Girl Next Door',
'Tienne',
'Tinos',
'Tulpen One',
'Ubuntu Condensed',
'Ubuntu Mono',
'Ubuntu',
'Ultra',
'UnifrakturCook',
'UnifrakturMaguntia',
'Unkempt',
'Unlock',
'Unna',
'VT323',
'Varela Round',
'Varela',
'Vast Shadow',
'Vibur',
'Vidaloka',
'Volkhov',
'Vollkorn',
'Voltaire',
'Waiting for the Sunrise',
'Wallpoet',
'Walter Turncoat',
'Wire One',
'Yanone Kaffeesatz',
'Yellowtail',
'Yeseva One',
'Zeyada'
    );   
     public function __construct()
    {
      $this->name = 'tonylayeredslider';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();
		  
		  $this->displayName = $this->l('Home page layered slider');
		  $this->description = $this->l('Adds an layered image slider to your home page');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  
		  $this->slider_options = array(
      'autoStart'=>array(
        'title'=>'Auto start',
        'desc'=>'If true, slideshow will automatically start after loading the page.',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      
      'twoWaySlideshow'=>array(
        'title'=>'Two ways slideshow',
        'desc'=>'If true, slideshow will go backwards if you click the prev button.',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      
      'keybNav'=>array(
        'title'=>'Keyboard navigation',
        'desc'=>'You can navigate with the left and right arrow keys.',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      'touchNav'=>array(
        'title'=>'Touch navigation',
        'desc'=>'Touch-control (on mobile devices)',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      'imgPreload'=>array(
        'title'=>'Images preload',
        'desc'=>'Preloads all images and background-images of the next layer.',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      'pauseOnHover'=>array(
        'title'=>'Pause on hover',
        'desc'=>'If true, SlideShow will pause when you move the mouse pointer over the LayerSlider container.',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      'loops'=>array(
        'title'=>'Loops',
        'desc'=>'Number (0 or a positive integer). Number of loops if autoStart set true (0 means infinite).',
        'type'=>'input',
      ),
      'forceLoopNum'=>array(
        'title'=>'Force loop number',
        'desc'=>'If true, the slider will always stop at the given number of loops even if the user restarts the slideshow.',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      'slideDirection'=>array(
        'title'=>'Slide direction',
        'desc'=>'',
        'type'=>'select',
        'values'=>array('---'=>'-1','Left'=>'left','Right'=>'right','Top'=>'top','Bottom'=>'bottom','Fade'=>'fade'),
      ),
      'slideDelay'=>array(
        'title'=>'Slide Delay',
        'desc'=>'number (millisecs). Time before the next slide will be loading.',
        'type'=>'input',
      ),
      'durationIn'=>array(
        'title'=>'Duration In',
        'desc'=>'number (millisecs). Duration of the slide-in animation',
        'type'=>'input',
      ),
      'durationOut'=>array(
        'title'=>'Duration Out',
        'desc'=>'number (millisecs). Duration of the slide-out animation.',
        'type'=>'input',
      ),
      'delayIn'=>array(
        'title'=>'Delay In',
        'desc'=>'number (millisecs). Delay time of the slide-in animation.',
        'type'=>'input',
      ),
      'delayOut'=>array(
        'title'=>'Delay Out',
        'desc'=>'number (millisecs). Delay time of the slide-out animation.',
        'type'=>'input',
      ),
      'showBarTimer'=>array(
        'title'=>'Show bar timer',
        'desc'=>'You can show or hide the bar timer. ',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      'showCircleTimer'=>array(
        'title'=>'Show circle timer',
        'desc'=>'You can show or hide the circle timer. ',
        'type'=>'select',
        'values'=>array('---'=>'-1','True'=>'true','False'=>'false'),
      ),
      );
      
      $this->tran2d = array(
      'all'=>'All',
      '1'=>'Sliding from right	',
'2'=>'Sliding from left',
'3'=>'Sliding from bottom	',
'4'=>'Sliding from top',
'5'=>'Crossfading	',
'6'=>'Fading tiles forward',
'7'=>'Fading tiles reverse	',
'8'=>'Fading tiles col-forward',
'9'=>'Fading tiles col-reverse	',
'10'=>'Fading tiles (random)',
'11'=>'Smooth fading from right	',
'12'=>'Smooth fading from left',
'13'=>'Smooth fading from bottom	',
'14'=>'Smooth fading from top',
'15'=>'Smooth sliding from right	',
'16'=>'Smooth sliding from left',
'17'=>'Smooth sliging from bottom	',
'18'=>'Smooth sliding from top',
'19'=>'Sliding tiles to right (random)	',
'20'=>'Sliding tiles to left (random)',
'21'=>'Sliding tiles to bottom (random)	',
'22'=>'Sliding tiles to top (random)',
'23'=>'Sliding random tiles to random directions	',
'24'=>'Sliding rows to right (forward)',
'25'=>'Sliding rows to right (reverse)	',
'26'=>'Sliding rows to right (random)',
'27'=>'Sliding rows to left (forward)	',
'28'=>'Sliding rows to left (reverse)',
'29'=>'Sliding rows to left (random)	',
'30'=>'Sliding rows from top to bottom (forward)',
'31'=>'Sliding rows from top to bottom (random)	',
'32'=>'Sliding rows from bottom to top (reverse)',
'33'=>'Sliding rows from bottom to top (random)	',
'34'=>'Sliding columns to bottom (forward)',
'35'=>'Sliding columns to bottom (reverse)	',
'36'=>'Sliding columns to bottom (random)',
'37'=>'Sliding columns to top (forward)	',
'38'=>'Sliding columns to top (reverse)',
'39'=>'Sliding columns to top (random)	',
'40'=>'Sliding columns from left to right (forward)',
'41'=>'Sliding columns from left to right (random)	',
'42'=>'Sliding columns from right to left (reverse)',
'43'=>'Sliding columns from right to left (random)	',
'44'=>'Fading and sliding tiles to right (random)',
'45'=>'Fading and sliding tiles to left (random)	',
'46'=>'Fading and sliding tiles to bottom (random)',
'47'=>'Fading and sliding tiles to top (random)	',
'48'=>'Fading and sliding random tiles to random directions',
'49'=>'Fading and sliding tiles from top-left (forward)',
'50'=>'Fading and sliding tiles from bottom-right (reverse)',
'51'=>'Fading and sliding tiles from top-right (random)	',
'52'=>'Fading and sliding tiles from bottom-left (random)',
'53'=>'Fading and sliding rows to right (forward)	',
'54'=>'Fading and sliding rows to right (reverse)',
'55'=>'Fading and sliding rows to right (random)	',
'56'=>'Fading and sliding rows to left (forward)',
'57'=>'Fading and sliding rows to left (reverse)	',
'58'=>'Fading and sliding rows to left (random)',
'59'=>'Fading and sliding rows from top to bottom (forward)	',
'60'=>'Fading and sliding rows from top to bottom (random)',
'61'=>'Fading and sliding rows from bottom to top (reverse)	',
'62'=>'Fading and sliding rows from bottom to top (random)',
'63'=>'Fading and sliding columns to bottom (forward)	',
'64'=>'Fading and sliding columns to bottom (reverse)',
'65'=>'Fading and sliding columns to bottom (random)	',
'66'=>'Fading and sliding columns to top (forward)',
'67'=>'Fading and sliding columns to top (reverse)	',
'68'=>'Fading and sliding columns to top (random)',
'69'=>'Fading and sliding columns from left to right (forward)	',
'70'=>'Fading and sliding columns from left to right (random)',
'71'=>'Fading and sliding columns from right to left (reverse)	',
'72'=>'Fading and sliding columns from right to left (random)',
'73'=>'Carousel	',
'74'=>'Carousel rows',
'75'=>'Carousel cols	',
'76'=>'Carousel tiles horizontal',
'77'=>'Carousel tiles vertical	',
'78'=>'Carousel-mirror tiles horizontal',
'79'=>'Carousel-mirror tiles vertical	',
'80'=>'Carousel mirror rows',
'81'=>'Carousel mirror cols	',
'82'=>'Turning tile from left',
'83'=>'Turning tile from right	',
'84'=>'Turning tile from top',
'85'=>'Turning tile from bottom	',
'86'=>'Turning tiles from left',
'87'=>'Turning tiles from right	',
'88'=>'Turning tiles from top',
'89'=>'Turning tiles from bottom	',
'90'=>'Turning rows from top',
'91'=>'Turning rows from bottom	',
'92'=>'Turning cols from left',
'93'=>'Turning cols from right	',
'94'=>'Flying rows from left',
'95'=>'Flying rows from right	',
'96'=>'Flying cols from top',
'97'=>'Flying cols from bottom	',
'98'=>'Flying and rotating tile from left',
'99'=>'Flying and rotating tile from right	',
'100'=>'Flying and rotating tiles from left',
'101'=>'Flying and rotating tiles from right	',
'102'=>'Flying and rotating tiles from random',
'103'=>'Scaling tile in	',
'104'=>'Scaling tile from out',
'105'=>'Scaling tiles random	',
'106'=>'Scaling tiles from out random',
'107'=>'Scaling in and rotating tiles random	',
'108'=>'Scaling and rotating tiles from out random',
'109'=>'Mirror-sliding tiles diagonal	',
'110'=>'Mirror-sliding rows horizontal',
'111'=>'Mirror-sliding rows vertical	',
'112'=>'Mirror-sliding cols horizontal',
'113'=>'Mirror-sliding cols vertical	'
      );
      
      $this->tran3d = array(
'all'=>'All',      
'1'=>'Spinning tile to right (180°)	',
'2'=>'Spinning tile to left (180°)',
'3'=>'Spinning tile to bottom (180°)	',
'4'=>'Spinning tile to top (180°)',
'5'=>'Spinning tiles to right (180°)	',
'6'=>'Spinning tiles to left (180°)',
'7'=>'Spinning tiles to bottom (180°)	',
'8'=>'Spinning tiles to top (180°)',
'9'=>'Horizontal spinning tiles random (180°)	',
'10'=>'Vertical spinning tiles random (180°)',
'11'=>'Scaling and spinning tiles to right (180°)	',
'12'=>'Scaling and spinning tiles to left (180°)',
'13'=>'Scaling and spinning tiles to bottom (180°)	',
'14'=>'Scaling and spinning tiles to top (180°)',
'15'=>'Scaling and horizontal spinning tiles random (180°)	',
'16'=>'Scaling and vertical spinning tiles random (180°)',
'17'=>'Spinning rows to right (180°)	',
'18'=>'Spinning rows to left (180°)',
'19'=>'Spinning rows to bottom (180°)	',
'20'=>'Spinning rows to top (180°)',
'21'=>'Horizontal spinning rows random (180°)	',
'22'=>'Vertical spinning rows random (180°)',
'23'=>'Vertical spinning rows random (540°)	',
'24'=>'Scaling and spinning rows to right (180°)',
'25'=>'Scaling and spinning rows to left (180°)	',
'26'=>'Scaling and spinning rows to bottom (180°)',
'27'=>'Scaling and spinning rows to top (180°)	',
'28'=>'Scaling and horizontal spinning rows random (180°)',
'29'=>'Scaling and vertical spinning rows random (180°)	',
'30'=>'Spinning columns to right (180°)',
'31'=>'Spinning columns to left (180°)	',
'32'=>'Spinning columns to bottom (180°)',
'33'=>'Spinning columns to top (180°)	',
'34'=>'Horizontal spinning columns random (180°)',
'35'=>'Vertical spinning columns random (180°)	',
'36'=>'Horizontal spinning columns random (540°)',
'37'=>'Scaling and spinning columns to right (180°)	',
'38'=>'Scaling and spinning columns to left (180°)',
'39'=>'Scaling and spinning columns to bottom (180°)	',
'40'=>'Scaling and spinning columns to top (180°)',
'41'=>'Scaling and horizontal spinning columns random (180°)	',
'42'=>'Scaling and vertical spinning columns random (180°)',
'43'=>'Drunk colums scaling and spinning to right (180°)	',
'44'=>'Drunk colums scaling and spinning to left (180°)',
'45'=>'Turning cuboid to right (90°)	',
'46'=>'Turning cuboid to left (90°)',
'47'=>'Turning cuboid to bottom (90°)	',
'48'=>'Turning cuboid to top (90°)',
'49'=>'Scaling and turning cuboid to right (90°)	',
'50'=>'Scaling and turning cuboid to left (90°)',
'51'=>'Scaling and turning cuboids to right (90°)	',
'52'=>'Scaling and turning cuboids to left (90°)',
'53'=>'Scaling and turning cuboids to bottom (90°)	',
'54'=>'Scaling and turning cuboids to top (90°)',
'55'=>'Scaling and horizontal turning cuboids random (90°)	',
'56'=>'Scaling and vertical turning cuboids random (90°)',
'57'=>'Turning rows to right (90°)	',
'58'=>'Turning rows to left (90°)',
'59'=>'Horizontal turning rows random (90°)	',
'60'=>'Scaling and turning rows to right (90°)',
'61'=>'Scaling and turning rows to left (90°)	',
'62'=>'Scaling and turning rows to bottom (90°)',
'63'=>'Scaling and turning rows to top (90°)	',
'64'=>'Scaling and horizontal turning rows random (90°)',
'65'=>'Scaling and vertical turning rows random (90°)	',
'66'=>'Scaling and horizontal turning drunk rows to right (90°)',
'67'=>'Scaling and horizontal turning drunk rows to left (90°)	',
'68'=>'Turning columns to bottom (90°)',
'69'=>'Turning columns to top (90°)	',
'70'=>'Vertical turning columns random (90°)',
'71'=>'Scaling and turning columns to bottom (90°)	',
'72'=>'Scaling and turning columns to top (90°)',
'73'=>'Scaling and turning columns to right (90°)	',
'74'=>'Scaling and turning columns to left (90°)',
'75'=>'Scaling and horizontal turning columns random (90°)	',
'76'=>'Scaling and vertical turning columns random (90°)',
'77'=>'Scaling and vertical turning drunk columns to right (90°)	',
'78'=>'Scaling and vertical turning drunk columns to left (90°)',
'79'=>'Spinning cuboid to right (180°, large depth)	',
'80'=>'Spinning cuboid to left (180°, large depth)',
'81'=>'Spinning cuboid to bottom (180°, large depth)	',
'82'=>'Spinning cuboid to top (180°, large depth)',
'83'=>'Scaling and spinning cuboids to right (180°, large depth)	',
'84'=>'Scaling and spinning cuboids to left (180°, large depth)',
'85'=>'Scaling and spinning cuboids to bottom (180°, large depth)	',
'86'=>'Scaling and spinning cuboids to top (180°, large depth)',
'87'=>'Scaling and horizontal spinning cuboids random (180°, large depth)	',
'88'=>'Scaling and vertical spinning cuboids random (180°, large depth)',
'89'=>'Scaling and spinning rows to right (180°, large depth)	',
'90'=>'Scaling and spinning rows to left (180°, large depth)',
'91'=>'Scaling and spinning rows to bottom (180°, large depth)	',
'92'=>'Scaling and spinning rows to top (180°, large depth)',
'93'=>'Scaling and horizontal spinning rows random (180°, large depth)	',
'94'=>'Scaling and vertical spinning rows random (180°, large depth)',
'95'=>'Scaling and spinning columns to bottom (180°, large depth)	',
'96'=>'Scaling and spinning columns to top (180°, large depth)',
'97'=>'Scaling and spinning columns to right (180°, large depth)	',
'98'=>'Scaling and spinning columns to left (180°, large depth)',
'99'=>'Scaling and horizontal spinning columns random (180°, large depth)	',
'100'=>'Scaling and vertical spinning columns random (180°, large depth)'      
      );
	  
    }
    
    public function install()
    {
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);
      
      $cfg['button_color'] = '#c4c4c4';
      $cfg['button_hover_color'] = '#9D3BC6';
      $cfg['autoStart'] = 'true';
      $cfg['twoWaySlideshow'] = '-1';
      $cfg['keybNav'] = '-1';
      $cfg['touchNav'] = '-1';
      $cfg['imgPreload'] = '-1';
      $cfg['pauseOnHover'] = '-1';
      $cfg['loops'] = '';
      $cfg['forceLoopNum'] = '-1';
      $cfg['slideDirection'] = '-1';
      $cfg['slideDelay'] = '';
      $cfg['durationIn'] = '';
      $cfg['durationOut'] = '';
      $cfg['delayIn'] = '';
      $cfg['delayOut'] = '';
      $cfg['showBarTimer'] = '-1';
      $cfg['showCircleTimer'] = 'false';
      
      $cfg = serialize($cfg);
      $ret = parent::install() && $this->registerHook('home') && $this->registerHook('header') && $this->registerHook('displayTopSlider') && $this->installDb() && Configuration::updateValue($this->name.'_settings', $cfg);
      $this->update_css();
      
      return $ret;   
    }
    
    public function installDb()
    {
      $default_language = (int)Configuration::get('PS_LANG_DEFAULT');
      
      $query = '
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'layered_tonyhomeslider` (
			`slide_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			image varchar(255),
			sort_order int default 0,
			image_width int default 0,
			image_height int default 0,
			link text,
			cfg text,
			`new_window` TINYINT( 1 ) NOT NULL,
			INDEX (`id_shop`)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;      
      ';
      
      $query2 = '
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'layered_tonyhomeslider_texts` (
      txt_id int auto_increment PRIMARY KEY,
			`slide_id` INT UNSIGNED NOT NULL,
			`id_lang` INT(11) UNSIGNED NOT NULL,
      txt1 varchar(255), 
      txt2 varchar(255),
      position1 text,
      font varchar(50),
      `new_window` TINYINT( 1 ) NOT NULL,
      link text,
      cfg text,
			KEY(slide_id,id_lang)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;      
      ';
      
      $query3 = 'INSERT INTO `'._DB_PREFIX_.'layered_tonyhomeslider` (`slide_id`, `id_shop`, `image`, `sort_order`, `image_width`, `image_height`, `link`, `new_window`, `cfg`) VALUES (3, 1, \'slider3.jpg\', 1, 0, 0, \'\', 0, \'a:2:{s:6:"2dtran";a:1:{i:0;s:1:"1";}s:6:"3dtran";a:1:{i:0;s:1:"1";}}\'),
(4, 1, \'slider2.jpg\', 2, 0, 0, \'\', 0, \'a:5:{s:14:"slideDirection";s:2:"-1";s:17:"slideoutdirection";s:2:"-1";s:10:"slideDelay";s:0:"";s:6:"2dtran";a:1:{i:0;s:3:"all";}s:6:"3dtran";a:1:{i:0;s:3:"all";}}\'),
(5, 1, \'slider4.jpg\', 3, 0, 0, \'\', 0, \'a:5:{s:14:"slideDirection";s:2:"-1";s:17:"slideoutdirection";s:2:"-1";s:10:"slideDelay";s:0:"";s:6:"2dtran";a:1:{i:0;s:3:"all";}s:6:"3dtran";a:1:{i:0;s:3:"all";}}\'),
(6, 1, \'slider1.jpg\', 4, 0, 0, \'\', 0, \'a:2:{s:6:"2dtran";a:1:{i:0;s:3:"all";}s:6:"3dtran";a:1:{i:0;s:3:"all";}}\')
';
      $query4 = '
INSERT INTO `'._DB_PREFIX_.'layered_tonyhomeslider_texts` (`txt_id`, `slide_id`, `id_lang`, `txt1`, `txt2`, `position1`, `font`, `new_window`, `link`, `cfg`) VALUES 
(1, 1, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:3:"50%";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:16:"FASHION FEATURE1";s:4:"txt2";s:19:"2013 HOTTEST TREND1";}i:2;a:9:{s:3:"top";s:1:"5";s:5:"right";s:1:"6";s:6:"bottom";s:1:"7";s:4:"left";s:1:"8";s:6:"custom";s:1:"9";s:6:"color1";s:1:"2";s:6:"color2";s:1:"4";s:4:"txt1";s:1:"1";s:4:"txt2";s:1:"3";}}\', \'Gentium Book Basic\', 1, \'http://google.com\', NULL),
(2, 1, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"192px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"584px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:12:"long awaited";s:4:"txt2";s:12:"NEW ARRIVALS";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', NULL),
(4, 3, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:3:"50%";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:3:"0px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:15:"FASHION FEATURE";s:4:"txt2";s:18:"2013 HOTTEST TREND";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 1, \'http://google.com\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(5, 3, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"192px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"584px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:12:"long awaited";s:4:"txt2";s:12:"NEW ARRIVALS";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(6, 3, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"434px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"584px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:10:"HOT SUMMER";s:4:"txt2";s:16:"BEACH COLLECTION";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(7, 3, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"434px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"872px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:12:"This weekend";s:4:"txt2";s:13:"BIGGEST SALES";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(8, 4, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:3:"50%";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:3:"0px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:15:"FASHION FEATURE";s:4:"txt2";s:15:"Fit for a queen";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(9, 4, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"203px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"594px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:8:"SHOP NOW";s:4:"txt2";s:12:"HOT SEXY SET";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(10, 4, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"434px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"594px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:15:"COLLECTION 2013";s:4:"txt2";s:13:"Autumn Winter";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(11, 4, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"434px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"881px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:10:"SS13 TREND";s:4:"txt2";s:14:"BASIC LINGERIE";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(12, 5, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:3:"50%";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:3:"0px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:15:"FASHION FEATURE";s:4:"txt2";s:16:"TURN UP THE HEAT";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(13, 5, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"191px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"575px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:12:"SAVE 25% OFF";s:4:"txt2";s:16:"SALES OF THE DAY";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(14, 5, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"434px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"575px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:12:"NEW ARRIVALS";s:4:"txt2";s:15:"FASHION UPDATES";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\'),
(15, 5, '.$default_language.', \'\', \'\', \'a:2:{i:1;a:9:{s:3:"top";s:5:"434px";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:5:"862px";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:19:"LUXURY WATCHES 2013";s:4:"txt2";s:20:"DESIGNER COLLECTIONS";}i:2;a:9:{s:3:"top";s:0:"";s:5:"right";s:0:"";s:6:"bottom";s:0:"";s:4:"left";s:0:"";s:6:"custom";s:0:"";s:6:"color1";s:0:"";s:6:"color2";s:0:"";s:4:"txt1";s:0:"";s:4:"txt2";s:0:"";}}\', \'Default\', 0, \'\', \'a:5:{s:14:"slideDirection";s:4:"fade";s:17:"slideoutdirection";s:4:"fade";s:7:"delayIn";s:3:"500";s:8:"delayOut";s:0:"";s:9:"showuntil";s:4:"4500";}\')
              
      ';
      
       
      
      $ret = Db::getInstance()->execute($query) && Db::getInstance()->execute($query2) && Db::getInstance()->execute($query3) && Db::getInstance()->execute($query4);
      
      return $ret;
      
    }
    
    private function uninstallDb()
	  { 
	 	 Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'layered_tonyhomeslider`');
	 	 Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'layered_tonyhomeslider_texts`');
		 return true;
	  }
	  
	  public function uninstall()
  	{
  	  Configuration::deleteByName($this->name.'_settings');
  		if (!parent::uninstall() ||
  			!$this->uninstallDB())
  			return false;
  		return true;
  	}
    
    public function hookHeader()
    {
      $this->context->controller->addCSS(($this->_path).'css/layerslider.css', 'all');
      $this->context->controller->addCSS(($this->_path).'css/customization.css', 'all');
      $this->context->controller->addJS(($this->_path).'js/jquery-transit-modified.js');
      $this->context->controller->addJS(($this->_path).'js/layerslider.transitions.js');
      $this->context->controller->addJS(($this->_path).'js/layerslider.kreaturamedia.jquery.js');
    }
    
    public function displayForm()
    {
      $do = Tools::getValue('do');
      
      switch($do)
      {
        case 'removeslide':
        case 'removeslideimage':
        {
          $ssid = (int)Tools::getValue('ssid');
          $query = "select image from "._DB_PREFIX_."layered_tonyhomeslider where slide_id='$ssid'";
          $rows = Db::getInstance()->executeS($query);
          $image = $rows[0]['image'];
          
          @unlink(_PS_MODULE_DIR_.$this->name.'/slides/'.$image);
          
          if ($do == 'removeslideimage')
          {
            $query = "update "._DB_PREFIX_."layered_tonyhomeslider set image='' where slide_id='$ssid'";
            Db::getInstance()->execute($query);
          
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$ssid);
          }
          else
          {
            $query = "delete from "._DB_PREFIX_."layered_tonyhomeslider where slide_id='$ssid'";
            Db::getInstance()->execute($query);
            
            $query = "delete from "._DB_PREFIX_."layered_tonyhomeslider_texts where slide_id='$ssid'";
            Db::getInstance()->execute($query);
          
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
          }  
          
        }break;
        case 'addnewslide':
        {
          $ssid = (int)Tools::getValue('ssid');
          $this->_clearCache('tonylayeredslider.tpl');
          $content = $this->_add_new_slide($ssid);
        }break;
        case 'addnewlabel':
        {
          $id = (int)Tools::getValue('id');
          $this->_clearCache('tonylayeredslider.tpl');
          $content = $this->_add_new_label($id);
        }break;
        case 'deletelabel':
        {
          $txt_id = (int)Tools::getValue('lid');
          $slide_id = (int)Tools::getValue('id');
          
          $query = "delete from "._DB_PREFIX_."layered_tonyhomeslider_texts where txt_id='$txt_id' and slide_id='$slide_id'";
          Db::getInstance()->execute($query);
          
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }break;
        default:
          $content = $this->_main();
      }
      
      return $content;
    }
    
    function _add_new_label($slide_id)
    {
      $txt_id = (int)Tools::getValue('lid');
      $languages = $this->context->controller->getLanguages();
		  $default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		  $id_lang = (int)Context::getContext()->language->id;
		  $path = _MODULE_DIR_.$this->name.'/slides/';
		  $id_shop = (int)Shop::getContextShopID();
		  $def_values = array();
		  
		  $slider_options = array(
      'slideDirection'=>array(
        'title'=>'Slide direction',
        'desc'=>'',
        'type'=>'select',
        'values'=>array('---'=>'-1','Left'=>'left','Right'=>'right','Top'=>'top','Bottom'=>'bottom','Fade'=>'fade'),
      ),
      'slideoutdirection'=>array(
        'title'=>'Slide out direction',
        'desc'=>'',
        'type'=>'select',
        'values'=>array('---'=>'-1','Left'=>'left','Right'=>'right','Top'=>'top','Bottom'=>'bottom','Fade'=>'fade'),
      ),
      'delayIn'=>array(
        'title'=>'Delay In',
        'desc'=>'number (millisecs). Delay time of the slide-in animation.',
        'type'=>'input',
      ),
      'delayOut'=>array(
        'title'=>'Delay Out',
        'desc'=>'number (millisecs). Delay time of the slide-out animation.',
        'type'=>'input',
      ),
      'showuntil'=>array(
        'title'=>'Show time',
        'desc'=>'number (millisecs)',
        'type'=>'input',
      ),
      
      );
		  
		  if (Tools::isSubmit('addnew'))
		  {
		    if (is_array($_POST['txt1_']))
        {
          $position1 = array();
          $link = Db::getInstance()->_escape(Tools::getValue('link'));
          $new_win = (int)Tools::getValue('new_window');
          $font = Db::getInstance()->_escape(Tools::getValue('font'));
          
          foreach($_POST['txt1_'] as $lng_id=>$data)
          {
            $position1[$lng_id]['top'] = $_POST['txt1_pos_top'][$lng_id];
            $position1[$lng_id]['right'] = $_POST['txt1_pos_right'][$lng_id];
            $position1[$lng_id]['bottom'] = $_POST['txt1_pos_bottom'][$lng_id];
            $position1[$lng_id]['left'] = $_POST['txt1_pos_left'][$lng_id];
            $position1[$lng_id]['custom'] = $_POST['txt1_pos_custom'][$lng_id];
            $position1[$lng_id]['color1'] = $_POST['txt1_color'][$lng_id];
            $position1[$lng_id]['color2'] = $_POST['txt2_color'][$lng_id];
            $position1[$lng_id]['txt1'] = $data;
            $position1[$lng_id]['txt2'] = $_POST['txt2_'][$lng_id];
            
          }
          $position1 = Db::getInstance()->_escape(serialize($position1));

          $cfg = array();
          foreach($slider_options as $k=>$data)
          {
            $cfg[$k] = Tools::getValue($k); 
          }
          
          $cfg = Db::getInstance()->_escape(serialize($cfg));
          
          if ($txt_id != 0)
          {
            $query = "update "._DB_PREFIX_."layered_tonyhomeslider_texts set txt1='$data1',txt2='$data2',position1='$position1',link='$link',new_window='$new_win',font='$font',cfg='$cfg' where txt_id='$txt_id'";
            Db::getInstance()->execute($query);
          }  
          else
          {
            $query = "insert into "._DB_PREFIX_."layered_tonyhomeslider_texts set slide_id='$slide_id',txt1='$data1',txt2='$data2',position1='$position1',link='$link',new_window='$new_win',font='$font',cfg='$cfg'";
            Db::getInstance()->execute($query);
            $txt_id = Db::getInstance()->Insert_ID();
          }
          
        }
        
        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewlabel&id='.$slide_id.'&lid='.$txt_id.'&updated');
      }
		  
		  if ($txt_id != 0)
		  {
		    $query = "select * from "._DB_PREFIX_."layered_tonyhomeslider_texts where txt_id='$txt_id'";
		    $rows = Db::getInstance()->executeS($query);
		    
		    $def_values = $rows[0];
		    $def_values['position1'] = unserialize($def_values['position1']);
		    $def_values['cfg'] = unserialize($def_values['cfg']);
        
      }
      
      $message = '';
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
      
      $content = $message;
      
      $txt_inputs = '';
		  foreach ($languages as $language)
		  {
		    $txt_inputs .= '
<div id="html_block_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
				<div>
						<table>
              <tr><td>'.$this->l('Row #1').' </td><td><input type="text" name="txt1_['.(int)$language['id_lang'].']" size="50" value="'.$def_values['position1'][$language['id_lang']]['txt1'].'"></td>
              <td>
                '.$this->l('color').' <input type="text" name="txt1_color['.(int)$language['id_lang'].']" value="'.$def_values['position1'][$language['id_lang']]['color1'].'" class="color mColorPickerInput mColorPicker" data-hex="true">
              </td>
              </tr>
            </table>  
						<table>
              <tr>
              <td>'.$this->l('Row #2').' </td>
              <td><input type="text" name="txt2_['.(int)$language['id_lang'].']" size="50" value="'.$def_values['position1'][$language['id_lang']]['txt2'].'">
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
      foreach($this->m_google_fonts as $index=>$font)
      {
        $selected = ($font == $def_values['font']) ? 'selected' : '';
        $font_opts .= '<option value="'.$font.'" '.$selected.'>'.$font.'</option>';
      }
      
      $options_html = '';
      foreach($slider_options as $id=>$data)
      {
        if ($data['type'] == 'select')
        {
          $input = '<select name="'.$id.'">';
          foreach($data['values'] as $k=>$v)
          {
            $selected = ($def_values['cfg'][$id] == $v) ? 'selected' : '';
            $input .= '<option value="'.$v.'" '.$selected.'>'.$k.'</option>';
          }
          $input .= '</select>';
        }
        else
        {
          $input = '<input type="text" name="'.$id.'" value="'.$def_values['cfg'][$id].'">';
        }
          
        $options_html .= '
<tr>
    <td class="conf-title">'.$this->l($data['title']).':</td>
    <td class="conf-value">'.$input.'<div class="comment">'.$data['desc'].'</div></td>
</tr>        
        ';
      }
      
      $content .= '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;vertical-align:top;padding-top:6px;}
.conf-table td{padding:0 5px 10px 0;}
.comment{font-size:11px;}
.conf-value{background-color:#e4e4e4;padding:5px 0 5px 0;}
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
});
  
</script>
<form method="post" enctype="multipart/form-data">
'.$hidden_inputs.'
<fieldset class="conf-set">
<legend>'.$this->l('Add new slide').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><input type="button" value="'.$this->l('Back').'" class="button" style="cursor:pointer;"></a>
<table class="conf-table">      
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
    <td class="conf-title">'.$this->l('Link').':</td>
    <td class="conf-value"><input type="text" name="link" size="100" value="'.$def_values['link'].'"></td>
</tr>
<tr>
    <td class="conf-title">'.$this->l('Open target in new window').':</td>
    <td class="conf-value"><input type="checkbox" name="new_window" value="1" '.($def_values['new_window'] == 1 ? 'checked' : '').'></td>
</tr>
'.$options_html.'
</table>


<input type="submit" name="addnew" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>

</form>
      ';
      
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
		    $query = "select * from "._DB_PREFIX_."layered_tonyhomeslider where slide_id='$id'";
		    $rows = Db::getInstance()->executeS($query);
		    
		    $def_values = $rows[0];
		    $def_values['cfg'] = unserialize($def_values['cfg']);
		    if (!is_array($def_values['cfg']))
		      $def_values['cfg'] = array();
		    
		    if (strlen($def_values['image']))
		      $uploaded_image = '<img src="'.$path.$def_values['image'].'">&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslideimage&ssid='.$id.'">'.$this->l('Delete image').'</a>]';
		    
      }
      
		  
		  $message = '';
		  $image_sql = '';
		  
      $hidden_inputs = '';
      if (Tools::isSubmit('addnew'))
      {
        $link = Tools::getValue('link');
        $new_win = (int)Tools::getValue('new_window');
        $image_width = (int)Tools::getValue('image_width');
        $image_height = (int)Tools::getValue('image_height');
        $font = Db::getInstance()->_escape(Tools::getValue('font'));
        $sort_order = (int)Tools::getValue('sort_order');
        
        $def_values['link'] = $link;
        $def_values['new_window'] = $new_win;
        $def_values['sort_order'] = $sort_order;
        $def_values['font'] = $font;
        $def_values['image_width'] = $iamge_width;
        $def_values['image_height'] = $iamge_height;
        $def_values['cfg'] = array();
        
        $tran2d = $_POST['tran2d'];
        $tran3d = $_POST['tran3d'];
        
        
        $def_values['cfg']['2dtran'] = array();
        $def_values['cfg']['3dtran'] = array();
        if (is_array($tran2d))
        {
          foreach($tran2d as $tran)
          {
            if ($tran == 'all')
            {
              $def_values['cfg']['2dtran'][] = 'all';
              break;
            }
            $def_values['cfg']['2dtran'][] = $tran;
          }  
        }
        if (is_array($tran3d))
        {
          foreach($tran3d as $tran)
          {
            if ($tran == 'all')
            {
              $def_values['cfg']['3dtran'][] = 'all';
              break;
            }
            $def_values['cfg']['3dtran'][] = $tran;
          }  
        }
        
        $def_values['cfg'] = Db::getInstance()->_escape(serialize($def_values['cfg']));
        

        if (isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name']))
        {
          if ($error = ImageManager::validateUpload($_FILES['image'], Tools::convertBytes(ini_get('upload_max_filesize'))))
					 $errors .= $error;
  				else
  				{
  				  $file_name = $_FILES['image']['name'];
  				  
  				  if (!move_uploaded_file($_FILES['image']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/slides/'.$file_name))
						  $errors .= $this->l('File upload error.');
						else
            {
               $hidden_inputs .= '<input type="hidden" name="uploaded_file" value="'.$file_name.'">';
               $uploaded_image = '<img src="'.$path.$file_name.'">';
               $image_sql = "image='{$file_name}',";
            }  
  				}
        }
        elseif(strlen($def_values['image']) == 0)
          $errors .= $this->l('You need to upload slide image');
        
        if (!$errors)
        {
          $link = Db::getInstance()->_escape($link);
          if ($id != 0)
          {
            $query = "update "._DB_PREFIX_."layered_tonyhomeslider set cfg='{$def_values['cfg']}',id_shop='{$id_shop}',{$image_sql}sort_order='$sort_order',image_width='$image_width',image_height='$image_height',link='$link',new_window='$new_win' where slide_id='$id'";
            Db::getInstance()->execute($query);
            $slide_id = $id;
          }  
          else
          {
            $query = "insert into "._DB_PREFIX_."layered_tonyhomeslider set cfg='{$def_values['cfg']}',id_shop='{$id_shop}',{$image_sql}sort_order='$sort_order',image_width='$image_width',image_height='$image_height',link='$link',new_window='$new_win'";
            Db::getInstance()->execute($query);
            $slide_id = Db::getInstance()->Insert_ID();
            
          }    
          
           
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$slide_id.'&updated');
          
        }  
        
      }
      
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
      
      $content = $message;

      if (isset($errors))
			  $content .= $this->displayError($errors);
			
      $font_opts = '';
      foreach($this->m_google_fonts as $index=>$font)
      {
        $selected = ($font == $def_values['font']) ? 'selected' : '';
        $font_opts .= '<option value="'.$font.'" '.$selected.'>'.$font.'</option>';
      }
      
      
      $d2_opts = '';
      foreach($this->tran2d as $k=>$v)
      {
        $selected = (is_array($def_values['cfg']['2dtran']) && in_array($k,$def_values['cfg']['2dtran']) !== false) ? 'selected' : '';
        $d2_opts .= '<option value="'.$k.'" '.$selected.'>'.$v.'</option>';
      }
      $d3_opts = '';
      foreach($this->tran3d as $k=>$v)
      {
        $selected = (is_array($def_values['cfg']['3dtran']) && in_array($k,$def_values['cfg']['3dtran']) !== false) ? 'selected' : '';
        $d3_opts .= '<option value="'.$k.'" '.$selected.'>'.$v.'</option>';
      }
			
      $content .= '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;vertical-align:top;padding-top:6px;}
.conf-table td{padding:0 5px 10px 0;}
.comment{font-size:11px;}
.conf-value{background-color:#e4e4e4;padding:5px 0 5px 0;}
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
'.$options_html.'

<tr>
    <td class="conf-title">'.$this->l('Transitions 2D').':</td>
    <td class="conf-value">
      <select name="tran2d[]" multiple style="height:300px;">
        '.$d2_opts.'
      </select>
      <div class="comment">'.$this->l('Hold the CTRL key to select multiple items. The slider will choose one of the specified 2D transitions. ').'</div>
    </td>
</tr>

<tr>
    <td class="conf-title">'.$this->l('Transitions 3D').':</td>
    <td class="conf-value">
      <select name="tran3d[]" multiple style="height:300px;">
        '.$d3_opts.'
      </select>
      <div class="comment">'.$this->l('Hold the CTRL key to select multiple items. The slider will choose one of the specified 3D transitions, if your browser doesn\'t support 3D transitions, the slider will choose one 2D transition from all the available 2D transitions. ').'</div>
    </td>
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
      $default_language = (int)Configuration::get('PS_LANG_DEFAULT'); 
      
      $query = "select * from "._DB_PREFIX_."layered_tonyhomeslider where id_shop='$id_shop' order by sort_order asc";
      $rows = Db::getInstance()->executeS($query);
      
      $slides = array();
      
      $content = '';
      foreach($rows as $row)
      {
        $slides[] = $row; 
      }
      ksort($slides);
      
      foreach($slides as $group=>$row)
      {
        $l = $group + 1;                                  
        $content .= '<fieldset class="conf-set"><legend>'.$this->l('Layer').' '.$l.'</legend>';
        
        //Get labels
        $query = "select * from "._DB_PREFIX_."layered_tonyhomeslider_texts where slide_id='{$row['slide_id']}' order by txt_id asc";
        $rows2 = Db::getInstance()->executeS($query);
        $labels = '';
        foreach($rows2 as $row2)
        {
          $data = unserialize($row2['position1']);
          $labels .= '<div class="lbl-txt"> - '.$data[$default_language]['txt1'].' / '.$data[$default_language]['txt2'].'&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewlabel&id='.$row['slide_id'].'&lid='.$row2['txt_id'].'">edit</a>]&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=deletelabel&id='.$row['slide_id'].'&lid='.$row2['txt_id'].'">delete</a>]</div>';
        }

        $content .= '
<div class="slider-div">          
<img src="'.$img_path.$row['image'].'" width="200"><br />
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide&ssid='.$row['slide_id'].'">'.$this->l('Edit').'</a>]
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslide&ssid='.$row['slide_id'].'">'.$this->l('Delete').'</a>]
</div>
<div class="text-div">
'.$labels.'
<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewlabel'.'&id='.$row['slide_id'].'"><input type="button" name="addlabel" value="'.$this->l('Add label').'" class="button" style="cursor:pointer;"></a>
</div>         
         ';
       
        $content .= '</fieldset>';
         
      }
      
      
     
      $cfg = unserialize(Configuration::get($this->name.'_settings'));
      
      if (!is_array($cfg))
        $cfg = array();
      
      $options_html = '';
      
      foreach($this->slider_options as $id=>$data)
      {
        if ($data['type'] == 'select')
        {
          $input = '<select name="'.$id.'">';
          foreach($data['values'] as $k=>$v)
          {
            $selected = ($cfg[$id] == $v) ? 'selected' : ''; 
            $input .= '<option value="'.$v.'" '.$selected.'>'.$k.'</option>';
          }
          $input .= '</select>';
        }
        else
        {
          $input = '<input type="text" name="'.$id.'" value="'.$cfg[$id].'">';
        }
          
        $options_html .= '
<tr>
    <td class="conf-title">'.$this->l($data['title']).':</td>
    <td class="conf-value">'.$input.'<div class="comment">'.$data['desc'].'</div></td>
</tr>        
        ';
      } 
      $content = '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:250px;font-weight:bold;text-align:right;}
.conf-table td{padding:0 5px 10px 0;}
.slider-div{float:left;text-align:center;padding:10px;}
.text-div{float:left;padding:10px;}
.comment{font-size:11px;}
.lbl-txt{font-size:12px;padding:3px;}
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
'.$options_html.'
</table>
<input type="submit" name="savesett" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>
</form>

'.$content.'

<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide'.'"><input type="button" name="addnew" value="'.$this->l('Add slide').'" class="button"></a>
</fieldset>


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
        foreach($this->slider_options as $id=>$data)
        {
          $cfg[$id] = Tools::getValue($id); 
        }
        $cfg = serialize($cfg);
        Configuration::updateValue($this->name.'_settings', $cfg);
        $this->_clearCache('tonylayeredslider.tpl');
        
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
    
    public function hookdisplayTopSlider($params)
    {
      return $this->hookDisplayHome($params,'tonylayeredslider-top-home.tpl');
    }
    
    public function hookDisplayHome($params,$tpl = 'tonylayeredslider.tpl')
    {
      $current_language = $this->context->language->id;
		  $id_shop = (int)Shop::getContextShopID();
		  
		  $query = "select * from "._DB_PREFIX_."layered_tonyhomeslider where id_shop='$id_shop' order by sort_order asc";
		  $rows = Db::getInstance()->executeS($query);
		  
		  $slider = array();
		  $google_fonts = array();
		  
		  foreach($rows as $row)
		  {
		    $query = "select * from "._DB_PREFIX_."layered_tonyhomeslider_texts where slide_id='{$row['slide_id']}'";
		    $rows2 = Db::getInstance()->executeS($query);
		    $txt_array = array();
		    
		    foreach($rows2 as $row2)
		    {
  		    $texts = $row2;
  		    $position = unserialize($texts['position1']);
  		    $txt_cfg = unserialize($texts['cfg']);
  		    $slider_style = '';
  		    
  		    if (is_array($txt_cfg))
  		    {
    		    foreach($txt_cfg as $k=>$v)
    		    {
    		      if ($v != -1 && strlen($v))
    		        $slider_style .= $k.':'.$v.';';      
            }
          }  
          
  		    $position = $position[$current_language];
  		    $style = array();
  		    
  		    if (strlen($position['top']))
  		      $style[] = 'top:'.$position['top'];
  		    if (strlen($position['right']))
  		      $style[] = 'right:'.$position['right'];
          if (strlen($position['bottom']))
  		      $style[] = 'bottom:'.$position['bottom'];
          if (strlen($position['left']))
  		      $style[] = 'left:'.$position['left'];
          if (strlen($position['custom']))
  		      $style[] = $position['custom'];
  		    if (strlen($row2['font']) && $row2['font'] != 'Default')
          {
            $google_fonts[] = $this->context->link->protocol_content.'fonts.googleapis.com/css?family='.urlencode($row2['font']);  
          }
          
          if (count($style))
            $style_html = implode(';',$style).';';          
          else
            $style_html = 'top:50%;';
          
           $txt_array[] = array(
            'new_window'=>$row2['new_window'],
            'link'=>$row2['link'],
            'txt1'=>$position['txt1'],
            'txt2'=>$position['txt2'],
            'color1'=>$position['color1'],
            'color2'=>$position['color2'],
            'font'=>$row2['font'],
            'style'=>$style_html,
            'slider_params'=>$slider_style
           ); 
         }
         $row['cfg'] = unserialize($row['cfg']);
         
         $slider_opt = '';
         $slider_opt_array = array();

         if (is_array($row['cfg']))
         {
           foreach($row['cfg'] as $param=>$data)
           {
             if ($param == '2dtran')
             {
               $slider_opt_array[] = 'transition2d:'.implode($data,','); 
             }
             elseif ($param == '3dtran')
             {
               $slider_opt_array[] = 'transition3d:'.implode($data); 
             }
             elseif(strlen($param == '2dtran') && $param != -1)
             {
               $slider_opt_array[] = "{$param}:{$data}"; 
             }
           }
           $slider_opt = implode(';',$slider_opt_array);
         }  
         
        
        $slider[] = @array(
          
          'image'=>$this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/slides/'.$row['image'],
          'w'=>(int)$row['image_width'],
          'h'=>(int)$row['image_height'],
          'link'=>$row['link'],
          'new_window'=>$row['new_window'],
          'txt'=>$txt_array,
          'slider_opt'=>$slider_opt
        );  
      }
      
      $js_params = '';
      $cfg = unserialize(Configuration::get($this->name.'_settings'));
      foreach($this->slider_options as $id=>$data)
      {
        if (($data['type'] == 'input') && (strlen($cfg[$id]) != 0))
          $js_params .= ','.$id.':\''.$cfg[$id]."'";
        elseif (($data['type'] == 'select') && ($cfg[$id] != -1))
        {
          if ($cfg[$id] == 'true' || $cfg[$id] == 'false')
            $js_params .= ','.$id.':'.$cfg[$id];
          else
            $js_params .= ','.$id.':\''.$cfg[$id]."'";  
        }    
      }
      
      $slider_js_code = '
<script type="text/javascript">
  $(document).ready(function(){
	$("#layerslider").layerSlider({
		skinsPath : "'.__PS_BASE_URI__.'modules/'.$this->name.'/css/skins/",
		skin : "tonytheme",
		thumbnailNavigation : "hover",
		autoPlayVideos : false,
		navPrevNext : false,
		navButtons : false,
		navStartStop : false,
		hoverPrevNext : false
		'.$js_params.'
	});				
	$("div#prev_slide").click(function() { $("#layerslider").layerSlider("prev")})
	$("div#next_slide").click(function() { $("#layerslider").layerSlider("next")})

});		

</script>      
      ';
      
      $this->context->smarty->assign(array(
			  'tonyslider' => $slider,
			  'google_fonts' => $google_fonts,
			  'slider_js'=>$slider_js_code,
		  ));
		  
      return ($this->display(__FILE__, $tpl));
    }
    
    function update_css()
    {
      $css_files = array('customization.css');
  	  @chmod(_PS_MODULE_DIR_.$this->name.'/css',0755);
  	  $cfg = unserialize(Configuration::get($this->name.'_settings'));
      if (!is_array($cfg))
        $cfg = array();
      
  	  $search = array(
  	  '{$button_color}',
  	  '{$button_hover_color}'
      );
  	  $replace = array(
  	  $cfg['button_color'],
  	  $cfg['button_hover_color']
      );
  	  
  	  foreach($css_files as $file)
  	  {
  	    @chmod(_PS_MODULE_DIR_.$this->name.'/css/'.$file,0755);
  	    
  	    $file_content = file_get_contents(_PS_MODULE_DIR_.$this->name.'/css/template_'.$file);
  	    $file_content = str_replace($search,$replace,$file_content);
  	    file_put_contents(_PS_MODULE_DIR_.$this->name.'/css/'.$file,$file_content);
      }
    }
    
   } 	