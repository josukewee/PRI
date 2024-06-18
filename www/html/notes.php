<?php

require_once '../prolog.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';

$notes = get_all_records();
?>


<div class="container overflow-hidden text-center">
  <div class="row gy-5 mx-5" id="notes">
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function addNote(title, category, jazyk, content) {
            const list = document.getElementById("notes");

            const colDiv = document.createElement('div');
            colDiv.classList.add('col-6', 'border', 'border-warning');

            const card = document.createElement('div');
            card.classList.add('note-card', 'p-3');

            const titleDiv = document.createElement('div');
            titleDiv.classList.add('title');

            const titleLink = document.createElement('a');
            titleLink.href = `?note=${encodeURIComponent(title)}`;
            titleLink.textContent = title;
            titleLink.classList.add('hover:underline');
            titleDiv.appendChild(titleLink);

            const categoryDiv = document.createElement('div');
            categoryDiv.classList.add('category');
            categoryDiv.textContent = category;

            const contentDiv = document.createElement('div');
            contentDiv.classList.add('content');
            contentDiv.textContent = content;

            const jazykDiv = document.createElement('div');
            jazykDiv.classList.add('jazyk');
            jazykDiv.textContent = jazyk;

            card.appendChild(titleDiv);
            card.appendChild(categoryDiv);
            card.appendChild(contentDiv);
            card.appendChild(jazykDiv);

            colDiv.appendChild(card);

            if (list) {
                list.appendChild(colDiv);
            } else {
                console.error('Element with id "notes" not found.');
            }

            return colDiv;
        }

        <?php
        if (isset($_SESSION['jmeno'])) {
            $author = getJmeno();
            $query = "//note[author='$author']";
            $results = $notes->xpath($query);
            foreach ($results as $record) {
                $title = htmlspecialchars($record->title, ENT_QUOTES, 'UTF-8');
                $category = htmlspecialchars($record->content['category'], ENT_QUOTES, 'UTF-8');
                $jazyk = htmlspecialchars($record->title['jazyk'], ENT_QUOTES, 'UTF-8');
                $content = htmlspecialchars($record->content, ENT_QUOTES, 'UTF-8');
                ?>
                    addNote('<?= $title ?>', '<?= $category ?>', '<?= $jazyk ?>', '<?= $content ?>');
                <?php
            }
        }
        ?>
    });
    
</script>