$(document).ready(function() {
    $("#login_wrapper").effect( "shake", { times: 3 }, "slow" );
});

function myFunction() {
    $("#login_wrapper").effect( "shake", { times: 3 }, "slow" );
};

var i = setInterval(function() { myFunction(); }, 20000);
