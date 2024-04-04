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

    // Test of id is meegegeven in de URL
    if(isset($_GET['id'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        $row = getklant($id);
    }
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig klant</title>
</head>
<body>
  <h2>Wijzig klant</h2>
  <form method="post">
    
    <input type="hidden" id="id" name="id" required value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>"><br>

    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required value="<?php echo isset($row['naam']) ? $row['naam'] : ''; ?>"><br>

    <label for="adres">Adres:</label>
    <input type="text" id="adres" name="adres" required value="<?php echo isset($row['adres']) ? $row['adres'] : ''; ?>"><br>

    <label for="postcode">Postcode:</label>
    <input type="number" id="postcode" name="postcode" required value="<?php echo isset($row['postcode']) ? $row['postcode'] : ''; ?>"><br>

    <label for="plaats">Plaats:</label>
    <input type="text" id="plaats" name="plaats" required value="<?php echo isset($row['plaats']) ? $row['plaats'] : ''; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_klant.php'>Home</a>
</body>
</html>
