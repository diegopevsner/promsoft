<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="styles.css" rel="stylesheet" type="text/css"></link>	
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" >
        
	   
	   function getScriptPage(	div_id,content_id1,content_id2,content_id3,more,act_id) {
			
			subject_id = div_id;//toggle
			
			content1 = document.getElementById(content_id1).value;
			content2 = document.getElementById(content_id2).value;
			content3 = document.getElementById(content_id3).value;

			switch(more){
			
				      case '1':{

			$.get("phpscript.php?val1=" + escape(content1)+"&val2=" + escape(content2)+"&val3=" + escape(content3), function(responseT){
					 
								 
						document.getElementById(subject_id).innerHTML =responseT;
									
							});	
						
						}
						break;
						case '2':{
					   
						
						 $.get("phpscript.php?delete=1&id=" + escape(act_id),function(responseT){
					 
								 
						document.getElementById(subject_id).innerHTML =responseT;
									
							});	
						}
						break;
			}



			document.getElementById(content_id1).value ="";
			document.getElementById(content_id2).value="";
			document.getElementById(content_id3).value="";

		}
		
		function reset(content_id1,content_id2,content_id3){
			
			document.getElementById(content_id1).value ="";
			document.getElementById(content_id2).value="";
			document.getElementById(content_id3).value="";
		}
		
</script></head><body>
<?php

   require_once('connect.php');
  
  
   if(isset($_POST['text'])){
      
      $db->query("UPDATE art SET summary='$_POST[text]' WHERE id='$_GET[red]'");
      
      header("Location: index.php");
   } 


   if(isset($_GET['red'])){
     
      $zapros= $db->query("SELECT* FROM art WHERE id='$_GET[red]'");
     
         while($fo= $zapros->fetch(PDO::FETCH_OBJ)) {
      ?>
         <form  method="POST" >
               summary:
               <textarea name="text" cols="50" rows="6">
                  <?php echo (   $fo->summary   );?>
               </textarea><br>
               <input type="submit" value="update">
         </form>
   <?php }
   }





if(isset($_GET['action'])){

   switch ($_GET['action']){
      case "0" :
               ?>


     <div class="ajax-div">


     	<div class="input-div">
     	<TABLE border="0" class="CommentsofT" cellspacing=0 width="200px" cellpadding="5">
			<TR><TD colspan="2"><strong>Comment</strong></TD></TR>
			
			<TR>
				<TD><strong>
				title</strong></TD>
				<TD align="left" class="commenthelpHed">
				<INPUT TYPE="text" NAME="name" id="text_content1"></TD>
			</TR>
			
			<TR>
				<TD><strong>
				summary</strong></TD>
				<TD align="left" class="commenthelpHed">
				<INPUT TYPE="text" NAME="email" id="text_content2"></TD>
			</TR>
			
			<TR>
				<TD><strong>
				Content</strong></TD>
				<TD align="left" class="commenthelpHed">
				<TEXTAREA NAME="comment" ROWS="4" COLS="30" id="text_content3"></TEXTAREA></TD>
			</TR>
			
			<TR>
				<TD colspan="2" align="center" >
					<INPUT TYPE="submit" value="Submit" onMouseUp="getScriptPage(
																'output_div',
																'text_content1',
																'text_content2',
																'text_content3',
																'1','x')">
		
					<INPUT TYPE="button" 
					onClick="reset(
					'text_content1',
					'text_content2',
					'text_content3')" value="Reset">
				</TD>
			</TR>
     	
     	</TABLE>	
     	</div><!--input div-->	
     	
     	<div class="output-div-container">
      	<div id="output_div">
      	</div>
     	</div>
     		
     </div></body></html>
                  
                  <?php
                   	
                  break;
   }
}
