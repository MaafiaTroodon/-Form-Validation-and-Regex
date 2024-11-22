<?php
/* 
 * CSCI 2170: Intro to Server-Side Scripting (Fall 2024)
 *
 * Starting code for Lab 5
 */
?>
<?php require_once "layout/header.php"; ?>

<aside class="featured-text">
    <h2>Register to use this site!</h2>
</aside>

<main class="pg-main-content">
<form id="registration-form" action="includes/process-form.php" method="post">
        <div class="form-group">
            <label for="fn-input">First Name</label>
            <input type="text" name="first-name" id="fn-input" required>
        </div>
        <div class="form-group">
            <label for="ln-input">Last Name</label>
            <input type="text" name="last-name" id="ln-input" required>
        </div>
        <div class="form-group">
            <label for="email-input">Email</label>
            <input type="email" name="email" id="email-input" required>
        </div>
        <div class="form-group">
            <label for="email-verify">Email, again</label>
            <input type="text" name="email-verify" id="email-verify" required>
        </div>
        <div class="form-group">
            <label for="password-input">Password</label>
            <input type="password" name="password" id="password-input" required>
        </div>
        <div class="form-group">
            <label for="password-verify">Password, again</label>
            <input type="password" name="password-verify" id="password-verify" required>
        </div>
        <div class="form-group">
            <label for="dob-input">Date of Birth</label>
            <input type="date" value="<?php echo date("Y-m-d") ?>" name="date-of-birth" id="dob-input">
        </div>
        <div class="form-group">
            <label for="phone-input">Phone Number</label>
            <input type="tel" name="phone" id="phone-input" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" name="submit">
            <input type="reset" value="Clear form" name="clear">
        </div>
    </form>
</main>

<?php require_once "layout/footer.php"; ?>