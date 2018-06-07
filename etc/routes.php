<?php

return array(

    // Страница по-умолчанию
    '' => ['MainController', 'actionIndex'],

    // Отображает список таблиц в БД
    'tables' => ['MainController', 'actionTables'],

    // Скрипт загрузки excel-документов на сервер
    'upload' => ['MainController', 'actionUpload'],

    // Страница регистрации пользователя
    'reg' => ['RegController', 'actionReg'],

    // Страница ОПИ (оценка потенциала избираемости)
    'opi' => ['OpiController', 'actionOpi'],

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
