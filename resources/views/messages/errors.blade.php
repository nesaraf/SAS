<?php include ('../db.php'); ?>
<?php
$id = $_GET["id"];

    $find = "SELECT * FROM papers WHERE paper_id = '$id'";
	$qr = mysqli_query($db,$find);
	$row = mysqli_fetch_assoc($qr);
	
  if (isset($_REQUEST["add"])) 
  {
    $name = mysqli_real_escape_string($db,$_REQUEST["name"]);
    $price = mysqli_real_escape_string($db,$_REQUEST["price"]);
	
  
    $sql ="UPDATE papers SET papers.paper_id='$price' ANDpapers.price='$price' WHERE paper_id ='$id' " ;
    $result = mysqli_query($db,$sql);
    if ($result) 
    {
      header("location:managerHome.php?msg=Successfully added new paper.");
    }
    else
    {
      header("location:add_paper.php?msg=Failed to Update paper.Please try again.");
    }
  }

?>



<!DOCTYPE html>
<html>
<head>
	<title>News and publication</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body background="../images/manager.jpg">
	<nav class="navbar navbar-fixed-top navbar-inverse">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="../index.php">The News Express</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="managerHome.php">All Papers</a></li>
	        <li><a href="add_paper.php">Add Paper</a></li>
<!-- 	        <li><a href="#">Page 2</a></li> 
	        <li><a href="#">Page 3</a></li>  -->
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li class="active"><a href="logout.php">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<br><br>
		<br><br>

		<div class="row">
			<br><br><br>
			<div class="col-xs-3"></div>
			<div class="col-xs-6">
			  <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>">
			    <div class="form-group" >
			      <label class="control-label col-sm-2" for="name"><span style="color: blue; background-image:url(../images/white.png); background-color:#FFC; padding:5px; padding-bottom:5px ;">Name:</span></label>

               		<div class="col-sm-10">
			        <input type="text" class="form-control" id="name" name="pid" value="<?php echo $row["paper_id"];?>">
			      </div>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $row["paper_name"];?>">
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="control-label col-sm-2" for="price"><span style="color: blue; background-image:url(../images/white.png); background-color:#FFC; padding:5px; padding-bottom:5px ;">Price:</span></label>
			      <div class="col-sm-10">          
			        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php echo $row["price"];?>">
			      </div>
			    </div>
			    <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="btn btn-success" name="add">Update Price</button>
			        <a href="managerHome.php" class="btn btn-default">Cancel</a>
			      </div>
			    </div>
			  </form>
			</div>
			<div class="col-xs-3"></div>
		</div>
	</div>
</body>

