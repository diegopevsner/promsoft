<?php

  
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$dbname = "heidi";
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e) {
    echo $e->getMessage();
} 
$result = $db->prepare("select count(*) from art "); 
$result->execute();
$rowCount = $result->fetchColumn(0);

/*$res = $db->query("select * from $table");
	
      for ($x = 0; $x < sizeof($res ); $x++){
   
          while($obj = $res->fetch(PDO::FETCH_OBJ)) {
     	  
               $buffer[] = $x;
                
               while( list($el )= each( $buffer) ){
     		  
     		           $rowCount   =  $el+1;
     		      }
     	    } 
      
  	   }*/
