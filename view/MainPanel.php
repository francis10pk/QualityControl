<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
body {
	font-family: Arial, sans-serif;
	background-color: #f4f4f4;
	padding: 20px;
}

.container {
	display: flex;
	flex-wrap: wrap;
}

@media screen and (max-width: 768px) {
	.column {
		flex: 100%;
	}
}

.welcome-msg {
	font-size: 20px;
	font-weight: bold;
	margin-bottom: 20px;
}

.dashboard-features {
	border: 1px solid #ccc;
	padding: 20px;
	background-color: #fff;
	border-radius: 8px;
}

.dashboard-features h3 {
	margin-top: 0;
	color: #333;
}

.dashboard-features ul {
	list-style-type: none;
	padding: 0;
}

.dashboard-features li {
	margin-bottom: 10px;
}

.dashboard-features li a {
	text-decoration: none;
	color: #007bff;
}

.dashboard-features li a:hover {
	text-decoration: underline;
}

.column1 {
	grid-column: 1/2;
	color: #007bff;
}
.bottom-left {
    position: fixed;
    bottom: 0;
    left: 0;
    padding: 10px; /* Adjust padding as needed */
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
}

</style>
</head>
<body>
<div class="container">

    <div class="Column1"></div>
   		<img src="/QualityControl/img/logo.jpg" alt="Quality Control Information System"> 
    <div class="Column2">
    	<h2>Welcome Technical Service System</h2>    
            <div class="dashboard-features">  
                <a href="NewOrderServiceForm.php?op=1">Order Service Panel </a><hr>
                <a href="NewClientForm.php?op=2">Client Panel </a> <hr>
                <a href="NewBudgetForm.php?op=3">Budget Panel</a><br/>
      		</div> 
  	</div>  	

</div>
<?php
    session_start();
    echo '<a  class="bottom-left" href="dashboard.php" class="button">Back</a>';
?>   

</body>
</html>


<?php
