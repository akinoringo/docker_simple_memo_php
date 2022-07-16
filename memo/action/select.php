<?php
  require '../../common/auth.php';
  require '../../common/database.php';

  if (!isLogin()) {
    header('location:../login');
    exit;
  }

  $id = $_GET['id'];
  $user_id = getLoginUserId();

  $databaseHandler = getDatabaseConnection();
  if ($statement = $databaseHandler->prepare('SELECT id, title, content FROM memos WHERE id = :id AND user_id = :user_id')) {
    $statement->bindParam(':id', $id);
    $statement->bindParam(':user_id', $user_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
  }

  $_SESSION['select_memo'] = [
    'id' => $result['id'],
    'title' => $result['title'],
    'content' => $result['content'],
  ];

  header('location:../../memo/');
  exit;
