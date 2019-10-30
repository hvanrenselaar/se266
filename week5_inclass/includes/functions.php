<?php

function getCharacters ()
{
    $characters = array ("Mickey Mouse", "Donald Duck", "Pluto");
    
    return ($characters);
}

$names = getCharacters();
var_dump ($names);

?>