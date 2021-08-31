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

#### New 'news' => الاخبار
- id
- department_id
- title
- content

#### NewMedia 'mews_medias' => مرفقات الخبر
- id
- new_id
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

#### You must not
- [helper.php](app/Helpers/helper.php) file with 2 function 
- first one [setting()] return the value for the setting name
- 2 one [upload()] use to upload .

#### how run the app
> `git clone https://github.com/msiddig93/april-newspaper.git`
> `cd april-newspaper`
> `composer install`
> `copy .env-example to .env`
> `php artisan key:generate` to generate new key
> `composer dump-autoload` to clean the cache
> `php artisan migrate --seed`
> with database seeder will create user with credential
> `email : mohamed@gmail.com`
> `password : 123456`
> now run `php artisan serve` to start the server
> access the [dashboard](127.0.0.1:8000) `127.0.0.1:8000` as the defualt host:port
