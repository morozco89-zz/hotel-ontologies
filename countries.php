<?php
$selectCountries = <<<QUERY
SELECT * FROM countries
QUERY;

$stmt = $pdo->query($selectCountries);
$countries = "";
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $countries .= sprintf($countriesTemplate,
        $row['country_cod'],
        $row['country_cod'],
        $row['country_name']
    );
}

return $countries;