<?php
	 try{
	     $db = new PDO('mysql:host=localhost;dbname=domains;charset=utf8', 'root', '%NN6prxt5');
	     $sql = "SELECT domain from common_domains";
		 $stmt = $db->prepare($sql);
		 $stmt->execute();
		 $total = $stmt->rowCount();
		
	 } catch(PDOException $ex) {
	     echo "pdo error";	
	 }
?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Common Domains</title>
		
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<!--<link rel="stylesheet" href="css/demo_page.css">
		<link rel="stylesheet" href="css/demo_table.css">-->
		<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
	    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>		    
	   <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" /> -->
	    <!-- <script type="text/javascript" language="javascript" src="js/jquery.easy-confirm-dialog.min.js"></script> -->
	    <!-- <script src="js/jquery.dataTables.min.js"></script> -->
	</head>
<body>
   

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>