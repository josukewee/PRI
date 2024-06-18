<?php // úvodní stránka:
require '../prolog.php';
require INC . '/nav.php';
?>

<style>
    .custom-margin {
        margin-left: 40%;
        margin-right: 40%;
    }

    .custom-margin-text{
        margin-left: 30%;
        margin-right: 30%;
    }
</style>


<div class="position-relative">
    <div class="border border-5 border-primary rounded custom-margin">
        <h1 class="row justify-content-center align-items-center my-5">
            Hi there!
        </h1>
        <div class="d-flex justify-content-center align-items-center my-4">
            <button type="button" class="btn btn-primary mx-2 btn-lg">
                <a href="/login.php" class="text-white text-decoration-none " >
                    Sign in
                </a>
            </button>
            <button type="button" class="btn btn-secondary mx-2 btn-lg">
                <a href="/register.php" class="text-white text-decoration-none">
                    Sign up
                </a>
            </button>
        </div>
        <h4 class=" text-center d-flex justify-content-center align-items-center my-4 custom-margin-text">
            You have to sign in or sign up before reading or making new notes!
        </h4>
    </div>
    <div class="d-flex justify-content-center">
        <h2 class="text-center mx-5">
            Notes are essential tools for capturing, organizing, and recalling information. Whether for academic purposes, professional tasks, or personal reflections, notes help individuals retain and process knowledge effectively. The act of note-taking serves not only as a means of recording information but also as a method of reinforcing learning and enhancing memory retention.
        </h2>
    </div>
</div>