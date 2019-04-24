<html lang="en">
  <head>
    <title>Youth Spiritual Summit</title>
    <script src="dashboard/main_dashboard.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body onload=getLogic();>
    <?php include('navigation.php') ?>
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
            <button type="button" class="rounded" onclick="document.location.href = 'manage_attendees.php';">Manage Youth Participants</button>
            </div>
        <?php endif ?>
      <!--div class="main-cards"-->
        <div class="row ">
          <!-- intro moved to top left corner>
          <div class="col">
            <div class="card">
              <div id="intro">
                <h3>Hello <?php echo $name; ?>!</h3>
                <p id="status">Your Status is: <?php echo $status; ?></p> <
              </div>
            </div>
          </div>
          -->
          <div class="col">
            <div class="card">
              <h2>Your To Dos:</h2>
              <div class="to_do">
                <input class="check" type="checkbox" disabled="disabled" checked="checked"/>
                 Payment has been Recieved.
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
                <h2>Payment</h2>
                <label>You owe: <?php echo "<label style='font-size:22;color:red;'>$$credit_due</label>";?></label>

                <script src="https://www.paypal.com/sdk/js?client-id=Adh5IncLIpsFfbBF32H4FpvUzM87YDJ1wLvGCb_oJvoZ5ej_MCvreSNBV3GGJgfUiyf5zaA5FRHSsluk"></script>
                <div id="paypal-button-container"></div>
                <script>
                  paypal.Buttons({
                    createOrder: function(data, actions) {
                      return actions.order.create({
                        purchase_units: [{
                          amount: {
                            value: <?php echo $credit_due;?>
                          }
                        }]
                      });
                    },
                    onApprove: function(data, actions) {
                      // Capture the funds from the transaction
                      return actions.order.capture().then(function(details) {
                        // Show a success message to your buyer
                        alert('Transaction completed by ' + details.payer.name.given_name);
                      });
                    }
                  }).render('#paypal-button-container');
                </script>
                                <button type="button" class="rounded" onclick="document.location.href = 'financialaid.php';">Apply for Financial Aid</button>

              </div>
                <br>
                <script src="https://www.paypal.com/sdk/js?client-id=Adh5IncLIpsFfbBF32H4FpvUzM87YDJ1wLvGCb_oJvoZ5ej_MCvreSNBV3GGJgfUiyf5zaA5FRHSsluk"></script>
                <div id="paypal-button-container"></div>
                <script>
                  paypal.Buttons().render('#paypal-button-container');
                </script>
              </div>
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
                  <br/>
                <button type="button" class="rounded" onclick="document.location.href = '/dashboard/main_users/campers.php';">View Youth Participants</button>
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
        <!-- Merging Your Information Card with Status Card
        <div class="card rounded">
          <h2>Your Information</h2>
          <p>Name: <?php echo $name; ?></p>
          <p>Email: <?php echo $email; ?></p>
        </div>
        -->
      <!--/div-->
    </main>
  </body>
</html>
