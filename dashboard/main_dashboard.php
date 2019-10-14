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
  $emailwithcomma = str_replace(".", ",", $emailwithperiod);
  ?>
  var email = "<?php echo $emailwithcomma; ?>"
  var group_num = "<?php echo $_SESSION['queryData']['group_num']; ?>"

  firebase.database().ref('/users/' + email + '/credit_due').once('value').then(async function(snapshot) {
    var credit_now = await parseInt(snapshot.val());
    document.getElementById("amount_owed").innerText = "$" + credit_now;
  });
</script>


<html lang="en">

<head>
  <title>Youth Spiritual Summit</title>

  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/dashboard.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
  <?php include('header_loggedin.php') ?>
  <main class="main">
    <?php if ($user_type == "parent") : ?>
      <form method="get" action="manage_attendees.php" style="margin-bottom: -3%;">
        <input type="hidden" name="email" value=<?php echo $email; ?> />
        <input class="rounded" type="submit" value="Manage Youth Participants" />
      </form>
    <?php endif ?>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="card">
          <h2>To Do:</h2>
            <div class="to_do">
              <?php if($user_type == "student"): ?>
                <input class="check" type="checkbox" disabled="disabled" />
                Make Payment
                <br>
                <?php if($group_num == "N/A"): ?>
                  <input class="check" type="checkbox" disabled="disabled" />
                  <a href="dashboard/main_users/select_family.php">Select Your Group</a>
                <?php endif ?>
              <?php elseif($user_type == "counselor"): ?>
                <input class="check" type="checkbox" disabled="disabled" />
                Make a Donation 
              <?php elseif($user_type == "parent"): ?>
                <input class="check" type="checkbox" disabled="disabled" />
                Add Participants  
                <br>        
                <input class="check" type="checkbox" disabled="disabled" />
                Make Payment 
                <br>        
                <input class="check" type="checkbox" disabled="disabled" />
                Activate Participants
                <br>        
              <?php endif ?> 
            </div>
          </div>
          <?php if ($user_type != "parent") : ?>
            <div class="card">
              <h2>Camp Information</h2>
              <div>
                <script>
                  let counter = 0
                  firebase.database().ref('/users').once('value').then(item => {

                    let firebasedataArray = Object.entries(item.val());

                    for (let i = 0; i < firebasedataArray.length; ++i) {
                      if (group_num == firebasedataArray[i][1].group_num && firebasedataArray[i][1].user_type == "counselor") {
                        var updiv = document.getElementById("counselor-div");
                        var newp = document.createElement("ul");

                        newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " *";
                        updiv.appendChild(newp)
                      }
                    }
                  });
                </script>
              </div>
              <?php if($user_type != "counselor"): ?>
                <b>Counselors: </b>
                <div id=counselor-div> </div>
              <?php endif?>
              <b>Family:</b>
              <p> <?php echo $group_num; ?></p>
              <b>Bus: </b>
              <p> <?php echo $bus_num; ?></p>
              <b>Cabin: </b>
              <p> <?php echo $cabin_num; ?></p>
              <br />
              <button type="button" class="rounded" onclick="document.location.href = '/dashboard/main_users/campers.php';">View Group Details
              </button>
            </div>
          <?php endif ?>
          <?php if ($user_type != "counselor" && $user_type != "student") : ?>
            <div class="card">
              <h2>Payment</h2>
              <label>You owe: <label id="amount_owed" style='font-size:22;color:red;'>$</label></label>
              <script src="https://www.paypal.com/sdk/js?client-id=Adh5IncLIpsFfbBF32H4FpvUzM87YDJ1wLvGCb_oJvoZ5ej_MCvreSNBV3GGJgfUiyf5zaA5FRHSsluk">
              </script>
              <div id="paypal-button-container"></div>
              <script>
                paypal.Buttons({
                  createOrder: function(data, actions) {
                    return actions.order.create({
                      purchase_units: [{
                        amount: {
                          value: <?php echo $credit_due; ?>
                        }
                      }]
                    });
                  },
                  onApprove: function(data, actions) {
                    // Capture the funds from the transaction
                    return actions.order.capture().then(function(details) {
                      // Show a success message to your buyer


                      let amount_payed = details.purchase_units[0].amount.value;
                      amount_payed = amount_payed.split(".");
                      let payed_dollar = parseInt(amount_payed[0]);
                      let payed_cents = parseInt(amount_payed[1]);

                      firebase.database().ref('/users/' + email + '/credit_due').once('value').then(
                        async function(snapshot) {
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
          <?php endif ?>
        </div>
      </div>
      <div class="col-md-6">
        <?php if ($user_type != "parent") : ?>

          <script>
              firebase.database().ref("/schedule/").once('value').then(data => {
                returndataArray = Object.entries(data.val())

                var schedule_div = document.getElementById("schedule");



                for (item of returndataArray) {
                  if (item[1].group.split(",").indexOf(group_num) >= 0 || item[1].group === "all"){
                  let newp = document.createElement("p");
                  newp.innerHTML = "Event: " + item[1].event + " Date: " + item[1].date +  " Time: " + item[1].time;
                  schedule_div.appendChild(newp);
                }else{
                  let newp = document.createElement("p");
                  newp.innerHTML = "Your schedule has not yet been assigned."
                  schedule_div.appendChild(newp);

                }
                }
              })
            
          </script>
          <div class="card" id="schedule">
            <h2>Schedule</h2>
          </div>
        <?php endif ?>
      </div>
    </div>
  </main>
</body>

</html>