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