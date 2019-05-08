<?php
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);
  error_reporting(E_ALL);

  if(!isset($_SESSION))
  {
      session_start();
  }
  require __DIR__.'/vendor/autoload.php';
  use Kreait\Firebase\Factory;
  use Kreait\Firebase\ServiceAccount;

  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
  $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)
      ->create();
  $database = $firebase->getDatabase();

  //echo'<pre>';
  //var_dump($database);

  function alertRedirect($redirectpagename, $msg) {
      echo "<script type='text/javascript'>
        alert('$msg');
      </script>";

      echo "<script>
        setTimeout(function(){window.location.replace('$redirectpagename')},1500);
      </script>";
  }

  $updateFirebase = function($emailwComma, $userInfo, $responseArr) {
      $userTree = '/users'.'/'.$emailwComma;
      global $serviceAccount, $firebase, $database;
      $toSend = $userInfo;
        //echo gettype($database);
      foreach ($responseArr as $key => $value) {
          if($key != 'password2' && $key != 'subscribe') {
              $toSend[$key] = $value;
          }
          else{
            continue;
          }
      }
      $database->getReference($userTree)
        ->update($toSend);
  };
?>
