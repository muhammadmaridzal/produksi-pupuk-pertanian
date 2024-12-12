const signinBtn = document.getElementById('signinBtn');
const popup = document.getElementById('popup');
const closePopupBtn = document.getElementById('closePopupBtn');
const loginForm = document.getElementById('loginForm');


function showPopup() {
    popup.style.display = 'flex'; 
}

signinBtn.addEventListener('click', function() {
   
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;


    if (name && email && password) {
   
        showPopup();

        setTimeout(function() {
            window.location.href = "dashboard.html"; 
        }, 2000); 
    } else {
        alert('Harap lengkapi semua kolom!');
    }
});


closePopupBtn.addEventListener('click', function() {
    popup.style.display = 'none'; 
});


window.addEventListener('click', function(event) {
    if (event.target === popup) {
        popup.style.display = 'none';
    }
});
