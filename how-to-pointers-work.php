<?php

$obj1 = (object) [ 'a' => true ];
$obj2 = $obj1;

$obj2->a = 'booya';

// unset($obj1);

$obj2 = null;

echo "1 = " . $obj1->a . "\n";
echo "2 = " .$obj2->a;


