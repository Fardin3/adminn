<?php
    function getFullFile() {
        $workers_data = file_get_contents("../script/userlist.json");
        $json=json_decode($workers_data, true);
        return $json;
    
    }

    function getFileById($name,$Id) {
        $fileName="../script/"+$name;
        $file_data = file_get_contents($fileName);
        $json=json_decode($file_data, true);
        foreach($json as $user) {
            if($user['id'] == $Id) {
                return $user;
            }
        }
    }
    function getFileByEmail($name,$email) {
        $fileName="../script/"+$name;
        $file_data = file_get_contents($fileName);
        $json=json_decode($file_data, true);
        foreach($json as $user) {
            if($user['email'] == $email) {
                return $user;
            }
        }
    }