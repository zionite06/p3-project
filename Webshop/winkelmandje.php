<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            image-resolution: 2040px;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        #shoeContainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .shoe {
            width: 200px;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .addToCart {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    
    <nav>
        <a href="Index.html">Home</a>
        <a href="#">Portfolio</a>
        <a href="WinkelMandje.html">winkelmandje</a>

    </nav>

    <header>
        <h1>Welkom bij onze winkel!</h1>
    </header>
    <div id="shoeContainer">
        <div class="shoe">
            <h2>Schoen 1</h2>
            <p>Prijs: $50</p>
            <button class="addToCart" onclick="addToCart('Schoen 1', 50)">Toevoegen aan winkelmandje</button>
        </div>
        <div class="shoe">
            <h2>Schoen 2</h2>
            <p>Prijs: $60</p>
            <button class="addToCart" onclick="addToCart('Schoen 2', 60)">Toevoegen aan winkelmandje</button>
        </div>
        <!-- Voeg meer schoenen toe zoals hierboven -->
    </div>
    <footer>
        <h2>Winkelmandje</h2>
        <ul id="cartItems">
            <!-- Hier worden toegevoegde items weergegeven -->
        </ul>
        <button onclick="checkout()">Afrekenen</button>
    </footer>

    <script>
        let cart = [];

        function addToCart(itemName, itemPrice) {
            cart.push({name: itemName, price: itemPrice});
            updateCart();
        }

        function updateCart() {
            let cartItems = document.getElementById('cartItems');
            cartItems.innerHTML = '';
            let totalPrice = 0;
            cart.forEach(item => {
                let li = document.createElement('li');
                li.textContent = `${item.name} - $${item.price}`;
                cartItems.appendChild(li);
                totalPrice += item.price;
            });
            // Toon totale prijs
            cartItems.innerHTML += `<li><strong>Totaal: $${totalPrice.toFixed(2)}</strong></li>`;
        }

        function checkout() {
            alert('Bedankt voor uw aankoop!');
            cart = [];
            updateCart();
        }
    </script>
</body>
</html>
