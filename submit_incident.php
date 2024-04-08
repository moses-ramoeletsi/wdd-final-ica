<?php
include 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $incident_type = $_POST['incident_type'];
    $incident_location = $_POST['incident_location'];
    $incident_description = $_POST['incident_description'];
    
    $check_duplicate_query = "SELECT * FROM incidents WHERE incident_type = '$incident_type' AND incident_location = '$incident_location' AND incident_description = '$incident_description'";
    $result = $conn->query($check_duplicate_query);

    if ($result->num_rows > 0) {

        $update_duplicate_query = "UPDATE incidents SET duplicate_checkCount = duplicate_checkCount + 1 WHERE incident_type = '$incident_type' AND incident_location = '$incident_location' AND incident_description = '$incident_description'";
        if ($conn->query($update_duplicate_query) === TRUE) {
            echo "Incident already logged. Duplicate count incremented.";
        } else {
            echo "Error: " . $update_duplicate_query . "<br>" . $conn->error;
        }
    } else {

        $insert_query = "INSERT INTO incidents (incident_type, incident_location, incident_description, duplicate_checkCount) VALUES ('$incident_type', '$incident_location', '$incident_description', 0)";
        if ($conn->query($insert_query) === TRUE) {
            echo "Incident logged successfully.";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?> 

