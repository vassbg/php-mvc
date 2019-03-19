<?php
namespace VS\Core;

class View {
/**
 *   Извиква стандартен изглед/и и предава данни към него
 *   Използване:
 *   Views::render(admin/index);      -> извиква файл users.php от папка admin в изгледите. Не предава данни
 *   Views::render(admin/users, $data); -> същото но предава променливите в масива $data към изгледа
 *
 *   Може да зарежда и повече от един изглед в една декларация:
 *   Views:render(array('admin/header', 'admin/index', 'admin/footer', $data));
 *
 *   @param mixed $views  - низ или масив с изгледи...
 *   @param array $data   - незадължителен асоциативен масив със стойности за предаване към изгледа
 */

  public static function render($views, $data = null) {

    if($data):
   /**
    *   Прехвърляне на стойностите от масива в променливи...
    *   ... като ключа става име на променливата!
    *   Целта е в изгледа да се използва стойността като се извика променлива, а не ключ от масив...
    *   т.е вместо $data['user'] да се използва само $user!!!
    */

      foreach($data as $key => $value):
        $$key = $value;
      endforeach;

    endif;

   /**
    *   Ако е подаден масив, т.е. повече от един изглед...
    */
    if(is_array($views)):

      foreach($views as $view):
        require VIEWS . $view . '.php';
      endforeach;

   /**
    *   Ако не е  масив, се зарежда само един изглед...
    */
    else:
      require VIEWS . $views . '.php';
    endif;
  }

   /**
    * Това го видях някъде и ми се струва страхотна идея - за бъдеща употреба
    * Renders pure JSON to the browser, useful for API construction
    * @param $data
    */
  public function renderJSON($data) {
    header("Content-Type: application/json");
    echo json_encode($data);
  }
}
