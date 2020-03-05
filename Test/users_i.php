
<?php
   $recNo = $_GET['rec'];
   $flag  = $_GET['f'] ;
   include('users.php');
   $newusers= New users();
   if($flag=='Ins')
   {
      $ret = $newusers->executeSQL_users("select '', '', '', '', '', '', '', ''");
   }else{
      $ret = $newusers->executeSQL_users('select createdAt, email, first_name, id, last_name, options, sections, updatedAt from users where createdAt='.$recNo);
   }
   $flag = str_replace('Ins','[ Insert a New Record ]',$flag);
   $flag = str_replace('Del','[ Delete Record ]',$flag);
   $flag = str_replace('Upd','[ Update Record ]',$flag);
   echo('<p>'.$flag.'</p>');
   while ($row = mysqli_fetch_array($ret))
   {
       
      $newusers->setcreatedAt($row['createdAt']);
      echo("createdAt.....: <input type='text' id='x0'value='".$row['createdAt']."'></input></br>");
      $newusers->setemail($row['email']);
      echo("email.....: <input type='text' id='x1'value='".$row['email']."'></input></br>");
      $newusers->setfirst_name($row['first_name']);
      echo("first_name.....: <input type='text' id='x2'value='".$row['first_name']."'></input></br>");
      $newusers->setid($row['id']);
      echo("id.....: <input type='text' id='x3'value='".$row['id']."'></input></br>");
      $newusers->setlast_name($row['last_name']);
      echo("last_name.....: <input type='text' id='x4'value='".$row['last_name']."'></input></br>");
      $newusers->setoptions($row['options']);
      echo("options.....: <input type='text' id='x5'value='".$row['options']."'></input></br>");
      $newusers->setsections($row['sections']);
      echo("sections.....: <input type='text' id='x6'value='".$row['sections']."'></input></br>");
      $newusers->setupdatedAt($row['updatedAt']);
      echo("updatedAt.....: <input type='text' id='x7'value='".$row['updatedAt']."'></input></br>");
   }
?>
<input class='input-yes' type='button' id='b1' value='Yes - Confirm' onclick='my2Click(this,"users")'></input>
<input class='input-no' type='button' id='b2' value='No - Cancel' onclick='my2Click(this,"users")'></input>
</html>

