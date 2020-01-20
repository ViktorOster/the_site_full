$(document).ready(function () {
    $('#score').submit(function () {

        $.ajax({
                type: 'POST',
                url: 'php_posts/score.php',
                data: $(this).serialize()
            })

            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;

    });
});

function dispute(key) {
    $.post('php_posts/Dispute.php', {
        key: key
    }, function (result) {
        // alert(result);

        // $('#result').html(result);
    });
}


$(document).ready(function () {
    $('#Dispute').submit(function () {

        $.ajax({
                type: 'POST',
                url: 'php_posts/Dispute.php',
                success: function (data) {

                    // just in case posting your form failed
                    alert(data);

                }
            })

            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;

    });
});

$(document).ready(function () {
    $('#Confirm').submit(function () {

        $.ajax({
                type: 'POST',
                url: 'php_posts/Confirm.php',
            })

            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;

    });
});

$(document).ready(function () {
    $('#cancel_wager').submit(function () {

        $.ajax({
                type: 'POST',
                url: 'php_delete/cancel_wager.php',
                success: function (result) {

                    if (result == 1) {
                        window.location = 'wager_page.php';
                    }
                }
            })

            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;

    });
});



// $(function () {

//     $('form').on('submit', function (e) {

//         e.preventDefault();

//         $.ajax({
//             type: 'POST',
//             url: 'php_posts/wager_insert.php',
//             data: $('form').serialize(),


//         });

//     });

// });

$(document).ready(function () {
    $("#form_submit").click(function () {
        var gamemode = $("#gamemode").val();
        var vs_type = $("#vs_type").val();
        var amount = $("#amount").val();
        var server = $("#server").val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'gamemode=' + gamemode + '&vs_type=' + vs_type + '&amount=' + amount + '&server=' + server;
        if (gamemode == '' || vs_type == '' || amount == '' || server == '') {
            alert("Please Fill All Fields");
        } else {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "php_posts/wager_insert.php",
                data: dataString,
                cache: false,
                success: function (result) {

                    alert(result);
                    if (result == "Game Mode Activated Sucessfully!") {
                        window.location = 'game_page.php';
                    }
                    if (result == "Player in que!!") {
                        window.location = 'waiting_room.php';
                    }
                    if (result == "Someone with the entered gamer tag is already in game!!") {
                        window.location = 'localhost/the_site/game_page.php';
                    }
                }
            });
        }
        return false;
    });
});



$(document).ready(function () {
    $('#terminate').submit(function () {

        $.ajax({
                type: 'POST',
                url: 'php_posts/terminate.php',
            })

            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;

    });
});

function check_dispute() {
    $("#conf_2").load("php_checks/check_dispute.php");
}

function check_confermation_your_score() {
    $("#conf_2").load("php_checks/check_dispute.php");
}

function check_confermation() {
    $("#conf_2").load("php_checks/check_dispute.php");
}

check_dispute();
check_confermation_your_score();
check_confermation();

var auto_refresh = setInterval(
    (function () {
        $("#conf_2").load("php_checks/check_dispute.php"); //Load the content into the div
    }), 3000);
var auto_refresh = setInterval(
    (function () {
        $("#conf_1").load("php_checks/check_confermation_your_score.php"); //Load the content into the div
    }), 3000);
var auto_refresh = setInterval(
    (function () {
        $("#conf").load("php_checks/check_confermation.php"); //Load the content into the div
    }), 3000);
// var auto_refresh = setInterval(
//     (function () {
//         $("#terminater").load("php_checks/check_terminate.php"); //Load the content into the div
//     }), 1500);




function setCookie(name, value) {
    // Set cookie to `namevalue;`
    // Won't overwrite existing values with different names
    document.cookie = name + value + ';';
}

function checkIfClicked() {
    // Split by `;`
    var cookie = document.cookie.split(";");

    // iterate over cookie array
    for (var i = 0; i < cookie.length; i++) {
        var c = cookie[i];
        // if it contains string "click"
        // if (/click/.test(c))
        // return true;
    }
    // cookie does not exist
    // return false;
}

// Set clicked to either the existing cookie or false
var clicked = checkIfClicked();


// Get the button
var Dispute_butt = document.getElementById("Dispute_butt")[0];

// If it had been clicked, diable button
if (clicked) button.disabled = true;

// Add event listener 
// When button clicked, set `click` cookie to true 
// and disable button
button.addEventListener("click_Dispute_butt", function () {
    setCookie("click_Dispute_butt", "true");
    button.disabled = true;
}, false);

var Confirm_butt = document.getElementById("Confirm_butt")[0];

// If it had been clicked, diable button
if (clicked) Confirm_butt.disabled = true;

// Add event listener 
// When button clicked, set `click` cookie to true 
// and disable button
Confirm_butt.addEventListener("click_Confirm_butt", function () {
    setCookie("click_Confirm_butt", "true");
    Confirm_butt.disabled = true;
}, false);

var submit_butt = document.getElementById("submit_butt")[0];

// If it had been clicked, diable button
if (clicked) submit_butt.disabled = true;

// Add event listener 
// When button clicked, set `click` cookie to true 
// and disable button
submit_butt.addEventListener("click_submit_butt", function () {
    setCookie("click_submit_butt", "true");
    submit_butt.disabled = true;
}, false);


function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";

    }
    window.location.replace("wager_page.php");
}