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

class Dijkstra{
    
    var $vertexQueue = array();
    
    public function __construct() {
        ;
    }
    
    function getShortestPathTo(Vertex $target){
        $path = array();
        for($vert = $target ; $vert == $vert->previousVertex ; $vert != null){
            $path[] = $vert;
        }
        return $vert;
    }
    
    function computePaths(Vertex $source){
        $source->minDistance = 0;
        $this->vertexQueue[] = $source;
        while (count($this->vertexQueue) > 0){
            $Vertex = array_shift($this->vertexQueue);
            foreach ($Vertex->adjacencies as $Edge) {
                $v = $Edge->target;
                $weight = $Edge->weight;
                $distanceThroughU = $Vertex->minDistance + $weight;
                if($distanceThroughU < $v->minDistance){
                    $this->removeFromQueue($v);
                    $v->minDistance = $distanceThroughU;
                    $v->previousVertex = $Vertex;
                    $this->vertexQueue[] = $v;
                }
            }
        }
    }
    
    function removeFromQueue(Vertex $v){
        foreach ($this->vertexQueue as $key => $value) {
            if($this->vertexQueue[$key] == $v){
                unset($this->vertexQueue[$key]);
            }
        }
    }
}
