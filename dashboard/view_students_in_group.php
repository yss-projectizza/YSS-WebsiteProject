<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
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
</script>

<html lang="en">
  <head>
    <title>List of Students | Youth Spiritual Summit</title>
      
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/student_tables.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  </head>

  <body style="background-color:rgb(233, 231, 231)"> 
    <?php include('../header_loggedin.php') ?>
    <?php include('../display_profile_pic.php') ?>

    <div class="container" style="text-align:center; margin-top:2%;margin-bottom:15%">
        <table id="name-table" class="name-table">
            <tr><th id="group-name-heading"></th></tr>
            <tbody id="table-body">

            </tbody>
        </table>
    </div>
  </body>
</html>

<script>
    let type = "<?php echo $_GET['type'] ?>";
    let key = "<?php echo $_GET['key'] ?>";
    
    firebase.database().ref(type + "/" + key).once("value", function(snapshot)
    {
        let group = snapshot.val();
        
        document.getElementById("group-name-heading").innerHTML = group.name;

        let group_type = "";

        switch(type)
        {
            case 'families': group_type = "group_num";
                break;
            case 'cabins': group_type = "cabin_num";
                break;
            case 'buses': group_type = "bus_num";
        }

        firebase.database().ref('users').orderByChild('user_type').equalTo("student").once("value", function(snapshot)
        {
            let students = Object.entries(snapshot.val());

            let rows = ``;

            for(let i = 0; i < students.length; i++)
            {
                switch(type)
                {
                    case 'families':
                    {
                        if(students[i][1].group_num == group.name)
                        {
                            rows += `<tr><td>${students[i][1].first_name + " " + students[i][1].last_name}</td></tr>`;
                        }
                    }
                }
            }

            if(rows == ``)
            {
                rows += `<tr><td>There are no students in this group.</td></tr>`;
            }

            document.getElementById("table-body").innerHTML = rows;
        });
    });
</script>
