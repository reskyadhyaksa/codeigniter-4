function confirmDelete() {
    if (confirm('Are you sure you want to delete this user?')) {
        // Submit the form
        document.forms[0].submit(); // Assuming there's only one form, adjust if needed
    } else {
        // Do nothing or handle cancellation
    }
}