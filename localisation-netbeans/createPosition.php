<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
 include_once 'service/PositionService.php';
 create();
}
function create () {
    header('Content-Type: application/json'); // Add this!

    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $date = $_POST['date'];
    $imei = $_POST['imei'];

    try {
        $ss = new PositionService();
        $ss->create(new Position(1, $latitude, $longitude, $date, $imei));
        echo json_encode(['status' => 'success', 'message' => 'Position enregistrée avec succès.']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
