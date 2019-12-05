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
    <title>All User Information | Youth Spiritual Summit</title>

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/dashboard.css">
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

    <div class="container">
        <h1 style="text-align:center; font-size:50px;padding-top: 2%;">All User Information</h1>
        <br>
        <p> View and edit information for all users.</p>
        <hr/>
        <div style="text-align:center">
        </div>

        <div style="text-align:center">
            <div class="dropdown">
                <button id="toggle-group-type" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Type:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" id="counselor-option" onclick="displayUsers('counselor'); emailAll()">Counselors</a>
                    <a class="dropdown-item" id="student-option" onclick="displayUsers('student'); emailAll()">Youth Participants</a>
                    <a class="dropdown-item" id="parent-option" onclick="displayUsers('parent'); emailAll()">Parents</a>
                </div>
            </div>
        </div>

        <div class="container" id="user-list" style="text-align:center; margin-bottom:13%;display:none">
            <div class='card rounded' id="table-card" style='margin-top: 20px'>
              <!-- add new button for email -->
                  <div style="margin-top: 10px; text-align:center">
                      <a id="launch-email" class="rounded launch-email" style="padding:7px">Email All</a>
                   </div>

                <table class="manage-groups-table">
                    <tr id="heading-row"></tr>
                    <tbody id="user-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>

<script>
function displayUsers(user_type)
{
    document.getElementById("user-list").style.display = 'block';

    switch(user_type)
    {
      case "student": document.getElementById("toggle-group-type").innerHTML = "Youth Participants";
      break;
      case "counselor": document.getElementById("toggle-group-type").innerHTML = "Counselors";
      break;
      case "parent": document.getElementById("toggle-group-type").innerHTML = "Parents";
    }


    firebase.database().ref('users').orderByChild('user_type').equalTo(user_type).once("value", function(snapshot)
    {
        let heading_html = "<th>Name</th>";

        let users = Object.entries(snapshot.val());

        if(user_type == "student")
        {
            heading_html += `<th>Grade Level</th><th>Balance Due</th>`;
        }

        if(user_type == "counselor" || user_type == "student")
        {
            heading_html += "<th>Family</th><th>Cabin</th><th>Bus</th>";
        }
        else
        {
            heading_html += "<th>Balance Due</th><th>Image</th>";
        }

        if(user_type == "counselor" || user_type == "parent")
        {
            heading_html += "<th>Verified</th>";
        }

        heading_html += "<th> </th>";

        let table_rows = "";

        if(user_type == "counselor" || user_type == "student")
        {
            for(let i = 0; i < users.length; i++)
            {
                table_rows += "<tr>";

                let name = users[i][1].first_name + " " + users[i][1].last_name;
                let key = users[i][0];

                table_rows += `<td id='name-` + i +`'>
                                    <button class="rounded user-info-btn" type="button">
                                        <a id='name-link-${i}' style="color:white" href="detailed_user_info.php?key=${key}&type=${users[i][1].user_type}">${name}<a>
                                    </button>
                                </td>`;

                if(user_type == "student")
                {
                    table_rows += `<td id='grade-` + i +`'>${users[i][1].year}</td>`;
                    table_rows += `<td id='credit-` + i +`'>$${users[i][1].balance}</td>`;
                }

                table_rows += `<td id='size-` + i + `'>
                            <div class="dropdown">
                                <button id="toggle-families-` + i +`"  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">`;

                if(users[i][1].group_num != "N/A")
                {
                    table_rows += users[i][1].group_num;
                }
                else
                {
                    table_rows += "Families:";
                }

                // Creates dropdown of group names
                table_rows += `</button>
                    <div class="dropdown-menu" id = 'family-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                                        <td id='max-size-` + i + `'>
                                        <div class="dropdown">
                    <button id="toggle-cabins-` + i + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">`;

                if(users[i][1].cabin_num != "N/A")
                {
                    table_rows += users[i][1].cabin_num;
                }
                else
                {
                    table_rows += "Cabins:";
                }

                table_rows += `</button>
                    <div class="dropdown-menu" id = 'cabin-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                                        <td id='max-size-` + i + `'>
                                        <div class="dropdown">
                    <button id="toggle-buses-` + i + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">`;

                    if(users[i][1].bus_num != "N/A")
                {
                    table_rows += users[i][1].bus_num;
                }
                else
                {
                    table_rows += "Buses:";
                }

                table_rows += `</button>
                    <div class="dropdown-menu" id = 'bus-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>`;



                if(user_type == "counselor")
                {
                    table_rows += `<td><input type='checkbox' id='verified${i}' `;

                    if(users[i][1].account_verified == "true")
                    {
                        table_rows += ` checked='true' `;
                    }

                    table_rows += `onchange="verifyAccount('${key}', ${i}, 'counselor-option')"`;

                    table_rows += `></input></td>`;
                }

                if(user_type == "counselor")
                {
                    table_rows += `<td>
                                        <button class="rounded" id = "submit-` + i + `" onclick = "submit_changes('${key}', '${i}')">Submit</button>
                                        <button class="rounded delete-btn" id = "delete-` + i + `" onclick = "delete_counselor('${key}', '${i}')">Delete</button>
                                   </td>`;


                }
                else if(user_type == "student")
                {
                    table_rows += `<td>
                                        <button class="rounded" id = "submit-` + i + `" onclick = "submit_student_changes('${key}', '${i}')">Submit</button>
                                        <button class="rounded delete-btn" id = "delete-` + i + `" onclick = "delete_student('${key}', '${i}')">Delete</button>
                                    </td>`;
                }

                table_rows += "</tr>";

                if(user_type != "student")
                {
                    group_dropdown("families", i);
                }
                else
                {
                    group_dropdown("families", i, users[i][1].year, users[i][1].gender, user_type);
                }

                group_dropdown("cabins", i, "", users[i][1].gender);
                group_dropdown("buses", i,);
            }
        }
        else // for parents
        {
            for(let i = 0; i < users.length; i++)
            {
                var email = (users[i][1].email).replace(".", ","); // current user's email

                // grabs image from storage
                firebase.storage().ref('dl/' + email).getDownloadURL().then(function (url)
                {
                    let name = users[i][1].first_name + " " + users[i][1].last_name;
                    let key = users[i][0];

                    table_rows += "<tr>";

                    var modal_id = "modal" + i;

                    // Fills in cells for parent table
                    table_rows += `<td id='name-` + i +`'>
                                    <button class="rounded user-info-btn" type="button">
                                        <a style="color:white" href="detailed_user_info.php?key=${key}&type=parent">${name}<a>
                                    </button>
                                </td>
                               <td>$${users[i][1].credit_due}</td>
                               <td id = 'authentication-${i}'>
                                    <button class='rounded user-button' onclick="show_authenticaion('${email}', ${i}, '${modal_id}')"
                                           data-toggle='modal' data-target='#` + modal_id + `'>
                                        Show Authentication
                                    </button>
                                    <div id ='` + modal_id + `' class='modal fade' role='dialog'>
                                            <div class="modal-dialog" style="background-color:white">
                                                <div class="modal-body">
                                                    <button type="button" class="close" style="margin-bottom:15px" data-dismiss="modal">&times;</button>
                                                    <img class="auth-img" src="` + url + `"/>
                                                </div>
                                            </div>
                                        </div>
                                </td>`;

                    table_rows += `<td><input type='checkbox' id='verified${i}' `;

                    if(users[i][1].account_verified == "true")
                    {
                        table_rows += ` checked='true' `;
                    }

                    table_rows += `onchange="verifyAccount('${key}', ${i}, 'parent-option')"`;

                    table_rows += `></input></td>`;

                    table_rows += `<td>
                                        <button class="rounded delete-btn" id = "delete-` + i + `" onclick = "delete_parent('${key}', '${i}')">Delete</button>
                                    </td>`;

                    table_rows += "</tr>";

                    document.getElementById("user-table-body").innerHTML = table_rows;
                });
            }
        }

        document.getElementById("heading-row").innerHTML = heading_html;
        document.getElementById("user-table-body").innerHTML = table_rows;
    });
}

//checkc user type
function emailAll()
{
//   alert(document.getElementById("toggle-group-type").innerHTML);

  let user_type = "";//keep track user type
  switch(document.getElementById("toggle-group-type").innerHTML)
  {
    case "Youth Participants": user_type = "student";
    break;
    case "Counselors": user_type = "counselor";
    break;
    case "Parents": user_type = "parent";
  }

  firebase.database().ref('/users/').orderByChild("user_type").equalTo(user_type).once("value",function(snapshot)
{
  let users = Object.entries(snapshot.val());
  let email_list = "";

  if(users.length == 0)
  {
    alert("There are no users to email!");
  }
  else if(users.length == 1)
  {
    if(user_type == "student")
    {
      email_list = users[0][1].studentEmail;
    }
    else {
      email_list = users[0][1].email;
    }
  }
  else {
    for(let i = 0; i < users.length; i++)
    {
      if(user_type == "student")
      {
        email_list += users[i][1].studentEmail;
      }
      else {
        email_list += users[i][1].email;
      }
      if (i != (users.length-1))
      {

        email_list += "; "; //create email list
      }
    }
  }

//get all user_type email
    // alert(email_list);

    document.getElementById("launch-email").href = "mailto:" + email_list;
});
  // location.href = '/email_student.php?studentEmail=" + studentEmail + "&reset=true";
}


function delete_student(key, index)
{
    if(confirm("Are you sure you would like to delete this youth?"))
    {
        firebase.database().ref('users/' + key).once("value", function(snapshot)
        {
            var student = snapshot.val();

            var group_num = student.group_num;
            var cabin_num = student.cabin_num;
            var bus_num = student.bus_num;

            if(group_num != "N/A")
            {
                update_group_size(group_num, "families");
            }

            if(cabin_num != "N/A")
            {
                update_group_size(cabin_num, "cabins");
            }

            if(bus_num != "N/A")
            {
                update_group_size(bus_num, "buses");
            }

            firebase.database().ref('users/' + key).remove();

            alert("done");
            location.reload();
        });
    }
}

function update_group_size(group_name, type)
{
    firebase.database().ref(type).orderByChild('name').equalTo(group_name).once("value", function(snapshot)
    {
        let object = Object.entries(snapshot.val());

        let object_key = object[0][0];

        let size = object[0][1].size - 1;

        firebase.database().ref(type + '/' + object_key).update({size: parseInt(size)});
    });
}

function submit_student_changes(key, index)
{
    let fam_update = document.getElementById("toggle-families-" + index).innerHTML;
    let cabin_update = document.getElementById("toggle-cabins-" + index).innerHTML;
    let bus_update = document.getElementById("toggle-buses-" + index).innerHTML;

    firebase.database().ref("users/" + key).once("value", function(snapshot)
    {
        let student = snapshot.val();

        update_student_group(index, key, "families", student.group_num, fam_update);
        update_student_group(index, key, "cabins", student.cabin_num, cabin_update);
        update_student_group(index, key, "buses", student.bus_num, bus_update);

        alert("Changes were saved successfully!");
    });
}

function update_student_group(index, key, type, current_group_name, selected_group_name)
{
    if(current_group_name != "N/A") // group is already assigned
    {
        if(current_group_name != selected_group_name) // group is changed
        {
            firebase.database().ref(type).orderByChild("name").equalTo(current_group_name).once("value", function(snapshot)
            {
                let current_group = Object.entries(snapshot.val());

                firebase.database().ref(type).orderByChild("name").equalTo(selected_group_name).once("value", function(snapshot)
                {
                    let selected_group = Object.entries(snapshot.val());

                    let old_group_size = parseInt(current_group[0][1].size);
                    let new_group_size = parseInt(selected_group[0][1].size);

                    old_group_size--;
                    new_group_size++;

                    firebase.database().ref(type + "/" + current_group[0][0]).update({'size': parseInt(old_group_size)});
                    firebase.database().ref(type + "/" + selected_group[0][0]).update({'size': parseInt(new_group_size)});

                    switch(type)
                    {
                        case "families": firebase.database().ref('users/' + key).update({'group_num': selected_group_name});
                            break;
                        case "cabins": firebase.database().ref('users/' + key).update({'cabin_num': selected_group_name});
                            break;
                        case "buses": firebase.database().ref('users/' + key).update({'bus_num': selected_group_name});
                    }
                });
            });
        }
    }
    else // group is not assigned
    {
        if(!selected_group_name.includes(":")) // group is assigned
        {
            firebase.database().ref(type).orderByChild("name").equalTo(selected_group_name).once("value", function(snapshot)
            {
                let selected_group = Object.entries(snapshot.val());

                let new_group_size = parseInt(selected_group[0][1].size);

                new_group_size++;

                firebase.database().ref(type + "/" + selected_group[0][0]).update({'size': parseInt(new_group_size)});

                switch(type)
                {
                    case "families": firebase.database().ref('users/' + key).update({'group_num': selected_group_name});
                        break;
                    case "cabins": firebase.database().ref('users/' + key).update({'cabin_num': selected_group_name});
                        break;
                    case "buses": firebase.database().ref('users/' + key).update({'bus_num': selected_group_name});
                }
            });
        }
    }
}

function verifyAccount(email, index, refresh_path)
{
    if(document.getElementById("verified" + index).checked == true)
    {
        firebase.database().ref('users/' + email).update({'account_verified': "true"});
    }
    else
    {
        firebase.database().ref('users/' + email).update({'account_verified': "false"});
    }
}

function group_dropdown(type, index, grade="", gender="", user_type)
{
    firebase.database().ref(type).once("value", function(snapshot)
    {
        let groups = Object.entries(snapshot.val());
        let group_names = "";

        for (let i = 0; i < groups.length; ++i)
        {
            if(gender == "" && user_type != "student" /* prevents all families from being shown */)
            {
                group_names += `<a class="dropdown-item" onclick="update_dropdown_value('${type}','${groups[i][1].name}', ${index})">${groups[i][1].name} </a>`;
            }
            else
            {
                if(gender == groups[i][1].gender)
                {
                    group_names += `<a class="dropdown-item" onclick="update_dropdown_value('${type}','${groups[i][1].name}', ${index})">${groups[i][1].name} </a>`;
                }
            }

            // shows only families in the student's grade level
            if(user_type == "student")
            {
                group_names += `<a class="dropdown-item" onclick="update_dropdown_value('${type}','${groups[i][1].name}', ${index})">${groups[i][1].name} </a>`;
            }
        }

        switch(type)
        {
            case 'families': document.getElementById("family-dropdown-" + index).innerHTML = group_names;
                break;

            case 'cabins': document.getElementById("cabin-dropdown-" + index).innerHTML = group_names;
                break;

            case 'buses': document.getElementById("bus-dropdown-" + index).innerHTML = group_names;

        }
    });
}

function update_dropdown_value(type, name, index)
{
    switch(type)
        {
            case 'families': document.getElementById("toggle-families-" + index).innerHTML = name;
                break;

            case 'cabins': document.getElementById("toggle-cabins-" + index).innerHTML = name;
                break;

            case 'buses': document.getElementById("toggle-buses-" + index).innerHTML = name;

        }
}

function submit_changes(key, index)
{
    let fam_update = document.getElementById("toggle-families-" + index).innerHTML;
    let cabin_update = document.getElementById("toggle-cabins-" + index).innerHTML;
    let bus_update = document.getElementById("toggle-buses-" + index).innerHTML;

    firebase.database().ref("users/" + key).once("value", function(snapshot)
    {
        let counselor = snapshot.val();

        update_counselor_group(index, key, "families", counselor.group_num, fam_update);
        update_counselor_group(index, key, "cabins", counselor.cabin_num, cabin_update);
        update_counselor_group(index, key, "buses", counselor.bus_num, bus_update);

        alert("Changes were saved successfully!");
    });
}

function update_counselor_group(index, key, type, current_group_name, selected_group_name)
{
    if(current_group_name != "N/A")
    {
        if(current_group_name != selected_group_name)
        {
            firebase.database().ref(type).orderByChild("name").equalTo(current_group_name).once("value", function(snapshot)
            {
                let current_group = Object.entries(snapshot.val());

                firebase.database().ref(type).orderByChild("name").equalTo(selected_group_name).once("value", function(snapshot)
                {
                    let selected_group = Object.entries(snapshot.val());

                    let updated_old_group_counselor_list = remove_counselor_from_list(document.getElementById("name-link-"+index).innerHTML, current_group[0][1].counselor);
                    let updated_new_group_counselor_list = add_counselor_to_list(document.getElementById("name-link-"+index).innerHTML, selected_group[0][1].counselor);

                    firebase.database().ref(type + "/" + current_group[0][0]).update({'counselor': updated_old_group_counselor_list});
                    firebase.database().ref(type + "/" + selected_group[0][0]).update({'counselor': updated_new_group_counselor_list});

                    switch(type)
                    {
                        case "families": firebase.database().ref('users/' + key).update({'group_num': selected_group_name});
                            break;
                        case "cabins": firebase.database().ref('users/' + key).update({'cabin_num': selected_group_name});
                            break;
                        case "buses": firebase.database().ref('users/' + key).update({'bus_num': selected_group_name});
                    }
                });
            });
        }
    }
    else
    {
        if(!selected_group_name.includes(":"))
        {
            firebase.database().ref(type).orderByChild("name").equalTo(selected_group_name).once("value", function(snapshot)
            {
                let selected_group = Object.entries(snapshot.val());

                let updated_new_group_counselor_list = add_counselor_to_list(document.getElementById("name-link-" + index).innerHTML, selected_group[0][1].counselor);

                firebase.database().ref(type + "/" + selected_group[0][0]).update({'counselor': updated_new_group_counselor_list});

                switch(type)
                {
                    case "families": firebase.database().ref('users/' + key).update({'group_num': selected_group_name});
                        break;
                    case "cabins": firebase.database().ref('users/' + key).update({'cabin_num': selected_group_name});
                        break;
                    case "buses": firebase.database().ref('users/' + key).update({'bus_num': selected_group_name});
                }
            });
        }
    }
}

function remove_counselor_from_list(counselor_name, counselor_string)
{
    if(counselor_string.includes(",")) // 2 or more
    {
        if(counselor_string.includes("," + counselor_name)) // counselor is not in the first position
        {
            counselor_string = counselor_string.replace("," + counselor_name, "");
        }
        else if(counselor_string.includes(counselor_name + ",")) // counselor is first in list
        {
            counselor_string = counselor_string.replace(counselor_name + ",", "");
        }
    }
    else // 1 counselor
    {
        counselor_string = "TBD";
    }

    return counselor_string;
}

function add_counselor_to_list(counselor_name, counselor_string)
{
    if(counselor_string == "TBD") // no counselors assigned
    {
        counselor_string = counselor_name;
    }
    else // one or more
    {
        counselor_string += "," + counselor_name;
    }

    return counselor_string;
}

</script>
