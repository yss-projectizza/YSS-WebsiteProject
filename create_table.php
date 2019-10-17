<!-- Use to generate table with a join button under it 
     -->
<script>
  function createTable(numCells, numCols, header="placeholder", table_type, males, females, user_type, show_button, gender_separated, boxDiv) 
  {
    if(numCells % 2 != 0)
    {
        numCells++;
    }

    let body = document.getElementsByTagName('body')[0];
    let tbl = document.createElement('table');
    tbl.classList.add("name-table");
    
    let tbdy = document.createElement('tbody');
    let th = document.createElement('th');

    th.appendChild(document.createTextNode(header));
    th.colSpan = numCols;

    tbl.appendChild(th);

    if(gender_separated)
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
                            info_link.appendChild(document.createTextNode(males[0]));
                            info_link.href = 'https://www.google.com/';
                            td.appendChild(info_link);
                        }
                        break;
                        case "student":
                        {
                            td.appendChild(document.createTextNode(males[0]));
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
                            info_link.appendChild(document.createTextNode(females[0]));
                            info_link.href = 'https://www.google.com/'; // change this to a link to student info page!
                            td.appendChild(info_link);
                        }
                        break;
                        case "student":
                        {
                            td.appendChild(document.createTextNode(females[0]));
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
    else
    {
        for (let i = 0; i < numCells; i += 2) 
        {
            let tr = document.createElement('tr');

            for (let j = 0; j < numCols; j++) 
            {
                let td = document.createElement('td');

                if(males.length != 0)
                {
                    switch(user_type)
                    {
                        case "counselor":
                        {
                            let info_link = document.createElement('a');
                            info_link.appendChild(document.createTextNode(males[0]));
                            info_link.href = 'https://www.google.com/';
                            td.appendChild(info_link);
                        }
                        break;
                        case "student":
                        {
                            td.appendChild(document.createTextNode(males[0]));
                        }
                    }
                    males.shift(); // removes the first male in the males array
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

    var buttonDiv = document.createElement('div');
    buttonDiv.classList.add("button-div");
    buttonDiv.id = "divID";

    if(show_button)
    {
        // Adds button.
        var joinButton = document.createElement("Button");
        joinButton.appendChild(document.createTextNode("Join " + header));
        joinButton.classList.add('rounded');

        firebase.database().ref(table_type).orderByChild('name').equalTo(header).once("value", function(snapshot) 
        {
            var data = Object.keys(snapshot.val())[0]; // Returns parent of Object
            var temp = Object.entries(snapshot.val());

            let database_path = table_type + "/" + data; // Path to families object that will be updated

            let studentEmail = "<?php echo $_SESSION["queryData"]["studentEmail"]; ?>";

            firebase.database().ref('users').orderByChild('studentEmail').equalTo(studentEmail).once("value", function(snapshot) 
            {
                var student = Object.entries(snapshot.val());

                let type_num = "";

                switch(table_type)
                {
                    case "families": type_num = student[0][1].group_num;
                        break;
                    case "cabins": type_num = student[0][1].cabin_num;
                        break;
                    case "buses": type_num = student[0][1].bus_num;
                }

                joinButton.addEventListener("click", function()
                {
                    if(type_num != "N/A")
                    {
                        let message = "You have already ";
                        switch(table_type)
                        {
                            case "families": message += "joined a family!";
                                break;
                            case "cabins": message += "selected a cabin!";
                                break;
                            case "buses": message += "selected a bus!";
                        }
                        
                        alert(message);
                    }
                    else if(males.length + females.length == temp[0][1].max_size)
                    {
                        let message = "";
                        switch(table_type)
                        {
                            case "families": message += "This family is full! Please join a different family!";
                                break;
                            case "cabins": message += "This cabin is full! Please select a different cabin!";
                                break;
                            case "buses": message += "This bus is full! Please select a different bus!";
                        }
                        
                        alert(message);
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

    boxDiv.appendChild(tbl);
    boxDiv.appendChild(buttonDiv);
}

function warning(text, table_type, new_value, updated_size, database_path)
{ 
  let ok_clicked = confirm(text);

  if(ok_clicked)
  {
    document.location.href ='/dashboard/main_users/campers.php';

    let email = ("<?php echo $_SESSION["queryData"]["studentEmail"]; ?>");
    email = email.replace(".", ",");
    
    switch(table_type)
    {
        case "families": firebase.database().ref('users/' + email).update({'group_num': new_value});
            break;
        case "cabins": firebase.database().ref('users/' + email).update({'cabin_num': new_value});
            break;
        case "buses": firebase.database().ref('users/' + email).update({'bus_num': new_value});
    }

    

    firebase.database().ref(database_path).update({'size': updated_size});
  }
}
</script>