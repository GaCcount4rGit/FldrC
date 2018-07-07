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
<body style="text-align: center; margin-top: 20px;">
<?php
require_once('Repository.php');
    $resource = new Repository();
    $result = $resource->getAll();
?><form method="post" action="submit.php" enctype="application/x-www-form-urlencoded">
    <div class="input-group mb-3">
        <tr>
        <label>Имя</label><br>
        <input type="text" class="form-control" name="username" required="">

    <div class="input-group">
        <label>Сообщение</label><br>
        <textarea contenteditable="true" name="message" required=""></textarea><br>
        <button type="submit" class="btn btn-success pull-left" >Отправить</button> <br>
    </div>
    </div>
    </tr>
</form>
<table border="1" class="table">
    <thead>
    <th>Name:</th>
    <th>Date:</th>
    <th>Message:</th>
    </thead>
    <tbody>
    <?php foreach ($result as $value) {
    echo '
        <tr>
        <td><li role="presentation">' . $value->username . '</li></td>
        <td><li role="presentation">' . $value->date . '</li></td>
        <td role="article">' . $value->message . '</td>
        </tr>'; ?>
    <?php } ?>
    </tbody>
</table>



</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
