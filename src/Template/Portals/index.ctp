<?php
 // so we use the paginator object the shorter way.
 // instead of using '$this->Paginator' everytime, we'll use '$paginator'
 $paginator = $this->Paginator;
  
 if($portals){
  
     //creating our table
     echo "<table>";
  
         // our table header, we can sort the data user the paginator sort() method!
         echo "<tr>";
          
             // in the sort method, ther first parameter is the same as the column name in our table
             // the second parameter is the header label we want to display in the view
            echo "<th>" . $paginator->sort('id', 'ID') . "</th>";
             echo "<th>" . $paginator->sort('name', 'Name') . "</th>";
             echo "<th>" . $paginator->sort('lgn', 'Lgn') . "</th>";
             echo "<th>" . $paginator->sort('lat', 'Lat') . "</th>";
         echo "</tr>";
          
         // loop through the user's records
         foreach( $portals as $portal ){
             echo "<tr>";
                 echo "<td>{$portal['Portal']['id']}</td>";
                 echo "<td>{$portal['Portal']['name']}</td>";
                 echo "<td>{$portal['Portal']['lgn']}</td>";
                 echo "<td>{$portal['Portal']['lat']}</td>";
             echo "</tr>";
         }
          
     echo "</table>";
  
     // pagination section
   echo "<div class='paging'>";
  
         // the 'first' page button
         echo $paginator->first("First");
          
         // 'prev' page button, 
         // we can check using the paginator hasPrev() method if there's a previous page
         // save with the 'next' page button
         if($paginator->hasPrev()){
             echo $paginator->prev("Prev");
         }
          
         // the 'number' page buttons
         echo $paginator->numbers(array('modulus' => 2));
         
         // for the 'next' button
        if($paginator->hasNext()){
             echo $paginator->next("Next");
         }
          
         // the 'last' page button
         echo $paginator->last("Last");
      
     echo "</div>";
      
 }
  
 // tell the user there's no records found
 else{
     echo "No Portals found.";
 }
 ?>
