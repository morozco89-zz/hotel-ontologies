<?php
$selectReservations = <<<QUERY
SELECT * FROM reservations
QUERY;

$stmt = $pdo->query($selectReservations);
$reservations = "";
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $reservations .= sprintf($reservationsTemplate,
        $row['uuid'],
        $row['uuid'],
        $row['destiny_city_cod'],
        $row['holder_cod'],
        $row['origin_city_cod'],
        $row['agency_cod'],
        $row['mode'],
        $row['reservation_type'],
        $row['status'],
        $row['uuid']
    );
}

return $reservations;