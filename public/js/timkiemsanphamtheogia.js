    $(document).ready(function(){
    "use strict";
        $( "#slider-range" ).slider({
            range: true,
            min: 1,
            max: 120,
            values: [ 1, 20 ],
            slide: function( event, ui ) {
            $( "#amount" ).val( ui.values[ 0 ] + "0.000 đ"+ " - "+ ui.values[ 1 ]+"0.000 đ" );
            }
        });
        $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +"0.000 đ"+" - "
        + $( "#slider-range" ).slider( "values", 1 ) +"0.000 đ");

        $('[data-toggle="datepicker"]').datepicker();

        $(window).load(function(){
            $(".about-us-txt h2").removeClass("animated fadeInUp").css({'opacity':'0'});
            $(".about-us-txt button").removeClass("animated fadeInDown").css({'opacity':'0'});
        });
        $(window).load(function(){
            $(".about-us-txt h2").addClass("animated fadeInUp").css({'opacity':'0'});
            $(".about-us-txt button").addClass("animated fadeInDown").css({'opacity':'0'});
        });
});