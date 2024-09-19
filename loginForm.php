<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2>QCPL Admin Sign In</h2>
            <p>Enter your username and password</p>
            <form id="signInForm" action="loginFunction.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter Password">
                </div>
                <button type="submit">Sign In</button>
                <div id="message"></div>
            </form>
        </div>
    </div>
    

    <script>
        // Function to get the error message from the URL
        function getErrorMessage() {
            const params = new URLSearchParams(window.location.search);
            return params.get('error');
        }

        // Show the error message as a popup if it exists
        const errorMessage = getErrorMessage();
        if (errorMessage) {
            alert(errorMessage);
        }
    </script>
</body>
</html>
