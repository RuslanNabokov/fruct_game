<?php
// cli-config.php
require_once '/var/www/fruct_game/application/bootstrap.php';


return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
