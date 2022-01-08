<?php
    require('include/config.php');
    $id = $_GET['id'];
    $select_img     = "SELECT * FROM user WHERE id=$id";
    $select_img_result  = mysqli_query($db_connect,$select_img);
    $img_assoc          = mysqli_fetch_assoc($select_img_result);
    $delete_location   = 'upload/profile/'.$img_assoc["img"];
    unlink($delete_location);
    $query  = "DELETE FROM user WHERE id=$id";
    mysqli_query($db_connect,$query);
    $del    = "Delete successfull";
    header('location:user.php?delete_success='.$del);
?>