<h1>Инструкция по установке и настройке проекта</h1>
<h4>Создание базы данных</h4>
<ul>
        <li>
                Название базы данных: <strong>checkngo</strong>. Насторойка по умолчанию!
        </li>
</ul>

<h4>Создание таблицы</h4>
<ul>
        <li>
                Вы можете создать таблицу <strong>users</strong> в базе данных <strong>checkngo</strong> с помощью следующего SQL-скрипта:
        </li>
        <pre>
                CREATE TABLE users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    amount_share DECIMAL(10, 2) NOT NULL DEFAULT 0
                );</pre>
</ul>

<h4>Установка проекта</h4>
<ul>
        <li>
                Клонируйте репозиторий на локальную машину:
        </li>
        <pre>
                git clone https://github.com/MadiyarZh/checkngo.git</pre>
        <li>
                Перейдите в каталог проекта:
        </li>
        <pre>
                cd checkngo</pre>
        <li>
                Откройте проект в вашем любимом текстовом редакторе.
        </li>
</ul>

<h4>Настройка базы данных</h4>
<ul>
        <li>
                В файле <strong>includes/connection.php</strong> укажите данные для подключения к вашей базе данных:
        </li>
        <pre>
                $servername = "localhost"; // Имя сервера базы данных
                $username = "ваше_имя_пользователя"; // Имя пользователя базы данных
                $password = "ваш_пароль"; // Пароль пользователя базы данных
                $dbname = "checkngo"; // Название базы данных</pre>
        <li>
                Сохраните файл.
        </li>
</ul>

<h4>Запуск проекта</h4>
<ul>
        <li>
                Откройте проект в веб-браузере, используя локальный сервер или любой другой способ, который вы предпочитаете.
        </li>
        <li>
                Теперь ваш проект готов к использованию!
        </li>
</ul>
