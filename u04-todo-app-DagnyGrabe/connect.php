<?php

$db = new PDO('mysql:host=localhost;dbname=todo', 'root', '');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


?>