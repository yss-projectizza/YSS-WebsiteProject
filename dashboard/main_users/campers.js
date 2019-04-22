  var config = {
      apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
      authDomain: "yss-project-69ba2.firebaseapp.com",
      databaseURL: "https://yss-project-69ba2.firebaseio.com",
      projectId: "yss-project-69ba2",
      storageBucket: "yss-project-69ba2.appspot.com",
      messagingSenderId: "530416464878"
  };

  firebase.initializeApp(config);

function toggleInfo(evt, infoType) {
  var bus_num = document.getElementById("bus_test").innerHTML.slice(5);
  console.log(bus_num);

  // var all_names = firebase.database().ref("/users/bus_num/").equalTo(bus_num);
  // console.log(all_names);

  // firebase.database().ref("/users/").equalTo("gschoe@uci,edu").on("value",function(data) {
  //   console.log("Equal to filter: " + data.val());
  // });

  firebase.database().ref("users").orderByChild("bus_num").equalTo(63).on("value", function(snapshot) {
    console.log(snapshot.val());
    snapshot.forEach(function(data) {
        console.log(data.key);
    });
  });

  var name = "Jenny Chau";

  // firebase.database().ref('users/').once('value').then(function(snapshot)
  //     {
  //         console.log("checking if exists");
  //         name = (snapshot.val() && snapshot.val().first_name);
  //         console.log(name);
  //     }
  // );

  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for(i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for(i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }
  document.getElementById(infoType).style.display = "block";
  evt.currentTarget.className += "active";

  document.getElementById("data").innerHTML = name;

}