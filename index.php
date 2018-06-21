<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 2018-06-21
 * Time: 5:39 PM
 */

class Interview
{
    public static $title = 'Interview test'; #need to change the title to static, since you have the double ::
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
    array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
    array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
    array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
    array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
    array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);
if (isset($_POST["person"])) {
    array_push($people, $_POST['person']);
}#need to add one entry to people

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interview test</title>
    <style>
        body {font: normal 14px/1.5 sans-serif;}
    </style>
</head>
<body>

<h1><?=Interview::$title;?></h1> <!-- need to make it static-->

<?php
// Print 10 times
for ($i=10; $i>0; $i--) { // INCORRECT LOOP:  Must decrement and exit condition used wrong comparative sign
    echo '<p>'.$lipsum.'</p>'; //change pluses to periods (proper concatenation)
}
?>


<hr>


<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>">
    <p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
    <p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
    <p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
    <p><input type="submit" value="Submit" /></p>
</form>

<?php foreach ($people as $person): ?> <!-- ITS AN ARRAY SO IT NEEDS A FOREACH LOOP -->
    <p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
<?php endforeach; ?>


<hr>


<table>
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($people as $person): ?>
        <tr>
            <td><?=$person['first_name'];?></td><!-- changed to array from attempting to access a class' variable -->
            <td><?=$person['last_name'];?></td><!-- changed to array from attempting to access a class' variable -->
            <td><?=$person['email'];?></td><!-- changed to array from attempting to access a class' variable -->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>