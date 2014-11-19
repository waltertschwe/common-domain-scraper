<?php

     include('simple_html_dom.php');
     $ch = curl_init();
	
	 curl_setopt_array(
            $ch, array(
                CURLOPT_URL => 'http://moz.com/top500',
                CURLOPT_RETURNTRANSFER => true
     ));
        
     $response = curl_exec($ch);
     curl_close($ch); 
     $html = new simple_html_dom();
	
	 $html->load($response);
	 
	 $counter = 1;
	 foreach($html->find('#top-500 tr td[class=url] a') as $domains) {
	     
		 $domainHTML = $domains->plaintext;
		 $domain = strtolower(trim($domainHTML));
		
		 try{
	         $db = new PDO('mysql:host=localhost;dbname=domains;charset=utf8', 'root', '%NN6prxt5');
			 $dbDomains = $db->query("SELECT domain FROM common_domains");
			 
			 $savedDomains = array();
			 $counter = 1;
			 foreach($dbDomains as $dbDomain) {
			     $savedDomains[$counter] = $dbDomain['domain'];
				 $counter++;
			 }
			 
			 if(!array_search($domain, $savedDomains)) {
			     $result = $db->exec("INSERT INTO common_domains(domain) VALUES('".$domain."')");
			 } 
		   	
		     //var_dump($result);
	     } catch(PDOException $ex) {
	         echo "pdo error";	
	     }
	   
	   	 $counter++;
	 }
	 
echo "successful scrape and insert";
	
	
	