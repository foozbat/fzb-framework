<?php
/* 
	file:         parameters.class.php
	type:         Class Definition
	written by:   Aaron Bishop
	date:         6/18/2019
	description:  This class handles input parameters.  It supports "pretty" path params, get, and post.
*/

namespace Fzb\Framework;

class Parameters
{
	// DATA MEMBERS //
    private $path = array();
    private $module;

	// CONSTRUCTOR //
    function __construct()
    {

        //echo $key." => ".$_SERVER[$key]."<br />";
        //$path_string = str_ireplace($_SERVER['DOCUMENT_ROOT'].'/', '', $_SERVER['PATH_TRANSLATED']);
        //$this->path = explode('/', $path_string);
        //$this->module = array_shift($this->path);
    }

   	// METHODS //
    public function get_module()
    {

    }

    public function specify($module_inputs)
    {

    }

}