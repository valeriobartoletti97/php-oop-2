<?php

include(__DIR__ . '/Genre.php');
class Movie {
    public int $id;
    public string $title;
    public string $overview;
    public float $vote_average;
    public string $poster_path;

    public array $genres;

    public function __construct($id,$title,$overview,$vote_average,$poster_path, $genres) {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote_average;
        $this->poster_path = $poster_path;
        $this->genres = $genres;
    }

    public function getVote(){
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for($n = 1;$n <= 5; $n++){
            $template .= $n <= $vote ? "<i class='fa-solid fa-star'></i>" : "<i class='fa-regular fa-star'></i>";
        }
        $template .= "</p>";
        return $template;
    }

    public function formatGenre(){
        $template = "<p>";
        for($n = 1;$n < count($this->genres); $n++){
            $template .= '<span>' . $this->genres[$n]->genreName . ' | ' . '</span>';
        }
        $template .= "</p>";
        return $template;
    }

    public function printCard(){
        $image = $this->poster_path;
        $title = $this->title;
        $content = $this->overview;
        $vote = $this->getVote();
        $genre = $this->formatGenre();
        include __DIR__ . '/../Views/card.php';
    }
}

$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString,true);

$movies = [];

foreach($movieList as $movie){
    $itemGenres = [];
    for($i = 0; $i < count($movie['genre_ids']); $i++){
        $rndIndex = rand(0,count($genres) - 1);
        $genre = $genres[$rndIndex];
        $itemGenres[] = $genre;
    }
    $movies[]= new Movie($movie['id'],$movie['title'],$movie['overview'],$movie['vote_average'],$movie['poster_path'],$itemGenres);
}

?>