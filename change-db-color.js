$("#change-dbcolor-secondary").click(function(){
    $.ajax({
        url: "test1.php",
        type: "POST",
        data: {id: $_SESSION['id'],
        color: "bg-gradient-secondary",
        textcolor: "sidebar-dark"}, //this sends the user-id to php as a post variable, in php it can be accessed as $_POST['uid']
        success: function(data){
            data = JSON.parse(data);
            //update some fields with the updated data
            //you can access the data like 'data["driver"]'
        }
    });
});