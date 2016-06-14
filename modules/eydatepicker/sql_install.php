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

/* install database modifications */
Db::getInstance()->Execute('
CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'eydpckr_delivery_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shop` int(11) NOT NULL DEFAULT 0,
  `id_order` int(11) DEFAULT NULL,  
  `id_cart` int(11) DEFAULT NULL,
  `shipping_hour` varchar(50) DEFAULT NULL,
  `shipping_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_order` (`id_order`)
);
');

/* recreate tables */
Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'availableweekdays`');
$data = Db::getInstance()->ExecuteS('SELECT COUNT(*) as nr FROM information_schema.tables WHERE TABLE_SCHEMA = \''._DB_NAME_.'\' AND TABLE_NAME = \''._DB_PREFIX_.'availableweekdays\'');
if ((int)$data[0]['nr'] == 0)
{
	Db::getInstance()->Execute('
CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'availableweekdays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shop` int(11) NOT NULL DEFAULT 0,
  `day` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `hours` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
      ');
	Db::getInstance()->Execute('
      INSERT INTO `'._DB_PREFIX_.'availableweekdays` (`id`, `day`, `active`, `hours`) VALUES
(1, 1, 1, \'08:00-12:00,13:00-17:00\'),
(2, 2, 1, \'08:00-12:00,13:00-17:00\'),
(3, 3, 1, \'08:00-12:00,13:00-17:00\'),
(4, 4, 1, \'08:00-12:00,13:00-17:00\'),
(5, 5, 1, \'08:00-12:00,13:00-17:00\'),
(6, 6, 1, \'08:00-12:00,13:00-17:00\'),
(7, 7, 0, \'08:00-12:00,13:00-17:00\');
      ');
}

/* recreate tables */
Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'restricteddays`');
$data = Db::getInstance()->ExecuteS('SELECT COUNT(*) as nr FROM information_schema.tables WHERE table_schema = \''._DB_NAME_.'\' AND table_name = \''._DB_PREFIX_.'restricteddays\'');
if ((int)$data[0]['nr'] == 0)
{
	Db::getInstance()->Execute('
      CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'restricteddays` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
		`id_shop` int(11) NOT NULL DEFAULT 0,		
        `day` tinyint(2) NOT NULL,
        `month` tinyint(2) NOT NULL,
        `description` varchar(255) NOT NULL,
        `active` tinyint(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (`id`)
      ) ENGINE=MyISAM;
      ');
}