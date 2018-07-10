<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Гостевая книга</title>
</head>
<body>
<?php
require_once('Repository.php');
    $resource = new Repository();
    $result = $resource->getAll();
?>

    <form method="post" action="submit.php">
        <div contenteditable="true">
        <label>Имя</label><br>
        <input type="text"  name="username" required=""><br>
        <label><ol>Сообщение</ol></label><br>
        <textarea contenteditable="true" name="message" required=""></textarea><br><br>
            <button type="submit" class="btn btn-success pull-left" >Отправить</button>
        </div>
    </form>
<br><br>
<table border="1" class="table">
    <thead>
    <tr>
        <th><ol>Name:</ol></th>
        <th><ol>Date:</ol></th>
        <th><ol>Message:</ol></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $value) {
    echo '
        <tr>
        <td>' . $value->username . '</td>
        <td>' . $value->date . '</td>
        <td role="article">' . $value->message . '</td>
        </tr>'; ?>
    <?php } ?>
    </tbody>
</table>



</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
