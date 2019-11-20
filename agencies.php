<?php
$selectAgencies = <<<QUERY
SELECT * FROM agencies
QUERY;

$stmt = $pdo->query($selectAgencies);
$agencies = "";
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $agencies .= sprintf($agenciesTemplate,
        $row['agency_cod'],
        $row['agency_cod'],
        $row['agency_initials'],
        $row['agency_name']
    );
}

return $agencies;