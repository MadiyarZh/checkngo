document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("userForm");
    const tableBody = document.getElementById("usersBody");
    const addUserBtn = document.getElementById("addUserBtn");
    const resetBtn = document.getElementById("resetBtn");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;

        const formData = new FormData();
        formData.append("action", "add");
        formData.append("name", name);
        formData.append("email", email);

        fetch("../addUser.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // console.log(data); // Ответ от сервера
            if (data === "User added successfully") {
                getUsers();
                form.reset();

                // убрать предупреждение о уже существующий почты
                updateErrorMessage('');
                
            } else if (data === "Email already exists in the database") {
                data = 'Адрес электронной почты уже существует в базе данных. Пожалуйста, выберите другой адрес электронной почты!';
                updateErrorMessage(data);
            }
        })
        .catch(error => console.error("Error:", error));
    });

    resetBtn.addEventListener("click", function() {
        fetch("../resetUser.php", {
            method: "POST",
            body: "action=reset"
        })
        .then(response => response.text())
        .then(data => {
            // console.log(data); // Ответ от сервера
            if (data === "Users reset successfully") {
                tableBody.innerHTML = "";
            }
        })
        .catch(error => console.error("Error:", error));
    });

    function getUsers() {
        fetch("getUsers.php")
        .then(response => response.json())
        .then(users => {
            tableBody.innerHTML = "";
            users.forEach(user => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>€${(100 / users.length).toFixed(2)}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error("Error:", error));
    }

    // Найдем элемент сообщения об ошибке по его id
    var errorMessage = document.getElementById('errorMessage');

    // Функция для обновления сообщения об ошибке на странице
    function updateErrorMessage(message) {
        errorMessage.innerText = message;
    }

    getUsers();
});
