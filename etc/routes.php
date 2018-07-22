<?php

return array(

    // Страница по-умолчанию
    '' => ['MainController', 'actionIndex'],
    
    // Нижний блок
    'about_team' => ['PageController', 'actionAboutTeam'],      // О команде
    'partners' => ['PageController', 'actionPartners'],         // Партнёры
    'support' => ['PageController', 'actionSupport'],           // Поддержка

    // Отображает список таблиц в БД
    'tables' => ['MainController', 'actionTables'],

    // Скрипт загрузки excel-документов на сервер
    'upload' => ['CabController', 'actionUpload'],

    // Страница регистрации пользователя
    'reg' => ['RegController', 'actionReg'],
    
    // Страница изменения пароля
    'cab/chgpass' => ['RegController', 'actionChangePassMain'],
    
    // Страница изменения Email
    'cab/chgemail' => ['RegController', 'actionChangeEmailMain'],
    
    // Страницы offers блоков 
    'opi'      => ['PageController', 'actionOpi'],     // Оценка потенциала избираемости
    'opi/calc' => ['PageController', 'actionOpiCalc'], // Обработка данных формы ОПИ
    'rem'      => ['PageController', 'actionRem'],     // Репутационный менеджмент
    'kit'      => ['PageController', 'actionKit'],     // Репутационный менеджмент
    'activation'=>['RegController','actionActiv'],
    'reestablish' =>['RegController','actionReestablish'],
    // Страница личного кабинета
    'cab' => ['RegController', 'actionCab'],

    // Страницы тестирования сокращений из DBConnection
    'db'            => ['DBController', 'actionIndex'],
    'db/insert'     => ['DBController', 'actionInsert'],
    'db/insertmany' => ['DBController', 'actionInsertMany'],
    'db/select'     => ['DBController', 'actionSelect'],
    'db/update'     => ['DBController', 'actionUpdate'],
    'db/delete'     => ['DBController', 'actionDelete'],
    'db/truncate'   => ['DBController', 'actionTruncate'],

    // Страница, которая всегда пятисотит
    '500' => ['FAKE_CONTROLLER', 'actionFake'],
    
);
