<?php
    require('include/config.php');
    $img_file       =  $_FILES["photo"];
    $img_file_name  = $img_file["name"];
    $img_file_tmpname  = $img_file["tmp_name"];
    $img_exprode    = explode('.',$img_file_name);
    $end_ext        = end($img_exprode);
    $img_size       = $img_file["size"];
    $valid_ext      = array('jpg','jpeg','png');
    $name           = $_POST["name"];
    $password       = $_POST["password"];
    if(empty($name)){
        $mass = "Hala Nam dy";
        header('location:index.php?nam_err='.$mass);
    }elseif(empty($password)){
        $mass = "Hala Password dy";
        header('location:index.php?pass_err='.$mass);
    }else{

        if(in_array($end_ext,$valid_ext)){
            if($img_size <= 3000000){
                $query = "INSERT INTO user(name, pass) VALUES ('$name','$password')";
                mysqli_query($db_connect,$query);
                $last_id    =   mysqli_insert_id($db_connect);
                $file_name  = $last_id.'.'.$end_ext;
                $new_location   = 'upload/profile/'.$file_name;
                move_uploaded_file($img_file_tmpname,$new_location);
                $update_query = "UPDATE user SET img='$file_name' WHERE id=$last_id";
                mysqli_query($db_connect,$update_query);
                $success    = "You Regestation successfully";
                header('location:index.php?success='.$success);
            }else{
                $mass   = "file size should be max 3mb formate";
                header('location:index.php?img_err='.$mass);
            }
        }else{
            $mass   = "Invalid file formate";
            header('location:index.php?img_err='.$mass);
        }
    }




?>