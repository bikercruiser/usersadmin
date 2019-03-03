$(function () {

    //Load table on first page load
    loadTable();

/*
    $(document).ready(function () {
        var table = $('#userTable').DataTable({
            ajax: '/ajax/gettable.php',
            columns: [
                {data: 'id'},
                {data: 'fullname'},
                {data: 'email'},
                {data: 'address'},
            ],
            rowReorder: true,
            columnDefs: [
                {orderable: true, className: 'reorder', targets: 0},
                {orderable: false, targets: '_all'}
            ]
        });
    });
*/

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

                //Clean form
                $('#fullName').val('');
                $('#eMail').val('');
                $('#addRess').val('');

                //Load new content to table
                loadTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('error(s):' + textStatus, errorThrown);
            }
        });
    });

    //Edit user info
    $('#editUser').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/ajax/edituser.php',
            type: 'POST',
            data: $('#editUserForm').serialize(),
            success: function (response, textStatus, jqXHR) {

                //Hide form modal window
                $('#editUser').modal('hide');
                
                //Clean table body
                $("#userTableBody").empty();

                //Load new content to table
                loadTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('error(s):' + textStatus, errorThrown);
            }
        });
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
        $('#editMail').val(eMail);
        $('#editAddress').val(addRess);
        $('#editMail').removeClass("is-invalid");
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
                loadTable();
            }
        });
    });

    //Check E-Mail
    checkMail('#eMail', '#addUserForm', '#addUserSubmit');
    checkMail('#editMail', '#editUserForm', '#editUserSubmit');
});

function loadTable() {
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

function checkMail(input_ident, form_ident, submit_ident) {
    $(input_ident).on('change', function (e) {
        e.preventDefault();
        //alert('OK');
        $.ajax({
            type: 'POST',
            url: '/ajax/checkmail.php',
            data: $(form_ident).serialize(),
            success: function (response) {
                //Clean invalid states
                $(input_ident).removeClass("is-invalid");
                $(submit_ident).prop("disabled", false);

                //Check existing E-Mails
                if (response != 0) {

                    //Set invalid states
                    $(input_ident).addClass("is-invalid");
                    $(submit_ident).prop("disabled", true);
                }
            },
        });
    });
}