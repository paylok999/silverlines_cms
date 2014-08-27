##Silverline CMS Package

This tutorial will help you install this package onto Laravel Frameworks
This tutorial assume that you have a good idea how composer works
This package is not limited on laravel frameworks only, you may install this
on any frameworks as long as php version is high 5.3 >=



#Required Method - For intermediate to advance composer user
##Laravel Installation
____________

1. Install a fresh copy of laravel

		composer create-project laravel/laravel silverline
    
2. Chmod app/storage to 777 recursively.

		chmod -R 777 app/storage
		
##Require the Silverline Packages
edit the composer.json and add the following additional packages in the "require" field

"silverlines/cms": "dev-master"

add the repository url of the Silverline CMS Package repo

	"repositories": [
		{
		"type": "vcs",
		"url": "git@github.com:paylok999/silverlines_cms.git"
		}
	]
	
Install the packages

    composer update
	
Import homestead.sql into your database engine

Mysql Username and Password
	
	Since this is a package and do not depend entirely on frameworks(you can install this on any framework as long as phpversion is high), please change your mysql database(phpmyadmin) access to
	
	host: localhost
	dbname: homestead
	username: root
	password: secret
	
or you may refer to this for database authentication
https://github.com/paylok999/silverlines_cms/blob/master/src/Silverlines/CMS/DataAccessObject/MySqlUsersDao.php#L14

##Injecting the Class
____________

	Bind the Interface into Laravel IoC Container
	
	App::bind('Silverlines\CMS\Repositories\UsersRepositoryInterface', 'Silverlines\CMS\Repositories\UsersRepository');
	App::bind('Silverlines\CMS\DataAccessObject\UsersDaoInterface', 'Silverlines\CMS\DataAccessObject\MySqlUsersDao');
	
	where UsersRepository and MysqlUserDao would be be our default classes.
	change it if you need to implements database engine such as MongoDB. just implements UsersDaoInterface and create your own Mongo Queries
	
	Then you may inject it into our constructor
	
	use Silverlines\CMS\Users;
	
	public function __construct(Users $users)
	{
		$this->users = $users;
	}
	
	or you may do it this way if you are tired to use "use"
	
	public function __construct(Silverlines\CMS\Users $users)
	{
		$this->users = $users;
	}
	
	and implements the methods on your desire controller
	
	$this->users->showUser($id) - will output single users depending on ID
	$this->users->showAllUsers() - will output all users
	$this->users->createUser(data = array()) - will create user. $data would be the data of the user we will insert. POST Method is required
	$this->users->updateUser(data = array()) - will update user. $data would be the data of the user we will update. POST Method is required
	$this->users->deleteUser($id) - will delete single users depending on ID. can delete multiple users by using foreach on our business logics
	
	you may delete multiple Users by using foreach loop into your business logic
	
	foreach($users as $user){
		$this->users->deleteUser($user->id)
	}
	
#Alternative method
You may clone and issue "composer install" to this repo if you want a working copy
https://github.com/paylok999/silverlines_laravel_cms
you will not needing any more settings after cloning it. just be sure to issue "composer install" on you root directory
	