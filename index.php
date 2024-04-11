<?php
include 'includes/header.php';
?>
    <div class="container">
        <h1>
            Тестовое задание Fullstack developer
        </h1>
        <div id="errorMessage" style="color: red;"></div>
        <form id="userForm">
            <input type="text" id="name" placeholder="Ваше имя" required>
            <input type="email" id="email" placeholder="Ваш электронный адрес" required>
            <button type="submit" id="addUserBtn" class="standart-btn">Добавить</button>
            <!-- <button type="submit" id="resetBtn" class="standart-btn">Сброс</button> -->
        </form>
        <br>
        <hr>
        <h2>Пользователи для оплаты:</h2>
        <table id="usersTable">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Платить</th>
                </tr>
            </thead>
            <tbody id="usersBody">
                <?php require_once "addUser.php"; ?>
                
                <?php
                
                // var_dump($users);
                if (empty($users)) { ?>
                    <tr>
                        <td colspan="3">Таблица пуста</td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>€<?php echo $user['amount_share']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <button type="submit" id="resetBtn" class="standart-btn">Сброс</button>
    </div>
    
<?php
include 'includes/footer.php';
?>