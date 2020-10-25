require('./bootstrap');

var links = document.querySelectorAll('.change');
var btns = document.querySelectorAll('.btn-danger');

links.forEach((link) => {
     link.addEventListener("click", function() {
     event.preventDefault();
     var number = link.id;
     console.log(number);
     var form = document.querySelector("#form" + number);
     console.log(form.className);
     if(form.className == "hidden"){
          form.classList.remove("hidden");
          console.log("block");
     }
     else{
          form.classList.add("hidden");
          console.log("none");
     }
})
});

btns.forEach((btn) => {
     btn.addEventListener("click", function() {
     event.preventDefault();
     var number = btn.id;
     console.log(number);
     var form = document.querySelector("#form" + number);
     console.log(form.className);
     form.classList.add("hidden");
})
});