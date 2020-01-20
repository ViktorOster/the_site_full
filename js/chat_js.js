$(document).ready(function () {

    fetch_user();


    setInterval(function () {
        fetch_user();
    }, 30000);

    function fetch_user() {
        $.ajax({
            url: "php_gets/fetch_disputes.php",
            method: "POST",
            success: function (data) {
                $('#user_details').html(data);
            }
        })
    }


});


function adminchat(row) {



    var to_user_id = $('#start_chat_' + row).data('key_' + row);

    $.ajax({
        url: 'admin_dispute_handler.php',
        data: {
            gamekey: to_user_id
        },
        type: 'post',
        // dataType: 'json',
        success: function (data) {
            // alert(data);
            // 
            // window.location = 'chat.php';
            $('#body').html(data);
        },
        error: function (request, status, error) {
            // alert("Error: Could not delete");
            alert(error);
            alert(status);
            alert(request);
        }
    });

    function load() {
        $.post('php_gets/load_chat.php', {
            key: to_user_id
        }, function (result) {
            $('#result').html(result);
        });
    }
    setInterval(function () {
        load();
    }, 3000);

}



$(document).ready(function () {
    $(document).bind('keypress', function (e) {
        if (e.keyCode == 13) {
            $('#my_form').submit();
            $('#comment').val("");
        }
    });
});

function post() {
    var comment = $('#comment').val();
    var name = $('#username').val();
    var key = $('#key').val();
    var dataString = 'comment=' + comment + '&username=' + name + '&key=' + key;
    if (comment && name) {
        $.ajax({
            type: 'post',
            url: 'php_posts/commentajax.php',
            data: dataString,
            success: function (response) {
                document.getElementById("comment").innerText = "";
            },
            error: function (request, status, error) {
                // alert("Error: Could not delete");
                alert(error);
                alert(status);
                alert(request);
            }
        });
    }

    return false;
}