<?php
session_start();
$selected_character = filter_input(INPUT_GET, 'name');

if ($selected_character == "") {
    $selected_character = filter_input(INPUT_POST, 'characterName');
}

$_SESSION['disneyCharacter'] = $selected_character;


echo "<h2>$selected_character</h2>";


?>

<form method="post" action="showCharacter.php">
    <input type="text" name="characterName" value="<?php echo $selected_character; ?>">
    <input type="submit" value="Update Character">
</form>

<a href="otherPage.php">Do more stuff with my character</a>