<?php


require_once('connect.php');

if($_GET){


   if(isset($_GET['delete'])){
   
      switch ($_GET['delete']){
		   case "0" : 
		   break;
		   
		   default:
				$del = "delete from art where id=".$_REQUEST['id'];

            $db->query($del);

				echo "<font size='3' color='#3333FF'><b>comment deleted successfully</b></font>";
		   break;	
      }
   }
   else{
   
   	$insert = "insert into art(title,summary,content) values('".$_GET['val1']."','".$_GET['val2']."','".$_GET['val3']."')";

      $db->query($insert);

   	echo "<font size='3' color='#3333FF'><b>comment added successfully</b></font>";
   }



}
	

?>
<table class="sofT" cellspacing="0" border="1">
	<tr>
	   <td class='helpHed'>id</td>
	   <td class='helpHed'>title</td>
	   <td class='helpHed'>summary</td>
	   <td class='helpHed'>Content</td>
   	<td class='helpHed'>Delete</td>
    </tr>

<?php

$res = $db->query("select * from art");
	
	if($rowCount > 0){//defined in connect.php
	
		while($data= $res->fetch(PDO::FETCH_OBJ)){
		 
   			echo "<tr class='sofT'><td class='soft'>";
   			echo ($data->id) ;
   			      ?>
               - <a href="page.php?red=<?php echo ($data->id); ?>">
                   redactor
				 </a></td> 
                  
				  <?php 	  	  
				  
				echo  "
								  
				  <td class='sup'>".$data->title."</td>
				  <td class='sup'>".$data->summary."</td>
				  <td class='sup'>".$data->content."</td>

				  <td class='sup'>
	              <input type='image' src='Images/images22.jpg' onMouseUp=getScriptPage('output_div','text_content1','text_content2','text_content3','2','".$data->id."')>
              </td></tr>";
				 
			
		}
	}

?>

</table>

