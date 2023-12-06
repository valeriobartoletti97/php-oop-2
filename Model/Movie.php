<?php

include(__DIR__ . '/Genre.php');
include_once(__DIR__ . '/Product.php');

class Movie extends Product
{
    private int $id;
    private float $vote_average;
    private array $genres;

    public function __construct($id, $title, $overview, $vote_average, $image, $genres, $price)
    {
        parent::__construct($image, $overview, $title, $price);
        $this->id = $id;
        $this->vote_average = $vote_average;
        $this->genres = $genres;
    }

    private function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? "<i class='fa-solid fa-star'></i>" : "<i class='fa-regular fa-star'></i>";
        }
        $template .= "</p>";
        return $template;
    }

    private function formatGenre()
    {
        $template = "<p>";
        for ($n = 1; $n < count($this->genres); $n++) {
            $template .= '<span>' . $this->genres[$n]->genreName . ' ' . '</span>';
        }
        $template .= "</p>";
        return $template;
    }

    public function printCard()
    {
        $image = $this->image;
        $title = $this->title;
        $content = $this->overview;
        $vote = $this->getVote();
        $genre = $this->formatGenre();
        $price = parent::getPrice();
        include __DIR__ . '/../Views/card.php';
    }

    public static function fetchAll()
    {
        $genres = Genre::feìtchAll();
        $movieString = file_get_contents(__DIR__ . '/movie_db.json');
        $movieList = json_decode($movieString, true);

        $movies = [];

        foreach ($movieList as $movie) {
            $rndPrice = rand(5, 100) . '€';
            $itemGenres = [];
            while (count($itemGenres) < count($movie['genre_ids'])) {
                $rndIndex = rand(0, count($genres) - 1);
                $genre = $genres[$rndIndex];
                if (!in_array($genre, $itemGenres)) {
                    $itemGenres[] = $genre;
                }
            }
            $movies[] = new Movie($movie['id'], $movie['title'], $movie['overview'], $movie['vote_average'], $movie['poster_path'], $itemGenres,$rndPrice);
        }
        return $movies;
    }
}

?>