document.getElementById('signInForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting the default way

    // Retrieve values from form inputs
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Basic validation (for demonstration purposes)
    if (username === '' || password === '') {
        document.getElementById('message').textContent = 'Please fill in all fields.';
        return;
    }

    // Replace with actual authentication logic
    if (username === 'admin' && password === 'password123') {
        document.getElementById('message').textContent = 'Sign-in successful!';
        document.getElementById('message').style.color = 'green';

    } else {
        document.getElementById('message').textContent = 'Invalid username or password.';
    }
});
