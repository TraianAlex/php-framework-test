<?php
/* 
   Programm: FrameWork Class Generator
   Objective: Make all PHP classes Object Oriented from database conection
              and after selected table or tables make ui class front-end too.
   Author: Hélio Barbosa
   Every classes will be generated in separated files.
   GitHub: https://github.com/helhoso/phpFrameWorkClass.git
   linkedin: https://br.linkedin.com/in/helio-barbosa-32718082
   email: hflb01@gmail.com
   youtube: https://www.youtube.com/user/1908HELIO
*/

   class users2
   {
      private $email;
      private $name;
      private $passcode;
      private $profile_background;
      private $profile_background_position;
      private $user_id;
      private $username;
      private $records_found;
      private $myCon; 

      function setemail($_email)
      {
         $this->email = $_email ;; 
      }
      function getemail()
      {
         return $this->email;
      }
      function setname($_name)
      {
         $this->name = $_name ;; 
      }
      function getname()
      {
         return $this->name;
      }
      function setpasscode($_passcode)
      {
         $this->passcode = $_passcode ;; 
      }
      function getpasscode()
      {
         return $this->passcode;
      }
      function setprofile_background($_profile_background)
      {
         $this->profile_background = $_profile_background ;; 
      }
      function getprofile_background()
      {
         return $this->profile_background;
      }
      function setprofile_background_position($_profile_background_position)
      {
         $this->profile_background_position = $_profile_background_position ;; 
      }
      function getprofile_background_position()
      {
         return $this->profile_background_position;
      }
      function setuser_id($_user_id)
      {
         $this->user_id = $_user_id ;; 
      }
      function getuser_id()
      {
         return $this->user_id;
      }
      function setusername($_username)
      {
         $this->username = $_username ;; 
      }
      function getusername()
      {
         return $this->username;
      }
      function __construct() 
      {
         //You can change this field 'codigo' for your IndexKey
         $this->codigo=null;
         $records_found=null;
      }
      function __destruct() 
      {
         $this->codigo=null; 
         $records_found=null;
      }
      function dataBaseAccess() 
      {
          error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED); 
          // error_reporting(0);
          date_default_timezone_set('America/Recife');
          // server conection 
          $Con=mysqli_connect('localhost', 'root', 'aaaa');
          $db_selected = mysqli_select_db( $Con , 'test' );
          return $Con; 
      }

      function insert_users2()
       {
           $myCon = users2::dataBaseAccess();
           $mySelect = 'select email,name,passcode,profile_background,profile_background_position,user_id,username from users2 where email = ' . $this->email;
           $ret = mysqli_query($myCon , $mySelect);
           if( $ret->num_rows>0 )
           {
               // record found 
               mysqli_close( $myCon );
               return -1; // record found  
            }else{
               // insert new record 
            $myInsert = "insert into users2 (name,passcode,profile_background,profile_background_position,user_id,username) values ('$this->name','$this->passcode','$this->profile_background','$this->profile_background_position','$this->user_id','$this->username')";
            // echo  $myInsert ;
            $ret = mysqli_query($myCon , $myInsert);
            $new_rec = mysqli_insert_id($myCon);
            return $new_rec; // if result 0 then error
         }
      }// sql Insert statement

      function update_users2()
      {
           $myCon = users2::dataBaseAccess();
         $mySelect = 'select email,name,passcode,profile_background,profile_background_position,user_id,username from users2 where email = ' . $this->email;
         $ret = mysqli_query($myCon , $mySelect);
         $numRows = $ret->num_rows;
         if($numRows>0)
         {
            $myUpdate = "update users2 set name='".$this->name."' , passcode='".$this->passcode."' , profile_background='".$this->profile_background."' , profile_background_position='".$this->profile_background_position."' , user_id='".$this->user_id."' , username='".$this->username."' where email=".$this->email;
            $ret_upd=mysqli_query( $myCon , $myUpdate);
               if( $ret_upd )
               {
                   mysqli_close( $myCon );
                   return true; // sucesso
               }else{ 
                   mysqli_close( $myCon );
                   return false; // falha 
               } 
           }else{
               mysqli_close( $myCon );
               return false; // falha na alteracao
           } 
       } // sql Update statement

      function delete_users2()
      {
         $codigo = $this->codigo;
           $myCon = users2::dataBaseAccess();
          $mySelect = 'select email,name,passcode,profile_background,profile_background_position,user_id,username from users2 where email = ' . $this->email;
         $ret = mysqli_query($myCon , $mySelect);
         $numRows= mysqli_num_rows($ret);  
         if($numRows>0)
           {
               $myDelete = 'delete from users2 where email=' . $this->email;
               $ret_del=mysqli_query( $myCon , $myDelete);
               $afected=mysqli_affected_rows( $myCon );
               $records_found = $afected;
               if( $afected!=0 )
               {
                   mysqli_close( $myCon );
                   return true; // sucessfull
               }else{ 
                   mysqli_close( $myCon );
                   return false; // record not found 
               } 
           }else{
               mysqli_close( $myCon );
               return false; // error - record don't updated
           } 
       } // sql Delete statement

      function executeSQL_users2($_sql)
      {
         if($_sql==null)
         {
             return null;
         }
         $myCon = users2::dataBaseAccess();
         $ret = mysqli_query($myCon , $_sql);
         $numRows= mysqli_num_rows($ret); 
         if($numRows>0)
         {
             $records_found=$numRows;
             return $ret;
         } 
         return null;
      } // sql statement 

      function executeLike_users2($_field, $_search)
      {
         $listaObjeto = Array();
         if($_search==null)
         {
             return $listaObjeto;
         }
         $id= -1;
         $myCon = users2::dataBaseAccess();
         $mySelect = "select email,name,passcode,profile_background,profile_background_position,user_id,username from users2 where  $_field like '%$_search%'";
         $ret = mysqli_query($myCon , $mySelect);
         $numRows= mysqli_num_rows($ret); 
         if($numRows>0)
         {
             $records_found=$numRows;
             while ($row = mysqli_fetch_array($ret))
             {
                $newusers2 = new users2();
                 $newusers2->setname($row['name']);
                 $newusers2->setpasscode($row['passcode']);
                 $newusers2->setprofile_background($row['profile_background']);
                 $newusers2->setprofile_background_position($row['profile_background_position']);
                 $newusers2->setuser_id($row['user_id']);
                 $newusers2->setusername($row['username']);
                $id += $id;
                $listaObjeto[$id] = $newusers2 ;
            }
         } 
         mysqli_close( $myCon );
         return $listaObjeto;
      } // sql Like statement 

   } // end of class 
?>

