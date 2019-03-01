$(function () {

    $('#addUser').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/adduser', //this is the submit URL
            type: 'POST', //or POST
            data: $('#addDataCenterForm').serialize(),
            success: function (data) {
                //alert('successfully submitted')
                location.reload();
            }
        });
    });

    /*
     $('#editButton').click(function(event) {
     event.preventDefault();
     if($('input[type=checkbox]:checked').length == 1) {    
     $('#editDataCenter').modal('show');
     } else {
     alert('Необходимо выбрать одно серверное помещение');
     }
     });
     * 
     */
});