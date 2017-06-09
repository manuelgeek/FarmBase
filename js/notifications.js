$(document).ready(function(){
            $("#header_inbox_bar").load("notifications.php");
            setInterval(function(){
              $("#header_inbox_bar").load("notifications.php")
            }, 1000);


             $("#header_inbox").load("notifications_cons.php");
            setInterval(function(){
              $("#header_inbox").load("notifications_cons.php")
            }, 1000);


        });