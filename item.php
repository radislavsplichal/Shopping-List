<?php
include 'databaseConnection.php';
 class Item {
     public $text;
     public $date;
     public $state = true;
     
     function saveItem($conn,$listName,$items,$quantity,$unitPrice,$important) {
         $date = date('d.m.Y');
         //echo $date;
         $sql = 
         "
            INSERT INTO shoppinglist (listName, time, date, active, important) 
            VALUES ('$listName', NOW(), '$date', TRUE, '$important');


         ";

       
echo sizeof($items);

         if ($conn->query($sql) === TRUE) {
                for ($i=0; $i<sizeof($items); $i++) {
                    echo "Hola";
                    $sql= "INSERT INTO items (item, quantity, unitPrice, listID) 
                    VALUES ('$items[$i]','$quantity[$i]','$unitPrice[$i]',(SELECT MAX(listID) FROM shoppinglist));";

                    if ($conn->query($sql) === TRUE){
                        echo "Kunda sem Kunda tam!";    
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

    }


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
         
     }
 
 function deleteItem($conn, $itemID) {
         $sql = "DELETE FROM items WHERE itemID='$itemID'";
         
         if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
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
