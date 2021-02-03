<?php
// O isset é necessário para verificar se a chave existe dentro do array
// O '== true' é desnecessário caso se presuma que apenas valores booleanos estarão na variável, do contrário precisa comparar usando == true
// O elseif é desnecesssáiro porque os dois blocos de código são iguais
if (
    isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ||
    isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin']
  ) {
    header("Location: http://www.google.com");
    exit();
  }