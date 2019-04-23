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
  document.getElementById(infoType+"_data").innerHTML = "";

  if ( infoType == "bus" ){
    var num = document.getElementById("bus_num").innerHTML.slice(5);
  } else if ( infoType == "cabin" ){
    var num = document.getElementById("cabin_num").innerHTML.slice(7);
  } else {
    var num = document.getElementById("group_num").innerHTML.slice(7);
  }
  console.log(num);

  // var all_names = firebase.database().ref("/users/bus_num/").equalTo(bus_num);
  // console.log(all_names);

  // firebase.database().ref("/users/").equalTo("gschoe@uci,edu").on("value",function(data) {
  //   console.log("Equal to filter: " + data.val());
  // });
  var key_type = infoType + "_num";
  firebase.database().ref("users").orderByChild(key_type).equalTo(parseInt(num)).on("value", function(snapshot) {
    console.log(snapshot.val());
    snapshot.forEach(function(data) {
        console.log(data.val()["first_name"]);
        var full_name = data.val()["first_name"]+" "+data.val()["last_name"];
        var para = document.createElement("p");
        var node = document.createTextNode(full_name);
        para.appendChild(node);
        var element = document.getElementById(infoType+"_data");
        element.appendChild(para);
    });
  });

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
}