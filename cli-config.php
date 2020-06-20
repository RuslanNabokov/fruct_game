<?php
// cli-config.php
require_once '/var/www/test2/application/bootstrap.php';


return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
