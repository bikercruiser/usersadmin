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
                <input type="hidden" name="id" id="editId" value="">
                <div class="modal-body">
                    <div class="form-group required">
                        <label for="editFullName" class="control-label">ФИО</label>
                        <input type="text" class="form-control" name="fullname" id="editFullName" placeholder="Введите ваше имя" required>
                    </div>
                    <div class="form-group required">
                        <label for="editEmail" class="control-label">E-Mail</label>
                        <input type="email" class="form-control" name="email" id="editMail" placeholder="Введите адрес электронной почты" required>
                        <div class="invalid-feedback">
                            Данный E-Mail уже используется
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Адрес</label>
                        <input type="text" class="form-control" name="address" id="editAddress" placeholder="Введите ваш адрес">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="editUserSubmit">Изменить</button>
                </div>
            </div>
        </form>
    </div>
</div>