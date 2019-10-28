<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<html lang="en">
  <head>
    <?php $student_email=$_GET['email']; ?>
    <title> Detailed Information | Youth Spiritual Summit</title>
      
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/student_tables.css">
    <link rel="stylesheet" href="/css/detailed_info.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body> 
    <?php include('../../header_loggedin.php') ?>
  </body>
</html>

<script>
    var config = 
    {
    apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
    authDomain: "yss-project-69ba2.firebaseapp.com",
    databaseURL: "https://yss-project-69ba2.firebaseio.com",
    projectId: "yss-project-69ba2",
    storageBucket: "yss-project-69ba2.appspot.com",
    messagingSenderId: "530416464878"
    };

    let student_email = "<?php echo $student_email ?>";

    firebase.initializeApp(config);
    firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot)
    {
      let students = Object.entries(snapshot.val());
      
      let i = 0;
  
      while(students[i][1].studentEmail != student_email)
      {
          i++;   
      }

      display_student_info(students[i][1]);

    });

function display_student_info(student)
{
  let body = document.getElementsByTagName("body")[0];
  let info_div = document.createElement('div');
  info_div.style.marginBottom = '13%';
  
  info_div.classList.add('container');
  
  let heading = document.createElement('h1');
  heading.appendChild(document.createTextNode(student.first_name + " " + student.last_name + "'s Information"));
  heading.classList.add("section-heading");

  // Dictionaries of info to be displayed under each heading
  let student_contact_info = {"Phone" : "123-456-7890", "E-mail": student.studentEmail};
  let student_camp_info = {"Family": student.group_num, "Cabin": student.cabin_num, "Bus": student.bus_num};
  let parent_contact_info = {"Parent #1 Name" : "Parent 1", "Parent #1 Phone": "123-324-5343", "Parent #1 E-mail" : "par1@gmail.com",
                             "Parent #2 Name" : "Parent 2", "Parent #2 Phone": "123-343-5343", "Parent #2 E-mail" : "par1@gmail.com"};
  let emergency_contact_info = {"EC #1 Name": "EC 1", "EC #1 Phone": "134-545-4343", "EC #1 E-mail": "ec1@gmail.com",
                                "EC #2 Name": "EC 2", "EC #2 Phone": "134-545-4323", "EC #2 E-mail": "ecfdfsdfdfsdfdfdsf1@gmail.com"};
  let health_info = {"Allergies": "N/A", "Medications": "N/A", "Dietary Restrictions": "N/A", "Activity Restrictions": "N/A"}
  
  info_div.appendChild(heading);
  
  let section_headings = ["Contact Information", "Camp Information", "Parent Contact Information", "Emergency Contact Information", "Health Information"];

  createSection(section_headings[0], student_contact_info, "student", info_div);
  createSection(section_headings[1], student_camp_info, "student", info_div);
  createSection(section_headings[2], parent_contact_info, "contact", info_div);
  createSection(section_headings[3], emergency_contact_info, "contact", info_div);
  createSection(section_headings[4], health_info, "student", info_div);

  body.appendChild(info_div);
}

function createSection(section_title, info_dictionary, section_type, info_div)
{
  let section_heading = document.createElement('h2');
  section_heading.appendChild(document.createTextNode(section_title));
  section_heading.style.marginTop = '20px';
  
  let line = document.createElement('hr');
  line.classList.add('heading-underline');

  info_div.appendChild(section_heading);
  info_div.appendChild(line);

  let items = Object.keys(info_dictionary);
  let text = Object.values(info_dictionary);

  if(section_type == "student")
  {
    for(let i = 0; i < items.length; i++)
    {
      let item_div = document.createElement('div');
      item_div.classList.add('rounded', 'item');
      
      let text_div = document.createElement('div');
      text_div.style.display = 'inline-block';

      item_div.appendChild(document.createTextNode(items[i]));
      text_div.appendChild(document.createTextNode(text[i]));
      
      info_div.appendChild(item_div);
      info_div.appendChild(text_div);
      info_div.appendChild(document.createElement('br'));
      info_div.appendChild(document.createElement('br'));
    }
  }
  else
  {
    for(let i = 0; i < items.length / 2; i++)
    {
      let col_div_1 = document.createElement('div');
      col_div_1.classList.add('column-div');
      
      let col_div_2 = document.createElement('div');
      col_div_2.classList.add('column-div');
      
      let item1_div = document.createElement('div');
      item1_div.classList.add('rounded', 'item');
      
      
      let text1_div = document.createElement('div');
      text1_div.style.display = 'inline-block';

      item1_div.appendChild(document.createTextNode(items[i]));


      text1_div.appendChild(document.createTextNode(text[i]));
      
      let item2_div = document.createElement('div');
      item2_div.classList.add('rounded', 'item');
      item2_div.style.backgroundColor = 'darkorange';
      
      let text2_div = document.createElement('div');
      text2_div.style.display = 'inline-block';

      item2_div.appendChild(document.createTextNode(items[i + 3]));
      text2_div.appendChild(document.createTextNode(text[i + 3]));

      col_div_1.appendChild(item1_div);
      col_div_1.appendChild(text1_div);
      col_div_2.appendChild(item2_div);
      col_div_2.appendChild(text2_div);

      // Puts the columns in a row
      let row_div = document.createElement('div');
      row_div.appendChild(col_div_1);
      row_div.appendChild(col_div_2);
      
      info_div.appendChild(row_div);
      info_div.appendChild(document.createElement('br'));
    }
  }
}
</script>