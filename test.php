<?php 
$array1 = ['a'=>1, 'b'=>2];
$array2 = ['d'=>4, 'e'=>5,'f'=>6];

$array = array_map(null,$array1,$array2);

echo '<pre>';
print_r($array);
echo '</pre>' ;