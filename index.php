<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Authorization</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #011851;
            font-family: Arial, sans-serif;
        }

        #payment-authorization {
            background-color: #F56F29;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 320px;
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container input[type="number"] {
            width: 100%;
            padding: 10px 10px 10px 55px; /* Adjusted padding */
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .input-container .flag-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            height: 24px;
        }

        .input-container .pre-text {
            position: absolute;
            top: 50%;
            left: 40px; /* Positioned 3px after the flag */
            transform: translateY(-50%);
            font-size: 16px;
            color: #333;
        }

        #payment-authorization input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #011851;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #payment-authorization input[type="submit"]:hover {
            background-color: #010A2E;
        }
    </style>
</head>
<body>
    <div id="payment-authorization">
        <form action="stkpush.php" method="post">
            <div class="input-container">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Kenya.svg/2560px-Flag_of_Kenya.svg.png" alt="Kenyan Flag" class="flag-icon">
                <span class="pre-text">+</span>
                <input type="number" name="paymentPhone" placeholder="254723653922" required 
                       oninput="this.value = this.value.slice(0, 12)" max="999999999999">
            </div>
            <input type="submit" name="submit" value="Pay Now">
        </form>
    </div>
</body>
</html>