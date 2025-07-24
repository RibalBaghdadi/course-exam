let smallImg = document.querySelectorAll("figure img");
let fullImg = document.querySelector(".full-img");
let modal = document.querySelector(".modal");


smallImg.forEach(function(i){
    i.addEventListener("click", function(){
        modal.classList.add("open");
        fullImg.classList.add("open");
        // console.log(i);

        let att = i.getAttribute("alt");
        // console.log(att);
        fullImg.src=`img/full/${att}.jpg`;
    });
});

modal.addEventListener("click", function(e){
    if(e.target.classList.contains("modal")){
        modal.classList.remove("open");
        fullImg.classList.remove("open");
    }
});


