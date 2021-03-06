<?php
/**
 *  PSR-4 -> Автоматично зареждане на класовете
 */
spl_autoload_register(function ($class) {

    /*
     *  Префикс на проекта
     */
    $prefix = 'VS\\';

    /*
     *  Базова директория за префикса
     *  Вземаме я от константа ROOT, дефинирана в индексния файл !!!
     */
    $base_dir = ROOT ;

    /*
     *  Проверка дали класа използва префикса в namespace-а
     */
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {

        return; //Ако не преминава към следващия регистриран Autoloader...

    }

    /*
     *  Извличане на относителното име на класа
     */
    $relative_class = substr($class, $len);


    /*
     *  Определяне на пътя до файла, като
     *  се заменя префикса в пространството от имена, с базовата директория,
     *  заменя разделителите на пространстовот от имена (\) с разделителя на директории (/)
     *  и се добавя разширението на файла (php)
     */
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';


    /*
     *  Ако съществува такъв файл го зареждаме
     */
    if (file_exists($file)) {
        require $file;
    }
});
