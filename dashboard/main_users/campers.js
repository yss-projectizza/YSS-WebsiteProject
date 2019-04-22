function toggleInfo(evt, infoType) {
  var config = {
      apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
      authDomain: "yss-project-69ba2.firebaseapp.com",
      databaseURL: "https://yss-project-69ba2.firebaseio.com",
      projectId: "yss-project-69ba2",
      storageBucket: "yss-project-69ba2.appspot.com",
      messagingSenderId: "530416464878"
  };

  firebase.initializeApp(config);

  var ref = firebase.database().ref("users");
  var bus_number = "<?php echo $_SESSION['queryData']['bus_num']; ?>"

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