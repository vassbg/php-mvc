<?php
namespace VS\Core;

class Redirect {
/**
 *  Пренасочване към зададена страница
 *  @param string $path  -  Пътят за пренасочване
 */
  public static function to($path) {
    $path = URL . $path;
    header("Location: $path");
  }
}
