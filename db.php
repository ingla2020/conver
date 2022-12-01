<?php
$GLOBALS['servidor'] = '190.210.198.130';
$GLOBALS['usuario'] = 'ingsiste_leo';
$GLOBALS['clave'] = '-seV$uboUV]r';
$GLOBALS['BD'] = 'ingsiste_datos';

function get_db_conn() {

$conn = mysqli_connect($GLOBALS['servidor'] , $GLOBALS['usuario'], $GLOBALS['clave'], $GLOBALS['BD']);

mysqli_select_db($conn, $GLOBALS['BD']);
        
if (!$conn) {
echo "No pudo conectarse a la BD: " . mysql_error();
exit;
}
return $conn;

}

?>