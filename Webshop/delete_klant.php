<?php
// auteur: zion
// functie: verwijder een bier op basis van de klantcode
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['klantcode'])){

    // test of insert gelukt is
    if(deleteklant($_GET['klantcode']) == true){
        echo '<script>alert("klantcode: ' . $_GET['klantcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('crud_klant.php'); </script>";
    } else {
        echo '<script>alert("klant is NIET verwijderd")</script>';
    }
}
?>

