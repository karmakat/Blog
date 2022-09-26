<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
</head>

<body>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign Up</h2>

            <div class="alert_message success">
                <p>This is an error message</p>
            </div>
            <form action="<?=ROOT_URL?>processing/signup.process.php" enctype="multipart/form-data">
                <input type="text" name="" placeholder="First Name" id="txtfirstname">
                <input type="text" name="" placeholder="Last Name" id="txtlastname">
                <input type="text" name="" placeholder="Username" id="txtusername">
                <input type="email" name="" placeholder="Email" id="txtemail">
                <input type="password" name="" placeholder="Create Password" id="txtpassword">
                <input type="password" name="" placeholder="Confirm Password" id="txtconfirm">
                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="" id="avatar">
                </div>
                <button type="submit" class="btn" id="submit">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>
</body>

</html>