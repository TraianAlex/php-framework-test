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
   $p7 = $_GET['p7'];
   include('users.php');
   $newusers= New users();
   $newusers->setcreatedAt($p0);
   $newusers->setemail($p1);
   $newusers->setfirst_name($p2);
   $newusers->setid($p3);
   $newusers->setlast_name($p4);
   $newusers->setoptions($p5);
   $newusers->setsections($p6);
   $newusers->setupdatedAt($p7);
   if($flag=='Ins')
   {
      $newRecNo = $newusers->insert_users();
      echo $newRecNo ;
   }
   if($flag=='Upd')
   {
      $newusers->update_users();
   }
   if($flag=='Del')
   {
      $newusers->delete_users();
   }
?>

