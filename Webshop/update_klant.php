<?php
    // functie: update klant
    // auteur: zion
    
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateklant($_POST) == true){
            echo "<script>alert('klant is gewijzigd')</script>";
        } else {
            echo '<script>alert("klant is NIET gewijzigd")</script>';
        }
    }

    // Test of klantcode is meegegeven in de URL
    if(isset($_GET['klantcode'])){  
        // Haal alle info van de betreffende klantcode $_GET['klantcode']
        $klantcode = $_GET['klantcode'];
        $row = getklant($klantcode);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wklantcodeth=device-wklantcodeth, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig klant</title>
</head>
<body>
  <h2>Wijzig klant</h2>
  <form method="post">
    
    <input type="hidden" klantcode="naam" name="klantcode" required value="<?php echo $row['klantcode']; ?>"><br>
    <label for="naam">naam:</label>
    <input type="text" klantcode="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <label for="type">adres:</label>
    <input type="text" klantcode="adres" name="adres" required value="<?php echo $row['adres']; ?>"><br>

    <label for="type">plaats:</label>
    <input type="text" klantcode="plaats" name="plaats" required value="<?php echo $row['plaats']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_klant.php'>Home</a>
</body>
</html>

<?php
    } else {
        "Geen klantcode opgegeven<br>";
    }
?>