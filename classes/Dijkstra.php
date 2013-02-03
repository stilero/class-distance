<?php
/*
* Author: doug@neverfear.org
*/

require_once("PriorityQueue.php");

class Edge {

    public $startNodeName;
    public $targetNodeName;
    public $weight;
    
    /**
     * Class for edges
     * @param string $startNodeName Name of the start node
     * @param string $targetNodeName Name of the end node
     * @param string $weight The weight between start and end node
     */
    public function __construct($startNodeName, $targetNodeName, $weight) {
        $this->startNodeName = $startNodeName;
        $this->targetNodeName = $targetNodeName;
        $this->weight = $weight;
    }
}

class Graph {

    public $nodes = array();
    
    /**
     * Adds an edge to the graph
     * @param string $startNodeName Name of the start node
     * @param string $targetNodeName Name of the end node
     * @param int $weight The weight between the two nodes
     */
    public function addedge($startNodeName, $targetNodeName, $weight = 0) {
        if (!isset($this->nodes[$startNodeName])) {
            $this->nodes[$startNodeName] = array();
        }
        array_push($this->nodes[$startNodeName], new Edge($startNodeName, $targetNodeName, $weight));
    }
    
    /**
     * Removes the node based on its index
     * @param int $index
     */
    public function removenode($index) {
        array_splice($this->nodes, $index, 1);
    }

    /**
     * 
     * @param string $startNodeName The name of the start nodeß
     * @return Array Array with the distances and the previous nodes
     */
    public function paths_from($startNodeName) {
        $dist = array();
        $dist[$startNodeName] = 0;
        $visited = array();
        $previous = array();
        $queue = array();
        $Q = new PriorityQueue("compareWeights");
        $Q->add(array($dist[$startNodeName], $startNodeName));
        $nodes = $this->nodes;
        while($Q->size() > 0) {
            list($distance, $u) = $Q->remove();
            if (isset($visited[$u])) {
                continue;
            }
            $visited[$u] = True;
            if (!isset($nodes[$u])) {
                print "WARNING: '$u' is not found in the node list\n";
            }
            foreach($nodes[$u] as $edge) {
                $alt = $dist[$u] + $edge->weight;
                $end = $edge->targetNodeName;
                if (!isset($dist[$end]) || $alt < $dist[$end]) {
                    $previous[$end] = $u;
                    $dist[$end] = $alt;
                    $Q->add(array($dist[$end], $end));
                }
            }
        }
        return array($dist, $previous);
    }
    
    /**
     * 
     * @param type $node_dsts
     * @param string $targetNodeName The name of the target node
     * @return array Paths to the target node
     */
    public function paths_to($node_dsts, $targetNodeName) {
        // unwind the previous nodes for the specific destination node
        $current = $targetNodeName;
        $path = array();

        if (isset($node_dsts[$current])) { // only add if there is a path to node
            array_push($path, $targetNodeName);
        }
        while(isset($node_dsts[$current])) {
            $nextnode = $node_dsts[$current];
            array_push($path, $nextnode);
            $current = $nextnode;
        }
        return array_reverse($path);
    }
    
    /**
     * Calculates and returns the shortest path between start and target node
     * @param string $startNodeName
     * @param string $targetNodeName
     * @return Array
     */
    public function getpath($startNodeName, $targetNodeName) {
        list($distances, $prev) = $this->paths_from($startNodeName);
        return $this->paths_to($prev, $targetNodeName);
    }

}

function compareWeights($a, $b) {
    return $a->data[0] - $b->data[0];
}
?>