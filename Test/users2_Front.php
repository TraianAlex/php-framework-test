<!DOCTYPE html>

<!-- 
   Programm: FrameWork Class Generator
   Objective: Make all PHP classes Object Oriented from database conection
              and after selected table or tables make ui class front-end too.
   Author: Hélio Barbosa
   Every classes will be generated in separated files.
   GitHub: https://github.com/helhoso/phpFrameWorkClass.git
   linkedin: https://br.linkedin.com/in/helio-barbosa-32718082
   email: hflb01@gmail.com
   youtube: https://www.youtube.com/user/1908HELIO
-->
<html>
  <head>
      <script src='js/jquery.min.js'></script>
      <meta content='text/html; charset=ISO-8859-1' http-equiv='content-type'>
      <title>users2</title>
      <script src='js/jquery.min.js'></script>
      <link href='css/padrao.css' rel='stylesheet'>
  </head>
   <body>
      <div class='one'>
         users2
      </div>
      <div class='two'>
         <p>
         <input class='input-one' type='button' id='ins' value='Insert' onclick='myClick(this,"users2")'></input>
         </p>
         <p>
         <input class='input-one' type='button' id='apd' value='Update' onclick='myClick(this,"users2")'></input>
         </p>
         <p>
         <input class='input-one' type='button' id='del' value='Delete' onclick='myClick(this,"users2")'></input>
         </p>
      </div>
      <div class='three' id='three'>
   <table border=1>
   <tr>
      <td>Chk</td>
      <td aligh='rigth'>email</td>
      <td aligh='rigth'>name</td>
      <td aligh='rigth'>passcode</td>
      <td aligh='rigth'>profile_background</td>
      <td aligh='rigth'>profile_background_position</td>
      <td aligh='rigth'>user_id</td>
      <td aligh='rigth'>username</td>
   </tr>
      <?php
         include('users2.php');
         $Newusers2 = New users2();
         $rsRows = $Newusers2->executeSQL_users2('select email,name,passcode,profile_background,profile_background_position,user_id,username from users2 where 1=1');
         $z=0;
         while ($row = mysqli_fetch_array($rsRows))
         {
            $z = $z+1;
            echo("<tr>");
            echo("<td aligh='left'><input type='radio' name='rd' id='$z' value='".$row['email']."' onclick='myClick(this)'/></td>");
            echo("<td aligh='left'>".$row['email']."</td>").chr(10);
            echo("<td aligh='left'>".$row['name']."</td>").chr(10);
            echo("<td aligh='left'>".$row['passcode']."</td>").chr(10);
            echo("<td aligh='left'>".$row['profile_background']."</td>").chr(10);
            echo("<td aligh='left'>".$row['profile_background_position']."</td>").chr(10);
            echo("<td aligh='left'>".$row['user_id']."</td>").chr(10);
            echo("<td aligh='left'>".$row['username']."</td>").chr(10);
            echo("</tr>");
         }
      ?>
   <table>
     </div>
     <div class='four' id='four2'></div>

   </body>
</html>

