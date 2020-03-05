
<?php
   $recNo = $_GET['rec'];
   $flag  = $_GET['f'] ;
   include('type.php');
   $newtype= New type();
   if($flag=='Ins')
   {
      $ret = $newtype->executeSQL_type("select '', ''");
   }else{
      $ret = $newtype->executeSQL_type('select id, name from type where id='.$recNo);
   }
   $flag = str_replace('Ins','[ Insert a New Record ]',$flag);
   $flag = str_replace('Del','[ Delete Record ]',$flag);
   $flag = str_replace('Upd','[ Update Record ]',$flag);
   echo('<p>'.$flag.'</p>');
   while ($row = mysqli_fetch_array($ret))
   {
       
      $newtype->setid($row['id']);
      echo("id.....: <input type='text' id='x0'value='".$row['id']."'></input></br>");
      $newtype->setname($row['name']);
      echo("name.....: <input type='text' id='x1'value='".$row['name']."'></input></br>");
   }
?>
<input class='input-yes' type='button' id='b1' value='Yes - Confirm' onclick='my2Click(this,"type")'></input>
<input class='input-no' type='button' id='b2' value='No - Cancel' onclick='my2Click(this,"type")'></input>
</html>

