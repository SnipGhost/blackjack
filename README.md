## Заготовка движка для проекта

Движок реализует паттерн [MVC][wiki-mvc] с единой точкой входа index.php, так называемый, FrontController.  

Прочитать неплохой пример реализации и немного теории можно [тут][habr-mvc].

![MVC-Picture](https://hsto.org/storage2/3c9/08c/28b/3c908c28b274e91c7043e3047465288c.png)

[wiki-mvc]: https://ru.wikipedia.org/wiki/Model-View-Controller
[habr-mvc]: https://habr.com/post/150267/

### Структура репозитория:
```
./
├─── controllers         // Файлы контроллеров проекта
│    └─── ...
│
├─── css                 // Файлы стилей
│    └─── ...
│
├─── engine              // Основные файла движка
│    ├─── Controller.php    // Базовый класс контроллера
│    ├─── Exceptions.php    // Классы исключений
│    ├─── Model.php         // Базовый класс модели
│    ├─── Router.php        // Класс маршрутизатора
│    └─── View.php          // Базовый класс представления
│
├─── etc                 // Настройки и дополнительные файлы движка
│    ├─── config.php        // Константы настроек
│    ├─── error.php         // Представление страницы ошибки
│    ├─── responses.php     // Список возможных кодов ответа
│    └─── routes.php        // Сопоставление путей и контроллеров
│
├─── img                 // Файлы изображений
│    └─── ...
│
├─── js                  // Файлы javascript
│    └─── ...
│
├─── models              // Файлы моделей проекта
│    └─── ...
│
├─── templates           // Файлы html/php-шаблонов
│    └─── ...
│
├─── views               // Файлы представлений проекта
│    └─── ...
│
├─── .htaccess           // Настойки для Apache
├─── .gitignore
├─── README.md           // То, что вы сейчас читаете
└─── index.php           // Единая точка входа - FrontController

```


### Примеры

etc/routes.php
```php
return array(

    // Страница по-умолчанию
    ''     => ['MainController', 'actionIndex'],  // список классов
    'home' => ['MainController', 'actionTables'], // список всех таблиц в БД

    // Страница муляж-тестер
    'test' => ['TestController', 'actionIndex'],

    // Страница, которая всегда пятисотит
    '500'  => ['FAKE_CONTROLLER', 'actionFake'],

);
```

controllers/MainController.php
```php
include_once(ROOT.'models/MainModel.php');

class MainController extends Controller
{
    // Дополняем данный контроллер своей моделью, т.к. требуется работа с БД
    public function __construct()
    {
        $this->view = new View();
        $this->model = new MainModel();
    }

    // Регистрируем хендлер для '/' (см. etc/routes.php)
    public function actionIndex()
    {
        $data = $this->model->getData(); // Получаем данные из модели
        // Отрисовываем эти данные внутри шаблона, используя представление
        $this->view->display("default.php", "main/MainView.php", $data);
    }

    // Регистрируем хендлер для '/home/' (см. etc/routes.php)
    public function actionTables()
    {
        $data = $this->model->getTablesList();
        $this->view->display("default.php", "main/MainView.php", $data);
    }
}
```

models/MainModel.php
```php 
class MainModel extends Model
{
    // Получаем таблицу классов
    public function getData()
    {
        global $db;
        return $db->query("SELECT * FROM Классы");
    }

    // Получение списка таблиц
    public function getTablesList()
    {
        global $db;
        return $db->query("SHOW TABLES");
    }
}
```

views/main/MainView.php
```php 
<div class="box">
    <center><h2>Just example!</h2></center>
    <?php
    // В данном представлении предполагается, что data это массив строк таблицы
        if ($data) {
            // Просто выводим всё, что есть в data
            foreach ($data as $row) {
                foreach ($row as $key => $value) {
                    echo $key.' = '.$value.'<br>';
                }
                echo '<br>';
            }
        }
    ?>
</div>
```
