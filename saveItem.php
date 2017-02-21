<?php
include 'databaseConnection.php';
include 'item.php';

$listName = $_POST["listName"];

//print_r($_POST["itemName"]);
$items = $_POST["itemName"];
$quantity = $_POST["quantity"];

//print_r($quantity);
$unitPrice = $_POST["unitPrice"];

//print_r($unitPrice);



if (isset($_POST["important"]) && $_POST["important"] == true ) {
    $important = true;
    
}  else {
    $important = false;
}
    
//echo $text;

$itemN = new Item();
$itemN->saveItem($conn,$listName,$items,$quantity,$unitPrice,$important);

header("Location:"."index.php");
exit();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
