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
      <title>items</title>
      <script src='js/jquery.min.js'></script>
      <link href='css/padrao.css' rel='stylesheet'>
  </head>
   <body>
      <div class='one'>
         items
      </div>
      <div class='two'>
         <p>
         <input class='input-one' type='button' id='ins' value='Insert' onclick='myClick(this,"items")'></input>
         </p>
         <p>
         <input class='input-one' type='button' id='apd' value='Update' onclick='myClick(this,"items")'></input>
         </p>
         <p>
         <input class='input-one' type='button' id='del' value='Delete' onclick='myClick(this,"items")'></input>
         </p>
      </div>
      <div class='three' id='three'>
   <table border=1>
   <tr>
      <td>Chk</td>
      <td aligh='rigth'>category_id</td>
      <td aligh='rigth'>id</td>
      <td aligh='rigth'>name</td>
      <td aligh='rigth'>price</td>
      <td aligh='rigth'>type_id</td>
   </tr>
      <?php
         include('items.php');
         $Newitems = New items();
         $rsRows = $Newitems->executeSQL_items('select category_id,id,name,price,type_id from items where 1=1');
         $z=0;
         while ($row = mysqli_fetch_array($rsRows))
         {
            $z = $z+1;
            echo("<tr>");
            echo("<td aligh='left'><input type='radio' name='rd' id='$z' value='".$row['category_id']."' onclick='myClick(this)'/></td>");
            echo("<td aligh='left'>".$row['category_id']."</td>").chr(10);
            echo("<td aligh='left'>".$row['id']."</td>").chr(10);
            echo("<td aligh='left'>".$row['name']."</td>").chr(10);
            echo("<td aligh='left'>".$row['price']."</td>").chr(10);
            echo("<td aligh='left'>".$row['type_id']."</td>").chr(10);
            echo("</tr>");
         }
      ?>
   <table>
     </div>
     <div class='four' id='four2'></div>

   </body>
</html>

