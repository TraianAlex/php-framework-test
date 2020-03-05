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
   $p5 = $_GET['p5'];
   $p6 = $_GET['p6'];
   include('users2.php');
   $newusers2= New users2();
   $newusers2->setemail($p0);
   $newusers2->setname($p1);
   $newusers2->setpasscode($p2);
   $newusers2->setprofile_background($p3);
   $newusers2->setprofile_background_position($p4);
   $newusers2->setuser_id($p5);
   $newusers2->setusername($p6);
   if($flag=='Ins')
   {
      $newRecNo = $newusers2->insert_users2();
      echo $newRecNo ;
   }
   if($flag=='Upd')
   {
      $newusers2->update_users2();
   }
   if($flag=='Del')
   {
      $newusers2->delete_users2();
   }
?>

