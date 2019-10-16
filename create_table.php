<!-- Use to generate table with a join button under it 
     numRows-->
<script>
  function createTable(numCells, numCols, header="placeholder", males, females, user_type, show_button, boxDiv) 
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

    // Add student names that are already in the current group to the table
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
                        info_link.href = 'https://www.google.com/';
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

    var buttonDiv = document.createElement('div');
    buttonDiv.classList.add("button-div");
    buttonDiv.id = "divID";

    if(show_button)
    {
        // Adds button.
        var joinButton = document.createElement("Button");
        joinButton.appendChild(document.createTextNode("Join " + header));
        joinButton.classList.add('rounded');

        firebase.database().ref('families').orderByChild('name').equalTo(header).once("value", function(snapshot) 
        {
            var data = Object.keys(snapshot.val())[0]; // Returns parent of Object
            var temp = Object.entries(snapshot.val());

            let updated_size = temp[0][1].size + 1;
            let fam_path = 'families/' + data; // Path to families object that will be updated

            let studentEmail = "<?php echo $_SESSION["queryData"]["studentEmail"]; ?>";

            firebase.database().ref('users').orderByChild('studentEmail').equalTo(studentEmail).once("value", function(snapshot) 
            {
                var student = Object.entries(snapshot.val());

                let group_num = student[0][1].group_num;

                joinButton.addEventListener("click", function()
                {
                    if(group_num != "N/A")
                    {
                        alert("You have already joined a family!");
                    }
                    else if(males.length + females.length == temp[0][1].max_size)
                    {
                        alert("This family is full! Please join a different family.");
                    }
                    else
                    {
                        warning("Are you sure you want to join " + header + "?", header, updated_size, fam_path);
                    }
                });
            });
        });
        
        buttonDiv.appendChild(joinButton);
        
    }

    boxDiv.appendChild(tbl);
    boxDiv.appendChild(buttonDiv);
}

function warning(text, new_group, updated_size, fam_path)
{ 
  let ok_clicked = confirm(text);

  if(ok_clicked)
  {
    document.location.href ='/dashboard/main_users/campers.php';

    let email = ("<?php echo $_SESSION["queryData"]["studentEmail"]; ?>");
    email = email.replace(".", ",");
  
    firebase.database().ref('users/' + email).update({'group_num': new_group});

    group_num = new_group;

    firebase.database().ref(fam_path).update({'size': updated_size});
  }
}
</script>