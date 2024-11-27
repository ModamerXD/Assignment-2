<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Students by Nationality</title>
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
   
</head>
<body>
    <header>
        <h1>UOB Students by Nationality</h1>
        <p>Data retrieved from the Bahrain Open Data Portal.</p>
    </header>
    <div class="container">
        <?php
        // API URL
        $apiUrl = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

        // Fetch and decode the API data
        $response = file_get_contents($apiUrl);
// Check if the API call was successful
if ($response === FALSE) {
    echo "<p>Unable to fetch data from the API. Please try again later.</p>";
} else {
    // Decode the JSON response
    $result = json_decode($response, true);

    // Check if data is available
    if (isset($result['results']) && count($result['results']) > 0) {
        echo "<table>";
        echo "<thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>Number of Students</th>
                </tr>
              </thead>";
        echo "<tbody>";

        // Loop through the data and display it in the table
        for($i = 0; $i < count($result['results']) ; ++$i) {
            
                
            echo "<tr>";
            echo "<td>" , htmlspecialchars($result['results'][$i]['year'], ENT_QUOTES, 'UTF-8') , "</td>";
            echo "<td>" , htmlspecialchars($result['results'][$i]['semester'], ENT_QUOTES, 'UTF-8') , "</td>";
            echo "<td>" , htmlspecialchars($result['results'][$i]['the_programs'], ENT_QUOTES, 'UTF-8') , "</td>";
            echo "<td>" , htmlspecialchars($result['results'][$i]['nationality'], ENT_QUOTES, 'UTF-8') , "</td>";
            echo "<td>" , htmlspecialchars($result['results'][$i]['colleges'], ENT_QUOTES, 'UTF-8') , "</td>";
            echo "<td>" , htmlspecialchars($result['results'][$i]['number_of_students'], ENT_QUOTES, 'UTF-8') , "</td>";
            echo "</tr>";
    }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class = empty>No data found in the API response.</p>";
    }
}
?>
    </div>
    <footer>
        <p>Powered by the <a href="https://data.gov.bh">Bahrain Open Data Portal</a> | UOB Students Enrollment</p>
    </footer>
</body>
</html>