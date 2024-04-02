<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reizen</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 4px;
            cursor: pointer;
        }
        .btn-add {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <?php
    // Verbinding maken met de database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "reizen"; // De naam van je database, niet het SQL-bestand

    $conn = new mysqli($servername, $username, $password, $database);

    // Controleren op verbinding
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query om alle reizen op te halen
    $sql = "SELECT * FROM reizen";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>naam</th><th>adres</th><th>plaats</th><th>Actie</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["idklant"] . "</td>";
            echo "<td>" . $row["naam"] . "</td>";
            echo "<td>" . $row["adres"] . "</td>";
            echo "<td>" . $row["plaats"] . "</td>";
            echo "<td><button class='btn btn-delete' onclick='deleteReis(" . $row["idklant"] . ")'>Verwijderen</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Geen reizen gevonden.";
    }

    // Verbinding sluiten
    $conn->close();
    ?>

    <button class="btn btn-add" onclick="window.location.href='toevoegen_reis.php'">Toevoegen</button>

    <script>
        function deleteReis(id) {
            if (confirm("Weet je zeker dat je deze reis wilt verwijderen?")) {
                window.location.href = "verwijder_reis.php?id=" + id;
            }
        }
    </script>
</body>
</html>
