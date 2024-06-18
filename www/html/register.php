<?php // přihlášení uživatele
require '../prolog.php';
require INC . '/db.php';


switch (@$_POST['akce']) {
    case 'login':
        $jmeno = @$_POST['jmeno'];
        $heslo = @$_POST['heslo'];

        // Check if the user already exists
        $result = dbQuery("SELECT * FROM uzivatele WHERE jmeno = ? AND heslo = ?", [$jmeno, $heslo]);
        if ($result->num_rows > 0) {
            echo '<div class="alert alert-success mt-3">User already exists</div>';
        } else {
            // If the user does not exist, create a new one
            create_uzivatel($jmeno, $heslo); // Assuming create_uzivatel function handles insertion
            echo '<div class="alert alert-success mt-3">User created successfully</div>';
        }
        break;

    case 'logout':
        setJmeno();
        echo '<div class="alert alert-success mt-3">Logged out successfully</div>';
        break;
}
?>

<div class="mb-3">
    <form method="POST">

        <div class="mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="inputUsername" name="jmeno" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="heslo" placeholder="Password" required>
        </div>
        <input type="hidden" name="akce" value="login">
        <button type="submit" class="btn btn-primary">Submit</button>


    </form>
</div>