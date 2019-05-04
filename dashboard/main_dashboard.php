<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
    authDomain: "yss-project-69ba2.firebaseapp.com",
    databaseURL: "https://yss-project-69ba2.firebaseio.com",
    projectId: "yss-project-69ba2",
    storageBucket: "yss-project-69ba2.appspot.com",
    messagingSenderId: "530416464878"
  };
  firebase.initializeApp(config);

  <?php 
  $emailwithperiod = $_SESSION["queryData"]["email"]; 
  $emailwithcomma = str_replace(".",",",$emailwithperiod);
  
?>

  var email = "<?php echo $emailwithcomma; ?>"



  firebase.database().ref('/users/' + email + '/credit_due').once('value').then(async function (snapshot) {
    var credit_now = await parseInt(snapshot.val());
    document.getElementById("amount_owed").innerText = "$" + credit_now;
  });
</script>


<html lang="en">

<head>
  <title>Youth Spiritual Summit</title>
  <script src="dashboard/main_dashboard.js"></script>
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/dashboard.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body onload=getLogic();>
  <?php include('header_loggedin.php') ?>
  <!--
      Notes:
      View People = another page to view people in their cabin, group, bus
      Camp Info = another page to view direct camp info
      Student (underage): Has ToDos, Schedule, View People, Profile, Camp Info
        - Profile: only has interest, phone #, email, etc. (no address or emergency contact)
      Student (18): Has ToDos, Schedule, View People, Profile, Camp Info
        - Profile: only has interest, phone #, email,  billing address, emergency contact, etc.
      Parent: Has ToDos, Schedule, Manage Campers, Can see each camper's info
        - Manage Campers: can add camper, see camper status + name, and give access to camper
                          for their own account
        - Profile: can see profile of their campers, can edit that info for each camper,
                  also has own profile,
      Counselor: Camp Info, Schedule, Profile, View People
        - Profile: has interest, phone #, email, etc.

      OTHER TODOS:
      - figure how to toggle between student type, parent, and counselor
        - ideas
          - hide certain elements through javascript
          - figure out how to get user type into php
        - hardcode -> have separate dashboards for each user type
    -->

  <main class="main">
    <?php if ($user_type == "parent"): ?>
      <div class="col my-auto" style="padding-bottom: 20px;">
        <button type="button" class="rounded" onclick="document.location.href = 'manage_attendees.php';">Manage Youth
          Participants</button>
      </div>
    <?php endif ?>
    <div class="row">
      <div class="col">
        <div class="card">
          <h2>Your To Dos:</h2>
          <div class="to_do">
            <input class="check" type="checkbox" disabled="disabled"/>
            Payment has been Recieved.
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <h2>Payment</h2>
          <label>You owe: <label id="amount_owed" style='font-size:22;color:red;'>$</label></label>
          <script
            src="https://www.paypal.com/sdk/js?client-id=Adh5IncLIpsFfbBF32H4FpvUzM87YDJ1wLvGCb_oJvoZ5ej_MCvreSNBV3GGJgfUiyf5zaA5FRHSsluk">
          </script>
          <div id="paypal-button-container"></div>
          <script>
            paypal.Buttons({
              createOrder: function (data, actions) {
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      value: <?php echo $credit_due;?>
                    }
                  }]
                });
              },
              onApprove: function (data, actions) {
                // Capture the funds from the transaction
                return actions.order.capture().then(function (details) {
                  // Show a success message to your buyer

                  console.log(details.purchase_units[0].amount.value)
                  let amount_payed = details.purchase_units[0].amount.value;
                  amount_payed = amount_payed.split(".");
                  let payed_dollar = parseInt(amount_payed[0]);
                  let payed_cents = parseInt(amount_payed[1]);

                  firebase.database().ref('/users/' + email + '/credit_due').once('value').then(
                  async function (snapshot) {
                      var credit_now = await parseInt(snapshot.val());



                      firebase.database().ref('/users/' + email).update({
                        credit_due: credit_now - payed_dollar

                      });

                      location.reload();
                    });
                });
              }
            }).render('#paypal-button-container');
          </script>
          <button type="button" class="rounded" onclick="document.location.href = 'financialaid.php';">Apply for
            Financial Aid</button>
        </div>
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <?php if ($user_type != "parent"): ?>
          <div class="card">
            <h2>Camp Information</h2>
            <p>Group Number: <?php echo $group_num; ?></p>
            <p>Bus Number: <?php echo $bus_num; ?></p>
            <p>Cabin Number: <?php echo $cabin_num; ?></p>
            <br />
            <button type="button" class="rounded"
              onclick="document.location.href = '/dashboard/main_users/campers.php';">View Group Details
            </button>
          </div>
        <?php endif ?>
      </div>
      <div class="col">
        <?php if ($user_type != "parent"): ?>
          <div class="card">
            <h2>Schedule</h2>
            <p>Friday</p>
            <p>Saturday</p>
            <p>Sunday</p>
            <p>ETC</p>
          </div>
        <?php endif ?>
      </div>
    </div>
  </main>
</body>

</html>