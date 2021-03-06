<?php

/**
 * タイトルを指定してヘッダーを作成する
 * @param $title
 * @return string
 */
function getHeader($title) {
  return <<<EOF
  <head>
    <meta charset="UTF-8">
    <title>SimpleMemo | {$title}</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <script defer src="../public/js/all.js"></script>
  </head>
EOF;
}