<?php 

function getSocials(){
    global $db;
    $query = "SELECT * FROM `social` WHERE `status`=1 ";
    $result = mysqli_query($db,$query);

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        echo mysqli_error($db);die;;
    }

}

######################### ADMIN PANEL FUNCTIONS ###################################
function getallSocial(){
    global $db;
    $query = "SELECT * FROM social";
    $result = mysqli_query($db,$query);

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        echo mysqli_error($db);die;;
    }

}

function addSocial($link,$class,$order_by,$status){
    global $db;
    $link = mysqli_real_escape_string($db,$link);
    $class = mysqli_real_escape_string($db,$class);
    $query = "INSERT INTO social (`link`,`class`,`order_by`,`status`) VALUES ('$link','$class','$order_by','$status')";
    $result = mysqli_query($db,$query);

    if(!empty($result)){
        return true;
    }else{
        echo false;
    }
}

function updateLink($id){
    global $db;
    $query = "SELECT * FROM `social` WHERE `id`='$id'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else{
        echo false;
    }
}

function editSocial($idSocial,$link,$class,$status,$order_by){
    global $db;
    $link = mysqli_real_escape_string($db,$link);
    $class = mysqli_real_escape_string($db,$class);
    $query = "UPDATE `social` SET `link`='$link',`class`='$class',`order_by`='$order_by',`status`='$status' WHERE `id`='$idSocial' ";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) > 0){
        return true;
    }else{
        return false;
    }

}



function  deleteSocial($newsId){
    global $db;
    $query = "DELETE FROM `social` WHERE `id`='$newsId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) == 1){
        return true;
    }else{
        return false;
    }
}