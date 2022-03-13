<?php
	session_start();
    $id="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["id"])){
            $id=test_input($_POST["id"]);
            delete($id);
            header("refresh: 2; url= ../view/private/userList.php");
        }
    }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function delete($id){
    $data = file_get_contents('../model/script/userlist.json');
    $json_arr = json_decode($data, true);
    $arr_index = array();
    foreach ($json_arr as $key => $value)
    {
        if ($value['id'] == $id)
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
    file_put_contents('../model/script/userlist.json', json_encode($json_arr));
}
?>