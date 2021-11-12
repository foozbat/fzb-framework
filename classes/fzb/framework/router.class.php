<?php
/* 
	file:         router.class.php
	type:         Class Definition
	written by:   Aaron Bishop
	date:         
	description:  handles routing to app modules based on URL paths
*/

namespace Fzb\Framework;

class Router
{
    private $route_param;
    private $url_route;
    private $module_route;
    private $modules = array();
    private $module_params;

    function __construct(/*$route_param, $modules_dir*/)
    {
        GLOBAL $MODULES_DIR;

        $this->find_modules($MODULES_DIR);
        $this->route();
    }

    // routes to the proper module based on uri path
    private function route()
    {
        // get the first element of the path and exclude params
        $local_path = getenv("SCRIPT_NAME");
        $local_path = str_replace("index.php", "", $local_path);

        if(strpos($_SERVER['REQUEST_URI'] , $local_path) === 0)
            $module_string = substr($_SERVER['REQUEST_URI'] , strlen($local_path)).'';

        $module_string = explode("/", $module_string)[0];
        $module_string = explode("?", $module_string)[0];

        // match the determined module to a found module from file system   
        foreach($this->modules as $module => $path) {
            if($module == $module_string) {
                require_once($path);
                return;
            }
        }

        require_once($this->modules["main"]);
        return;
    }

    // recursively flatten all found modules into an array of [module/name] => 'path'
    private function find_modules($parent_dir, $prefix='')
    {
        foreach (scandir($parent_dir) as $file) {
            if ($file != '.' && $file != '..' && preg_match('/\.php$/', $file)) {
                list($module, $ext) = explode('.', $file);
                $this->modules[($prefix ? $prefix."/" : '').$module] = $parent_dir."/".$file;
            }
        }
        return;
    }

    /* recursive version
    private function find_modules($parent_dir, $prefix='')
    {
        foreach (scandir($parent_dir) as $file) {
            if ($file != '.' && $file != '..' && ) {
                if (is_dir($parent_dir.'/'.$file)) {
                    $this->find_modules($parent_dir.'/'.$file, ($prefix ? $prefix."/" : '').$file);
                } else if (preg_match('/\.php$/', $file)) {
                    list($module, $ext) = explode('.', $file);
                    $this->modules[($prefix ? $prefix."/" : '').$module] = $parent_dir."/".$file;
                }
            }
        }
    } */


};