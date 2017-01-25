<?php
include 'databaseConnection.php';
include 'item.php';

$text= $_POST["text"];
//echo $text;

$itemN = new Item();
$itemN->saveItem($conn,$text);

header("Location:"."index.php");
exit();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
