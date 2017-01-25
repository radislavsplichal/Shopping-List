<?php
include 'databaseConnection.php';
 class Item {
     public $text;
     public $date;
     public $state = true;
     
     function saveItem($conn, $text) {
         $date = date('d.m.Y');
         echo $date;
         $sql = "INSERT INTO shoppinglist (itemText, time, date, active) VALUES ('$text', NOW(), '$date', TRUE)";
         
         if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
         
     }
 
 function deleteItem($conn, $itemID) {
         $sql = "DELETE FROM shoppinglist WHERE itemID='$itemID'";
         
         if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
         
     }
 }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
