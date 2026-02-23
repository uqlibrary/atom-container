<?php
$type = $_GET["query"];

# Database configuration
# include 'dbcreds.php';

function getenv_default($name, $default)
{
    $value = getenv($name);

    if (false === $value) {
        return $default;
    }

    return $value;
}

$user = getenv_default('ATOM_MYSQL_USERNAME', 'UNDEFINED');
$pass = getenv_default('ATOM_MYSQL_PASSWORD', 'UNDEFINED');
$dsn = getenv_default('ATOM_MYSQL_DSN', 'UNDEFINED');

$accessionSQL = '
SELECT a.identifier, a.date, t.name AS processing_status, t2.name AS acquisition_type, a18.*,
  (SELECT GROUP_CONCAT(identifier SEPARATOR \'|\') FROM DBNAME.information_object WHERE id IN (
  SELECT subject_id FROM DBNAME.relation as rel WHERE object_id = a.id
  AND type_id = (SELECT id FROM DBNAME.term_i18n WHERE name = \'Accession\' AND culture = \'en\')
  )) as archival_description
      FROM DBNAME.accession as a
      LEFT OUTER JOIN DBNAME.term_i18n AS t ON a.processing_status_id = t.id
      AND a.source_culture = t.culture
      LEFT OUTER JOIN DBNAME.term_i18n AS t2 ON a.acquisition_type_id = t2.id
      AND a.source_culture = t2.culture
      JOIN DBNAME.accession_i18n AS a18 ON a.id = a18.id
';

$deaccessionSQL = '
SELECT a.identifier, ai.title, d.date, di.description, di.extent, di.reason
FROM deaccession d
JOIN accession a on a.id = d.accession_id
JOIN accession_i18n ai on ai.id = a.id
JOIN deaccession_i18n di on di.id = d.id
';

switch($type) {
    case 'accessions':
        $sql = $accessionSQL . ' WHERE YEAR(a.created_at) = YEAR(CURDATE());';
        break;
    case 'allaccessions':
        $sql = $accessionSQL;
        break;
    case 'deaccessions':
        $sql = $deaccessionSQL;
        break;
    default:
        print "No report type " . $type;
        exit(1);
}

$sql = str_replace('DBNAME', $db, $sql);

#$connection = new PDO("mysql:dbname=$db;host=$host;port=$port", $user, $pass);
$connect = new PDO($dsn, $user, $pass);
$stmt = $connection->prepare($sql);
$stmt->execute();
$columns = [];
foreach(range(0, $stmt->columnCount() -1) as $index) {
	$columns[] = $stmt->getColumnMeta($index)['name'];
}
$array = [];
$array[] = $columns;

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $item) {
    $array[] = array_values($item);
}

$filename = $type . '-' . $db . '-' . date("Y-m-d") . '.csv';
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="'.$filename.'";');
$csv = fopen('php://output', 'w');

foreach($array as $line) {
    fputcsv($csv, $line, ',');
}
