<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Silverlines\CMS\Users;
use Silverlines\CMS\Repositories\UsersRepository;
use Silverlines\CMS\DataAccessObject\MySqlUsersDao;

$users = new Users(new UsersRepository(new MySqlUsersDao));
//var_dump($users->showAllUsers());

$data = array(
	'id' => 1,
	'firstname' => 'ray',
	'lastname' => 'tanute',
	'address' => 'test address',
	'suburb' => 'ray',
	'postcode' => 'ray',
	'contact' => 'ray',
	'email' => 'ray',
	'notes' => 'ray',
	'username' => 'rayjohn91',
	'password' => 'password',
);

//var_dump($users->updateUser($data));
var_dump($users->showUser(2));
var_dump($users->deleteUser(2));