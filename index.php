<?php
require_once 'dijkstra.php';
require_once 'edge.php';
require_once 'vertex.php';

//$v0 = new Vertex('Harrisburg');
//$v1 = new Vertex('Baltimore');
//$v2 = new Vertex('Washington');
//$v3 = new Vertex('Philadelphia');
//$v4 = new Vertex('Binghamton');
//$v5 = new Vertex('Allentown');
//$v6 = new Vertex('New York');
//
//$v0->adjacencies = array( 
//                        new Edge($v1,  79.83), 
//                        new Edge($v5,  81.15) 
//                    );
//$v1->adjacencies = array( 
//                        new Edge($v0,  79.75),
//                        new Edge($v2,  39.42),
//                        new Edge($v3, 103.00) 
//                    );
//$v2->adjacencies = array( new Edge($v1,  38.65) );
//$v3->adjacencies = array( 
//                        new Edge($v1, 102.53),
//                        new Edge($v5,  61.44),
//                        new Edge($v6,  96.79) 
//                    );
//$v4->adjacencies = array( new Edge($v5, 133.04));
//$v5->adjacencies = array( 
//                        new Edge($v0,  81.77),
//                        new Edge($v3,  62.05),
//                        new Edge($v4, 134.47),
//                        new Edge($v6,  91.63) 
//                    );
//$v6->adjacencies = array( 
//                        new Edge($v3,  97.24),
//                        new Edge($v5,  87.94) 
//                    );

$v1 = new Vertex('Ett');
$v2 = new Vertex('Två');
$v3 = new Vertex('TRe');
$v4 = new Vertex('Fyra');
$v5 = new Vertex('Fem');
$v6 = new Vertex('Sex');

$v1->adjacencies = array(
    new Edge($v2, 7),
    new Edge($v4, 9),
    new Edge($v6, 14)
);
$v2->adjacencies = array(
    new Edge($v1, 7),
    new Edge($v3, 10),
    new Edge($v4, 15)
);
$v3->adjacencies = array(
    new Edge($v1, 9),
    new Edge($v2, 10),
    new Edge($v6, 2),
    new Edge($v4, 11)
);
$v4->adjacencies = array(
    new Edge($v2, 15),
    new Edge($v3, 11),
    new Edge($v5, 6)
);
$v5->adjacencies = array(
    new Edge($v4, 6),
    new Edge($v6, 9)
);
$v6->adjacencies = array(
    new Edge($v1, 14),
    new Edge($v3, 2),
    new Edge($v5, 9)
);

$d = new Dijkstra();
$d->computePaths($v1);

$path = $d->getShortestPathTo($v2);
?>
<pre>
<?php
    var_dump($path);
 ?>
</pre>
