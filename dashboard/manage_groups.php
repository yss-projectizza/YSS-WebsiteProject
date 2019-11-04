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
    <title>Manage Groups | Youth Spiritual Summit</title>
      
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

    <div class="container">
        <!-- Dashboard Title Registration Header -->
        <h1 style="text-align:center; font-size:50px;padding-top: 2%;">Manage Groups</h1>
        <br>
        <p> Add or delete families, cabins, and buses.</p>
        <hr/>
        <div style="text-align:center">
            <div class="dropdown">
                <button id="toggle-sort" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Group Type:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" id="family-option" onclick="displayGroups('families')">Families</a>
                    <a class="dropdown-item" id="cabin-option" onclick="displayGroups('cabins')">Cabins</a>
                    <a class="dropdown-item" id="bus-option" onclick="displayGroups('buses')">Buses</a>
                </div>
            </div>
        </div>
        
        <div class="container" id="group-list" style="text-align:center; margin-bottom:13%">
            <div class='card rounded' id="table-card" style='margin-top: 20px; display:none'>
                <table class="manage-groups-table">
                    <tr id="heading-row"></tr>
                    <tbody id="group-table-body"></tbody>
                </table>
                <div id="add-btn" class="container" style="margin:1%">
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

<script>
function displayGroups(type)
{
    document.getElementById("table-card").style.display = 'block';
    document.getElementById("table-card").style.border = '1px solid black';

    firebase.database().ref(type).once("value", function(snapshot)
    {
        let groups = Object.entries(snapshot.val());

        let heading_html = "<th>Name</th>"+"<th>Current Size</th>"+"<th>Max Capacity</th>";

        if(type == 'families')
        {
            heading_html += "<th>Grade Level</th>";
        }
        else if(type == 'cabins')
        {
            heading_html += "<th>Gender</th>";
        }

        heading_html += "<th>Counselors</th>" + "<th> </th>";

        document.getElementById("heading-row").innerHTML = heading_html;
        
        let body_html = "<tr>";
        
        for(let i = 0; i < groups.length; i++)
        {
            let key = groups[i][0];

            body_html += "<td><div class='rounded name-cell'>" + groups[i][1].name + "</div></td>"+
                         "<td>" + groups[i][1].size + "</td>"+
                         "<td>" + groups[i][1].max_size + "</td>";

            if(type == 'families')
            {
                body_html += "<td>" + groups[i][1].grade_level + "</td>";
            }
            else if(type == 'cabins')
            {
                body_html += "<td>" + groups[i][1].gender + "</td>";
            }
            
            body_html += "<td>" + get_counselors(groups[i][1].counselor) + "</td>";

            body_html += `<td><button id='delete-btn' class='rounded' onclick="delete_group('${key}', '${groups[i][1].name}', '${type}')">Delete</button></td>`;

            body_html += "</tr>";
        }

        document.getElementById("group-table-body").innerHTML = body_html;
        document.getElementById("add-btn").innerHTML = `<button id="add-group-btn" class="rounded" style="margin-right:1%"                                                            onclick="addGroup('${type}')">Add</button>`;
    });
}

function addGroup(type)
{
    let new_group_dict = {};

    let table_body = document.getElementById("group-table-body");
    let new_row = table_body.insertRow(0);    

    let name_cell = new_row.insertCell();
    var name_input = document.createElement("input");
    name_input.type = "text";
    name_input.id = "name-input";
    name_input.style.width="95%";
    name_cell.appendChild(name_input);

    let size_cell = new_row.insertCell();
    size_cell.appendChild(document.createTextNode("0"));

    let max_size_cell = new_row.insertCell();
    var max_size_input = document.createElement("input");
    max_size_input.type = "number";
    max_size_input.id = "max-size-input";
    max_size_input.style.width="50%";
    max_size_cell.appendChild(max_size_input);

    if(type == "families")
    {
        let grade_cell = new_row.insertCell();
        var grade_input = document.createElement("input");
        grade_input.type = "text";
        grade_input.id = "grade-input";
        grade_input.style.width="80%";
        grade_cell.appendChild(grade_input);
    }
    else if(type == "cabins")
    {
        let gender_cell = new_row.insertCell();
        var gender_input = document.createElement("input");
        gender_input.type = "text";
        gender_input.id = "gender-input";
        gender_input.style.width="70%";
        gender_cell.appendChild(gender_input);
    }

    let counselor_cell = new_row.insertCell();
    var counselor_input = document.createElement("input");
    counselor_input.type = "text";
    counselor_input.id = "counselor-input";
    counselor_input.style.width="90%";
    counselor_cell.appendChild(counselor_input);

    document.getElementById("add-btn").innerHTML = `<button id="sumbit-change-btn" class="rounded" style="margin:1%" onclick="submit_new_group('${type}')">Submit</button>` +
                                                   `<button id="sumbit-change-btn" class="rounded" onclick="cancel('${type}')">Cancel</button>`;
}

function submit_new_group(type)
{
    let new_group_dict = {};
    
    let name = document.getElementById("name-input").value;
    let max_size = document.getElementById("max-size-input").value;
    let counselor = document.getElementById("counselor-input").value;

    let drowdown_id = "";

    switch(type)
    {
        case 'families': dropdown_id = "family-option";
            break;
        case 'cabins': dropdown_id = "cabin-option"
            break;
        case 'buses': dropdown_id = "bus-option"
    }

    if(name != "" && max_size != "" && counselor != "")
    {
        new_group_dict["name"] = name;
        new_group_dict["size"] = 0;
        new_group_dict["max_size"] = max_size;

        if(type == "families")
        {
            let grade_level = document.getElementById("grade-input").value;
            
            if(grade_level != "")
            {
                new_group_dict["grade_level"] = grade_level;
            }
            else
            {
                alert("Please fill out all fields!");
            }
        }
        else if(type == "cabins")
        {
            let gender = document.getElementById("gender-input").value;

            if(gender != "")
            {
                new_group_dict["gender"] = gender;
            }
            else
            {
                alert("Please fill out all fields!");
            }
        }

        new_group_dict["counselor"] = counselor;

        firebase.database().ref('/' + type + '/').push(new_group_dict);
        
        document.getElementById(dropdown_id).click();
    }
    else
    {
        alert("Please fill out all fields!");
    }
}

function get_counselors(counselor_list)
{
    let counselors = "";

    if(counselor_list == "N/A")
    {
        counselors += "TBD";
    }
    else
    {
        if(counselor_list.includes(","))
        {
            counselor_list = counselor_list.split(",");
            
            for(let i = 0; i < counselor_list.length; i++)
            {
                if(i != counselor_list.length - 1)
                {
                    counselors += counselor_list[i] + ((counselor_list.length > 2) ? ", " : " ");
                }
                else
                {
                    counselors += "& " + counselor_list[i];
                }
            }
        }
        else
        {
            counselors += counselor_list;
        }
    }

    return counselors;
}

function delete_group(id, group_name, type)
{
    warning(id, group_name, type);
}

function warning(id, group_name, type)
{
    let ok_clicked = confirm("Are you sure you want to remove " + group_name + "?");

    if(ok_clicked)
    {
        let group = "";
        let dropdown_id = "";

        switch(type)
        {
            case 'families': dropdown_id = "family-option";
                break;
            case 'cabins': dropdown_id = "cabin-option"
                break;
            case 'buses': dropdown_id = "bus-option"
        }
        
        // Set group to N/A of all counselors in the selected group
        firebase.database().ref('users').orderByChild('user_type').equalTo('counselor').once("value", function(snapshot)
        {
            let users = Object.entries(snapshot.val());

            for(let i = 0; i < users.length; i++)
            {
                switch(type)
                {
                    case 'families': group = users[i][1].group_num;
                        break;
                    case 'cabins': group = users[i][1].cabin_num;
                        break;
                    case 'buses': group = users[i][1].bus_num;
                }

                if(group == group_name)
                {
                    switch(type)
                    {
                        case "families": firebase.database().ref('users/' + users[i][0]).update({'group_num': "N/A"});
                            break;
                        case "cabins": firebase.database().ref('users/' + users[i][0]).update({'cabin_num': "N/A"});
                            break;
                        case "buses": firebase.database().ref('users/' + users[i][0]).update({'bus_num': "N/A"});
                    }
                }
            }
        });

        firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot)
        {
            let users = Object.entries(snapshot.val());

            for(let i = 0; i < users.length; i++)
            {
                switch(type)
                {
                    case 'families': group = users[i][1].group_num;
                        break;
                    case 'cabins': group = users[i][1].cabin_num;
                        break;
                    case 'buses': group = users[i][1].bus_num;
                }

                if(group == group_name)
                {
                    switch(type)
                    {
                        case "families": firebase.database().ref('users/' + users[i][0]).update({'group_num': "N/A"});
                            break;
                        case "cabins": firebase.database().ref('users/' + users[i][0]).update({'cabin_num': "N/A"});
                            break;
                        case "buses": firebase.database().ref('users/' + users[i][0]).update({'bus_num': "N/A"});
                    }
                }
            }
        });

        firebase.database().ref('/' + type + '/' + id).remove();

        
        document.getElementById(dropdown_id).click();
    }   
}

function cancel(type)
{
    switch(type)
    {
        case 'families': dropdown_id = "family-option";
            break;
        case 'cabins': dropdown_id = "cabin-option"
            break;
        case 'buses': dropdown_id = "bus-option"
    }

    document.getElementById(dropdown_id).click();
}
</script>
