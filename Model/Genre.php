<?php

class Genre
{
    public $genreName;

    public function __construct($name)
    {
        $this->genreName = $name;
    }

    public static function feìtchAll()
    {
        $genreString = file_get_contents(__DIR__ . '/genre_db.json');
        $genresList = json_decode($genreString, true);

        $genres = [];

        foreach ($genresList as $genre) {
            $genres[] = new Genre($genre);
        }
        return $genres;
    }
}
?>