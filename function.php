<?php

function debug($arr){
    echo "<pre>";
        print_r($arr);
    echo "</pre>";
}

#Universal Image Getter Function
function getImage($id,$tableName,$imageName){
    $fileName = __DIR__ . UPLOADS . '/' . $tableName . '/' . $id . '/' . $imageName;
    if(is_file($fileName)){
        return UPLOADS . '/' . $tableName . '/' . $id . '/' . $imageName;
    }else{
        return UPLOADS . "/no-image.png";
    }
}
function saveImage($id,$tableName,$file){
    $format = '';
    $type = $file['type'];
    $fileFrom = $file['tmp_name'];
    $fileName = md5($_FILES['name']);

    switch ($type){
        case 'image/jpeg': $format = 'jpg'; break;
        case 'image/png': $format ='png'; break;
        case 'image/png': $format ='pdf'; break;
        default:$format = false;break;
    }
    if(!empty($format)){
        $dir = __DIR__ . UPLOADS . '/' . $tableName . '/' . $id ;
        if(!is_dir($dir)){
            mkdir($dir,0777,true);
        }
        $fileTo = $dir . '/' .$fileName . '.' . $format;
        move_uploaded_file($fileFrom,$fileTo);
        return $fileName . '.' . $format;
    }
    return false;
}

function deleteIOldImage($id,$tableName,$image){
    $fileTo = __DIR__ . UPLOADS . '/' . $tableName . '/' . $id . '/' . $image;
    if(is_file($fileTo)){
        unlink($fileTo);
        return true;
    }else{
        return false;
    }
}

#Universal pdfFile Getter Function
function getFiles($id,$tableName,$tagName){
    $fileName = __DIR__ . UPLOADS . '/' . $tableName . '/' . $id . '/' . $tagName;
    if(is_file($fileName)){
        return UPLOADS . '/' . $tableName . '/' . $id . '/' . $tagName;
    }else{
        return "";
    }
}
function saveFiles($id,$tableName,$file){
//    debug($file);die;
    $format = '';
    $type = $file['type'];
    $fileFrom = $file['tmp_name'];
    $fileName = md5($_FILES['name']);

    switch ($type){

        case 'application/pdf': $format = 'pdf';break;
        default:$format = false;break;
    }
    if(!empty($format)){
        $dir = __DIR__ . UPLOADS . '/' . $tableName . '/' . $id ;

        if(!is_dir($dir)){
            mkdir($dir,0777,true);
        }
        $fileTo = $dir . '/' .$fileName . '.' . $format;

        move_uploaded_file($fileFrom,$fileTo);
        return $fileName . '.' . $format;
    }
    return false;
}

function deleteOldFile($id,$tableName,$file){
    $fileTo = __DIR__ . UPLOADS . '/' . $tableName . '/' . $id . '/' . $file;
    if(is_file($fileTo)){
        unlink($fileTo);
        return true;
    }else{
        return false;
    }
}