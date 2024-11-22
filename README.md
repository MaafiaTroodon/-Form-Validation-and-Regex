# CSCI 2170: Intro to Server-Side Scripting

**_Lab 5 - Regular Expressions and Form Validation_**

## Student Information

- **Name**: Malhar Mahajan
- **Student ID**: B00934337
- **Date Created**: 21 November 2024

## Overview

In this lab, the primary focus was to implement client-side and server-side validation using Regular Expressions (Regex). The HTML form was structured to collect user inputs, including First Name, Last Name, Email, Phone Number, Password, and Date of Birth. Client-side validation was implemented using JavaScript to ensure that inputs meet specific criteria before submission. Regex patterns were used to validate fields like email structure, phone numbers, and password strength in real time, providing immediate feedback to users.

Server-side validation was implemented in PHP to double-check the inputs for correctness and security. Each field was validated to ensure compliance with the lab requirements, such as matching email fields, validating phone numbers (with optional country codes), and ensuring that passwords meet the specified complexity. Sanitization techniques, like `htmlspecialchars()`, were also applied to prevent malicious input.

Testing was carried out extensively to validate different scenarios, including invalid names, mismatched email fields, weak passwords, and improperly formatted phone numbers. The form prevents submission until all errors are resolved, ensuring a seamless and secure user experience. TAs/markers can test the application by attempting to bypass client-side validation, using invalid inputs, or leaving fields empty to observe both real-time feedback and server-side validation.

## Advantages of Using Regex for Validation

Regex is highly effective for form validation due to its flexibility and precision. It allows you to define patterns for inputs like email addresses, phone numbers, and passwords with high accuracy. Regex simplifies validation logic, making it easy to enforce rules such as checking for special characters, digits, or specific formats in a single line of code. Additionally, regex enhances security by ensuring that only expected input formats are allowed, reducing the risk of injecting malicious content. Its efficiency makes it ideal for both client-side and server-side validations.

## Citations

1. [PHP Manual - Regular Expressions](https://www.php.net/manual/en/book.pcre.php)
2. [JavaScript Regex Documentation](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions)
3. [W3Schools - Form Validation](https://www.w3schools.com/js/js_validation.asp)
4. Class discussions and lab material
