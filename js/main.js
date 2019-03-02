$(function () {

    //Load table on first page load
    $.ajax({
        type: 'get',
        url: '/ajax/gettable.php',
        dataType: 'json',
        success: function (response) {
            var tr = '';
            $.each(response, function (i, item) {
                tr += '<tr id="' + item.id + '"><td><input type="checkbox" name="id[]" value="' + item.id + '"></td>'
                        + '<td data-target="fullName">' + item.fullname + '</td><td data-target="eMail">' + item.email + '</td><td data-target=addRess>' + item.address + '</td>'
                        + '<td><a href="#" data-role="edit" data-toggle="modal" data-target="#editUser" data-id="' + item.id + '">Изменить</a></td>'
                        + '</tr>';
            })
            $('#userTable').append(tr);
        },
    });

    //Call Edit user modal window and set it fields
    $(document).on('click', 'a[data-role=edit]', function (e) {
        e.preventDefault();

        //Get data from current table row
        var id = $(this).data('id');
        var fullName = $('#' + id).children('td[data-target=fullName]').text();
        var eMail = $('#' + id).children('td[data-target=eMail]').text();
        var addRess = $('#' + id).children('td[data-target=addRess]').text();

        $('#editId').val(id);
        $('#editFullName').val(fullName);
        $('#editEmail').val(eMail);
        $('#editAddress').val(addRess);
    });

    //Edit user info
    $('#editUser').on('submit', function (e) {
        e.preventDefault();

        console.log($('#editUserForm').serialize());

        $.ajax({
            url: '/ajax/edituser.php',
            type: 'POST',
            data: $('#editUserForm').serialize(),

            success: function (response, textStatus, jqXHR) {

                //alert(data.id);
                console.log(response);
                //alert('error');
                //Hide form modal window
                $('#editUser').modal('hide');

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
                            tr += '<tr id="' + item.id + '"><td><input type="checkbox" name="id[]" value="' + item.id + '"></td>'
                                    + '<td data-target="fullName">' + item.fullname + '</td><td data-target="eMail">' + item.email + '</td><td data-target=addRess>' + item.address + '</td>'
                                    + '<td><a href="#" data-role="edit" data-toggle="modal" data-target="#editUser" data-id="' + item.id + '">Изменить</a></td>'
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
                            tr += '<tr id="' + item.id + '"><td><input type="checkbox" name="id[]" value="' + item.id + '"></td>'
                                    + '<td data-target="fullName">' + item.fullname + '</td><td data-target="eMail">' + item.email + '</td><td data-target=addRess>' + item.address + '</td>'
                                    + '<td><a href="#" data-role="edit" data-toggle="modal" data-target="#editUser" data-id="' + item.id + '">Изменить</a></td>'
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
                            tr += '<tr id="' + item.id + '"><td><input type="checkbox" name="id[]" value="' + item.id + '"></td>'
                                    + '<td data-target="fullName">' + item.fullname + '</td><td data-target="eMail">' + item.email + '</td><td data-target=addRess>' + item.address + '</td>'
                                    + '<td><a href="#" data-role="edit" data-toggle="modal" data-target="#editUser" data-id="' + item.id + '">Изменить</a></td>'
                                    + '</tr>';
                        })
                        $('#userTable').append(tr);
                    },
                });
            }
        });
    });
});