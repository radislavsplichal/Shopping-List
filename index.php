<?php
include 'databaseConnection.php';

?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <div class="row col-sm-3 col-xs-0"></div>
    <div class=" col-sm-6 ">
        
        <div class="page-header">
            <h1>Nákupní Seznam</h1> 
            <p>Do formuláře zapiš věci, které se mají nakoupit. Nezapomeň to uložit.</p>
        </div>
        <script src="dynamicForm.js" language="Javascript" type="text/javascript"></script>
        <form class="form-horizontal" action="saveItem.php" method="post">
            
            <div class="form-group">
                <label for="nSeznamu">Název seznamu: </label>
                <input class="form-control" id="nSeznam" name="listName" required>
            </div>
            <div id="dynamicForm">
            <div class="row">
                 
                <div class="form-group col-sm-6">
                    <label for="txtPolozky">Položky: </label>
                    <input class="form-control" id="txtPolozky" type="text" name="itemName[]">
                </div>

                <div class="form-group col-sm-3">
                    <label for="pocetKus">Počet kusů:</label>
                    <input class="form-control" id="pocetKus" type="number" name="quantity[]" value="null">
                </div>

                <div class="form-group col-sm-3">
                    <label for="cenaKus">Cena za kus:</label>
                    <input class="form-control" id="cenaKus" type="number" name="unitPrice[]" value="null">
                </div>  
                
                <div class="glyphicon glyphicon-plus col-sm-1" onClick="addInput('dynamicForm')"></div>

            </div>
            </div> 
            
            <div class="form-group">
                <label for="note">Poznámky: </label>
                <textarea class="form-control" id="note" name="text" class="form-control" rows="3"  ></textarea>
            <br>
            </div>
            <div class="form-group">
                <label for="imp">Důležité:</label>
                <input class="form-control" id="imp" type="checkbox" name="important" value="true"> 
            </div>
            <hr>
            <div align="right">
                <button type="reset" class="btn btn-danger">Smazat</button>
            <button type="submit" class="btn btn-primary">Uložit</button>
            </div>
        </form>
     <p>
         
         
         
         
     <?php
     $sameID = 0;

  $sql = "SELECT * FROM shoppinglist,items
    WHERE shoppinglist.listID = items.listID
    ORDER BY shoppinglist.listID";
    
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        if ($row["important"] == true){
            $important = "panel-primary";
        }
        else {
            $important = "panel-default";
        }
        //echo $row["listID"];
        if ($sameID == 0 or $sameID !== $row["listID"] ){     
        
            if ($sameID != 0){
                echo "</table>
                </div>";
            }


        echo 

        '
        <div class="panel '.$important.'">
        <div class="panel-heading">
        <h3 class="panel-title">Seznam č.'.$row["listID"]." ".$row["date"]." "  .$row["time"]." ".$row["listName"].'</h3>
        </div>
        <table class="table">
  <tr>
    <th class="tg-yw4l">Polozka</th>
    <th class="tg-yw4l">Množství</th>
    <th class="tg-yw4l">cenaKus</th>
  </tr>
   <tr>
    <td class="tg-yw4l">'.$row["item"].'</td>
    <td class="tg-yw4l">'.$row["quantity"].'</td>
    <td class="tg-yw4l">'.$row["unitPrice"].'</td>
  </tr>

        ';

        
    
        } else { 
   
        echo '              
   <tr>
    <td class="tg-yw4l">'.$row["item"].'</td>
    <td class="tg-yw4l">'.$row["quantity"].'</td>
    <td class="tg-yw4l">'.$row["unitPrice"].'</td>
  </tr>



                <form action="deleteItem.php" method="post" >
                <input type="hidden" name="itemID" value="'.$row["itemID"].'"></input>
                </form>
            
        ';


    }

    $sameID = $row["listID"];
}



    
} else {
    echo "0 results";
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
     ?>
     
     </div>
     </p>
        

    <div class="row col-sm-3 col-xs-0"></div>

</html>

