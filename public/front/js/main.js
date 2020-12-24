
$(".day-picker").each(function() {

    const $week = $(".day-picker-week", this);
    const $days = $(".day-value", this);
    const $prev = $(".prev", this);
    const $next = $(".next", this);
    const $today=new Date();
    const visible = Math.floor($week.width() / $days.outerWidth(true));
    const perc = 100 / visible;
    const tot = $days.length;
    const steps = tot - visible;
    let c = 0;
    // console.log($today.toString().split(' ')[0]);
    // console.log($days[0]);
    // console.log($days[0].innerText)

    const anim = () => {
      $week.css({transform: `translateX(${-perc*c}%)`});
    }

    $prev.on("click", function() {
      c -= 1;
      if (c < 0) c = steps;
      anim();
    });

    $next.on("click", function() {
      c += 1;
      if (c > steps) c = 0;
      anim();
    });



});

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggle("show");
  });




  $("#slider-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [600, 720],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time').html(hours1 + ':' + minutes1);

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2').html(hours2 + ':' + minutes2);
    }
});

$( "#slider1-range" ).slider({
    range: true,
    min: 0,
    max: 500,
    values: [ 75, 300 ],
    slide: function( event, ui ) {
        $( "#amount" ).val( " EGP " + ui.values[ 0 ] + " - EGP " + ui.values[ 1 ] );
    }
});
$( "#amount" ).val( " EGP " + $( "#slider1-range" ).slider( "values", 0 ) + " - EGP" + $( "#slider-range" ).slider( "values", 1 ) );



$(document).ready(function() {
    $('#rateMe4').mdbRate();


    $('.tag').click(function () {
        $(this).toggleClass('span-active')
    });

    $('.cook-near').click(function () {
       $(this).siblings().removeClass('active-link');
       $(this).addClass('active-link');
       $('.content1').css('display','none')
       $('.content2').css('display','block')
    });

    $('.default').click(function () {
        $(this).siblings().removeClass('active-link');
        $(this).addClass('active-link');
        $('.content2').css('display','none')
        $('.content1').css('display','block')
    });
  });
