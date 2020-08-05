<?php

require_once '../../config/database.php';

$pdo = new PDO(DSN, USERNAME, PASSWORD);
$stmh = $pdo->prepare('SELECT * FROM common.todos');
$stmh->execute();

$todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
// var_dump($todo_list);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOリスト</title>
</head>
<body>
    <div>
        <?php if($todo_list): ?>
        <ul>
            <?php foreach($todo_list as $todo): ?>
                <li>
                    <a href="./detail.php?todo_id=<?php echo $todo['id']; ?>">
                        <?php echo $todo['title']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <div>データなし</div>
        <?php endif; ?>
    </div>
</body>
</html>