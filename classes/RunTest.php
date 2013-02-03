<?php

/*
* Author: doug@neverfear.org
*/

require("Dijkstra.php");

function runTest() {
    $g = new Graph();
    $g->addedge("1", "2", 7);
    $g->addedge("1", "3", 9);
    $g->addedge("1", "6", 14);
    
    $g->addedge("2", "1", 7);
    $g->addedge("2", "3", 10);
    $g->addedge("2", "4", 16);
    
    $g->addedge("3", "1", 9);
    $g->addedge("3", "6", 2);
    $g->addedge("3", "2", 10);
    $g->addedge("3", "4", 11);
    
    $g->addedge("4", "2", 15);
    $g->addedge("4", "3", 11);
    $g->addedge("4", "5", 6);
    
    $g->addedge("5", "6", 9);
    $g->addedge("5", "4", 6);
    
    $g->addedge("6", "1", 14);
    $g->addedge("6", "3", 2);
    $g->addedge("6", "5", 9);


    list($distances, $prev) = $g->paths_from("1");

    $path = $g->paths_to($prev, "5");

    print_r($path);

}


runTest();

