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
        <h1 style="text-align:center; font-size:50px;padding-top: 2%;">Manage Groups</h1>
        <br>
        <p> Add or delete families, cabins, and buses.</p>
        <hr/>
        <div style="text-align:center">
            <div class="dropdown">
                <button id="toggle-group-type" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
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
    document.getElementById("add-btn").style.display= "block";

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

            body_html += `<td id='name-` + i +`'><div id="name-div-` + i +`" class='rounded name-cell'>${groups[i][1].name}</div></td>
                         <td>${groups[i][1].size}</td>
                         <td id='max-size-` + i + `'>${groups[i][1].max_size}</td>`;

            if(type == 'families')
            {
                body_html += `<td id='grade-` + i + `'>${groups[i][1].grade_level}</td>`;
            }
            else if(type == 'cabins')
            {
                body_html += `<td id='gender-` + i + `'>${groups[i][1].gender}</td>`;
            }
            
            body_html += `<td id='counselors-` + i + `'>${get_counselors(groups[i][1].counselor)}</td>`;

            body_html += `<td><button id='edit-btn-` + i + `' class='rounded' onclick="edit_group('${key}', ${i}, ${groups.length}, '${groups[i][1].name}', '${groups[i][1].counselor}', '${type}')">Edit</button>
                              <button id='delete-btn-` + i + `' class='rounded delete-btn' onclick="delete_group('${key}', '${groups[i][1].name}', '${type}')">Delete</button></td>`;
            
            body_html += "</tr>";
        }

        document.getElementById("group-table-body").innerHTML = body_html;
        document.getElementById("add-btn").innerHTML = `<button id="add-group-btn" class="rounded" style="margin-right:1%" onclick="addGroup('${type}', ${groups.length})">Add</button>`;
    });
}

function edit_group(key, index, num_groups, group_name, counselors, type)
{
    // hides all other edit buttons so that only one group can be changed at a time.
    for(let i = 0; i < num_groups; i++)
    {
        if(i != index)
        {
            document.getElementById("edit-btn-" + i).style.display= "none";
        }
    }

    let old_group_name = document.getElementById("name-div-" + index).innerHTML;
    let old_grade = "";
    let old_gender = "";

    document.getElementById("add-btn").style.display= "none";

    document.getElementById("name-" + index).innerHTML = `<input id='new-name-input' style="margin-right:1%"></input>`;
    document.getElementById("max-size-" + index).innerHTML = `<input id='new-max-size-input' type="number" style="margin-right:1%; width:50%"></input>`;

    if(type == "families")
    {
        old_grade = document.getElementById("grade-" + index).innerHTML;

        document.getElementById("grade-" + index).innerHTML = create_grade_dropdown();
    }
    else if(type == "cabins")
    {
        old_gender = document.getElementById("gender-" + index).innerHTML;
        
        document.getElementById("gender-" + index).innerHTML = create_gender_dropdown();
    }

    // Holds the string of counselors to be updated in the database
    let counselor_string = "";

    firebase.database().ref('users').orderByChild('user_type').equalTo('counselor').once("value", function(snapshot)
    {
        let counselor_dropdown = `<div class="dropdown">
        <button id="toggle-counselors" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Counselors:
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">`;

        let counselor_list = counselors;

        let counselors_from_db = Object.entries(snapshot.val());

        if(counselor_list.includes(","))
        {
            counselor_string = "sdflskfsjfs";
            counselor_list = counselor_list.split(",");

            // alert(counselor_list.length);

            for(let i = 0; i < counselor_list.length; i++)
            {
                counselor_dropdown += `<a class="dropdown-item" id="counselor-` + i + 
                                      `" onclick="toggleSelect('${counselor_list[i]}', '${counselor_string}', ${i})">\u2713` + counselor_list[i] +  `</a>`;
            }
        }
        else if(counselor_list == "TBD")
        {
            for(let i = 0; i < counselors_from_db.length; i++)
            {
                let group = get_group_name(counselors_from_db[i][1], type);

                if(group == "N/A")
                {
                    let counselor_name = counselors_from_db[i][1].first_name + " " + counselors_from_db[i][1].last_name;
                    
                    counselor_dropdown += `<a class="dropdown-item" id="counselor-` + i + 
                                        `" onclick="toggleSelect('${counselor_name}', '${counselor_string}', ${i})">` + counselor_name +  `</a>`;
                }
            }
        }
        else
        {
            let i = 0;

            counselor_dropdown += `<a class="dropdown-item" id="counselor-` + i + 
                                  `" onclick="toggleSelect('${counselor_list}', '${counselor_string}', ${i})">\u2713` + counselor_list + `</a>`;
        }

        document.getElementById("counselors-" + index).innerHTML = counselor_dropdown;
    });

    // Converts Edit button to Submit button and changes its function to submit changes
    document.getElementById("edit-btn-" + index).innerHTML = "Submit";
    document.getElementById("edit-btn-" + index).id = "submit-change-btn";
    
    // Submits the changes to the database.
    document.getElementById("submit-change-btn").onclick = function()
    {
        // alert(counselor_string);

        let db_path = type + "/" + key;

        let name = document.getElementById("new-name-input").value;
        let max_size = document.getElementById("new-max-size-input").value;

        if(name != "" && max_size != "")
        {
            if(type == "families")
            {
                let grade = document.getElementById("toggle-grade").innerHTML;

                if(grade != "Grade Level:")
                {
                    if(old_grade != grade)
                    {
                        if(confirm("Changing this family's grade will remove all of the students in it. Would you like to continue?"))
                        {
                            remove_students_from_group(type, old_group_name);

                            firebase.database().ref(db_path).update({'name':name, 'max_size': max_size, 'grade_level': grade, 'size': 0});
                    
                            cancel(type);
                        }
                    }
                }
                else
                {
                    alert("Please select a grade!");
                }
            }
            else if(type == "cabins")
            {
                let gender = document.getElementById("toggle-gender").innerHTML;

                if(gender != "Gender:")
                {
                    if(old_gender != gender)
                    {
                        if(confirm("Changing this cabin's gender will remove all of the students in it. Would you like to continue?"))
                        {
                            remove_students_from_group(type, old_group_name);

                            firebase.database().ref(db_path).update({'name':name, 'max_size': max_size, 'gender': gender, 'size': 0});
                    
                            cancel(type);
                        }
                    }
                }
                else
                {
                    alert("Please select a gender!");
                }
            }
        }
        else
        {
            alert("Please fill in all fields!");
        }
    }

    // Converts Delete button to a Cancel button
    document.getElementById("delete-btn-" + index).innerHTML = "Cancel";
    document.getElementById("delete-btn-" + index).classList.remove("delete-btn");
    document.getElementById("delete-btn-" + index).onclick = function()
    {
        cancel(type);
    }
}

function remove_students_from_group(type, group_name)
{
    firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot)
    {
        let student_list = Object.entries(snapshot.val());

        for(let i = 0; i < student_list.length; i++)
        {
            let group = get_group_name(student_list[i][1], type);

            if(group == group_name)
            {
                switch(type)
                {
                    case 'families': firebase.database().ref('users/' + student_list[i][0]).update({'group_num': "N/A"});
                        break;
                    case 'cabins': firebase.database().ref('users/' + student_list[i][0]).update({'cabin_num': "N/A"});
                }
            }
        }
    });
}

function toggleSelect(name, counselor_string, index)
{
    // alert(counselor_string);
    let contents = document.getElementById("counselor-" + index).innerHTML;

    if(contents.includes("\u2713"))
    {
        // remove check
        contents = contents.replace("\u2713", "");

        // counselor_string = counselor_string.replace(name + ",", "");
    }
    else
    {
        // check name
        contents = "\u2713" + contents;

        // counselor_string += name + ",";
    }

    document.getElementById("counselor-" + index).innerHTML = contents;
}

function create_grade_dropdown()
{
    return `<div class="dropdown">
            <button id="toggle-grade" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Grade Level:</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick="changeGradeLevel('Freshman')">Freshman</a>
                <a class="dropdown-item" onclick="changeGradeLevel('Sophomore')">Sophomore</a>
                <a class="dropdown-item" onclick="changeGradeLevel('Junior')">Junior</a>
                <a class="dropdown-item" onclick="changeGradeLevel('Senior')">Senior</a>
            </div>
        </div>`;
}

function create_gender_dropdown()
{
    return `<div class="dropdown">
            <button id="toggle-gender" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gender:</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick="changeGender('Male')">Male</a>
                <a class="dropdown-item" onclick="changeGender('Female')">Female</a>
            </div>
        </div>`;
}

function addGroup(type, num_groups)
{
    for(let i = 0; i < num_groups; i++)
    {
        document.getElementById("edit-btn-" + i).style.display= "none";
    }

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
        // Grade Level drop-down
        let grade_cell = new_row.insertCell();

        let grade_dropdown = create_grade_dropdown();

        grade_cell.innerHTML = grade_dropdown;
    }
    else if(type == "cabins")
    {
        // Gender drop-down
        let gender_cell = new_row.insertCell();
 
        let gender_dropdown = create_gender_dropdown();

        gender_cell.innerHTML = gender_dropdown;
    }

    // Counselor drop-down
    firebase.database().ref('users').orderByChild('user_type').equalTo('counselor').once("value", function(snapshot)
    {
        let counselor_cell = new_row.insertCell();

        let counselor_list_cell = new_row.insertCell();
        
        counselor_list_cell.id = "counselor-list";

        let counselor_dropdown = `<div class="dropdown">
        <button id="toggle-counselors" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Counselors:
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">`;

        let counselors = Object.entries(snapshot.val());
        let group = "";

        let num_unassigned = 0;
        
        for(let i = 0; i < counselors.length; i++)
        {
            switch(type)
            {
                case 'families': group = counselors[i][1].group_num;
                    break;
                case 'cabins': group = counselors[i][1].cabin_num;
                    break;
                case 'buses': group = counselors[i][1].bus_num;
            }

            if(group == "N/A")
            {
                let name = counselors[i][1].first_name + " " + counselors[i][1].last_name;
                
                counselor_dropdown += `<a class="dropdown-item" onclick="addCounselorName('${name}')"> ` + name +  `</a>`;

                num_unassigned++;
            }
        }

        if(num_unassigned == 0)
        {
            counselor_dropdown += `<a class="dropdown-item">All counselors have been assigned!</a>`;
        }

        counselor_dropdown += `</div>
        </div>`;

        counselor_cell.innerHTML = counselor_dropdown;
    });

    document.getElementById("add-btn").innerHTML = `<button id="submit-change-btn" class="rounded" style="margin:1%" onclick="submit_new_group('${type}')">Submit</button>` +
                                                   `<button class="rounded" onclick="cancel('${type}')">Cancel</button>`;
}

function changeGradeLevel(grade)
{
    document.getElementById("toggle-grade").innerHTML = grade;
}

function changeGender(gender)
{
    document.getElementById("toggle-gender").innerHTML = gender;
}

function change_counselor_group(names, group_name, type)
{
    firebase.database().ref('users').orderByChild('user_type').equalTo('counselor').once("value", function(snapshot)
    {
        let users = Object.entries(snapshot.val());
        let group = "";

        for(let i = 0; i < names.length; i++)
        {   
            for(let j = 0; j < users.length; j++)
            {
                switch(type)
                {
                    case 'families': group = users[j][1].group_num;
                        break;
                    case 'cabins': group = users[j][1].cabin_num;
                        break;
                    case 'buses': group = users[j][1].bus_num;
                }

                if(group == "N/A")
                {
                    let current_name = users[j][1].first_name + " " + users[j][1].last_name;

                    if(current_name == names[i])
                    {
                        switch(type)
                        {
                            case "families": firebase.database().ref('users/' + users[j][0]).update({'group_num': group_name});
                                break;
                            case "cabins": firebase.database().ref('users/' + users[j][0]).update({'cabin_num': group_name});
                                break;
                            case "buses": firebase.database().ref('users/' + users[j][0]).update({'bus_num': group_name});
                        }
                    }
                }
            }
        }
    });
}

function addCounselorName(name)
{
    let counselor_list = document.getElementById("counselor-list").innerHTML;
    
    // Adds counselor to the list the first time their name is clicked, else removes them from the list.
    if(!counselor_list.includes(name))
    {
        if(document.getElementById("counselor-list").innerHTML != "")
        {
            document.getElementById("counselor-list").appendChild(document.createElement("br"));
        }

        document.getElementById("counselor-list").appendChild(document.createTextNode(name));
    }
    else
    {
        if((document.getElementById("counselor-list").innerHTML).includes("<br>"))
        {
            if((document.getElementById("counselor-list").innerHTML).includes("<br>" + name))
            {
                counselor_list = counselor_list.replace("<br>" + name, "");
            }
            else if((document.getElementById("counselor-list").innerHTML).includes(name + "<br>"))
            {
                counselor_list = counselor_list.replace(name + "<br>", "");
            }
        }
        else
        {
            counselor_list = counselor_list.replace(name, "");
        }

        document.getElementById("counselor-list").innerHTML = counselor_list;
    }
}

function submit_new_group(type)
{
    let new_group_dict = {};
    
    let name = document.getElementById("name-input").value;
    let max_size = document.getElementById("max-size-input").value;
    let counselor = "";
    let counselor_list = document.getElementById("counselor-list").innerHTML;

    change_counselor_group(counselor_list.split("<br>"), type);

    if(counselor_list.includes("<br>"))
    {
        counselor = format_counselor_list(counselor_list.split("<br>"));
    }
    else if(counselor_list == "")
    {
        counselor = format_counselor_list([]);
    }
    else
    {
        counselor = format_counselor_list([counselor_list]);
    }
    
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
            let grade_level = document.getElementById("toggle-grade").innerHTML;
            
            if(!grade_level.includes("Grade Level"))
            {
                new_group_dict["grade_level"] = grade_level;

                new_group_dict["counselor"] = counselor;

                change_counselor_group((document.getElementById("counselor-list").innerHTML).split("<br>"), name, type);

                firebase.database().ref('/' + type + '/').push(new_group_dict);

                document.getElementById(dropdown_id).click();
            }
            else
            {
                alert("Please fill out all fields!");
            }
        }
        else if(type == "cabins")
        {
            let gender = document.getElementById("toggle-gender").innerHTML;

            if(!gender.includes("Gender"))
            {
                new_group_dict["gender"] = gender;

                new_group_dict["counselor"] = counselor;
                
                change_counselor_group((document.getElementById("counselor-list").innerHTML).split("<br>"), name, type);

                firebase.database().ref('/' + type + '/').push(new_group_dict);

                document.getElementById(dropdown_id).click();
            }
            else
            {
                alert("Please fill out all fields!");
            }
        }
        else
        {
            new_group_dict["counselor"] = counselor;

            change_counselor_group((document.getElementById("counselor-list").innerHTML).split("<br>"), name, type);

            firebase.database().ref('/' + type + '/').push(new_group_dict);

            document.getElementById(dropdown_id).click();
        }
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

function format_counselor_list(counselors)
{
    let formatted_counselor_list = "";

    if(counselors.length == 0)
    {
        formatted_counselor_list += "TBD";
    }
    else
    {
        if(counselors.length == 1)
        {
            formatted_counselor_list += counselors;
        } 
        else if(counselors.length >= 2)
        {
            for(let i = 0; i < counselors.length; i++)
            {
                if(i != counselors.length - 1)
                {
                    formatted_counselor_list += counselors[i] + ",";
                }
                else
                {
                    formatted_counselor_list += counselors[i];
                }
            }
        }
    }

    return formatted_counselor_list;
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

// Must be used within a firebase snapshot function
function get_group_name(object, type)
{
    let group_name = "";

    switch(type)
    {
        case 'families': group_name = object.group_num;
            break;
        case 'cabins': group_name = object.cabin_num;
            break;
        case 'buses': group_name = object.bus_num;
    }

    return group_name;
}
</script>
