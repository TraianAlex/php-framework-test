
<?php
   $recNo = $_GET['rec'];
   $flag  = $_GET['f'] ;
   include('users2.php');
   $newusers2= New users2();
   if($flag=='Ins')
   {
      $ret = $newusers2->executeSQL_users2("select '', '', '', '', '', '', ''");
   }else{
      $ret = $newusers2->executeSQL_users2('select email, name, passcode, profile_background, profile_background_position, user_id, username from users2 where email='.$recNo);
   }
   $flag = str_replace('Ins','[ Insert a New Record ]',$flag);
   $flag = str_replace('Del','[ Delete Record ]',$flag);
   $flag = str_replace('Upd','[ Update Record ]',$flag);
   echo('<p>'.$flag.'</p>');
   while ($row = mysqli_fetch_array($ret))
   {
       
      $newusers2->setemail($row['email']);
      echo("email.....: <input type='text' id='x0'value='".$row['email']."'></input></br>");
      $newusers2->setname($row['name']);
      echo("name.....: <input type='text' id='x1'value='".$row['name']."'></input></br>");
      $newusers2->setpasscode($row['passcode']);
      echo("passcode.....: <input type='text' id='x2'value='".$row['passcode']."'></input></br>");
      $newusers2->setprofile_background($row['profile_background']);
      echo("profile_background.....: <input type='text' id='x3'value='".$row['profile_background']."'></input></br>");
      $newusers2->setprofile_background_position($row['profile_background_position']);
      echo("profile_background_position.....: <input type='text' id='x4'value='".$row['profile_background_position']."'></input></br>");
      $newusers2->setuser_id($row['user_id']);
      echo("user_id.....: <input type='text' id='x5'value='".$row['user_id']."'></input></br>");
      $newusers2->setusername($row['username']);
      echo("username.....: <input type='text' id='x6'value='".$row['username']."'></input></br>");
   }
?>
<input class='input-yes' type='button' id='b1' value='Yes - Confirm' onclick='my2Click(this,"users2")'></input>
<input class='input-no' type='button' id='b2' value='No - Cancel' onclick='my2Click(this,"users2")'></input>
</html>

