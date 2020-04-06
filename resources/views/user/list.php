<h1>User Lists</h1>

<?php
foreach ($users as $user) {
    echo "<p>{$user['first_name']} {$user['last_name']}</p>";
}