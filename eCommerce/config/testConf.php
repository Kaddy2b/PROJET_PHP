<?php
  // On inclut les fichiers de classe PHP avec require_once
  // pour éviter qu'ils soient inclus plusieurs fois
  require_once 'Conf.php';

  // On affiche le login de la base de donnees
  echo "login : "; echo Conf::getLogin(); echo "<br>";
  echo "Hostname : "; echo Conf::getHostname(); echo "<br>";
  echo "Database : "; echo Conf::getDatabase(); echo "<br>";
  echo "pwd : "; echo Conf::getPassword();
?>