<?php

function getQuote(){
    global $db;
    $query = "SELECT * FROM quote";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else {
        return false;
    }
}
########################### ADMIN PANEL FUNCTIONS ######################################
function  addQuote($quote,$author,$status){
    global $db;
    $quote = mysqli_real_escape_string($db,$quote);
    $author = mysqli_real_escape_string($db,$author);
    $query = "INSERT INTO quote (`title`,`author`,`status`) VALUES ('$quote','$author','$status')";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return true;
    }else {
        return false;
    }
}

function getQuoteItem($quoteId){
    global $db;
    $query = "SELECT * FROM quote WHERE  `id`='$quoteId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(!empty($result)){
        return mysqli_fetch_assoc($result);
    }else {
        return false;
    }
}

function editQuote($id,$quote,$author,$status){
    global $db;
    $quote = mysqli_real_escape_string($db,$quote);
    $author = mysqli_real_escape_string($db,$author);
    $query = "UPDATE `quote` SET `title`='$quote',`author`='$author',`status`='$status' WHERE `id`='$id'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) > 0){
        return true;
    }else{
        return false;
    }
}

function deleteQuote($quoteId){
    global $db;
    $query = "DELETE FROM `quote` WHERE `id`='$quoteId'";
    $result = @mysqli_query($db,$query) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) == 1){
        return true;
    }else{
        return false;
    }
}




