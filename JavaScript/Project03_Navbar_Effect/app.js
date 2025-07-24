let sections = document.querySelectorAll("section");
let trans = document.querySelector(".trans");
let gradients = ["coral", "chartreuse", "#ff1234", "cadetblue"];

let options ={
    threshold: 0.7,
};

let observer = new IntersectionObserver(navScroll, options);

sections.forEach(function(section){
    observer.observe(section);
});
    
function navScroll(enteries){
    enteries.forEach(function(entry){
        // console.log(entry);
        let className = entry.target.className;
        // console.log(className);
        let activeLink = document.querySelector(`[data-page="${className}"]`);
        let elementIndex = entry.target.getAttribute("data-index");
        // console.log(elementIndex);
        let coordinates = activeLink.getBoundingClientRect();
        // console.log(coordinates);
        let directions = {
            height: coordinates.height,
            width: coordinates.width,
            top: coordinates.top,
            left: coordinates.left,
        };
        if(entry.isIntersecting){
            trans.style.setProperty("height", `${directions.height}px`);
            trans.style.setProperty("width", `${directions.width}px`);
            trans.style.setProperty("top", `${directions.top}px`);
            trans.style.setProperty("left", `${directions.left}px`);
            trans.style.backgroundColor=gradients[elementIndex];
        }
    });
};