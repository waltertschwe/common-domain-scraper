<?php

    $domain = $_GET['domain'];
	// try{
	     $db = new PDO('mysql:host=localhost;dbname=domains;charset=utf8', 'root', '%NN6prxt5');
	     $sql = "INSERT INTO common_domains (domain) VALUES( '".$domain."')";
		 $stmt = $db->prepare($sql);
		 $stmt->execute();
		 $total = $stmt->rowCount();
		
	// } catch(PDOException $ex) {
	     echo "pdo error";	
	// }
	 echo "domain inserted = " . $domain;

	 if (!empty($_SERVER['HTTP_REFERER'])){
         header("Location: ".$_SERVER['HTTP_REFERER']);
	 }

