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
    
    
    
    .formContent {
        margin-left: 200px; /* Sidebar width */
        padding: 20px;
        background-color: lightgray;
    }
 
   
  
    
    .button {
        border: none; /* Remove default button border */
        cursor: pointer;
    }
    
   #main-content {
    margin-left: 200px; /* Sidebar width */
    padding: 20px;
    display: flex; /* Use flexbox to align items */
    justify-content: space-between; /* Distribute items with space between them */
    align-items: center; /* Align items vertically in the center */
}

.square {
    width: 30%; /* Set width for each square */
    height: 100px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin-right: 10px; /* Add right margin for spacing between squares */
    font-size: 16px;
    cursor: pointer;
    color: black;
    text-align: center;
    background-color: white;
}

    .button {
    width: auto; /* Adjust width as needed */
    height: 40px; /* Adjust height as needed */
    padding: 10px 20px; /* Button padding */
    font-size: 16px;
    cursor: pointer;
    color: white;
    text-align: center;
    background-color: #007bff;
    border: none; /* Remove default button border */
}

    /* Container for the buttons */
    .button-container {
        display: flex; /* Use flexbox layout */
        align-items: center; /* Align items vertically in the center */
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
    
    <div id="main-content">
    	  <?php
        require_once '../models/dbconfig.php';
        require_once '../class/ClientRequestsClass.php'; // Assuming ClientRequestsClass.php contains the class definition

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
            
            <form action="new_parts_request.php" method="GET">
                <button class="button">New Parts Request</button>
            </form>
        </div>
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
