<?php
function userLogin($login,$password){
    global $db;
    $password = sha1($password);
    $query = "SELECT * FROM `user` WHERE `login`='$login' AND `password`='$password'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }

}

########## ADMIN FUNTIONS ################

function getAllUsers(){
    global $db;
    $query = "SELECT * FROM `user`";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return false;
    }
}
function userAdd($login,$email,$password,$status){
    global $db;
    $query = "INSERT INTO `user` (`login`,`password`,`status`,`email`) VALUES ('$login','$password','$status','$email')";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_insert_id($db);
    }else{
        return false;
    }
}

function updateUserImage($id,$imageSrc){
    global $db;
    $query = "UPDATE `user` SET `avatar`='$imageSrc' WHERE `id`='$id'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) > 0){
        return true;
    }else{
        return false;
    }
}

function userItem($userId){
    global $db;
    $query = "SELECT * FROM `user` WHERE `id`='$userId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else{
        echo false;
    }
}

function updateUser($userId,$login,$email,$password,$status){
    global $db;
    if(!empty($password)){
        $password = sha1($password);
        $query = "UPDATE `user` SET `login`='$login', `password`='$password',`status`='$status',`email`='$email' WHERE `id`='$userId'";
    }else{
        $query = "UPDATE `user` SET `login`='$login',`status`='$status',`email`='$email' WHERE `id`='$userId'";

    }

    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return true;
    }else{
        return false;
    }
}