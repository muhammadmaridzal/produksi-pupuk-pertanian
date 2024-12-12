document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("popup");
    const closePopupBtn = document.getElementById("closePopupBtn");


    setTimeout(() => {
        popup.style.display = "flex";
    }, 500);

    closePopupBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });
});
