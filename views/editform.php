<!-- Edit User Info-->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form id="editUserForm" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalCenterTitle">Изменить информацию о пользователе</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fullName">ФИО</label>
                        <input type="text" class="form-control" name="fullname" id="fullName" placeholder="Введите ваше имя">
                    </div>
                    <div class="form-group">
                        <label for="Email">E-Mail</label>
                        <input type="email" class="form-control" name="email" id="eMmail" placeholder="Введите адрес электронной почты">
                    </div>
                    <div class="form-group">
                        <label for="Address">Адрес</label>
                        <input type="text" class="form-control" name="address" id="addRess" placeholder="Введите ваш адрес">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="editUserSubmit">Изменить</button>
                </div>
            </div>
        </form>
    </div>
</div>