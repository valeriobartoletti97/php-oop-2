<?php

include __DIR__ . '/Views/header.php'

?>

        <main class="mt-5">
            <div class="row">
                <?php foreach($movies as $movie) {
                    $movie->printCard();
                }?>
            </div>
        </main>
        
<?php

include __DIR__ . '/Views/footer.php'

?>