<!-- *******************************************************************************************************
     * createTable
     * -----------------------------------------------------------------------------------------------------
     * This function creates a table of student names. Tables can be gender separated or 
     * display names of students of the same gender. A join button can be appended under
     * the table to allow students to join a family, cabin, or bus.
     * -----------------------------------------------------------------------------------------------------
     * PARAMETERS:
     * numCells - the max number of students a family, cabin, or bus can hold
     * numCols - number of columns in the table (usually 2) 
     * header - table header (i.e. family name, cabin number, bus) 
     * table_type - "family", "cabin", or "bus" 
     * counselor - the name(s) of the counselors
     * males - array of male names (if gender_separated == false, pass in student names in this parameter)
     * females - array of females names (if  gender_separated == false, pass in an empty array [] 
     * user_type - "student" or "counselor" 
     * show_button - true or false (whether a join button should be added under the table) 
     * gender_separated - true or false (whether a co-ed list of students should be displayed or not) 
     * boxDiv - div that will hold the table(s) - please create outside of this function 
     ****************************************************************************************************** -->
<script>
  function createTable(numCells, numCols, header="placeholder", table_type, counselor, males, females, user_type, show_button, gender_separated, boxDiv) 
  {
    // Ensures that the table always has an even number of cells.
    if(numCells % 2 != 0)
    {
        numCells++;
    }

    // Gets the current page's body
    let body = document.getElementsByTagName('body')[0];

    // Creates the table element and applies the name-table style sheet
    let tbl = document.createElement('table');
    tbl.classList.add("name-table");

    // Creates the table body element
    let tbdy = document.createElement('tbody');

    // Sets the header for the table header and appends it to the table.
    let table_title = document.createElement('th');
    table_title.appendChild(document.createTextNode(header));
    table_title.colSpan = numCols;
    tbl.appendChild(table_title);

    if(user_type == "student")
    {
        create_counselor_heading(counselor, numCols, tbl);
    }

    // Generates the appropriate table based on the gender_separated parameter
    if(gender_separated)
    {
       gender_separated_table(numCells, numCols, males, females, user_type, tbl, tbdy, body);
    }
    else
    {
        regular_table(numCells, numCols, males, user_type, tbl, tbdy, body);
    }

    // Creates a div for the join button and applies the button-div style sheet.
    var buttonDiv = document.createElement('div');
    buttonDiv.classList.add("button-div");
    buttonDiv.id = "divID";

    // Leave button
    firebase.database().ref('users').orderByChild('user_type').equalTo("student").once("value", function(snapshot)
    {
        let students = Object.entries(snapshot.val());
        
        
        let i = 0;
        let studentEmail = "<?php echo $_SESSION["queryData"]["studentEmail"]; ?>";

        while(students[i][1].studentEmail != studentEmail)
        {
            i++;
        }

        let num_type = "";

        switch(table_type)
        {
            case "family": num_type = students[i][1].group_num;
                break;
            case "cabin": num_type = students[i][1].cabin_num;
                break;
            case "bus": num_type = students[i][1].bus_num;
        }

        if(num_type == header)
        {
            create_leave_button(header, table_type, males, females, buttonDiv);
        }
        else
        {
            // Adds a button under the table if the table is being used to let students join.
            if(show_button)
            {
                create_join_button(header, table_type, males, females, buttonDiv);
            }
        }
    });



    boxDiv.appendChild(tbl);
    boxDiv.appendChild(buttonDiv);
} // end of createTable

function create_counselor_heading(counselor, numCols, tbl)
{
    let counselor_heading = document.createElement('tr');
    let counselor_info = document.createElement('td');
    counselor_info.colSpan = numCols;
    counselor_info.style.backgroundColor = '#85C1E9';
    counselor_info.style.fontWeight = 'bold';
    counselor_info.style.color = 'white';

    // Counselor row heading
    let heading = "Counselor";


    if(counselor == "N/A")
    {
        heading += "s: TBD";
    }
    else
    {
        if(counselor.includes(","))
        {
            counselor = counselor.split(",");

            heading += "s: " + counselor[0] + " & " + counselor[1];
        }
        else
        {
            heading += ": " + counselor;
        }
    }

    counselor_info.appendChild(document.createTextNode(heading));
    counselor_heading.appendChild(counselor_info);
    tbl.appendChild(counselor_heading);
}

function gender_separated_table(numCells, numCols, males, females, user_type, tbl, tbdy, body)
{
    for (let i = 0; i < numCells; i += 2) 
    {
        let tr = document.createElement('tr');

        for (let j = 0; j < numCols; j++) 
        {   
            let td = document.createElement('td');

            if(j % 2 == 0)
            {
                if(males.length != 0)
                {
                    switch(user_type)
                    {
                        case "counselor":
                        {
                            let info_link = document.createElement('a');

                            let name = males[0].first_name + " " + males[0].last_name;
                            info_link.appendChild(document.createTextNode(name));

                            let email = males[0].studentEmail;
                            info_link.href ='/dashboard/main_users/detailed_student_info.php?email=' + email;
                            
                            td.appendChild(info_link);
                        }
                        break;
                        case "student":
                        {   
                            let name = males[0].first_name + " " + males[0].last_name[0] + ".";

                            td.appendChild(document.createTextNode(name));
                        }
                    }
                    males.shift(); // removes the first male in the males array
                }
                else
                {
                    
                    td.appendChild(document.createTextNode("\u0020"));
                }
            }
            else
            {
                if(females.length != 0)
                {
                    switch(user_type)
                    {
                        case "counselor":
                        {
                            let info_link = document.createElement('a');
                            let name = females[0].first_name + " " + females[0].last_name;
                            info_link.appendChild(document.createTextNode(name));                        

                            let email = females[0].studentEmail;
                            
                            info_link.href ='/dashboard/main_users/detailed_student_info.php?email=' + email;
                            td.appendChild(info_link);
                        }
                        break;
                        case "student":
                        {
                            let name = females[0].first_name + " " + females[0].last_name[0] + ".";

                            td.appendChild(document.createTextNode(name));
                        }
                    }

                    females.shift(); // removes the first female in the females array
                }
                else
                {
                td.appendChild(document.createTextNode("\u0020"));
                }     
            }
            tr.appendChild(td);
            tbdy.appendChild(tr);
        }
        tbl.appendChild(tbdy);
        body.appendChild(tbl);
    }
}

function regular_table(numCells, numCols, students, user_type, tbl, tbdy, body)
{
    for (let i = 0; i < numCells; i += 2) 
    {
        let tr = document.createElement('tr');

        for (let j = 0; j < numCols; j++) 
        {
            let td = document.createElement('td');

            if(students.length != 0)
            {
                switch(user_type)
                {
                    case "counselor":
                    {
                        let info_link = document.createElement('a');

                        let name = students[0].first_name + " " + students[0].last_name;
                        info_link.appendChild(document.createTextNode(name));

                        let email = students[0].studentEmail;
                            
                        info_link.href ='/dashboard/main_users/detailed_student_info.php?email=' + email;

                        td.appendChild(info_link);
                    }
                    break;
                    case "student":
                    {
                        let name = students[0].first_name + " " + students[0].last_name[0] + ".";

                        td.appendChild(document.createTextNode(name));
                    }
                }
                students.shift(); // removes the first male in the males array
            }
            else
            {
            td.appendChild(document.createTextNode("\u0020"));
            }
        
            tr.appendChild(td);
            tbdy.appendChild(tr);
        }

        tbl.appendChild(tbdy);
        body.appendChild(tbl);
    }
}

function create_join_button(header, table_type, males, females, buttonDiv)
{
    // Adds button.
    var joinButton = document.createElement("Button");
    joinButton.appendChild(document.createTextNode("Join " + header));
    joinButton.classList.add('rounded');

    var db_table = ""; // name of the database table that will be accessed based on the table_type

    switch(table_type)
        {
            case "family": db_table = "families";
                break;
            case "cabin": db_table = "cabins";
                break;
            case "bus": db_table = "buses";
        }

    firebase.database().ref(db_table).orderByChild('name').equalTo(header).once("value", function(snapshot) 
    {
        var data = Object.keys(snapshot.val())[0]; // Returns parent of Object
        var temp = Object.entries(snapshot.val());
        
        var database_path = db_table + "/" + data; // Path to object type that will be updated

        let studentEmail = "<?php echo $_SESSION["queryData"]["studentEmail"]; ?>";

        firebase.database().ref('users').orderByChild('studentEmail').equalTo(studentEmail).once("value", function(snapshot) 
        {
            var student = Object.entries(snapshot.val());

            // student's current group, cabin, or bus num
            let type_num = "";

            switch(table_type)
            {
                case "family": type_num = student[0][1].group_num;
                    break;
                case "cabin": type_num = student[0][1].cabin_num;
                    break;
                case "bus": type_num = student[0][1].bus_num;
            }

            joinButton.addEventListener("click", function()
            {
                if(type_num != "N/A")
                {
                    let message = "You have already ";
                    switch(table_type)
                    {
                        case "family": message += "joined a family!";
                            break;
                        case "cabin": message += "selected a cabin!";
                            break;
                        case "bus": message += "selected a bus!";
                    }
                    
                    alert(message);
                }
                else if(males.length + females.length == temp[0][1].max_size)
                {
                    let message = "";

                    switch(table_type)
                    {
                        case "family": alert("This family is full! Please join a different family!");
                            break;
                        case "cabin": alert("This cabin is full! Please select a different cabin!");
                            break;
                        case "bus": alert("This bus is full! Please select a different bus!");
                    }
                }
                else
                {
                    warning("Are you sure you want to join " + header + "?", table_type, header, temp[0][1].size + 1, database_path);
                }
            });
        });
    });
    
    buttonDiv.appendChild(joinButton);
}

function warning(text, table_type, new_value, updated_size, database_path)
{ 
  let ok_clicked = confirm(text);

  if(ok_clicked)
  {
    document.location.href ='/dashboard.php';

    let email = ("<?php echo $_SESSION["queryData"]["studentEmail"]; ?>");
    email = email.replace(".", ",");
    
    switch(table_type)
    {
        case "family": firebase.database().ref('users/' + email).update({'group_num': new_value});
            break;
        case "cabin": firebase.database().ref('users/' + email).update({'cabin_num': new_value});
            break;
        case "bus": firebase.database().ref('users/' + email).update({'bus_num': new_value});
    }

    firebase.database().ref(database_path).update({'size': updated_size});
  }
}

function create_leave_button(header, table_type, males, females, buttonDiv)
{
    // Adds button.
    var leaveButton = document.createElement("Button");
    leaveButton.appendChild(document.createTextNode("Leave " + header));
    leaveButton.classList.add('leave-button');

    leaveButton.classList.add('rounded');

    var db_table = ""; // name of the database table that will be accessed based on the table_type

    switch(table_type)
        {
            case "family": db_table = "families";
                break;
            case "cabin": db_table = "cabins";
                break;
            case "bus": db_table = "buses";
        }

    firebase.database().ref(db_table).orderByChild('name').equalTo(header).once("value", function(snapshot) 
    {
        var data = Object.keys(snapshot.val())[0]; // Returns parent of Object
        var temp = Object.entries(snapshot.val());
        
        var database_path = db_table + "/" + data; // Path to object type that will be updated

        let studentEmail = "<?php echo $_SESSION["queryData"]["studentEmail"]; ?>";

        firebase.database().ref('users').orderByChild('studentEmail').equalTo(studentEmail).once("value", function(snapshot) 
        {
            var student = Object.entries(snapshot.val());

            // student's current group, cabin, or bus num
            let type_num = "";

            switch(table_type)
            {
                case "family": type_num = student[0][1].group_num;
                    break;
                case "cabin": type_num = student[0][1].cabin_num;
                    break;
                case "bus": type_num = student[0][1].bus_num;
            }

            leaveButton.addEventListener("click", function()
            {
                warning("Are you sure you want to leave " + header + "?", table_type, "N/A", temp[0][1].size - 1, database_path);    
            });
        });
    });
    
    buttonDiv.appendChild(leaveButton);
}


function student_name_clicked(name)
{
    let student_name = name;

    document.location.href ='/dashboard/main_users/detailed_student_info.php?name=' + name;
}
</script>