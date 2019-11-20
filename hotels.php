<?php
$selectHotels = <<<QUERY
SELECT * FROM hotels
QUERY;

$stmt = $pdo->query($selectHotels);
$hotels = "";
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $hotels .= sprintf($hotelsTemplate,
        $row['hotel_cod'],
        $row['hotel_cod'],
        $row['country_cod'],
        $row['business_name'],
        $row['hotel_acronym'],
        $row['hotel_id'],
        $row['id_type'],
        $row['max_rooms'],
        $row['hotel_name'],
    );
}

return $hotels;