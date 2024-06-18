<?php // přihlášení uživatele
require '../prolog.php';
require INC . '/db.php';


switch (@$_POST['akce']) {
    case 'login':
        if (authUser($jmeno = @$_POST['jmeno'], @$_POST['heslo'])){
            setJmeno($jmeno);
            echo '<div class="alert alert-success mt-3">Login successful!</div>';
        }
        else {
            echo '<div class="alert alert-danger mt-3">Incorrect login or password</div>';
        };
        break;

    case 'logout':
        setJmeno();
        break;
}

require INC . '/nav.php';
?>

<script>
    function onSubmit(e) {
        e.preventDefault()
        this.submit()
    }

    document.loginForm.addEventListener('submit', onSubmit)
</script>

<div class="mb-3">
    <form name="loginForm" method="POST">
        <?php if (!isUser()) { ?>
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
        <?php } else { ?>
        <input type="hidden" name="akce" value="logout">
        <button type="submit" class="btn btn-danger">Logout</button>
        <?php }?>

    </form>


    <?php if (isUser()) { ?>
    <script>
        alert("You are logged in");
        
    </script>
    <?php } ?>
</div>