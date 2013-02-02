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

class Edge {

    public $target;
    public $weight;

    public function __construct(Vertex $target, $weight) {
        $this->target = $target;
        $this->weight = $weight;
    }
}