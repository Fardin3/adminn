<?php

	session_start();
    $id=$service=$Did="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["id"])){
            $id=test_input($_POST["id"]);
        }
        if(!empty($_POST["service"])){
            $service=test_input($_POST["service"]);
        }
        if(!empty($_POST["Did"])){
            $Did=test_input($_POST["Did"]);
            delete($Did);
            header("refresh: 2; url= ../view/private/services.php");
        }
    }
// read file
$data = file_get_contents('../model/script/services.json');

// decode json to array
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value) {
    if ($value['id'] == $id) {
        $json_arr[$key]['services'] = $service;
        header("refresh: 0; url= ../view/private/services.php");
    }
}

// encode array to json and save to file
file_put_contents('../model/script/services.json', json_encode($json_arr));
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function delete($Did){
    $data = file_get_contents('../model/script/services.json');
    $json_arr = json_decode($data, true);
    $arr_index = array();
    foreach ($json_arr as $key => $value)
    {
        if ($value['id'] == $Did)
        {
            $arr_index[] = $key;
        }
    }
    // delete data
    foreach ($arr_index as $i)
    {
        unset($json_arr[$i]);
    }
    $json_arr = array_values($json_arr);
    file_put_contents('../model/script/services.json', json_encode($json_arr));
}
?>