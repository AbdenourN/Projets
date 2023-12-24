$(document).ready(function () {
    $('#dtDynamicVerticalScrollExample').DataTable({
      "scrollY": "50vh",
      "scrollCollapse": true,
    });
    $('.dataTables_length').addClass('bs-select');
  });
  
function lance (){
    if( $( "body" ).hasClass( "dark" ) ) {
    nodarkmod();

    } else {
        darkmod();

    } 
};

function nodarkmod(){
        $( "body" ).removeClass( "dark" );
        $( ".menu" ).removeClass( "blue" );
        $( ".menu_bos" ).removeClass( "grey" );
        $( ".button" ).removeClass( "grey" );
        $( ".divider" ).removeClass( "dark" );
        $( ".button1" ).removeClass( "grey" );
        $( ".list_notif" ).removeClass( "grey" );
        $( ".menu_info" ).removeClass( "grey" );
        $( ".divider_form" ).removeClass( "grey" );
        $( ".form_mdp" ).removeClass( "grey" );
        $( ".menu_liste" ).removeClass( "grey" );
        $( ".divider5" ).removeClass( "dark" );
        $( ".button2" ).removeClass( "blue" );
        $( "form" ).removeClass( "grey" );
        $("tr").removeClass("table-dark");
        $( ".change" ).attr('src', 'Content/Img/lune.png')
        localStorage.removeItem("mode", "dark");

};

function darkmod(){
        $( "body" ).addClass( "dark" );
        $( ".menu" ).addClass( "blue" );
        $(".menu_bos").addClass("grey");
        $(".button").addClass("grey");
        $( ".divider" ).addClass( "dark" );
        $(".button1").addClass("grey");
        $(".list_notif").addClass("grey");
        $(".menu_info").addClass("grey");
        $(".divider_form").addClass("grey");
        $(".form_mdp").addClass("grey");
        $(".menu_liste").addClass("grey");
        $(".divider5").addClass("dark");
        $(".button2").addClass("blue");
        $("form").addClass("grey");
        $("tr").addClass("table-dark");
        $( ".change" ).attr('src', 'Content/Img/soleil.png');
        localStorage.setItem("mode", "dark");
        
};
window.onload = function() {
    if(localStorage.getItem("mode")=="dark")
{
    darkmod();
}
else{
    nodarkmod();
    };
  }

  












