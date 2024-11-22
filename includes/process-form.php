<?php
// Validate and sanitize inputs on the server-side

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form inputs
    $firstName = trim($_POST['first-name']);
    $lastName = trim($_POST['last-name']);
    $email = trim($_POST['email']);
    $emailVerify = trim($_POST['email-verify']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $passwordVerify = trim($_POST['password-verify']);
    $dob = trim($_POST['date-of-birth']);

    // Error messages array
    $errors = [];

    // Validation Functions
    function validateName($name, $fieldName) {
        global $errors;
        if (empty($name)) {
            $errors[] = "$fieldName is required.";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $name)) {
            $errors[] = "$fieldName must contain only alphabetical characters.";
        }
    }

    function validateEmail($email, $emailVerify) {
        global $errors;
        if (empty($email)) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        } elseif ($email !== $emailVerify) {
            $errors[] = "Emails do not match.";
        }
    }

    function validatePhone($phone) {
        global $errors;
        if (empty($phone)) {
            $errors[] = "Phone number is required.";
        } elseif (!preg_match("/^(\+\d{1,4})?\d{10}$/", $phone)) {
            $errors[] = "Phone number must be 10 digits with or without a country code.";
        }
    }

    function validatePassword($password, $passwordVerify) {
        global $errors;
        if (empty($password)) {
            $errors[] = "Password is required.";
        } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            $errors[] = "Password must be at least 8 characters long, contain one letter, one number, and one special character.";
        } elseif ($password !== $passwordVerify) {
            $errors[] = "Passwords do not match.";
        }
    }

    // Validate fields
    validateName($firstName, "First Name");
    validateName($lastName, "Last Name");
    validateEmail($email, $emailVerify);
    validatePhone($phone);
    validatePassword($password, $passwordVerify);

    // Sanitize inputs
    $firstName = htmlspecialchars($firstName);
    $lastName = htmlspecialchars($lastName);
    $email = htmlspecialchars($email);
    $phone = htmlspecialchars($phone);

    if (empty($errors)) {
        echo "<h3>Form submitted successfully!</h3>";
        echo "<p>Thank you, $firstName $lastName, for registering.</p>";
    } else {
        echo "<h3>Validation Errors:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }
}
?>