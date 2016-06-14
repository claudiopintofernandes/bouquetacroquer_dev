{*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<br><br>
<div class="shipping">
  <h3 class="shipping-title">Livraison prévue à partir du :</h3>
  <ul class="shipping-details">
    {foreach $datesDelivery as $dateDelivery}
    <li class="shipping-detail">
      <span class="shipping-type">> {$carriers_name[{$dateDelivery@index}]}</span><span class="shipping-date">{$datesDelivery[{$dateDelivery@index}].0.1|date_format:"%d/%m/%Y"}</span>
    </li>
    {/foreach}
  </ul>
  <span class="info">Dates à titre indicatif</span>
</div>
