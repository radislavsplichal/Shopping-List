<?php
include 'databaseConnection.php';

?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <div class="row col-sm-3 col-xs-0"></div>
    <div class=" col-sm-6 ">
        <form class="form-horizontal" action="saveItem.php" method="post">
            
            <h1>Nákupní Seznam</h1> 
            <p>Do formuláře zapiš věci, které se mají nakoupit. Nezapomeň to uložit.</p>
            
            <textarea name="text" class="form-control" rows="3"></textarea>
            <br>
            
            <div align="right">
                <button type="reset" class="btn btn-danger">Smazat</button>
            <button type="submit" class="btn btn-primary">Uložit</button>
            </div>
        </form>
     <p>
         
         
         
         
     <?php
    $sql = "SELECT itemID, itemText, time, date, active FROM shoppinglist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Položka č.'.$row["itemID"]." | ".$row["date"]. " " .$row["time"].'</h3>
  </div>
  <div class="panel-body">'
    .$row["itemText"].
                
        '<form action="deleteItem.php" method="post" >'
                . '<input type="hidden" name="itemID" value="'.$row["itemID"].'"></input>'
                
                . '<div align="right"><button type="submit" class="btn btn-danger">Smazat!</button></div>'.
  '</form></div>
</div>';}
} else {
    echo "0 results";
}
$conn->close();
     ?>
     
     </div>
     </p>
    </div>
    <div class="row col-sm-3 col-xs-0"></div>

</html>

