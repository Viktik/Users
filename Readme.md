Для вызова функций необходимо перейти в папку с контроллером. 
>controllers/user

Вызов функций происходит посредством обращения к файлу controller.phр.

При обращении к файлу необходимо также передать ***команду:***
* **emails** - показать все емейлы пользователей, которые находятся в json файле
* **emailssql** - показать все емейлы пользователей, которые находятся в базе данных
* **user** - получить информамцию о пользователе передав его емейл вторым параметром после команды user, информация из файа json
* **usersql** - получить информамцию о пользователе передав его емейл вторым параметром после команды user, информация из базы данных
#### Пример команды: ####
>php controller.php emailssqll
