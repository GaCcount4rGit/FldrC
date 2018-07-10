<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('Repository.php');

if (isset($_POST['username']) & $_POST['username'] !== " ")
{
    $username = htmlspecialchars(trim($_POST['username']));
}

if (isset($_POST['message']) && $_POST['message'] !== " ")
{
    $message =  htmlspecialchars(trim($_POST['message']));

}else{
    die("Wrong data");
}

$repo = new Repository();

$post = new Post();
$post->username = $username;
$post->message = $message;

$repo->add($post);

header('Location: index.php'); exit();
