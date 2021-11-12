<?php
/* 
	file:         router.class.php
	type:         Class Definition
	written by:   Aaron Bishop
	date:         12/24/2005
	description:  handles routing to app modules based on URL paths
*/

namespace Fzb\Framework;

class Router
{
    private $route_param;
    private $modules_dir;
    private $url_route;
    private $module_route;
    private $modules = array();

    function __construct($route_param, $modules_dir)
    {
        $this->$route_param = $route_param;
        $this->$modules_dir = $modules_dir;
    }

    public function get_route()
    {
        $this->find_modules($this->modules_dir);

        $params = explode('/', $url_route);

        if (defined($this->modules[0])) {
            return $modules[0];
        } else {
            return '';
        }
    }

    // recursively flatten all found modules into an array of [module/name] => 'path'
    private function find_modules($parent_dir, $prefix='')
    {
        foreach (scandir($parent_dir) as $file) {
            if ($file != '.' && $file != '..') {
                if (is_dir($parent_dir.'/'.$file)) {
                    find_modules($parent_dir.'/'.$file, ($prefix ? $prefix."/" : '').$file);
                } else if (preg_match('/\.php$/', $file)) {
                    list($module, $ext) = explode('.', $file);
                    $this->modules[($prefix ? $prefix."/" : '').$module] = $parent_dir."/".$file;
                }
            }
        }
    }

    private function find_route()
    {

    }
}