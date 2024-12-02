document.getElementById("adminBtn").addEventListener("click", function() {
    document.querySelector('.database-admin').classList.add("actived");
    document.querySelector('.database-admin').classList.remove("inactive");
    document.querySelector('.database-user').classList.remove("actived");
    document.querySelector('.database-user').classList.add("inactive");
    document.querySelector('.database-message').classList.remove("actived");
    document.querySelector('.database-message').classList.add("inactive");
    document.querySelector('#userBtn').classList.remove("button-actived");
    document.querySelector('#msgBtn').classList.remove("button-actived");
    document.querySelector('#adminBtn').classList.add("button-actived");
});

document.getElementById("userBtn").addEventListener("click", function() {
    document.querySelector('.database-user').classList.add("actived");
    document.querySelector('.database-user').classList.remove("inactive");
    document.querySelector('.database-admin').classList.remove("actived");
    document.querySelector('.database-admin').classList.add("inactive");
    document.querySelector('.database-message').classList.remove("actived");
    document.querySelector('.database-message').classList.add("inactive");
    document.querySelector('#adminBtn').classList.remove("button-actived");
    document.querySelector('#msgBtn').classList.remove("button-actived");
    document.querySelector('#userBtn').classList.add("button-actived");
});

document.getElementById("msgBtn").addEventListener("click", function() {
    document.querySelector('.database-message').classList.add("actived");
    document.querySelector('.database-message').classList.remove("inactive");
    document.querySelector('.database-admin').classList.remove("actived");
    document.querySelector('.database-admin').classList.add("inactive");
    document.querySelector('.database-user').classList.remove("actived");
    document.querySelector('.database-user').classList.add("inactive");
    document.querySelector('#adminBtn').classList.remove("button-actived");
    document.querySelector('#userBtn').classList.remove("button-actived");
    document.querySelector('#msgBtn').classList.add("button-actived");
});
