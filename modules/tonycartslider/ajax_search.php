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

include(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
include_once('../../modules/tonycartslider/tonycartslider.php');


$module = new tonycartslider();

$result = $module->getSearchResults();

echo $result;

?>