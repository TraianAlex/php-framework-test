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
<!DOCTYPE html>
<?php
   $recNo = $_GET['rec'];
   $flag  = $_GET['f'] ;
   $p0 = $_GET['p0'];
   $p1 = $_GET['p1'];
   $p2 = $_GET['p2'];
   $p3 = $_GET['p3'];
   $p4 = $_GET['p4'];
   include('items.php');
   $newitems= New items();
   $newitems->setcategory_id($p0);
   $newitems->setid($p1);
   $newitems->setname($p2);
   $newitems->setprice($p3);
   $newitems->settype_id($p4);
   if($flag=='Ins')
   {
      $newRecNo = $newitems->insert_items();
      echo $newRecNo ;
   }
   if($flag=='Upd')
   {
      $newitems->update_items();
   }
   if($flag=='Del')
   {
      $newitems->delete_items();
   }
?>

