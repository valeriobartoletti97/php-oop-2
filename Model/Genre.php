<?php

class Genre {
    public $genreName;

    public function __construct($name){
        $this->genreName = $name;
    }
}

$genreString = file_get_contents(__DIR__ . '/genre_db.json');
$genresList = json_decode($genreString, true);

$genres = [];

foreach($genresList as $genre){
    $genres[] = new Genre($genre);
}
var_dump($genres);
?>