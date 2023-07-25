<?php

function getParentMenus(){
    global $db;
    $query = " SELECT * FROM menu WHERE `status`=1 AND `parent`= 0 ORDER BY `order_by` ASC";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));
    
    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        echo mysqli_error($db);die;
    }
}

function getChildMenus($parent_id){
    global $db;
    $query = "SELECT * FROM `menu` WHERE `parent` = '$parent_id' ORDER BY `order_by` ASC";
    $result = @mysqli_query($db,$query);

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        echo mysqli_error($db);die;     
    }   
}

#################### ADMIN PANEL FUNCTIONS #######################
function getAllMenus(){
    global $db;
    $query = " SELECT * FROM menu";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        echo mysqli_error($db);die;
    }
}
function  addMenu($title,$link,$position,$order_by,$parent,$status){
    global $db;
    $title = mysqli_real_escape_string($db,$title);
    $parent = mysqli_real_escape_string($db,$parent);
    $link = mysqli_real_escape_string($db,$link);
    $query = "INSERT INTO menu (`title`,`link`,`position`,`order_by`,`parent`,`status`) VALUES ('$title','$link','$position','$order_by','$parent','$status')";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return true;
    }else{
        return false;
    }
}

function getMenuItem($id){
    global $db;
    $query = " SELECT * FROM menu WHERE `id`='$id'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else{
        echo mysqli_error($db);die;
    }
}

function editMenu($id,$title,$link,$position,$order_by,$parent,$status){
    global $db;
    $title = mysqli_real_escape_string($db,$title);
    $parent = mysqli_real_escape_string($db,$parent);
    $link = mysqli_real_escape_string($db,$link);
    $query = "UPDATE `menu` SET `title`='$title',`link`='$link',`position`='$position',`order_by`='$order_by',`parent`='$parent',`status`='$status'  WHERE `id`='$id'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) == 1){
        return true;
    }else{
        return false;
    }
}

function deleteMenu($menuId){
    global $db;
    $query = "DELETE FROM `menu` WHERE `id`='$menuId'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) == 1){
        return true;
    }else{
        return false;
    }
}


