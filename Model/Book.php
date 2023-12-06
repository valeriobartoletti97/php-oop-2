<?php

class Book {
    private $id;
    private $title;
    private $overview;
    private $image;
    private $authors;
    private $categories;

    private $price;

    private function __construct($id, $title, $overview, $image, $authors, $categories,) {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->image = $image;
        $this->authors = $authors;
        $this->categories = $categories;
    }

    public function printCard(){
        $image = $this->image;
        $title = $this->title;
        $content = $this->overview;
        $authors = $this->getAuthors();
        $categories = $this->getCategories();
        $price = $this->getPrice();
        include __DIR__ . '/../Views/book_card.php';
    }

    public function getPrice(){
        $rndPrice = rand(5,100). '€';
        return $rndPrice;
    }

    private function getAuthors(){

        $template = "<span>";
        foreach ($this->authors as $author) {
            $template .= $author . ' , ';
        }
        $template .= "</span>";
        return $template;
    }
    private function getCategories(){

        $template = "<span>";
        foreach ($this->categories as $item) {
            $template .= $item . ' ';
        }
        $template .= "</span>";
        return $template;
    }
    public static function fetchAll() {

        $booksString = file_get_contents( __DIR__ . '/books_db.json');
        $booksList = json_decode($booksString, true);
        $books = [];

        foreach ($booksList as $item) {
            $books[] = new Book ($item['_id'], $item['title'], $item['longDescription'], $item['thumbnailUrl'], $item['authors'], $item['categories'],);
        }
        return $books;
    }
}

?>