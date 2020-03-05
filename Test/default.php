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
      <title>Class Generator</title>
      <script src='js/jquery.min.js'></script>
      <link href='css/padrao.css' rel='stylesheet'>
  </head>
   <body>
      <div class='one'>
         Class Generator from MySQL DataBase Tables - Helio Barbosa - Brazil
      </div>
      <div class='two'>
         <p>
<p>
	      <input class='input-one' type='button' length='50' value='category' name='btnWork' onclick='call_Item(this)'>
	      </input>
	    </p>
<p>
	      <input class='input-one' type='button' length='50' value='items' name='btnWork' onclick='call_Item(this)'>
	      </input>
	    </p>
<p>
	      <input class='input-one' type='button' length='50' value='type' name='btnWork' onclick='call_Item(this)'>
	      </input>
	    </p>
<p>
	      <input class='input-one' type='button' length='50' value='users' name='btnWork' onclick='call_Item(this)'>
	      </input>
	    </p>
<p>
	      <input class='input-one' type='button' length='50' value='users2' name='btnWork' onclick='call_Item(this)'>
	      </input>
	    </p>
         </p>
      </div>
      <div class='three' id='three'>
         <!--  put code here  -->
      </div>
   </body>
</html>
<script type='text/javascript'>

   function call_Item(iRec)
   {
      //alert(iRec.value);
      url=iRec.value+'_Front.php'
      $.get(url, function(resposta)
      {
         document.getElementById('three').innerHTML = resposta ;
      
      
      },'html');
   }
</script>
<script type='text/javascript'>
   var rowPosition = 0 ;
   var NoRec = 0;
   var flag  = '';
   function myClick(myVal,fontName)
   {
      var zz = myVal.value;
      if(zz!='Insert' && zz!='Update' && zz!='Delete' )
      {
         rowPosition = myVal.id ;  
      }
      switch(zz)
      {
         case 'Insert':
            // Insert here 
            zz=0;
            NoRec = 0;
            if(rowPosition!=0)
            {
               document.getElementById(rowPosition).checked = false ;
               document.getElementById('four2').innerHTML='' ;
               rowPosition = 0 ;
            }
            flag  = 'Ins';
            url = fontName+'_i.php?rec=' + NoRec + '&f=Ins';
            $.get(url, function(resposta){
            document.getElementById('four2').innerHTML=resposta ;
            },'html');
            break;
         case 'Update':
            // Update here
            if(NoRec == 0)
            {
               alert('Select the record again, please!');
               document.getElementById('four2').innerHTML='';
               break;
            }
            flag  = 'Upd';
            url = fontName+'_i.php?rec=' + NoRec + '&f=Upd';
            $.get(url, function(resposta){
            document.getElementById('four2').innerHTML=resposta ;
            },'html');
            break;
         case 'Delete':
            // Delete here
            if(NoRec == 0)
            {
               alert('Select the record again, please!');
               document.getElementById('four2').innerHTML='';
               break;
            }
            flag  = 'Del';
            url = fontName+'_i.php?rec=' + NoRec + '&f=Del';
            $.get(url, function(resposta){
            document.getElementById('four2').innerHTML=resposta ;
            },'html');
            break;
         default:
            NoRec = zz;
            break;
      }
   }
   function my2Click(myVal,fontName)
   {
      //here you need persit your datas!
      if(myVal.value=='Yes - Confirm')
      {
         params='';
         try{
         for( x=0 ; x<=200 ; x++ )
         {
            params= params + '&p' + x.toString() +'='+ document.getElementById( 'x' + x.toString() ).value;
         }
         }catch{
         }
         //alert(params);
         //alert(myVal.value)
         url = fontName+'_ii.php?rec=' + NoRec + '&f=' + flag + params;
         $.get(url, function(resposta){            // alert(resposta);
            document.getElementById('four2').innerHTML=resposta ;
         },'html');
      }else{
         document.getElementById('four2').innerHTML='' ;
      }
   }
</script>

