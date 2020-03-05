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
      <title>users</title>
      <script src='js/jquery.min.js'></script>
      <link href='css/padrao.css' rel='stylesheet'>
  </head>
   <body>
      <div class='one'>
         users
      </div>
      <div class='two'>
         <p>
         <input class='input-one' type='button' id='ins' value='Insert' onclick='myClick(this,"users")'></input>
         </p>
         <p>
         <input class='input-one' type='button' id='apd' value='Update' onclick='myClick(this,"users")'></input>
         </p>
         <p>
         <input class='input-one' type='button' id='del' value='Delete' onclick='myClick(this,"users")'></input>
         </p>
      </div>
      <div class='three' id='three'>
   <table border=1>
   <tr>
      <td>Chk</td>
      <td aligh='rigth'>createdAt</td>
      <td aligh='rigth'>email</td>
      <td aligh='rigth'>first_name</td>
      <td aligh='rigth'>id</td>
      <td aligh='rigth'>last_name</td>
      <td aligh='rigth'>options</td>
      <td aligh='rigth'>sections</td>
      <td aligh='rigth'>updatedAt</td>
   </tr>
      <?php
         include('users.php');
         $Newusers = New users();
         $rsRows = $Newusers->executeSQL_users('select createdAt,email,first_name,id,last_name,options,sections,updatedAt from users where 1=1');
         $z=0;
         while ($row = mysqli_fetch_array($rsRows))
         {
            $z = $z+1;
            echo("<tr>");
            echo("<td aligh='left'><input type='radio' name='rd' id='$z' value='".$row['createdAt']."' onclick='myClick(this)'/></td>");
            echo("<td aligh='left'>".$row['createdAt']."</td>").chr(10);
            echo("<td aligh='left'>".$row['email']."</td>").chr(10);
            echo("<td aligh='left'>".$row['first_name']."</td>").chr(10);
            echo("<td aligh='left'>".$row['id']."</td>").chr(10);
            echo("<td aligh='left'>".$row['last_name']."</td>").chr(10);
            echo("<td aligh='left'>".$row['options']."</td>").chr(10);
            echo("<td aligh='left'>".$row['sections']."</td>").chr(10);
            echo("<td aligh='left'>".$row['updatedAt']."</td>").chr(10);
            echo("</tr>");
         }
      ?>
   <table>
     </div>
     <div class='four' id='four2'></div>

   </body>
</html>

