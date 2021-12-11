var x = document.querySelectorAll(".page-item");
console.log(x);

x.forEach(el => {
    el.addEventListener("click", function(event){
        //event.preventDefault();
        x.forEach(nav => nav.classList.remove("active"))

        this.classList.add("active");
    })
   
});
// // x[0].classList.add('active'); 