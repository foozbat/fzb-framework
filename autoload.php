<?php
/* 
	file:         common.php
	type:         Main Program
	written by:   Aaron Bishop
	date:         6/20/2019
	description:  Common functions for app initialization and other
*/

spl_autoload_register("load_class");

// PSR-4 compliant autoloader
function load_class($fqcn)
{
/*/    $fqcn_components = explode("\\", strtolower($fqcn));
    
    //print_r($fqcn_components);
    
    $base_namespace  = array_shift($fqcn_components);
    $class_filename  = array_pop($fqcn_components) ;
    $sub_namespace   = $fqcn_components;
    $path_components = array_merge([$base_namespace], ["classes"], $sub_namespace, [$class_filename]);
    $fqcn_path       = __DIR__ . "/" . implode("/", $path_components) . ".class.php";
*/
    $fqcn = strtolower($fqcn);
    $fqcn = str_replace('\\', '/', $fqcn);
    $fqcn_path = __DIR__ . "/classes/" . $fqcn . ".class.php";
    //print_r($fqcn_path);

    if (file_exists($fqcn_path))
    {
        require_once($fqcn_path);
    }
    else
    {
        // change
        die("unable to load class $fqcn at $fqcn_path");
    }
}





