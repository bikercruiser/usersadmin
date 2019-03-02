<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">

        <form id="userLogin" class="col-3" method="POST" action="/login.php">
            <h4>Users admin</h4>
            <div class="form-group">
                <!--<label for="fullName">ФИО</label>-->
                <input type="text" class="form-control" name="login" id="login" placeholder="Имя пользователя" required>
            </div>
            <div class="form-group">
                <!--<label for="eMail">E-Mail</label>-->
                <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" required>
            </div>
            <button type="submit" class="btn btn-primary" id="addUserSubmit" name="loginSubmit">Войти</button>
        </form>
    </div>
</div>