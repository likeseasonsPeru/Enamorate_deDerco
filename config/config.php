
<?php
header("Content-type:text/html; charset=utf-8");
define("SLASH", "/");
define("SLASH_SUP", "../");

/*Database Configuration*/
define("HOST", "localhost");
define("DB", "eigbitco_natura");
define("USER", "eigbitco_natura");
define("PASS", 'M@:v3r!cK');

//DATOS SEND MAIL
/* define("MAIL_SECURE","ssl");
define("MAIL_HOST","mail.xxx.com");
define("MAIL_PORT","465");
define("MAIL_USER","xxxx");
define("MAIL_USER_PASS","xxxx");
define("MAIL_FROM_NAME","xxx");
define("MAIL_SUBJECT","xxx");
define("MAIL_ALTBODY","xxxxs");
define("MAIL_USER_NAME","xxxx");
 */


  $path = array(
      "controllers" => "controllers" . SLASH,
      "css" => "app/css" . SLASH,
      "img" => "app/img" . SLASH,
      "js" => "app/js" . SLASH,
      "module" => "module" . SLASH,
      "layout" => "layout" . SLASH,
      "views" => "views" . SLASH,
      "common" => "common" . SLASH,
  );
 ?>
