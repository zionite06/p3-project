<?php
    // functie: formulier en database insert klant
    // auteur: zion

    echo "<h1>Insert klant</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertklant($_POST) == true){
            echo "<script>alert('klant is toegevoegd')</script>";
        } else {
            echo '<script>alert("klant is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="naam">naam:</label>
        <input type="text" klantcode="naam" name="naam" required><br>

        <label for="type">adres:</label>
        <input type="text" klantcode="adres" name="adres" required><br>

        <label for="type">plaats:</label>
        <input type="text" klantcode="plaats" name="plaats" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='crud_klant.php'>Home</a>
    </body>
</html>
