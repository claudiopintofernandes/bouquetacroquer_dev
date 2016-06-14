{*
* TonyTheme
*
* NOTICE OF LICENSE
*
* This source file is licensed under the OSL-3.0
* that is bundled with this package in the file LICENSE.txt.
*
*  @author TonyTheme
*  @copyright TonyTheme
*  @license Open Software License v. 3.0 (OSL-3.0)
*}
<!-- Top horizontal menu -->
{if count($MENU)}
	<div class="row">
		<div class="span12">
			<nav>
				<ul class="nav nav-list">
					<li class="nav-header"><a href="#level-top1" title="" data-toggle="collapse" id="mob-nav-header"><i
									class="icon-th"></i>&nbsp;&nbsp;{l s='MENU' mod='tonythemeblocktopmenu'}<i
									class="icon-down pull-right"></i> </a>
						<ul class="collapse in" id="level-top1" style="height:0px;">
							<li><a href="{$base_dir}">{l s='HOME' mod='tonythemeblocktopmenu'}</a></li>
							{foreach from=$MENU item='menuitem' key='index'}
								{if is_array($menuitem.childs) && count($menuitem.childs)}
									{assign var='haschilds' value=1}
								{else}
									{assign var='haschilds' value=0}
								{/if}
								<li>
									<a href="{$menuitem.link}"
									   {if $menuitem.target == '_blank'}target="_blank"{/if}>{$menuitem.label|replace:'!':'<span class="attention"><span class="attention_icon"></span></span>'}</a> {if $haschilds}
									<a class="icon-collapse" href="#level{$index}-main" title="" data-toggle="collapse">
											<i
													class="icon-down pull-right"></i></a>{/if}
									{if $haschilds}
										<ul class="collapse in" id="level{$index}-main">
											{foreach from=$menuitem.childs item='childcol'}
												{foreach from=$childcol item='childitem'}
													{if is_array($childitem.childs) && count($childitem.childs)}
														{assign var='haschilds2' value=1}
													{else}
														{assign var='haschilds2' value=0}
													{/if}
													<li><a href="{$childitem.link}"
														   {if $childitem.target == '_blank'}target="_blank"{/if}> {$childitem.label} </a>
														{if $haschilds2}
															<a class="icon-collapse" href="#level{$childitem2.id}"
															   title="" data-toggle="collapse">
																<i class="icon-down pull-right"></i>
															</a>
															<ul class="collapse in" id="level{$childitem2.id}">
																{foreach from=$childitem.childs item='childitem2' key='idx2'}
																	<li><a href="{$childitem2.link}"
																		   {if $childitem2.target == '_blank'}target="_blank"{/if}> {$childitem2.label} </a>
																	</li>
																{/foreach}
															</ul>
														{/if}
													</li>
												{/foreach}
											{/foreach}
										</ul>
									{/if}
								</li>
							{/foreach}
						</ul>
					</li>
				</ul>
				<div id="megamenu">
					<ul id="nav">
						<li class="li-first-home"><a href="{$base_dir}"><i class="icon-home"></i></a></li>
						{foreach from=$MENU item='menuitem' key='index'}
							{if is_array($menuitem.childs) && count($menuitem.childs)}
								{assign var='haschilds' value=1}
							{else}
								{assign var='haschilds' value=0}
							{/if}
							<li class="level0 nav-1 level-top first parent {if $menuitem.selected == 1}current{/if}">
								<a href="{$menuitem.link}" class="level-top"
								   {if $menuitem.target == '_blank'}target="_blank"{/if}><span>{$menuitem.label}</span></a>
								{if $menuitem.htmlblock || $haschilds}
									<ul class="level0">
										<li>
											{if $haschilds}
												<ul class="shadow">
													<li class="row_middle">
														<ul class="rows_outer">
															{foreach from=$menuitem.childs item='childcol'}
																<li>
																	<ul class="menu_row">
																		{foreach from=$childcol item='childitem' key='idx'}
																			{if is_array($childitem.childs) && count($childitem.childs)}
																				{assign var='haschilds2' value=1}
																			{else}
																				{assign var='haschilds2' value=0}
																			{/if}
																			<li class="col">
																				<ul>
																					<li class="level1 nav-1-1 {if $idx == 0}first{/if} {if $haschilds2 == 1}parent{/if} title">
																						<a href="{$childitem.link}"
																						   {if $childitem.target == '_blank'}target="_blank"{/if}> {$childitem.label} </a>
																						{if $childitem.badge}
																							<span class="hot">{$childitem.badge}</span>
																						{/if}
																					</li>
																					{if isset($childitem.customhtml) && strlen($childitem.customhtml)}
																						{$childitem.customhtml}
																					{elseif $haschilds2 == 1}
																						{foreach from=$childitem.childs MENU item='childitem2' key='idx2'}
																							{if is_array($childitem2.childs) && count($childitem2.childs)}
																								{assign var='haschilds3' value=1}
																							{else}
																								{assign var='haschilds3' value=0}
																							{/if}
																							<li class="level2 nav-1-1-1 {if $idx2 == 0}first{/if}">
																								<a href="{$childitem2.link}"
																								   {if $childitem2.target == '_blank'}target="_blank"{/if}><span>{$childitem2.label}</span></a>

																								{if $haschilds3}
																									<ul class="level2">
																										{foreach from=$childitem2.childs MENU item='childitem3' key='idx3'}
																											<li class="level3 nav-4-1-1-1 {if $idx3 == 0}first{/if}">
																												<a href="{$childitem3.link}"
																												   {if $childitem3.target == '_blank'}target="_blank"{/if}>{$childitem3.label}</a>
																											</li>
																										{/foreach}
																									</ul>
																								{/if}
																							</li>
																						{/foreach}
																					{/if}
																				</ul>
																			</li>
																		{/foreach}
																	</ul>
																</li>
															{/foreach}
														</ul>
														{if $menuitem.htmlblock <> ''}
															<div class="custom">
																{$menuitem.htmlblock}
															</div>
														{/if}
													</li>
												</ul>
											{else}
												{if $menuitem.htmlblock <> ''}
													<div class="menu_custom_block">
														{$menuitem.htmlblock}
													</div>
												{/if}
											{/if}
										</li>
									</ul>
								{/if}
							</li>
						{/foreach}
					</ul>
				</div>
				{literal}
					<script>
						$('#nav > li').hover(function () {
							var top = $(this).position().top + $(this).height();
							$(this).find('> ul').css({top: top});
							$(this).find('> ul, > ul > li > ul.list_in_column').show();
						}, function () {
							$(this).find('> ul, > ul > li > ul.list_in_column').hide();
						});
					</script>
				{/literal}
			</nav>
		</div>
	</div>
{/if}
<!-- /Top horizontal menu -->