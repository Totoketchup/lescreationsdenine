<?php



function connectPDO(){
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=SecurePicsDB', 'root','root');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	return $pdo;
}

?>

