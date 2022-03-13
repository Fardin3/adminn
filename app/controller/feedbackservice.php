<?php

if(file_exists('file.json'))
{
     $final_data=fileWriteAppend();
     if(file_put_contents('../model/script/feedbackAdmin.json', $final_data))
     {
          $message = "<label class='text-success'>Data added Success fully</p>";
          header("refresh: 2; url= ../view/private/feedback.php");
     }
}
else
{
     $final_data=fileCreateWrite();
     if(file_put_contents('../model/script/feedbackAdmin.json', $final_data))
     {
          $message = "<label class='text-success'>File created and  data added Success fully</p>";
          header("refresh: 2; url= ../view/private/feedback.php");
     }

}
function fileWriteAppend(){
		$current_data = file_get_contents('../model/script/feedbackAdmin.json');
		$array_data = json_decode($current_data, true);
		$extra = array(
			'feedback'   =>     $_POST["feedback"],
			'name'       =>     "Admin",
			'phoneNumber'=>     "01750096696",
		);
		$array_data[] = $extra;
		$final_data = json_encode($array_data);
		return $final_data;
}
function fileCreateWrite(){
		$file=fopen("../model/script/feedbackAdmin.json","w");
		$array_data=array();
		$extra = array(
			'feedback'   =>     $_POST["feedback"],
			'name'       =>     "Admin",
			'phoneNumber'=>     "01750096696",
		);
		$array_data[] = $extra;
		$final_data = json_encode($array_data);
		fclose($file);
		return $final_data;
}