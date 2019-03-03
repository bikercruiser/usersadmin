<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Users admin</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <!--<a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>-->
    </nav>
    <a class="btn btn-outline-primary" href="/logout.php">Log out</a>
</div>
<div class="container">
    <div class="p-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Добавить</button>
    </div>
    <div id="refreshId">
        <form id="userTableForm">
            <table class="table" id="userTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>ФИО</th>
                        <th>E-Mail</th>
                        <th>Адрес</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="userTableBody"></tbody>
            </table>
            <div class="p-3">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить пользователя?');">Удалить</button>
            </div>
        </form>
    </div>
    <?php
    require_once 'views/addform.php';
    require_once 'views/editform.php';
    ?>
</div>