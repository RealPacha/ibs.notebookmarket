<?

\Bitrix\Main\Loader::registerAutoLoadClasses('ibs.notebookMarket',
    [
        '\Ibs\NotebookMarket\NotebookTable' => 'lib/notebook.php'
    ]
);


/*
CModule::AddAutoloadClasses(
    '', // не указываем имя модуля
    array(
       // ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
            'NotebookTable' => 'lib/notebook.php',

            )
        );*/
?>