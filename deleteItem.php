<?php
include 'databaseConnection.php';
include 'item.php';

$itemID= $_POST["itemID"];
//echo $itemID;

$itemN = new Item();
$itemN->deleteItem($conn,$itemID);

header("Location:"."index.php");
exit();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
