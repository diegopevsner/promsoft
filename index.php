<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Ajax Comment</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



</head>
<body>


<a href="page.php?action=0">Add Comment
</a><br>

	
<table width="400" cellspacing="2" cellpadding="2" align="center" style="border:1px #000000 solid;">	

<?php 

    require_once('connect.php'); 
 	
function SelecteurPage($table ) {
  
    global $db;
    global $rowCount;
    	
	
    $perpage = ($rowCount > 5) ? 5 : $rowCount;	

   	
	   if(isset($_GET["page"])){
	   
		    $page = intval($_GET["page"]);
	   }
	   else{ 
	    
		    $page = 1;
	   }

   $calc = $perpage * $page;
   $start = $calc - $perpage;
	
   $result = $db->query("SELECT * FROM $table LIMIT $start, $perpage");
   
     while($post = $result->fetch(PDO::FETCH_OBJ)){
     
   	       echo "<tr class='sofT'>		    
   				  <td class='soft'>".$post->id."</td>
   				  <td class='sup'>".$post->title."</td>
   				  <td class='sup'>".$post->summary."</td>
   				  <td class='sup'>".$post->content."</td>				  
   			     </tr>";
     }

	   if(isset($page)){
		 
			 
          $total = ceil(   $rowCount/ $perpage );

			    if($page <=1 ){
			    }
			    else{
				
   				 $j = $page - 1;

   				 echo "<span style =''>
   				       <a id='page_a_link' href='?page= $j' onclick=''>
   					   < Prev
   					   </a>
   					   </span>";
			    }
			            for( $i=1; $i <= $total; $i++){

         					if( $i !==$page){
         					   echo "<span id='page_links' style='color:green;'>
         							$i</span>";
         					}
         					 else{
         					   echo "<span id='page_links' style='font-weight:bold;'>
         							$i</span>";
         					}
      		         }
			    if( $page >= $total ){
			    }
			    else{
				
   				  $j = $page + 1;
   				  
   				  echo "<span style ='' >
   				        <a href='?page= $j' id='page_a_link' onclick=''>
   					     Next >
   						</a>
   						</span>";
			    }
	   }
}
SelecteurPage("art");	
	
?>
</table>
</body>
</html>
