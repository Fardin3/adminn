<?php
    $id=$first_name= $last_name= $email=$phoneNumber= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["id"])){
            $id=test_input($_POST["id"]);
        }
        if(!empty($_POST["first_name"])){
            $first_name=test_input($_POST["first_name"]);
        }
        if(!empty($_POST["last_name"])){
            $last_name=test_input($_POST["last_name"]);
        }
        if(!empty($_POST["email"])){
            $email=test_input($_POST["email"]);
        }
        if(!empty($_POST["phoneNumber"])){
            $phoneNumber=test_input($_POST["phoneNumber"]);
        }
        $data = file_get_contents('../model/script/userlist.json');
        $json_arr = json_decode($data, true);
        foreach ($json_arr as $key => $value) {
            if ($value['id'] == $id) {
                $json_arr[$key]['first_name'] = $first_name;
                $json_arr[$key]['last_name'] = $last_name;
                $json_arr[$key]['email'] = $email;
                $json_arr[$key]['phoneNumber'] = $phoneNumber;
            }
        }
        file_put_contents('../model/script/userlist.json', json_encode($json_arr));
    }
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 header("refresh: 0; url= ../view/private/userList.php");