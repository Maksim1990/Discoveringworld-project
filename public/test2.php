<?php
session_start();

include '../public/functions.php';

$_SESSION['admin'] = true;

setFlash('success', [
    'type' => 'success',
    'title' => 'Поздравляю!!!!',
    'message' => 'Вот вы и залогинились'
]);

header('Location: /');