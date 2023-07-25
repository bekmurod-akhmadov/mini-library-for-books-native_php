<?php

function getNews(){
    global $db;
    $query = "SELECT id,title,body,description,created_date,image,category_id,seen_count,files FROM news";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return false;
    }
}

function getCategoryName($category_id){
    global $db;
    $query = "SELECT title,id FROM news_category WHERE `id`=$category_id";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }
}

#Actual news

function getActualNews(){
    global $db;
    $query = "SELECT id,title,created_date,image,category_id,seen_count FROM news WHERE `actual`=1 ORDER BY `seen_count` DESC";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return false;
    }
}
#Actual news

function getTopNews(){
    global $db;
    $query = "SELECT id,title,created_date,image,category_id,seen_count FROM news ORDER BY `seen_count` DESC ";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return false;
    }
}

function getNewsItem($id){
    global $db;
    $query = "SELECT * FROM news WHERE `id`='$id'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else {
        return false;
    }
}
function getNewsByCategory($categoryId){
    global $db;
    $query = "SELECT id,title,created_date,image,category_id,seen_count,files,description FROM news WHERE `category_id`='$categoryId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return false;
    }
}

function addNewsCounter($id,$eyeCount){
    global $db;
    $query = "SELECT seen_count FROM news WHERE `id` = '$id'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        $currentEyeCount = mysqli_fetch_assoc($result);
        $currentEyeCount = $currentEyeCount['seen_count'];
        $currentEyeCount = $currentEyeCount + $eyeCount;

        $updateQuery = "UPDATE `news` SET `seen_count` ='$currentEyeCount' WHERE `id`='$id'";
        $newResult = @mysqli_query($db,$updateQuery)or die(mysqli_error($db));

         if(!empty($newResult)){
             return true;
         }else{
             return false;
         }

    }else{
        return false;
    }
}


######################### ADMIN PANEL FUNCTIONS #############################

function getAllNewsCategories(){
    global $db;
    $query = "SELECT * FROM news_category";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return false;
    }

}

function addNewsCategory($title,$status){
    global $db;
    $title = mysqli_real_escape_string($db,$title);
    $query = "INSERT INTO news_category(`title`,`status`) VALUES ('$title','$status')";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) > 0){
        return true;
    }else{
        return false;
    }
}

function updateCategory($categoryId){
    global $db;
    $query = "SELECT * FROM news_category WHERE `id`='$categoryId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else {
        return false;
    }
}
function editNewsCategory($idCategory,$title,$status){
    global $db;
    $title = mysqli_real_escape_string($db,$title);
    $query = "UPDATE `news_category` SET `title`='$title',`status`='$status' WHERE `id`='$idCategory'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty(mysqli_affected_rows($db)) > 0){
        return true;
    }else {
        return false;
    }
}
function deleteNewsCategory($delId){
    global $db;
    $query = "DELETE FROM `news_category` WHERE `id`='$delId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));
    if(!empty(mysqli_affected_rows($db)) > 0){
        return true;
    }else {
        return false;
    }

}

function getAllNews(){
    global $db;
    $query = "SELECT * FROM news";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));
    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else {
        return false;
    }
}

function addNews($title,$description,$created_date,$updated_date,$body,$category,$seen_count,$status,$actual){
    global $db;
    $title = mysqli_real_escape_string($db,$title);
    $description = mysqli_real_escape_string($db,$description);
    $body = mysqli_real_escape_string($db,$body);
    $category = mysqli_real_escape_string($db,$category);

    $query = "INSERT INTO `news`(`title`, `description`, `category_id`, `body`,`created_date`, `updated_date`, `status`, `seen_count`, `actual`)
    VALUES ('$title','$description','$category','$body','$created_date','$updated_date','$status','$seen_count','$actual') ";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_insert_id($db);
    }else{
        return  false;
    }
}

function updateNewsImage($id,$imageSrc){
    global $db;
    $query = "UPDATE `news` SET `image`='$imageSrc' WHERE `id`='$id'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return true;
    }else{
        return false;
    }
}
function updateNewFile($idNews,$fileSrc){
    global $db;
    $query = "UPDATE `news` SET `files`='$fileSrc' WHERE `id`='$idNews'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return true;
    }else{
        return false;
    }
}
function NewsItem($id){
    global $db;
    $query = "SELECT * FROM `news` WHERE `id`='$id'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }
}

function updateNews($updateNewsId,$title,$description,$created_date,$updated_date,$body,$category,$seen_count,$status,$actual){
    global $db;
    $title = mysqli_real_escape_string($db,$title);
    $description = mysqli_real_escape_string($db,$description);
    $body = mysqli_real_escape_string($db,$body);
    $query = "UPDATE `news` SET 
    `title`='$title',
    `description`='$description',
    `category_id`='$category',
    `body`='$body',
    `created_date`='$created_date',
    `updated_date`='$updated_date',
    `status`='$status',
    `seen_count`='$seen_count',
    `actual`='$actual' WHERE `id`='$updateNewsId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) > 0){
        return true;
    }else{
        return false;
    }
}

function deleteNews($id){
    global $db;
    $query = "DELETE FROM `news` WHERE `id`='$id'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) > 0){
        return true;
    }else{
        return false;
    }
}