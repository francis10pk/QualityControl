<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quality Control</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        overflow-x: hidden; /* Prevents horizontal scroll */
        background-color: #E0EDF2;
    }
    
    #sidebar {
        width: 200px;
        height: 100vh;
        background-color: blue;
        position: fixed; /* Sidebar fixed position */
        top: 0; /* Position at the top of the viewport */
        left: 0; /* Position at the left of the viewport */
        display: flex; /* Use flexbox layout for positioning */
        align-items: flex-start; /* Align items at the top of the sidebar */
        justify-content: flex-start; /* Justify content at the start (left) of the sidebar */
    }
 
    #sidebar img {
        margin: 25px; /* Optional: Add margin around the image */
        width: auto; /* Maintain aspect ratio */
        height: 125px; /* Set the height of the image */
    }
    
    #h1 {
        margin-left: 200px; /* Sidebar width */
        padding: 20px;
    }
    
    #h5 {
        margin-left: 200px; /* Sidebar width */
        margin-top: -30px;
        padding: 20px;
        color: gray;
    }
     #h3 {
        margin-left: 200px; /* Sidebar width */
        margin-top: 30px;
        padding: 30px;
        color: black;
    }
    
    #main-content {
        margin-left: 200px; /* Sidebar width */
        padding: 20px;
        display: flex; /* Using flex to align items */
        align-items: center; /* Align items vertically in the center */
    }
    
    .formContent {
        margin-left: 200px; /* Sidebar width */
        padding: 20px;
        background-color: lightgray;
    }
    .square, .button {
        width: 90%;
        height: 100px;
    }
    .square  {
 
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
        margin-top:-40px;
        font-size: 16px;
        cursor: pointer;
        color: black;
        text-align: center;
        background-color: White;
    }
    .button{
 
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 10px;
        font-size: 16px;
        cursor: pointer;
        color: white;
        text-align: center;
        background-color: #007bff;
    }
    
    .button {
        border: none; /* Remove default button border */
        cursor: pointer;
    }
    
    .button-container {
        display: flex; /* Use flexbox layout */
        justify-content: flex-end; /* Align items to the right */
        padding: 20px; /* Add padding for spacing */
        margin-top:-65px;
    }
 
    /* Hover effect for buttons */
    .button:hover {
        opacity: 0.8; /* Reduce opacity on hover for visual feedback */
    }
</style>
</head>
<body>
    <div id="sidebar">
        <img src="/QualityControl/class/logo-search-grid-1x (8).jpg" alt="Your Logo">
    </div>
    
    <h1 id="h1">Service Dashboard</h1>
    <h5 id="h5">Welcome Back Employee!</h5>
  
    <h3 id="h3">Quick Stats</h3>
    
    
    <div id="main-content">
    	  <?php
        require_once '../models/dbconfig.php';
        require_once '../class/ClientRequestsClass.php'; // Assuming ClientRequestsClass.php contains the class definition
        require_once '../class/NewRequestClass.php';
        
        global $connection;
        // Function to get the counts
        function getRequestCounts($connection) {
            $totalRequests = 0;
            $pendingRequests = 0;
            $completedRequests = 0;
 
            // Query to get counts
            $sql = "SELECT COUNT(*) AS total,
                           SUM(CASE WHEN status.State = 'Pending' THEN 1 ELSE 0 END) AS pending,
                           SUM(CASE WHEN status.State = 'Completed' THEN 1 ELSE 0 END) AS completed
                    FROM client_requests
                    INNER JOIN status ON client_requests.Status_Id = status.Status_Id";
            $result = mysqli_query($connection, $sql);
 
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalRequests = $row['total'];
                $pendingRequests = $row['pending'];
                $completedRequests = $row['completed'];
            }
 
            return array($totalRequests, $pendingRequests, $completedRequests);
        }
 
        list($totalRequests, $pendingRequests, $completedRequests) = getRequestCounts($connection);
        ?>
        <div class="square top-div">Total Requests: <?php echo $totalRequests; ?></div>
        <div class="square top-div">Pending Requests: <?php echo $pendingRequests; ?></div>
        <div class="square top-div">Completed: <?php echo $completedRequests; ?></div>
        
        <div class="button-container">
            <form action="customer_service_form.php" method="GET">
                <button class="button">Customer Service Form</button>
            </form>
            
            
            <form action="New_Request_Form.php" method="GET">
                <button class="button">New Parts Request</button>
            </form>
        </div>
    </div>
    
<!--     <div id="formContent" class="formContent"> -->
        <?php
//         try {
//             $request = new NewRequestClass(0, 0, 0, '', 0,0, '');
//             $request->listAllRequest($connection);
//         } catch (PDOException $e) {
//             // Handle exceptions
//         }
        ?>
    </div>
    
    <div id="formContent" class="formContent">
        <?php
        try {
            $request = new ClientRequestsClass(0, 0, 0, 0, '', '', '', null);
            $request->listAllRequest($connection);
            
        } catch (PDOException $e) {
            // Handle exceptions
        }
        ?>
    </div>
</body>
</html>