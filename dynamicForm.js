/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addInput(divName){
     
     var newDiv = document.createElement('div');
     newDiv.innerHTML = '<div class="row"> <div class="form-group col-sm-6"> <label for="txtPolozky">Položky: </label> <input class="form-control" id="txtPolozky" type="text" name="itemName[]"> </div> <div class="form-group col-sm-3"> <label for="pocetKus">Počet kusů:</label> <input class="form-control" id="pocetKus" type="number" name="quantity[]"> </div> <div class="form-group col-sm-3"> <label for="cenaKus">Cena za kus:</label> <input class="form-control" id="cenaKus" type="number" name="unitPrice[]"> </div> <div class="glyphicon glyphicon-plus col-sm-1" onClick="addInput(\'dynamicForm\')"></div> </div>'
        document.getElementById(divName).appendChild(newDiv);
             }