<?php
// Include database connection
include 'db_connection.php';

// Check if the location parameter is set and not empty
if(isset($_GET['location']) && !empty($_GET['location'])) {
    // Sanitize the input to prevent SQL injection
    $selected_location = $_GET['location'];
    
    // Query incidents based on the selected location and count the occurrences
    $query = "SELECT incident_type, incident_description, duplicate_checkCount FROM incidents WHERE incident_location = '$selected_location' GROUP BY incident_type, incident_description, duplicate_checkCount";
    $result = $conn->query($query);

    // Check if there are any incidents
    if ($result->num_rows > 0) {
        // Initialize a variable to hold the HTML content
        $html = '<ul>';
        // Loop through each incident and append it to the HTML content
        while($row = $result->fetch_assoc()) {
            $html .= '<li>';
            $html .= 'Incident Type: ' . $row["incident_type"]. ' - Description: ' . $row["incident_description"]. ' - Reported: ' . $row["duplicate_checkCount"];
            $html .= '</li>';
        }
        $html .= '</ul>';

        // Output the HTML content
        echo $html;
    } else {
        echo "No incidents found for this location.";
    }
    
    // Close the database connection
    $conn->close();
} else {
    // Location parameter is missing or empty
    echo "Please select a location.";
}
?>
