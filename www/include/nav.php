<?php
require INC . '/pages.php';
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php foreach ($pages as $href => $title) { ?>
            <li class="nav-item">
              <a href="<?= $href ?>" class="nav-link">
                <?= $title ?>
              </a>
            </li>
         <?php } ?>
      </ul>
    </div>
  </div>
</nav>