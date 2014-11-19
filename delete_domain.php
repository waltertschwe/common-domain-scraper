<?php

    $domain = $_GET['domain'];
	 try{
	     $db = new PDO('mysql:host=localhost;dbname=domains;charset=utf8', 'root', '%NN6prxt5');
	     $sql = "DELETE FROM common_domains WHERE domain = '".$domain."'";
		 $stmt = $db->prepare($sql);
		 $stmt->execute();
		 $total = $stmt->rowCount();
		
	 } catch(PDOException $ex) {
	     echo "pdo error";	
	 }
	 echo "total domains deleted = " . $total . "<br/>";
	 echo "domain deleted = " . $domain;

	 if (!empty($_SERVER['HTTP_REFERER'])){
         header("Location: ".$_SERVER['HTTP_REFERER']);
	 }