
<?php
   $recNo = $_GET['rec'];
   $flag  = $_GET['f'] ;
   include('items.php');
   $newitems= New items();
   if($flag=='Ins')
   {
      $ret = $newitems->executeSQL_items("select '', '', '', '', ''");
   }else{
      $ret = $newitems->executeSQL_items('select category_id, id, name, price, type_id from items where category_id='.$recNo);
   }
   $flag = str_replace('Ins','[ Insert a New Record ]',$flag);
   $flag = str_replace('Del','[ Delete Record ]',$flag);
   $flag = str_replace('Upd','[ Update Record ]',$flag);
   echo('<p>'.$flag.'</p>');
   while ($row = mysqli_fetch_array($ret))
   {
       
      $newitems->setcategory_id($row['category_id']);
      echo("category_id.....: <input type='text' id='x0'value='".$row['category_id']."'></input></br>");
      $newitems->setid($row['id']);
      echo("id.....: <input type='text' id='x1'value='".$row['id']."'></input></br>");
      $newitems->setname($row['name']);
      echo("name.....: <input type='text' id='x2'value='".$row['name']."'></input></br>");
      $newitems->setprice($row['price']);
      echo("price.....: <input type='text' id='x3'value='".$row['price']."'></input></br>");
      $newitems->settype_id($row['type_id']);
      echo("type_id.....: <input type='text' id='x4'value='".$row['type_id']."'></input></br>");
   }
?>
<input class='input-yes' type='button' id='b1' value='Yes - Confirm' onclick='my2Click(this,"items")'></input>
<input class='input-no' type='button' id='b2' value='No - Cancel' onclick='my2Click(this,"items")'></input>
</html>

