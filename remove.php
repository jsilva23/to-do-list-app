<?php

require 'dbase.php';

removeTask($conection, $_GET['id']);

header('Location: todo.php');
