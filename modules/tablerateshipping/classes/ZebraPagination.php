<?php
/**
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
 */

/**
 * Class ZebraPagination
 */
class ZebraPagination
{
    private $properties = array(
        'always_show_navigation' => true,
        'avoid_duplicate_content' => true,
        'method' => 'get',
        'next' => 'Next page',
        'padding' => true,
        'page' => 1,
        'page_set' => false,
        'navigation_position' => 'outside',
        'preserve_query_string' => 0,
        'previous' => 'Previous page',
        'records' => '',
        'records_per_page' => '',
        'reverse' => false,
        'selectable_pages' => 11,
        'total_pages' => 0,
        'trailing_slash' => true,
        'variable_name' => 'page',
    );

    public function __construct()
    {
        $this->baseURL();
    }

    public function alwaysShowNavigation($show = true)
    {
        $this->properties['always_show_navigation'] = $show;
    }

    public function avoidDuplicateContent($avoid_duplicate_content = true)
    {
        $this->properties['avoid_duplicate_content'] = $avoid_duplicate_content;
    }

    public function baseURL($base_url = '', $preserve_query_string = true)
    {
        $base_url = ($base_url == '' ? $_SERVER['REQUEST_URI'] : $base_url);
        $parsed_url = parse_url($base_url);
        $this->properties['base_url'] = $parsed_url['path'];
        $this->properties['base_url_query'] = isset($parsed_url['query']) ? $parsed_url['query'] : '';
        parse_str($this->properties['base_url_query'], $this->properties['base_url_query']);
        $this->properties['preserve_query_string'] = $preserve_query_string;
    }

    public function getPage()
    {
        if (!$this->properties['page_set']) {
            if ($this->properties['method'] == 'url'
                && preg_match('/\b'.preg_quote($this->properties['variable_name']).'([0-9]+)\b/i',
                    $_SERVER['REQUEST_URI'], $matches) > 0
            ) {
                $this->setPage((int)$matches[1]);
            } else {
                if (Tools::getValue($this->properties['variable_name'], false) != false) {
                    $this->setPage((int)Tools::getValue($this->properties['variable_name']));
                }
            }
        }

        if ($this->properties['reverse'] && $this->properties['records'] == '') {
            trigger_error('When showing records in reverse order you must specify the total
			number of records (by calling the "records" method) *before* the first use of the
			"get_page" method!', E_USER_ERROR);
        }

        if ($this->properties['reverse'] && $this->properties['records_per_page'] == '') {
            trigger_error('When showing records in reverse order you must specify the number of
			records per page (by calling the "records_per_page" method) *before* the first use
			of the "get_page" method!', E_USER_ERROR);
        }

        $this->properties['total_pages'] = $this->getPages();

        if ($this->properties['total_pages'] > 0) {
            if ($this->properties['page'] > $this->properties['total_pages']) {
                $this->properties['page'] = $this->properties['total_pages'];
            } else {
                if ($this->properties['page'] < 1) {
                    $this->properties['page'] = 1;
                }
            }
        }

        if (!$this->properties['page_set'] && $this->properties['reverse']) {
            $this->setPage($this->properties['total_pages']);
        }

        return $this->properties['page'];
    }

    public function getPages()
    {
        return ceil($this->properties['records'] / $this->properties['records_per_page']);
    }

    public function labels($previous = 'Previous page', $next = 'Next page')
    {
        $this->properties['previous'] = $previous;
        $this->properties['next'] = $next;
    }

    public function method($method = 'get')
    {
        $this->properties['method'] = (Tools::strtolower($method) == 'url' ? 'url' : 'get');
    }

    public function navigationPosition($position)
    {
        $this->properties['navigation_position'] = (in_array(Tools::strtolower($position), array('left', 'right'))
            ? Tools::strtolower($position) : 'outside');
    }

    public function padding($enabled = true)
    {
        $this->properties['padding'] = $enabled;
    }

    public function records($records)
    {
        $this->properties['records'] = (int)$records;
    }

    public function recordsPerPage($records_per_page)
    {
        $this->properties['records_per_page'] = (int)$records_per_page;
    }

    public function render($return_output = false)
    {
        $this->getPage();

        if ($this->properties['total_pages'] <= 1) {
            return '';
        }

        $output = '<div class="Zebra_Pagination"><ul class="pagination">';

        if ($this->properties['reverse']) {
            if ($this->properties['navigation_position'] == 'left') {
                $output .= $this->showNext().$this->showPrevious().$this->showPages();
            } else {
                if ($this->properties['navigation_position'] == 'right') {
                    $output .= $this->showPages().$this->showNext().$this->showPrevious();
                } else {
                    $output .= $this->showNext().$this->showPages().$this->showPrevious();
                }
            }
        } else {
            if ($this->properties['navigation_position'] == 'left') {
                $output .= $this->showPrevious().$this->showNext().$this->showPages();
            } else {
                if ($this->properties['navigation_position'] == 'right') {
                    $output .= $this->showPages().$this->showPrevious().$this->showNext();
                } else {
                    $output .= $this->showPrevious().$this->showPages().$this->showNext();
                }
            }
        }

        $output .= '</ul></div>';

        if ($return_output) {
            return $output;
        }

        echo $output;
    }

    public function reverse($reverse = false)
    {
        $this->properties['reverse'] = $reverse;
    }

    public function selectablePages($selectable_pages)
    {
        $this->properties['selectable_pages'] = (int)$selectable_pages;
    }

    public function setPage($page)
    {
        $this->properties['page'] = (int)$page;

        if ($this->properties['page'] < 1) {
            $this->properties['page'] = 1;
        }

        $this->properties['page_set'] = true;
    }

    public function trailingSlash($enabled)
    {
        $this->properties['trailing_slash'] = $enabled;
    }

    public function variableName($variable_name)
    {
        $this->properties['variable_name'] = Tools::strtolower($variable_name);
    }

    private function buildURI($page)
    {
        if ($this->properties['method'] == 'url') {
            if (preg_match('/\b'.$this->properties['variable_name'].'([0-9]+)\b/i',
                    $this->properties['base_url'], $matches) > 0
            ) {
                $url = str_replace('//', '/', preg_replace(
                    '/\b'.$this->properties['variable_name'].'([0-9]+)\b/i',
                    ($page == 1 ? '' : $this->properties['variable_name'].$page),
                    $this->properties['base_url']
                ));
            } else {
                $url = rtrim($this->properties['base_url'], '/').'/'.($this->properties['variable_name'].$page);
            }

            $url = rtrim($url, '/').($this->properties['trailing_slash'] ? '/' : '');

            if (!$this->properties['preserve_query_string']) {
                $query = implode('&', $this->properties['base_url_query']);
            } else {
                $query = $_SERVER['QUERY_STRING'];
            }

            return $url.($query != '' ? '?'.$query : '');
        } else {
            if (!$this->properties['preserve_query_string']) {
                $query = $this->properties['base_url_query'];
            } else {
                parse_str($_SERVER['QUERY_STRING'], $query);
            }

            if (!$this->properties['avoid_duplicate_content']
                || ($page != ($this->properties['reverse'] ? $this->properties['total_pages'] : 1))
            ) {
                $query[$this->properties['variable_name']] = $page;
            } else {
                if ($this->properties['avoid_duplicate_content']
                    && $page == ($this->properties['reverse'] ? $this->properties['total_pages'] : 1)
                ) {
                    unset($query[$this->properties['variable_name']]);
                }
            }

            return htmlspecialchars(html_entity_decode($this->properties['base_url']).(!empty($query) ? '?'.urldecode(http_build_query($query)) : ''));
        }
    }

    private function showNext()
    {
        $output = '';

        if ($this->properties['always_show_navigation'] || $this->properties['total_pages'] > $this->properties['selectable_pages']) {
            $output = '<li><a href="'.
                ($this->properties['page'] == $this->properties['total_pages']
                    ? 'javascript:void(0)' : $this->buildURI($this->properties['page'] + 1)).
                '" class="navigation '.($this->properties['reverse']
                    ? 'previous' : 'next').($this->properties['page'] == $this->properties['total_pages']
                    ? ' disabled' : '').'" rel="next">'.$this->properties['next'].'</a></li>';
        }

        return $output;
    }

    private function showPages()
    {
        $output = '';

        if ($this->properties['total_pages'] <= $this->properties['selectable_pages']) {
            for ($i = ($this->properties['reverse'] ? $this->properties['total_pages'] : 1); ($this->properties['reverse']
                ? $i >= 1 : $i <= $this->properties['total_pages']); ($this->properties['reverse'] ? $i-- : $i++)) {
                $output .= '<li><a href="'.$this->buildURI($i).'" class="'.
                    ($this->properties['page'] == $i ? ' current' : '').'">'.
                    ($this->properties['padding'] ? str_pad($i, Tools::strlen($this->properties['total_pages']), '0',
                        STR_PAD_LEFT) : $i).
                    '</a></li>';
            }
        } else {
            $output .= '<li><a href="'.$this->buildURI($this->properties['reverse']
                    ? $this->properties['total_pages'] : 1).'" class="'.
                ($this->properties['page'] == ($this->properties['reverse']
                    ? $this->properties['total_pages'] : 1) ? ' current' : '').'">'.
                ($this->properties['padding'] ?
                    str_pad(($this->properties['reverse']
                        ? $this->properties['total_pages'] : 1), Tools::strlen($this->properties['total_pages']), '0',
                        STR_PAD_LEFT) :
                    ($this->properties['reverse'] ? $this->properties['total_pages'] : 1)).'</a></li>';

            $adjacent = floor(($this->properties['selectable_pages'] - 3) / 2);

            if ($adjacent == 0) {
                $adjacent = 1;
            }

            $scroll_from = ($this->properties['reverse']
                ? $this->properties['total_pages'] - ($this->properties['selectable_pages'] - $adjacent) + 1
                : $this->properties['selectable_pages'] - $adjacent);

            $starting_page = ($this->properties['reverse']
                ? $this->properties['total_pages'] - 1 : 2);

            if (($this->properties['reverse'] && $this->properties['page'] <= $scroll_from)
                || (!$this->properties['reverse'] && $this->properties['page'] >= $scroll_from)
            ) {
                $starting_page = $this->properties['page'] + ($this->properties['reverse'] ? $adjacent : -$adjacent);

                if (($this->properties['reverse']
                        && $starting_page < ($this->properties['selectable_pages'] - 1))
                    || (!$this->properties['reverse']
                        && $this->properties['total_pages'] - $starting_page < ($this->properties['selectable_pages'] - 2))
                ) {
                    if ($this->properties['reverse']) {
                        $starting_page = $this->properties['selectable_pages'] - 1;
                    } else {
                        $starting_page -= ($this->properties['selectable_pages'] - 2) - ($this->properties['total_pages'] - $starting_page);
                    }
                }

                $output .= '<li><span>&hellip;</span></li>';
            }

            $ending_page = $starting_page + (($this->properties['reverse'] ? -1 : 1) * ($this->properties['selectable_pages'] - 3));

            if ($this->properties['reverse'] && $ending_page < 2) {
                $ending_page = 2;
            } else {
                if (!$this->properties['reverse'] && $ending_page > $this->properties['total_pages'] - 1) {
                    $ending_page = $this->properties['total_pages'] - 1;
                }
            }

            for ($i = $starting_page; $this->properties['reverse'] ? $i >= $ending_page
                : $i <= $ending_page; $this->properties['reverse'] ? $i-- : $i++) {
                $output .= '<li><a href="'.$this->buildURI($i).'" class="'.
                    ($this->properties['page'] == $i ? ' current' : '').'">'.
                    ($this->properties['padding'] ? str_pad($i, Tools::strlen($this->properties['total_pages']), '0',
                        STR_PAD_LEFT) : $i).
                    '</a></li>';
            }
            if (($this->properties['reverse'] && $ending_page > 2)
                || (!$this->properties['reverse'] && $this->properties['total_pages'] - $ending_page > 1)
            ) {
                $output .= '<li><span>&hellip;</span></li>';
            }

            $output .= '<li><a href="'.$this->buildURI($this->properties['reverse']
                    ? 1 : $this->properties['total_pages']).'" class="'.
                ($this->properties['page'] == $i ? ' current' : '').'">'.
                ($this->properties['padding'] ? str_pad(($this->properties['reverse'] ? 1
                    : $this->properties['total_pages']), Tools::strlen($this->properties['total_pages']), '0',
                    STR_PAD_LEFT)
                    : ($this->properties['reverse'] ? 1 : $this->properties['total_pages'])).'</a></li>';
        }

        return $output;
    }

    private function showPrevious()
    {
        $output = '';

        if ($this->properties['always_show_navigation']
            || $this->properties['total_pages'] > $this->properties['selectable_pages']
        ) {
            $output = '<li><a href="'.
                ($this->properties['page'] == 1 ? 'javascript:void(0)' : $this->buildURI($this->properties['page'] - 1)).
                '" class="navigation '.($this->properties['reverse'] ? 'next' : 'previous').
                ($this->properties['page'] == 1 ? ' disabled' : '').'" rel="prev">'.$this->properties['previous'].'</a></li>';
        }

        return $output;
    }
}