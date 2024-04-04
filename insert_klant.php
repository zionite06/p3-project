<?php
    // functie: formulier en database insert klant
    // auteur: zion

    echo "<h1>Insert klant</h1>";

include_once "config.php";
$conn = connectDb();

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute([':id'=>$id]);
    $result = $query->fetch();

    if(isset($_POST['submit'])) {
        $naam = $_POST['naam'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $klant = $_POST['klant'];

        $sql = "UPDATE " . CRUD_TABLE . " SET naam = :naam, adres = :adres, postcode = :postcode, klant = :klant WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':naam'=>$naam,
            ':adres'=>$adres,
            ':postcode'=>$postcode,
            ':klant'=>$klant,
            ':id'=>$id
        ]);
        
        header("Location: crud_klant.php");
    }
}
?>
