<?php
        //$errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];   
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $upload_path = "../images/". basename($_FILES["image"]["name"]);
        $file_path = "images/". basename($_FILES["image"]["name"]);
        
        $extensions= array("jpeg","jpg","png", "gif");

        if ($file_name == "") {
             $message = "No picture selected.";
            $filePath = "";
            $result = "failed";
        }      
        elseif(in_array($file_ext, $extensions)=== false){
             $message = "Invalid file format.";
            $filePath = "";
            $result = "failed";
        }
        elseif($file_size > 2097152){
            $message = 'File should not be more than 2MB';
            $filePath = "";
            $result = "failed";
        }
        elseif (file_exists($upload_path)) {
             $message = "File name already exists.";
            $filePath = "";
            $result = "failed";

        } 
        else{
            move_uploaded_file($file_tmp,"../images/".$file_name);
            $result = "success";
            $message = 'image uploaded.';
            $filePath = $file_path;
       }
        
    $data = array(
    "result" => $result,
    "file_path" => $filePath,
    "message" => $message
);
// Convert PHP array to JSON array
$json_data = json_encode($data);
print $json_data;

?>