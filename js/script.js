const form = document.getElementById("loginForm");
const message = document.getElementById("message");

form.addEventListener("submit", function(event) {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    if (username === "" || password === "") {
        event.preventDefault();
        message.textContent = "Please fill in all fields.";
        message.style.color = "red";
    }
});

const params = new URLSearchParams(window.location.search);
const error = params.get("error");

if (error === "empty") {
    message.textContent = "Please fill in all fields.";
    message.style.color = "red";
}

if (error === "invalid") {
    message.textContent = "Invalid username or password.";
    message.style.color = "red";
}