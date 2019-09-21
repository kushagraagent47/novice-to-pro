<?php
include 'include.php';
session_start();
if (isset($_POST['search'])) {
    $Name = $_POST['search'];
    $Query = "SELECT * FROM questions WHERE question LIKE '%$Name%' LIMIT 5";
    $ExecQuery = MySQLi_query($conn, $Query);
    echo '
    <ul>
       ';
    //Fetching result from database.
    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        ?>
        <!-- Creating unordered list items.
                    Calling javascript function named as "fill" found in "script.js" file.
                    By passing fetched result as parameter. -->
        <li onclick='fill("<?php echo $Result['question']; ?>")'>
            <a>
                <!-- Assigning searched result in "Search box" in "search.php" file. -->
           <a <?php echo ' href="answer.php?question=' . $Result['question'] .  '&asked_by=' . $Result['asked_by']  . '&ques_id=' . $Result['ques_id'] . '">' ?>   <b><font color="#FFFFFF">  <?php echo $Result['question']; ?></font></b>
        </li></a>
        <!-- Below php code is just for closing parenthesis. Don't be confused. -->
    <?php
}
}
?>
</ul>