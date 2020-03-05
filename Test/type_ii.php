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
   include('type.php');
   $newtype= New type();
   $newtype->setid($p0);
   $newtype->setname($p1);
   if($flag=='Ins')
   {
      $newRecNo = $newtype->insert_type();
      echo $newRecNo ;
   }
   if($flag=='Upd')
   {
      $newtype->update_type();
   }
   if($flag=='Del')
   {
      $newtype->delete_type();
   }
?>

