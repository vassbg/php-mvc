<?php
namespace VS\Core;

class Session {

  public static function init() {
    if (session_status() == PHP_SESSION_NONE):
        session_start();
    endif;
  }

  public static function getVar($var) {
    if (isset($_SESSION[$var])):
        return $_SESSION[$var];
    else:
        return false;
    endif;
  }

  public static function setVar($var, $val) {
      $_SESSION[$var] = $val;
      return true;
  }

  public static function unsetVar($var) {
    unset($_SESSION[$var]);
    return true;
  }
}
