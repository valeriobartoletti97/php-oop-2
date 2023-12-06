<?php

include __DIR__ . '/Views/header.php';
$books = Book::fetchAll();  
?>

        <main class="mt-5 container">
            <section>
                <h2 class="text-center text-uppercase mb-4">Books</h2>
            </section>
            <div class="row">
                <?php foreach($books as $book){
                    $book->printCard($book->formatCard());
                } ?>
            </div>
        </main>
        
<?php

include __DIR__ . '/Views/footer.php'

?>