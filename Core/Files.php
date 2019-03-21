<?php
namespace VS\Core;

class Files {
    private static $filesRoot = URL_SUB_FOLDER . URL_PUBLIC_FOLDER . "/uploads/";

    public static function view($folder = false)
    {
        if(!$folder) $folder = self::$filesRoot;
        $files = array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . "/" . $folder), array('..', '.'));

        return $files;
    }

}
