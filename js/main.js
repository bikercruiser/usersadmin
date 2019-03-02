$(function () {

    //Load table on first page load
    $.ajax({
        type: 'get',
        url: '/ajax/gettable.php',
        dataType: 'json',
        success: function (response) {
            var tr = '';
            $.each(response, function (i, item) {
                tr += '<tr><td><input type="checkbox" name="id[]" value="' + item.id + '"></td>'
                        + '<td id="fullName">' + item.fullname + '</td><td id="eMail">' + item.email + '</td><td id=addRess>' + item.address + '</td>'
                        + '<td><a href="#" data-role="edit" data-toggle="modal" data-target="#editUser" data-id="' + item.id + '">Изменить</a></td>'
                        + '</tr>';
            })
            $('#userTable').append(tr);
        },
    });

// 
//data-id="' + item.id + '"

    //Edit user info
    $(document).on('click', 'a[data-role=edit]', function(e){
        
        e.preventDefault();
        
        var id          = $(this).data('id');
        var firstName   = $('#fullName').val();
        var eMail       = $('#eMail').text();
        var addRess     = $('#addRess').val();
        
           //console.log(id);
        alert(eMail);
    });

    //Add user to table
    $('#addUser').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/ajax/adduser.php',
            type: 'POST',
            data: $('#addUserForm').serialize(),

            success: function (response, textStatus, jqXHR) {

                //Hide form modal window
                $('#addUser').modal('hide');

                //Clean table body
                $("#userTableBody").empty();

                //Load new content to table
                $.ajax({
                    type: 'get',
                    url: '/ajax/gettable.php',
                    dataType: 'json',
                    success: function (response) {
                        var tr = '';
                        $.each(response, function (i, item) {
                            tr += '<tr><td><input type="checkbox" name="id[]" value="' + item.id + '"></td>'
                                    + '<td id="fullName">' + item.fullname + '</td><td id="eMail">' + item.email + '</td><td id=addRess>' + item.address + '</td>'
                                    + '<td><a href="" id="editLink" data-id="' + item.id + '" data-toggle="modal" data-target="#editUser">Изменить</a></td>'
                                    + '</tr>';
                        })
                        $('#userTable').append(tr);
                    },
                });

                //location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('error(s):' + textStatus, errorThrown);
            }
        });
    });

    //Delete user from table
    $('#userTableForm').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/ajax/deleteuser.php',
            type: 'POST',
            data: $('#userTableForm').serialize(),
            success: function (data) {
                //alert('successfully submitted')
                //location.reload();
                $("#userTableBody").empty();
                $.ajax({
                    type: 'get',
                    url: '/ajax/gettable.php',
                    dataType: 'json',
                    success: function (response) {
                        var tr = '';
                        $.each(response, function (i, item) {
                            tr += '<tr><td><input type="checkbox" name="id[]" value="' + item.id + '"></td>'
                                    + '<td name="fullName">' + item.fullname + '</td><td name="eMail">' + item.email + '</td><td name=addRess>' + item.address + '</td></tr>'
                        })
                        $('#userTable').append(tr);
                    },
                });
            }
        });
    });
});