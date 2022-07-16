<?php
  require "../../common/auth.php";
  require "../../common/database.php";

  if (!isLogin()) {
    header('Location:../login/');
    exit;
  }

  $user_id = getLoginUserId();
  $databaseHander = getDatabaseConnection();

  try {
    $title = '新規メモ';
    if ($statement = $databaseHander->prepare('INSERT INTO memos (user_id, title, content) VALUE (:user_id, :title, null)') ) {
      $statement->bindValue(':user_id', $user_id);
      $statement->bindValue(':title', $title);
      $statement->execute();
    }

    $_SESSION['select_memo'] = [
      'id' => $databaseHander->lastInsertId(),
      'title' => $title,
      'content' => ''
    ];

  } catch (Throwable $e) {
    echo $e->getMessage();
    exit;
  }

  header('Location:../../memo/');
  exit;