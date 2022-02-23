<?php
require_once('connect.php');

function get_city($connect , $term){
        $query = "SELECT * FROM TESTS WHERE COUNTRY LIKE '%".$term."%' ORDER BY>
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
}

if (isset($_GET['term'])) {
        $getCity = get_city($connect, $_GET['term']);
        $cityList = array();
        foreach($getCity as $city){
                $cityList[] = $city['COUNTRY'];
        }
        echo json_encode($cityList);
}
?>