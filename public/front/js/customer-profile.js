$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});
$( "li:has('.active')" ).addClass( "active" );




$('.custom-radio1').change(function(){
    $('.radio2').hide();
    $('.radio3').hide();

    var child='<div class="radio1">'+
                '<input class="form-control radio1" type="text" placeholder="# Order Number">'+
                '<div class="form-group mt-2 shadow-textarea">'+
                    '<textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Please include a detailed description of your customer support issue, and Otbokhlyrepresentative will respond to you as soon as possible."></textarea>'+
                '</div>'+
               '</div>';
    $(this).append(child);
    $("label").css('color','#000');
    $(this).find("label[for =defaultGroupExample1]").css( 'color','#F4774F')
});
$('.custom-radio2').change(function(){
    $('.radio1').hide();
    $('.radio3').hide();

    var child='<div class="radio2">'+
                    '<input class="form-control " type="text" placeholder="Cook Name">'+
                    '<div class="form-group mt-2 shadow-textarea">'+
                        '<textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Please include a detailed description of your customer support issue, and Otbokhlyrepresentative will respond to you as soon as possible."></textarea>'+
                    '</div>'+
                '</div>';
    $(this).append(child);
    $("label").css('color','#000');
    $(this).find("label[for =defaultGroupExample2]").css( 'color','#F4774F' )

});

$('.custom-radio3').change(function(){
    $('.radio1').hide();
    $('.radio2').hide();

    var child='<div class="radio3">'+
                    '<div class="form-group mt-2 shadow-textarea">'+
                        '<textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Please include a detailed description of your customer support issue, and Otbokhlyrepresentative will respond to you as soon as possible."></textarea>'+
                    '</div>'+
                '</div>';
    $(this).append(child);
    $("label").css('color','#000');
    $(this).find("label[for =defaultGroupExample3]").css( 'color','#F4774F' )

});
