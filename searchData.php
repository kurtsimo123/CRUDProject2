<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$executionStartTime = microtime(true);

include("config.php");

header('Content-Type: application/json; charset=UTF-8');

$conn = new mysqli($cd_host, $cd_user, $cd_password, $cd_dbname, $cd_port, $cd_socket);

if (mysqli_connect_errno()) {

    $output['status']['code'] = "300";
    $output['status']['name'] = "failure";
    $output['status']['description'] = "database unavailable";
    $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
    $output['data'] = [];

    mysqli_close($conn);

    echo json_encode($output);

    exit;
}

$searchQuery = $_POST['searchQuery'];

$query = $conn->prepare("SELECT p.id as personID, p.firstName as firstName, p.lastName as lastName, p.jobTitle as jobTitle, l.name as locationName, p.email as email, d.name as departmentName, p.departmentID as department
                         FROM personnel p
                            LEFT JOIN department d ON p.departmentID = d.id
                            LEFT JOIN location l ON d.locationID = l.id 
                         WHERE p.firstName LIKE ? OR p.lastName LIKE ? OR p.email LIKE ? OR l.name LIKE ? OR d.name LIKE ? OR p.jobTitle LIKE ?");
$searchParam = "%{$searchQuery}%";
$query->bind_param("ssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
$query->execute();

$result = $query->get_result();

if (!$result) {

    $output['status']['code'] = "400";
    $output['status']['name'] = "executed";
    $output['status']['description'] = "query failed";
    $output['data'] = [];

    mysqli_close($conn);

    echo json_encode($output);

    exit;
}

$data = [];

while ($row = mysqli_fetch_assoc($result)) {

    array_push($data, $row);

}

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
$output['data'] = $data;

mysqli_close($conn);

echo json_encode($output);

?>