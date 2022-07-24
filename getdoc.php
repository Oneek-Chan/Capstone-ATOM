<?php
 

$connect = new PDO("mysql:host=padayon.ts.infra.dranem.me; dbname=accreditation_db", "maria", "maria123");


$query = "SELECT * FROM `uploads`;";


$statement = $connect->prepare($query);
$statement->execute();
while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	$data[] = $row;
}

echo json_encode($data);

?>