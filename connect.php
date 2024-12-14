<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data using updated names without spaces
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    // Calculate the age
    $dob_date = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dob_date)->y; // Calculate age in years

    // Check if the user is at least 18 years old
    if ($age < 18) {
        echo "You must be at least 18 years old to register.<br>";
        exit;
    }

    // If age is valid, display the submitted information
    echo "<h2>Registration Successful!</h2>";
    echo "<h3>Submitted Information:</h3>";
    echo "First Name: " . htmlspecialchars($first_name) . "<br>";
    echo "Middle Name: " . htmlspecialchars($middle_name) . "<br>";
    echo "Last Name: " . htmlspecialchars($last_name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Mobile Number: " . htmlspecialchars($phone_number) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Country: " . htmlspecialchars($country) . "<br>";
    echo "Date of Birth: " . htmlspecialchars($dob) . "<br>";

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'register', 3306);

    // Check for connection error
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Prepare the SQL statement with updated column names (without spaces)
        $stmt = $conn->prepare("INSERT INTO registration (first_name, middle_name, last_name, email, phone_number, password, dob, gender, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Bind parameters for the prepared statement
        $stmt->bind_param("sssssssss", $first_name, $middle_name, $last_name, $email, $phone_number, $hashed_password, $dob, $gender, $country);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<br>Data successfully inserted into the database!";
        } else {
            echo "<br>Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Invalid request method.";
}
?>
