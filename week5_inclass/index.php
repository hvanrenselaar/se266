<?php

include __DIR__ . '/includes/functions.php';

$names = getCharacters();

?>

<ul>
    <?php foreach ($names as $n): ?>
    <li><a href="showCharacter.php?name=<?php echo $n;?>">
            <?php echo $n;?>
         </a>
    </li>
    <?php endforeach; ?>
</ul>

