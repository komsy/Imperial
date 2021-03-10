//Add description js
$(document).ready(function() {
  $('.adddesc').click(function (e) {
    e.preventDefault();
    var patientId = $(this).attr('val');
    $.get('adddesc?patientId='+patientId, function (data) {
        $('#adddesc').modal('show')
            .find('#adddescContent')
            .html(data);
    });
});
});

//Add feedback
$('.addfeedback').click(function(e){
            e.preventDefault();
           $.get('addfeedback',function(data){
                $('#addfeedback').modal('show')
                    .find('#addfeedbackContent')
                    .html(data);
        });
    });
