<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<script>
  <?php
  $emailwithcomma = str_replace(".", ",", $email);
  ?>
  var email = "<?php echo $email; ?>"
  var credit_due = "";

  if(user_type == "parent")
  {
    credit_due = "<?php echo $_SESSION['queryData']['credit_due']; ?>";
  }

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
  <link rel="stylesheet" href="/css/student_tables.css">
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

    <!-- To-Do Section -->
    <div class="card">
    <h2>To Do:</h2>
      <div class="to_do" id="to-do-div">
        <?php if($user_type == "student"):?>
            <script>
              // Initialize Firebase
              var config =
              {
                apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
                authDomain: "yss-project-69ba2.firebaseapp.com",
                databaseURL: "https://yss-project-69ba2.firebaseio.com",
                projectId: "yss-project-69ba2",
                storageBucket: "yss-project-69ba2.appspot.com",
                messagingSenderId: "530416464878"
              };

              firebase.initializeApp(config);

              firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot)
              {

                let student = Object.entries(snapshot.val());
                let student_email = "<?php echo $_SESSION['queryData']['studentEmail']; ?>";

                let i = 0;

                while(student[i][1].studentEmail != student_email)
                {
                  i++;
                }

                let to_do_div = document.getElementById('to-do-div');

                // display_todo_link("Pay Fees", "https://www.google.com/", (student[i][1].credit_due != "0"), to_do_div);

                display_todo_link("Select Family", "dashboard/main_users/select_family.php", (student[i][1].group_num != "N/A"), to_do_div);

                display_todo_link("Select Cabin", "dashboard/main_users/select_cabin.php", (student[i][1].cabin_num != "N/A"), to_do_div);

                display_todo_link("Select Bus", "dashboard/main_users/select_bus.php", (student[i][1].bus_num != "N/A"), to_do_div);
              });
            </script>
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

    <!-- Camp Information Section -->
    <?php if ($user_type == "student" || $user_type == "counselor"): ?>
      <div class="card", id = "camp-info">
        <h2>Camp Information</h2>
        <div id="table-div">
          <!-- Counselor Camp Information-->
          <script>
            if("<?php echo $user_type ?>" == "counselor")
            {
              let camp_info_div = document.getElementById("table-div");
              camp_info_div.classList.add("container");

              var group_num = "<?php echo $_SESSION['queryData']['group_num']; ?>";
              var cabin_num = "<?php echo $_SESSION['queryData']['cabin_num']; ?>";
              var bus_num = "<?php echo $_SESSION['queryData']['bus_num']; ?>";

              let headings = ["Family", "Cabin", "Bus"];
              let info = [group_num, cabin_num, bus_num];

              let info_table = document.createElement('table');
              info_table.classList.add("counselor-info");

              let tbdy = document.createElement('tbody');

              let header_row = document.createElement('tr');

              for(let i = 0; i < headings.length; i++)
              {
                let header = document.createElement('th');
                header.appendChild(document.createTextNode(headings[i]));
                header_row.append(header);
              }

              let info_row = document.createElement('tr');

              for(let i = 0; i < info.length; i++)
              {
                let info_cell = document.createElement('td');
                info_cell.appendChild(document.createTextNode(info[i]));
                info_row.append(info_cell);
              }

              tbdy.appendChild(header_row);
              tbdy.appendChild(info_row);
              info_table.appendChild(tbdy);
              camp_info_div.appendChild(info_table);
            }
          </script>

          <!-- Student Camp Information-->
          <script type="text/javascript">
            if("<?php echo $user_type ?>" == "student")
            {
            let camp_info_div = document.getElementById("table-div");
            camp_info_div.classList.add("container");

            firebase.database().ref('users').orderByChild('user_type').equalTo("student").once("value", function(snapshot)
            {

              let student = Object.entries(snapshot.val());
              let student_email = "<?php echo $_SESSION['queryData']['studentEmail']; ?>";

              let i = 0;

              while(student[i][1].studentEmail != student_email)
              {
                i++;
              }

              if(student[i][1].group_num != "N/A" || student[i][1].cabin_num != "N/A" || student[i][1].bus_num != "N/A")
              {

                if(student[i][1].group_num != "N/A")
                {

                  firebase.database().ref('families').orderByChild('name').equalTo(student[i][1].group_num).once("value", function(snapshot)
                  {
                    let family_info = Object.entries(snapshot.val());

                    create_info_table("Family", student[i][1].group_num, get_counselors(family_info[0][1]), camp_info_div);
                  });
                }

                if(student[i][1].cabin_num != "N/A")
                {
                  alert(student[i][1].cabin_num)
                  firebase.database().ref('cabins').orderByChild('name').equalTo(student[i][1].cabin_num).once("value", function(snapshot)
                  {
                    let cabin_info = Object.entries(snapshot.val());

                    create_info_table("Cabin", student[i][1].cabin_num, get_counselors(cabin_info[0][1]), camp_info_div);
                  });
                }

                if(student[i][1].bus_num != "N/A")
                {
                  firebase.database().ref('buses').orderByChild('name').equalTo(student[i][1].bus_num).once("value", function(snapshot)
                  {
                    let bus_info = Object.entries(snapshot.val());

                    create_info_table("Bus", student[i][1].bus_num, get_counselors(bus_info[0][1]), camp_info_div);
                  });
                }
              }
              else
              {
                let message = document.createElement('p');
                message.style.textAlign = 'center';
                message.appendChild(document.createTextNode("You have not joined anything!"));
                camp_info_div.appendChild(message);

                document.getElementById('group-details-button').style.display = 'none';
              }
            });
            }
          </script>
        </div>
      <?php endif ?>
          <?php if($user_type == "counselor"): ?>
            <button id='group-details-button' type="button" class="rounded" onclick="document.location.href = '/dashboard/main_users/campers.php';">
              View Group Details
            </button>
          <?php else: ?>
            <button id='group-details-button' type="button" class="rounded" onclick="document.location.href = '/dashboard/main_users/campers.php';">
                Manage
            </button>
          <?php endif ?>
        </div>


      <!-- Payment Section -->
      <?php if ($user_type != "counselor" && $user_type != "student") : ?>
      <div class="card">
        <h2>Payment</h2>
        <label>You owe: <label id="amount_owed" style='font-size:22;color:red;'>$</label></label>
        <script src="https://www.paypal.com/sdk/js?client-id=Adh5IncLIpsFfbBF32H4FpvUzM87YDJ1wLvGCb_oJvoZ5ej_MCvreSNBV3GGJgfUiyf5zaA5FRHSsluk">
        </script>
        <div id="paypal-button-container"></div>
        <script>
          paypal.Buttons({
            createOrder: function(data, actions)
            {
              return actions.order.create(
              {
                purchase_units: [
                {
                  amount:
                  {
                    value: <?php echo $credit_due; ?>
                  }
                }]
              });
            },
            onApprove: function(data, actions)
            {
              // Capture the funds from the transaction
              return actions.order.capture().then(function(details)
              {
              // Show a success message to your buyer
                let amount_payed = details.purchase_units[0].amount.value;
                amount_payed = amount_payed.split(".");
                let payed_dollar = parseInt(amount_payed[0]);
                let payed_cents = parseInt(amount_payed[1]);

                firebase.database().ref('/users/' + email + '/credit_due').once('value').then(async function(snapshot)
                {
                    var credit_now = await parseInt(snapshot.val());

                    firebase.database().ref('/users/' + email).update(
                    {
                      credit_due: credit_now - payed_dollar
                    });

                    location.reload();
                  });
              });
            }
          }).render('#paypal-button-container');
        </script>
        <button type="button" class="rounded" onclick="document.location.href = 'financialaid.php';">
          Apply for Financial Aid
        </button>
      </div>
    <?php endif ?>

    <!-- Schedule Section -->
    <?php if ($user_type != "parent") : ?>
      <div class="card" id="schedule">
        <h2>Schedule</h2>
      </div>
      <script>
          if("<?php echo $user_type?>" == "counselor")
          {
            // Initialize Firebase
            var config =
            {
              apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
              authDomain: "yss-project-69ba2.firebaseapp.com",
              databaseURL: "https://yss-project-69ba2.firebaseio.com",
              projectId: "yss-project-69ba2",
              storageBucket: "yss-project-69ba2.appspot.com",
              messagingSenderId: "530416464878"
            };

            firebase.initializeApp(config);
          }

          firebase.database().ref("/schedule/").once('value').then(data =>
          {

            returndataArray = Object.entries(data.val());

            var group_num = "<?php echo $_SESSION['queryData']['group_num']; ?>";

            var schedule_div = document.getElementById("schedule");

            for (item of returndataArray)
            {
              if (item[1].group.split(",").indexOf(group_num) >= 0 || item[1].group === "all")
              {
                let newp = document.createElement("p");
                newp.innerHTML = "Event: " + item[1].event + " Date: " + item[1].date +  " Time: " + item[1].time;
                schedule_div.appendChild(newp);
              }
              else
              {
                let newp = document.createElement("p");
                newp.innerHTML = "Your schedule has not yet been assigned."
                schedule_div.appendChild(newp);
              }
            }
          });
        </script>
    <?php endif ?>
  </main>
</body>
</html>

<script>
function display_todo_link(item_name, link, completed, to_do_div)
{
  // Creates a link and line break.
  let item_link = document.createElement('a');
  let newline = document.createElement('br');

  item_link.appendChild(document.createTextNode(item_name));
  item_link.href = link;

  let checkbox = document.createElement('input');
  checkbox.type = 'checkbox';
  checkbox.id = "checkbox";
  checkbox.disabled = true;

  let l = document.createElement('label');
  l.appendChild(item_link);
  l.style.marginLeft = '10px';

  to_do_div.appendChild(checkbox);
  to_do_div.appendChild(l);

  if(completed)
  {
    checkbox.checked = true;
  }

  to_do_div.append(newline);
}

function create_info_table(table_type, sub_heading, counselors, camp_info_div)
{
  // Create table and add class list
  let info_table = document.createElement('table');
  info_table.style.marginBottom = '20px';
  info_table.style.marginTop = '10px';
  info_table.classList.add("name-table");

  let tbdy = document.createElement('tbody');
  
  // Create table heading
  let table_header = document.createElement('th');
  table_header.appendChild(document.createTextNode(table_type));
  table_header.appendChild(document.createElement('br'));
  table_header.appendChild(document.createTextNode(sub_heading));

  info_table.appendChild(table_header);

  let row = document.createElement('tr');
  let counselor_info = document.createElement('td');

  if(counselors.length < 2)
  {
    if(counselors[0] == "TBD")
    {
      counselor_info.appendChild(document.createTextNode("Counselors: " + counselors[0]));
    }
    else
    {
      counselor_info.appendChild(document.createTextNode("Counselor: " + counselors[0]));
    }
  }
  else
  {
    let heading = "Counselors: ";

    for(let i = 0; i < counselors.length; i++)
    {
        if(i != counselors.length - 1)
        {
            heading += counselors[i] + ((counselors.length > 2) ? ", " : " ");
        }
        else
        {
            heading += "& " + counselors[i];
        }
    }

    counselor_info.appendChild(document.createTextNode(heading));
  }

  row.appendChild(counselor_info);

  tbdy.appendChild(row);

  info_table.appendChild(tbdy);

  camp_info_div.appendChild(info_table);
}

function get_counselors(object)
{
  let counselors = [];

  if(object.counselor == "N/A")
  {
      counselors.push("TBD");
  }
  else
  {
      if((object.counselor).includes(","))
      {
          counselors = (object.counselor).split(",");
      }
      else
      {
          counselors.push(object.counselor);
      }
  }

  return counselors;
}
</script>
