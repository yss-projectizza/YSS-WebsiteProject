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

  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
  $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)
      ->create();
  $database = $firebase->getDatabase();

  $setToFirebase = function($emailwComma, $responseArr) {
      foreach ($responseArr as $key => $value) {
          print("key: ");
          echo $key;
          print("value: ");
          echo $value;
          //$database->getReference('/users'+'/'+$emailwComma)
          //  ->set([$key => $value]);
      }
  };
?>
</body>
</html>
