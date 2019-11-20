<?php
$selectPassengers = <<<QUERY
SELECT * FROM passengers
QUERY;

$stmt = $pdo->query($selectPassengers);
$passengers = "";
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $passengers .= sprintf($passengersTemplate,
        $row['passenger_cod'],
        $row['passenger_cod'],
        $row['passenger_birth_date'],
        $row['passenger_gender'],
        $row['passenger_document_type'],
        $row['passenger_id'],
        $row['passenger_last_name'],
        $row['passenger_name'],
        $row['passenger_type'],
    );
}

return $passengers;