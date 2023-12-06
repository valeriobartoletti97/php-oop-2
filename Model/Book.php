<?php

include_once(__DIR__ . '/Product.php');
class Book extends Product
{
    private $id;
    private $authors;
    private $categories;

    private function __construct($id, $title, $overview, $image, $authors, $categories,$price) {
        parent::__construct($image,$overview,$title, $price);
        $this->id = $id;
        $this->authors = $authors;
        $this->categories = $categories;
    }

    public function printCard(){
        $image = $this->image;
        $title = $this->title;
        $content = $this->overview;
        $authors = $this->getAuthors();
        $categories = $this->getCategories();
        $price = parent::getPrice();
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
        $rndPrice = rand(5, 100) . '€';
        $booksString = file_get_contents( __DIR__ . '/books_db.json');
        $booksList = json_decode($booksString, true);
        $books = [];

        foreach ($booksList as $item) {
            $books[] = new Book ($item['_id'], $item['title'], $item['longDescription'], $item['thumbnailUrl'], $item['authors'], $item['categories'],$rndPrice);
        }
        return $books;
    }
}

?>