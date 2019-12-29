<?php
    if($_SESSION["queryData"]["user_type"] == "student")
    {
        $email = $_SESSION["queryData"]["studentEmail"];
    }
    else
    {
        $email = $_SESSION["queryData"]["email"];
    }
?>

<script>
    let emailwcomma = ("<?php echo $email?>").replace(".", ",");

    firebase.storage().ref('icon/' + emailwcomma).getDownloadURL().then(function (url)
    {
        let profile_pic = document.getElementById("profile-pic");
        profile_pic.src = url;
        profile_pic.style.height = "50px";
        profile_pic.style.width = "50px";
    }).catch(function (error)
    {
        let profile_pic = document.getElementById("profile-pic");
        profile_pic.src = "/profile_placeholder.jpg";
        profile_pic.style.height = "50px";
        profile_pic.style.width = "50px";
    });
</script>