<?php

include __DIR__ . '/Views/header.php';
$movies = Movie::fetchAll();
?>

        <main class="mt-5 container">
            <section>
                <h2 class="text-center text-uppercase mb-4">Movies</h2>
            </section>
            <div class="row">
                <?php foreach($movies as $movie) {
                    $movie->printCard();
                }?>
            </div>
        </main>
        
<?php

include __DIR__ . '/Views/footer.php'

?>