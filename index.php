<?php
require_once ('model.php');
require_once ('view.php');

$arr = Model::getMySQLData() + Model::getMongoData();
View::displayBarGraph($arr, "ESH Bar Chart", "Billed Entity Number", "Cost pe MB (USD)");
