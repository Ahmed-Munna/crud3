<?php
    require('include/config.php');
    $id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $img_file = $_FILES["photo"];
    $img_file_name  = $img_file["name"];
    $img_file_tmpname  = $img_file["tmp_name"];
    $img_exprode    = explode('.',$img_file_name);
    $end_ext        = end($img_exprode);
    $img_size       = $img_file["size"];
    $valid_ext      = array('JPG','jpeg','png');
    if(empty($name)){
        $mass = "Hala update Nam dy";
        header('location:update.php?nam_err='.$mass);
    }elseif(empty($password)){
        $mass = "Hala update Password dy";
        header('location:update.php?pass_err='.$mass);
    }else{
        if(in_array($end_ext,$valid_ext)){
            if($img_size < 3000000){
                $query = "UPDATE `user` SET `name`='$name',`pass`='$password' WHERE id=$id";
                mysqli_query($db_connect,$query);
                $select_img     = "SELECT * FROM user WHERE id=$id";
                $select_img_result  = mysqli_query($db_connect,$select_img);
                $img_assoc          = mysqli_fetch_assoc($select_img_result);
                $delete_location   = 'upload/profile/'.$img_assoc["img"];
                unlink($delete_location);
                $file_name  = $id.'.'.$end_ext;
                $new_location   = 'upload/profile/'.$img_assoc["img"];
                move_uploaded_file($img_file_tmpname,$new_location);
                $success    = "You update Regestation successfully";
                header('location:user.php?update_success='.$success);
            }else{
                $mass   = "file size should be max 3mb formate";
                header('location:update.php?img_err='.$mass);
            }
        }else{
            $mass   = "Invalid file formate";
            header('location:update.php?img_err='.$mass);
        }
    }




?>