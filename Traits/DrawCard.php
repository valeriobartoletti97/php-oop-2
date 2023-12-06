<?php

trait DrawCard{

    public function printCard($element){

        extract($element);
        include(__DIR__ . '/../Views/card.php');
    }
}

?>