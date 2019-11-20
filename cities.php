<?php
$selectCities = <<<QUERY
SELECT * FROM cities
QUERY;

$stmt = $pdo->query($selectCities);
$cities = "";
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $cities .= sprintf($citiesTemplate,
        $row['city_cod'],
        $row['city_cod'],
        $row['country_cod'],
        $row['city_name']
    );
}

return $cities;