$(document).ready(function(){
            $("#header_inbox_bar").load("notifications.php");
            setInterval(function(){
              $("#header_inbox_bar").load("notifications.php")
            }, 10000);


             $("#header_inbox").load("notifications_cons.php");
            setInterval(function(){
              $("#header_inbox").load("notifications_cons.php")
            }, 10000);

        });