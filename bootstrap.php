<?php
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'controllers/word.php';

$query = new QueryBuilder(Connection::make());