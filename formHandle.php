<html>
<body>
<?php
  if(!isset($_SESSION))
  {
      session_start();
  }
  require __DIR__.'/vendor/autoload.php';
  use Kreait\Firebase\Factory;
  use Kreait\Firebase\ServiceAccount;

  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }

  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
  $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)
      ->create();
  $database = $firebase->getDatabase();

  $setToFirebase = function($emailwComma, $responseArr) {
      $userTree = '/users'.'/'.$emailwComma;
        //echo gettype($database);
      foreach ($responseArr as $key => $value) {
          //echo $userTree;
          //$database->getReference($user_directory)
          //  ->set([$key => $value]);
      }
  };
?>
</body>
</html>
