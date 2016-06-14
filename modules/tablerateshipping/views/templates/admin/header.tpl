{*
 * Overrides carrier shipping with Table Rate Shipping
 * 
 * Table Rate Shipping by Kahanit(https://www.kahanit.com/) is licensed under a 
 * Creative Creative Commons Attribution-NoDerivatives 4.0 International License.
 * Based on a work at https://www.kahanit.com/.
 * Permissions beyond the scope of this license may be available at https://www.kahanit.com/.
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nd/4.0/.
 * 
 * @author    Amit Sidhpura <amit@kahanit.com>
 * @copyright 2015 Kahanit
 * @license   http://creativecommons.org/licenses/by-nd/4.0/
 *}

<div id="ktrs-content" class="bootstrap">
    {if $post_success_count != 0}
        <div class="alert alert-success">
            {$post_success|escape:'htmlall':'UTF-8'}
        </div>
    {/if}
    {if $post_warning_count != 0}
        <div class="alert alert-warning">
            {$post_warning|escape:'htmlall':'UTF-8'}
        </div>
    {/if}
    {if $post_error_count != 0}
    <div class="alert alert-danger">
        {$post_error|escape:'htmlall':'UTF-8'}
    </div>
{/if}