let openBtn  = document.querySelector(".open");
let modalContainer = document.querySelector(".modal-container");
let closeBtn = document.querySelector(".modal-button");

openBtn.addEventListener("click", function(){
    modalContainer.classList.add("show");
});

closeBtn.addEventListener("click", function(){
    modalContainer.classList.remove("show");
});