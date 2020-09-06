# SimpleUserAPI

## What is?
This simpleUserAPI was created with the intent to create and list users from a database and changing the data source.

## Instructions

Start by cloning the project:

```bash
git clone git@github.com:AnaRaro/simpleUserAPI.git
```

After cloning the project run composer installation to install the required packages:

```bash
composer install
```

### Database configuration

You will need to create a database and table.
First start with configuring the database in the file .env (this file is in the root folder of your project) or .env.local (you can duplicate the .env file and change the name) if you only want to configure it locally.

Now edit the following line with your database server information:

```dotenv
DATABASE_URL=mysql://db_user:db_password@<baseurl>:3306/db_name?serverVersion=5.7
```

Once you've configured the database it's time to create the database and migrate the table:

```bash
symfony console doctrine:database:create

symfony console doctrine:migrations:execute --up 'DoctrineMigrations\Version20200904171348'
```

Now you are ready to use the API.

##### Data Source change
In order to change the data source you will only need to change the database connection.

## How to:

Here you have the requests that you can make to the API.

##### GET - Gets the list of all users
This command returns a json with the list of users.
```bash
$ curl -H 'content-type: application/json' -v -X GET http://<baseurl>:8000/api/users
```

##### POST - Creates users
This command creates the user with the specified information in the database.
```bash
$ curl -H 'content-type: application/json' -v -X POST -d '{"username":"tester","fullname":"Tester", "email":"test@test.com"}' http://<baseurl>:8000/api/user/new
```

##Documentation
You can check the documentation for the API in:
```
http://<baseurl>:8000/api/doc.json
```