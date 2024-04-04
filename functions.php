<?php
// auteur: zion
// functie: algemene functies tbv hergebruik

include_once "config.php";

function connectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reizen.sql";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


 

 
 // selecteer de data uit de opgeven table
 function getData($table){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 // selecteer de rij van de opgeven id uit de table klanten
 function getklant($id){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute([':id'=>$id]);
    $result = $query->fetch();

    return $result;
 }


 function ovzklanten(){

    // Haal alle klanten record uit de tabel 
    $result = getData(CRUD_TABLE);
    
    //print table
    printTable($result);
    
 }

 
// Function 'PrintTable' print een HTML-table met data uit $result.
function printTable($result){
    // Zet de hele table in een variable $table en print hem 1 keer 
    $table = "<table>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }

    // print elke rij van de tabel
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function crudklant(){

    // Menu-item   insert
    $txt = "
    <h1>Crud klant</h1>
    <nav>
		<a href='update_klant.php'>Toevoegen nieuwe klant</a>
    </nav><br>";
    echo $txt;

    // Haal alle klanten record uit de tabel 
    $result = getData(CRUD_TABLE);

    //print table
    printCrudklant($result);
    
 }
 
 
// Function 'printCrudklant' print een HTML-table met data uit $result 
// en een wzg- en -verwijder-knop.
function printCrudklant($result){
    $table = "<table>";

    if (!empty($result)) { // Controleer of $result niet leeg is
        $headers = array_keys($result[0]);
        $table .= "<tr>";
        foreach($headers as $header){
            $table .= "<th>" . $header . "</th>";   
        }
        $table .= "<th colspan=2>Actie</th>";
        $table .= "</tr>";

        foreach ($result as $row) {
            
            $table .= "<tr>";
            foreach ($row as $cell) {
                $table .= "<td>" . $cell . "</td>";  
            }
            
            if(isset($row['id'])) { // Controleer of 'id' bestaat in de $row array
                $table .= "<td>
                    <form method='post' action='update_klant.php'>   
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='submit'>Wzg</button>	 
                    </form></td>";

                $table .= "<td>
                    <form method='post' action='delete_klant.php'>   
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='submit'>Verwijder</button>	 
                    </form></td>";
            } else {
                $table .= "<td colspan='2'>Geen ID beschikbaar</td>";
            }

            $table .= "</tr>";
        }
    } else {
        $table .= "<tr><td colspan='5'>Geen gegevens beschikbaar</td></tr>";
    }
    
    $table.= "</table>";

    echo $table;
}




function updateklant($row){

    // Maak database connectie
    $conn = connectDb();

    // Maak een query 
    $sql = "UPDATE " . CRUD_TABLE .
    " SET 
        merk = :merk, 
        type = :type, 
        prijs = :prijs
    WHERE id = :id
    ";

    // Prepare query
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':merk'=>$row['merk'],
        ':type'=>$row['type'],
        ':prijs'=>$row['prijs'],
        ':id'=>$row['id']
    ]);

    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}

function insertklant($post){
    // Maak database connectie
    $conn = connectDb();

    // Maak een query 
    $sql = "
        INSERT INTO " . CRUD_TABLE . " (merk, type, prijs)
        VALUES (:merk, :type, :prijs) 
    ";

    // Prepare query
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':merk'=>$_POST['merk'],
        ':type'=>$_POST['type'],
        ':prijs'=>$_POST['prijs']
    ]);

    
    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;  
}

function deleteklant($id){

    // Connect database
    $conn = connectDb();
    
    // Maak een query 
    $sql = "
    DELETE FROM " . CRUD_TABLE . 
    " WHERE id = :id";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
    ':id'=>$id
    ]);

    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}

?>