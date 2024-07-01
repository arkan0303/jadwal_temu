<?php
include_once "./config.php";

$search = isset($_POST['search']) ? $conn->real_escape_string($_POST['search']) : '';
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$records_per_page = isset($_POST['records_per_page']) ? (int)$_POST['records_per_page'] : 10;
$offset = ($page - 1) * $records_per_page;

$search_query = "";
if (!empty($search)) {
    $search_query = "AND (name LIKE '%$search%' OR address LIKE '%$search%')";
}

// Main query to fetch data
$sql = "SELECT * FROM guest_appointments WHERE appointment_type = 'janji_temu' $search_query LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Count query to determine total records
$count_sql = "SELECT COUNT(*) AS total FROM guest_appointments WHERE appointment_type = 'janji_temu' $search_query";
$count_result = $conn->query($count_sql);
$total_records = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_records / $records_per_page);

// Prepare response including records_per_page
$response = [
    'data' => $data,
    'total_pages' => $total_pages,
    'records_per_page' => $records_per_page // Include records_per_page in the response
];

echo json_encode($response);

$conn->close();