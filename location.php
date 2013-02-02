<?php
/**
 * Class_Distance
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Class_Distance
 * @author Daniel Eliasson (joomla@stilero.com)
 * @copyright  (C) 2013-jan-15 Stilero Webdesign (www.stilero.com)
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
//defined('_JEXEC') or die('Restricted access'); 

class Location{
    
    var $long;
    var $lat;
    var $name;
    
    public function __construct($long, $lat, $name) {
        $this->long = $long;
        $this->lat = $lat;
        $this->name = $name;
    }
}
