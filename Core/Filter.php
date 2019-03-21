<?php
namespace VS\Core;

/**
 *  КЛАС ЗА ЗАДАВАНЕ НА ФИЛТРИ
 */
class Filter {
    /**
    * XSS filter
    *
    * Този филтър очаква стойност, проверява дали е текстов низ (string) и заменя script tags с htmlspecialchars...
    *
    * '&' (ampersand) става '&amp;'
    * '"' (double quote) става '&quot;' when ENT_NOQUOTES is not set.
    * "'" (single quote) става '&#039;' (или &apos;) когато е зададен ENT_QUOTES
    * '<' (less than) става '&lt;'
    * '>' (greater than) става '&gt;'
    *
    * @see http://www.php.net/manual/en/function.htmlspecialchars.php
    *
    *
    * @static
    * Методът използва референция към подадената променлива, така че се използва така:
    * Filter::XSS($myString);
    *
    * @param $value     - текстов низ (string) за филтриране
    * @return mixed     - същия низ но заменен с htmlspecialchars
    */
    public static function XSS(&$value)
    {
        if (is_string($value)) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $value;
    }
}
