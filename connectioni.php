<?php



// $GLOBALS['hostname'] = 'localhost';
// $GLOBALS['username'] = 'root';
// $GLOBALS['password'] = '';
// $GLOBALS['db'] = 'bookshop';

$GLOBALS['hostname'] = 'localhost';
$GLOBALS['username'] = 'root';
$GLOBALS['password'] = '1234';
$GLOBALS['db'] = 'logistic_supply';

// $GLOBALS['hostname'] = '162.252.83.203';
// $GLOBALS['username'] = 'quotrolk';
// $GLOBALS['password'] = ':8s7DLa5Wd3B!u';
// $GLOBALS['db'] = 'quotrolk_bookshop';
 
$GLOBALS['dbinv'] = mysqli_connect($GLOBALS['hostname'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db']);
 
?>
