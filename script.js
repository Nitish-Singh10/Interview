document.getElementById('passwordForm').addEventListener('submit', function(event) {
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorDiv = document.getElementById('error');

    if (newPassword !== confirmPassword) {
        event.preventDefault();
        errorDiv.textContent = "Passwords do not match.";
    } else {
        errorDiv.textContent = "";
    }
});
