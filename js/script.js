document.addEventListener('DOMContentLoaded', () => {
    // Get references to form fields
    const firstName = document.getElementById('fn-input');
    const lastName = document.getElementById('ln-input');
    const email = document.getElementById('email-input');
    const emailVerify = document.getElementById('email-verify');
    const password = document.getElementById('password-input');
    const passwordVerify = document.getElementById('password-verify');
    const phone = document.getElementById('phone-input');
    const form = document.getElementById('registration-form');

    // Helper function to show error messages
    const showError = (input, message) => {
        let errorSpan = input.nextElementSibling;

        if (!errorSpan) {
            // Create the error span if it doesn't exist
            errorSpan = document.createElement('span');
            errorSpan.className = 'error';
            input.parentElement.appendChild(errorSpan);
        }

        errorSpan.textContent = message;
        input.classList.add('is-invalid'); // Add a red border
    };

    const clearError = (input) => {
        const errorSpan = input.nextElementSibling;
        if (errorSpan) {
            errorSpan.textContent = '';
        }
        input.classList.remove('is-invalid'); // Remove the red border
    };

    // Validation for name fields
    const validateName = (input) => {
        const value = input.value.trim();
        if (value === '') {
            showError(input, 'This field is required.');
        } else if (!/^[a-zA-Z]+$/.test(value)) {
            showError(input, 'Only alphabetical characters are allowed.');
        } else {
            clearError(input);
        }
    };

    // Validation for email fields
    const validateEmail = () => {
        const emailValue = email.value.trim();
        const emailVerifyValue = emailVerify.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}(?:\.[a-zA-Z]{2,})?$/;

        if (emailValue === '') {
            showError(email, 'Email is required.');
        } else if (!emailRegex.test(emailValue)) {
            showError(email, 'Invalid email format. Must be a valid domain (e.g., cs.dal.ca).');
        } else {
            clearError(email);
        }

        if (emailVerifyValue !== '' && emailValue !== emailVerifyValue) {
            showError(emailVerify, 'Emails do not match.');
        } else {
            clearError(emailVerify);
        }
    };

    // Validation for password fields
    const validatePassword = () => {
        const passwordValue = password.value.trim();
        const passwordVerifyValue = passwordVerify.value.trim();

        if (
            passwordValue.length < 8 ||
            !/[a-zA-Z]/.test(passwordValue) ||
            !/[0-9]/.test(passwordValue) ||
            !/[!@#$%^&*]/.test(passwordValue)
        ) {
            showError(password, 'Password must be at least 8 characters, include a letter, a number, and a special character.');
        } else {
            clearError(password);
        }

        if (passwordVerifyValue !== '' && passwordValue !== passwordVerifyValue) {
            showError(passwordVerify, 'Passwords do not match.');
        } else {
            clearError(passwordVerify);
        }
    };

    // Validation for phone field
    const validatePhone = () => {
        const phoneValue = phone.value.trim();
        if (!/^(\+\d{1,4})?\d{10}$/.test(phoneValue)) {
            showError(phone, 'Phone number must be 10 digits with or without a country code.');
        } else {
            clearError(phone);
        }
    };

    // Real-time validation
    firstName.addEventListener('input', () => validateName(firstName));
    lastName.addEventListener('input', () => validateName(lastName));
    email.addEventListener('input', validateEmail);
    emailVerify.addEventListener('input', validateEmail);
    password.addEventListener('input', validatePassword);
    passwordVerify.addEventListener('input', validatePassword);
    phone.addEventListener('input', validatePhone);

    // Prevent form submission if there are validation errors
    form.addEventListener('submit', (event) => {
        validateName(firstName);
        validateName(lastName);
        validateEmail();
        validatePassword();
        validatePhone();

        const errors = form.querySelectorAll('.error');
        if ([...errors].some((span) => span.textContent !== '')) {
            event.preventDefault(); // Prevent form submission
            alert('Please correct errors before submitting the form.');
        }
    });
});