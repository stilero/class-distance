<?php
/**
 * Vertex = node
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

class Vertex{
    
    public $name;
    public $minDistance;
    public $adjacencies = array();
    public $previousVertex;
    
    public function __construct($name) {
        $this->name = $name;
        $this->minDistance = PHP_INT_MAX;
    }
    
    function compareTo(Vertex $other){
        if($other->minDistance < $this->minDistance){
            return 1;
        }else if ($other->minDistance == $this->minDistance){
            return 0;
        }else {
            return -1;
        }
    }
    
    function addAdjacency($Adjacency){
        $this->adjacencies[] = $Adjacency;
    }
    
    public function __toString() {
        return $this->name;
    }
}
