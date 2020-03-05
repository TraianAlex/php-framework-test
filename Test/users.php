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

   class users
   {
      private $createdAt;
      private $email;
      private $first_name;
      private $id;
      private $last_name;
      private $options;
      private $sections;
      private $updatedAt;
      private $records_found;
      private $myCon; 

      function setcreatedAt($_createdAt)
      {
         $this->createdAt = $_createdAt ;; 
      }
      function getcreatedAt()
      {
         return $this->createdAt;
      }
      function setemail($_email)
      {
         $this->email = $_email ;; 
      }
      function getemail()
      {
         return $this->email;
      }
      function setfirst_name($_first_name)
      {
         $this->first_name = $_first_name ;; 
      }
      function getfirst_name()
      {
         return $this->first_name;
      }
      function setid($_id)
      {
         $this->id = $_id ;; 
      }
      function getid()
      {
         return $this->id;
      }
      function setlast_name($_last_name)
      {
         $this->last_name = $_last_name ;; 
      }
      function getlast_name()
      {
         return $this->last_name;
      }
      function setoptions($_options)
      {
         $this->options = $_options ;; 
      }
      function getoptions()
      {
         return $this->options;
      }
      function setsections($_sections)
      {
         $this->sections = $_sections ;; 
      }
      function getsections()
      {
         return $this->sections;
      }
      function setupdatedAt($_updatedAt)
      {
         $this->updatedAt = $_updatedAt ;; 
      }
      function getupdatedAt()
      {
         return $this->updatedAt;
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

      function insert_users()
       {
           $myCon = users::dataBaseAccess();
           $mySelect = 'select createdAt,email,first_name,id,last_name,options,sections,updatedAt from users where createdAt = ' . $this->createdAt;
           $ret = mysqli_query($myCon , $mySelect);
           if( $ret->num_rows>0 )
           {
               // record found 
               mysqli_close( $myCon );
               return -1; // record found  
            }else{
               // insert new record 
            $myInsert = "insert into users (email,first_name,id,last_name,options,sections,updatedAt) values ('$this->email','$this->first_name','$this->id','$this->last_name','$this->options','$this->sections','$this->updatedAt')";
            // echo  $myInsert ;
            $ret = mysqli_query($myCon , $myInsert);
            $new_rec = mysqli_insert_id($myCon);
            return $new_rec; // if result 0 then error
         }
      }// sql Insert statement

      function update_users()
      {
           $myCon = users::dataBaseAccess();
         $mySelect = 'select createdAt,email,first_name,id,last_name,options,sections,updatedAt from users where createdAt = ' . $this->createdAt;
         $ret = mysqli_query($myCon , $mySelect);
         $numRows = $ret->num_rows;
         if($numRows>0)
         {
            $myUpdate = "update users set email='".$this->email."' , first_name='".$this->first_name."' , id='".$this->id."' , last_name='".$this->last_name."' , options='".$this->options."' , sections='".$this->sections."' , updatedAt='".$this->updatedAt."' where createdAt=".$this->createdAt;
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

      function delete_users()
      {
         $codigo = $this->codigo;
           $myCon = users::dataBaseAccess();
          $mySelect = 'select createdAt,email,first_name,id,last_name,options,sections,updatedAt from users where createdAt = ' . $this->createdAt;
         $ret = mysqli_query($myCon , $mySelect);
         $numRows= mysqli_num_rows($ret);  
         if($numRows>0)
           {
               $myDelete = 'delete from users where createdAt=' . $this->createdAt;
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

      function executeSQL_users($_sql)
      {
         if($_sql==null)
         {
             return null;
         }
         $myCon = users::dataBaseAccess();
         $ret = mysqli_query($myCon , $_sql);
         $numRows= mysqli_num_rows($ret); 
         if($numRows>0)
         {
             $records_found=$numRows;
             return $ret;
         } 
         return null;
      } // sql statement 

      function executeLike_users($_field, $_search)
      {
         $listaObjeto = Array();
         if($_search==null)
         {
             return $listaObjeto;
         }
         $id= -1;
         $myCon = users::dataBaseAccess();
         $mySelect = "select createdAt,email,first_name,id,last_name,options,sections,updatedAt from users where  $_field like '%$_search%'";
         $ret = mysqli_query($myCon , $mySelect);
         $numRows= mysqli_num_rows($ret); 
         if($numRows>0)
         {
             $records_found=$numRows;
             while ($row = mysqli_fetch_array($ret))
             {
                $newusers = new users();
                 $newusers->setemail($row['email']);
                 $newusers->setfirst_name($row['first_name']);
                 $newusers->setid($row['id']);
                 $newusers->setlast_name($row['last_name']);
                 $newusers->setoptions($row['options']);
                 $newusers->setsections($row['sections']);
                 $newusers->setupdatedAt($row['updatedAt']);
                $id += $id;
                $listaObjeto[$id] = $newusers ;
            }
         } 
         mysqli_close( $myCon );
         return $listaObjeto;
      } // sql Like statement 

   } // end of class 
?>

