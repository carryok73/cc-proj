<?php
// Database credentials
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = "shardulAD@123"; // Change this to your database password
$database = "collegeauto"; // Change this to your database name
$table = "student_details";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data if form is submitted
if (isset($_POST['subfrm'])) {
    // Escape user inputs for security
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $major = $conn->real_escape_string($_POST['major']);
    $company_preference = $conn->real_escape_string($_POST['company_preference']);

    // Insert data into database
    $sql = "INSERT INTO $table (full_name, email, phone, address, dob, major, company_preference)
            VALUES ('$full_name', '$email', '$phone', '$address', '$dob', '$major', '$company_preference')";

    if (mysqli_query($conn,$sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Details</title>
  <style>
    /* Paste your CSS styles here */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: url('background.jpg');
      background-size: cover;
      background-position: center;
    }
    
    .container {
      width: 80%;
      margin: 0 auto;
      padding: 1em;
    }
    
    header {
      background-color: #007bff;
      color: white;
    }
    
    nav ul {
      list-style-type: none;
      padding: 0;
      display: flex;
      justify-content: space-between;
    }
    
    nav ul li {
      margin-right: 1em;
    }
    
    nav ul a {
      color: white;
      text-decoration: none;
    }
    
    nav ul ul {
      display: none;
      position: absolute;
      background-color: #007bff;
    }
    
    nav ul li:hover > ul {
      display: block;
    }
    
    main {
      padding: 2em 0;
    }
    
    footer {
      background-color: #007bff;
      color: white;
      text-align: center;
      padding: 1em 0;
    }
    
    form {
      background-color: #f9f9f9;
      padding: 2em;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 0.5em;
      font-weight: bold;
    }
    
    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 0.5em;
      margin-bottom: 1em;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 0.5em 1em;
      border-radius: 3px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <h1>Student Details</h1>
      <form id="studentForm">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob">
        
        <label for="major">Major:</label>
        <input type="text" id="major" name="major">
        
        <label for="company_preference">Company Preference:</label>
        <select id="company_preference" name="company_preference" required>
          <option value="">Select Company</option>
          <option value="TCS">Company A</option>
          <option value="Mahindra">Company B</option>
          <option value="Capgemini">Company C</option>
          <!-- Add more companies as needed -->
        </select>
    
        <input type="submit" value="Submit" name="subfrm">
      </form>
    </main>
    <footer>
      <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
