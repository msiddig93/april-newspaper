# April Newspaper

#### Table :-

#### User 'users' :-
- id
- name
- email
- password
  
#### Writer 'writers' => الكُتاب
- id
- name
- email
- phone
- about
- facebook
- twitter
- birthdate 

#### Department 'departments' => أقسام الموقع/الاخبار
- id
- name
- logo

#### Articale 'articales' => الاخبار
- id
- department_id
- writer_id
- title
- content
- archived
- archived_at
- publish_at
- views
- likes

#### ArticaleMedia 'articale_media' => مرفقات الخبر
- id
- articale_id
- type => [ image || video ]
- path

#### Comment 'comments'
- id
- comment
- new_id
- guest_name
- guest_email

#### Setting 'settings'
- id
- name
- value

#### You must know
- [helper.php](app/Helpers/helper.php) file with 2 function 
- first one [setting()] return the value for the setting name
- 2 one [upload()] use to upload .

#### how run the app
1. > `git clone https://github.com/msiddig93/april-newspaper.git`
1. > `cd april-newspaper`
1. > `composer install`
1. > `copy .env-example to .env`
1. > `php artisan key:generate` to generate new key
1. > `composer dump-autoload` to clean the cache
1. > `php artisan migrate --seed`
1. > with database seeder will create user with credential
1. > `email : mohamed@gmail.com`
1. > `password : 123456`
1. > now run `php artisan serve` to start the server
1. > access the [dashboard](http://127.0.0.1:8000/dashboard) `127.0.0.1:8000/dashboard` as the defualt host:port
