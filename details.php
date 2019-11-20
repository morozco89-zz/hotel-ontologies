<?php
$selectDetails = <<<QUERY
SELECT * FROM reservations_details JOIN passengers ON reservations_details.detail_cod = passengers.detail_cod
QUERY;

$stmt = $pdo->query($selectDetails);
$paxsArray = [];
$details = "";
$results = $stmt->fetchAll();

foreach ($results as $result) {
    if (!key_exists($result['detail_cod'], $paxsArray)) {
        $paxsArray[$result['detail_cod']] = [];
    }


    $paxsArray[$result['detail_cod']][] = "hotel:passenger_" . $result['passenger_cod'];
}

foreach ($results as $result) {
    $paxs = implode(" ,
                                                     ", $paxsArray[$result['detail_cod']]);
    $details .= sprintf($detailsTemplate,
        $result['detail_cod'],
        $result['detail_cod'],
        $result['reservation_cod'],
        $result['hotel_cod'],
        $paxs,
        $result['detail_accomodation'],
        $result['adult_number'],
        $result['children25_number'],
        $result['children_number'],
        $result['end_date'],
        $result['infant_number'],
        $result['detail_plan'],
        $result['room_type'],
        $result['start_date'],
        $result['room_number']
    );
}

return $details;