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
		<link rel="stylesheet" href="css/demo_page.css">
		<link rel="stylesheet" href="css/demo_table.css">
		<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
	    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
	    
	    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
	    <script type="text/javascript" language="javascript" src="js/jquery.easy-confirm-dialog.min.js"></script>
	    <script src="js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" charset="utf-8">
	   	    $(document).ready(function() {
		        $('#example').dataTable( {
		         "sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
		        });
		        $('#myModal').appendTo("body");
		       	$(".delbtn").easyconfirm();
				$("#alert").click(function() {
					alert("You approved the action");
				});
				//$('#myModal').appendTo("body");
						
	        });
	        $(function(){
			        $('#domainSubmit').click(function(e){
				       e.preventDefault();
				       var domain = document.getElementById("domain-name").value;
				       $.ajax({
						  type: "GET",
						  url: "add-domain.php",
						  data: { domain: domain }
						})
						  .done(function( msg ) {
						  	alert("Domain added");
						    location.reload();
						  });
				    });
			 	});
        </script>
	</head>
<body>

	 <!-- Fixed navbar -->
<div class="container">	 
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://arvixe.com">Arvixe</a>
        </div>
      </div>
    </div>    
</div>   
<div class="container">
<div class="page-header">
</div>
<div class="well">
<p><strong>Common Domains - Initial Data Source <a href="http://moz.com/top500">http://moz.com/top500</a> </strong></p>
<p><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Add domain
</button>
</p>
</div>
</div>
<div class="container">	
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
    <thead>
        <tr>
            <th>Domain</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php while ($row = $stmt->fetchObject()) { ?>
       <tr>
       	    
       	    <td><?php echo $row->domain; ?></td>
       	    <td><a href="delete_domain.php?domain=<?php echo $row->domain; ?>" class="delbtn"
                    	title="Are you sure you want to delete domain <b><?php echo $row->domain; ?></b>???">
                    	<span class="glyphicon glyphicon-trash"></span></a>
            </td>
       	   
       </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
           <th>Domain</th>
           <th>Actions</th>
        </tr>
    </tfoot>
</table>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add domain</h4>
      </div>
      <div class="modal-body">
         <form id="form-domain" class="form-horizontal" role="form">
	 			<div class="col-xs-6">
					<input id="domain-name" class="form-control" type="text" value="" name="domain-name" placeholder="Domain Name">		    
	     		 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="domainSubmit" type="button" class="btn btn-primary">Save changes</button></form>
      </div>
    </div>
  </div>
</div>




</body>
</html>