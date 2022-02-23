<?php

$connect = mysqli_connect("localhost", "group5","hz2aAr","group5");
    if (mysqli_connect_errno()){
        die("<script>alert('Connection_Failed');</script>");
        }

$select_db = mysqli_select_db( $connect, 'group5' );
if ( !$select_db ) {
    die( 'Database Selection Failed' . mysqli_error( $connect ) );
}

$query = 'SELECT COUNTRY FROM UNI';

$resul = mysqli_query( $connect, $query );


$term = $_GET[ "term" ];
$companies = array();
$result = array();
while( $row = mysqli_fetch_array( $resul, MYSQLI_ASSOC ) ) {
    array_push( $result, $row );
}




foreach ($companies as $company) {
   $companyLabel = $company[ "label" ];
   if ( strpos( strtoupper($companyLabel), strtoupper($term) )!== false ) {
      array_push( $result, $company );
   }
}

echo json_encode( $result );
?>

