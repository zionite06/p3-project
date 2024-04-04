<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    // functie: Programma CRUD klanten
    // auteur: zion   

    // Initialisatie
    include 'functions.php';
    
    // Main
    // Aanroep functie 
    if (isset($_POST['btn_ins'])) {
        $post = [
            'naam' => $_POST['naam'],
            'adres' => $_POST['adres'],
            'postcode' => $_POST['postcode'],
            'plaats' => $_POST['plaats']
        ];
        insertklant($post);
    }

    if (isset($_POST['btn_del'])) {
        $id = $_POST['id'];
        deleteklant($id);
    }

    crudklant();
    ?>

    <form method="post">

        <label for="naam">naam:</label>
        <input type="text" id="naam" name="naam" required><br>

        <label for="adres">adres:</label>
        <input type="text" id="adres" name="adres" required><br>

        <label for="postcode">postcode:</label>
        <input type="number" id="postcode" name="postcode" required><br>

        <label for="plaats">plaats:</label>
        <input type="text" id="plaats" name="plaats" required><br>

        <input type="submit" name="btn_ins" value="Insert">
    </form>

    <!-- Delete form -->
    <form method="post">
        <label for="id">ID te verwijderen klant:</label>
        <input type="number" id="id" name="id" required>
        <input type="submit" name="btn_del" value="Verwijder">
    </form>

</body>
</html>
