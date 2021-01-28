<?php
require_once '_autoload.php';

$person = new Person();
echo var_dump(Person::getByName('Yancy'));