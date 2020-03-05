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

   class items
   {
      private $category_id;
      private $id;
      private $name;
      private $price;
      private $type_id;
      private $records_found;
      private $myCon; 

      function setcategory_id($_category_id)
      {
         $this->category_id = $_category_id ;; 
      }
      function getcategory_id()
      {
         return $this->category_id;
      }
      function setid($_id)
      {
         $this->id = $_id ;; 
      }
      function getid()
      {
         return $this->id;
      }
      function setname($_name)
      {
         $this->name = $_name ;; 
      }
      function getname()
      {
         return $this->name;
      }
      function setprice($_price)
      {
         $this->price = $_price ;; 
      }
      function getprice()
      {
         return $this->price;
      }
      function settype_id($_type_id)
      {
         $this->type_id = $_type_id ;; 
      }
      function gettype_id()
      {
         return $this->type_id;
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

      function insert_items()
       {
           $myCon = items::dataBaseAccess();
           $mySelect = 'select category_id,id,name,price,type_id from items where category_id = ' . $this->category_id;
           $ret = mysqli_query($myCon , $mySelect);
           if( $ret->num_rows>0 )
           {
               // record found 
               mysqli_close( $myCon );
               return -1; // record found  
            }else{
               // insert new record 
            $myInsert = "insert into items (id,name,price,type_id) values ('$this->id','$this->name','$this->price','$this->type_id')";
            // echo  $myInsert ;
            $ret = mysqli_query($myCon , $myInsert);
            $new_rec = mysqli_insert_id($myCon);
            return $new_rec; // if result 0 then error
         }
      }// sql Insert statement

      function update_items()
      {
           $myCon = items::dataBaseAccess();
         $mySelect = 'select category_id,id,name,price,type_id from items where category_id = ' . $this->category_id;
         $ret = mysqli_query($myCon , $mySelect);
         $numRows = $ret->num_rows;
         if($numRows>0)
         {
            $myUpdate = "update items set id='".$this->id."' , name='".$this->name."' , price='".$this->price."' , type_id='".$this->type_id."' where category_id=".$this->category_id;
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

      function delete_items()
      {
         $codigo = $this->codigo;
           $myCon = items::dataBaseAccess();
          $mySelect = 'select category_id,id,name,price,type_id from items where category_id = ' . $this->category_id;
         $ret = mysqli_query($myCon , $mySelect);
         $numRows= mysqli_num_rows($ret);  
         if($numRows>0)
           {
               $myDelete = 'delete from items where category_id=' . $this->category_id;
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

      function executeSQL_items($_sql)
      {
         if($_sql==null)
         {
             return null;
         }
         $myCon = items::dataBaseAccess();
         $ret = mysqli_query($myCon , $_sql);
         $numRows= mysqli_num_rows($ret); 
         if($numRows>0)
         {
             $records_found=$numRows;
             return $ret;
         } 
         return null;
      } // sql statement 

      function executeLike_items($_field, $_search)
      {
         $listaObjeto = Array();
         if($_search==null)
         {
             return $listaObjeto;
         }
         $id= -1;
         $myCon = items::dataBaseAccess();
         $mySelect = "select category_id,id,name,price,type_id from items where  $_field like '%$_search%'";
         $ret = mysqli_query($myCon , $mySelect);
         $numRows= mysqli_num_rows($ret); 
         if($numRows>0)
         {
             $records_found=$numRows;
             while ($row = mysqli_fetch_array($ret))
             {
                $newitems = new items();
                 $newitems->setid($row['id']);
                 $newitems->setname($row['name']);
                 $newitems->setprice($row['price']);
                 $newitems->settype_id($row['type_id']);
                $id += $id;
                $listaObjeto[$id] = $newitems ;
            }
         } 
         mysqli_close( $myCon );
         return $listaObjeto;
      } // sql Like statement 

   } // end of class 
?>

