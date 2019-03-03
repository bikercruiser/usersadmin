$(function () {

    //Load table on first page load
    $(document).ready(function () {
        loadTable();
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

            var table = $('#userTable').DataTable({
                language: {
                    "emptyTable": "Нет доступных записей"
                },
                destroy: true,
                ajax: {
                    url: '/ajax/gettable_dt.php',
                },
                'columns': [
                    {"data": "sequence"},
                    {"data": "id"},
                    {"data": "fullname"},
                    {"data": "email"},
                    {"data": "address"},
                    {"data": "id"},
                ],
                'createdRow': function (row, data, dataIndex) {
                    $(row).attr('id', data.id);
                },
                'columnDefs': [
                    {
                        'targets': 0,
                        'orderable': false,
                        'searchable': false,
                        'visible': false,
                    },
                    {
                        'targets': 1,
                        'searchable': false,
                        'orderable': false,
                        'render': function (data, type, full, meta) {
                            return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
                        }
                    },
                    {
                        'targets': 2,
                        'width': '30%',
                        'createdCell': function (td, cellData, rowData, row, col) {
                            $(td).attr('data-target', 'fullName');
                        }
                    },
                    {
                        'targets': 3,
                        'width': '20%',
                        'createdCell': function (td, cellData, rowData, row, col) {
                            $(td).attr('data-target', 'eMail');
                        }
                    },
                    {
                        'targets': 4,
                        'width': '30%',
                        'createdCell': function (td, cellData, rowData, row, col) {
                            $(td).attr('data-target', 'addRess');
                        }
                    },
                    {
                        'targets': 5,
                        'searchable': false,
                        'orderable': false,
                        'render': function (data, type, full, meta) {
                            return '<a href="#" data-role="edit" data-toggle="modal" data-target="#editUser" data-id="' + $('<div/>').text(data).html() + '">Изменить</a>';
                        }
                    },
                    {
                        'targets': 6,
                        'className': 'reorder',
                        'searchable': false,
                        'orderable': false,
                        'render': function (data, type, full, meta) {
                            return '<img src="images/sort-icon.svg" height="18" width="18">';
                        }
                    },
                ],
                rowReorder: {
                    dataSrc: 'sequence',
                    selector: 'td.reorder'
                },
                retrieve: false,
                searching: false,
                paging: false,
                info: false
            });
            table.on('row-reorder', function (e, diff, edit) {
                for (var i = 0, ien = diff.length; i < ien; i++) {
                    //console.log($(diff[i].node).attr("id") + "---" + diff[i].oldData + "-->" + diff[i].newData);
                    var id = $(diff[i].node).attr("id");
                    var newSeq = diff[i].newData;
                    $.ajax({
                        type: 'post',
                        url: '/ajax/updateseq.php',
                        data: {id: id, sequence: newSeq},
                    });
                }
            });
        },
    });
}

function checkMail(input_ident, form_ident, submit_ident) {
    $(input_ident).on('change', function (e) {
        e.preventDefault();

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