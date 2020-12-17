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


/*---------Nearest-Station-Card------------*/

var scoreErrmsg = document.querySelector(".scoreErrmsg");

if(scoreErrmsg === null){
var scoreErrmsg = 0;
}else{
  if (scoreErrmsg.innerHTML.length == 8) {
      document.querySelector(".scoreErrmsg").style.display = "none";
  } else {
      document.querySelector(".scoreErrmsg").style.display = "block";
  }
}


/*--------End-Nearest-Station-Card------------*/


/*--------------------Search-Company-autoFill--------------------------*/

let search = document.querySelector("#name");


let matchList = document.querySelector(".match-list");


let city = document.querySelector("#city");
let address = document.querySelector("#address");
let cName = document.querySelector("#name");
let postalCode = document.querySelector("#postalCode");



let userInput = document.querySelector("#name").value;
//Search states.json and filter it

const searchCompany = async searchText => {

  const res = await fetch("https://api.foursquare.com/v2/search/autocomplete?locale=en&explicit-lang=false&v=20201215&near=BE&m=foursquare&group=unified&query="+searchText+"&isMobile=false&categoryId=4d4b7105d754a06375d81259,4bf58dd8d48988d124941735,52e81612bcbc57f1066b7a3d&client_id=C144Y2BBFDGC3LYUDTRMEPWPN3UMRUGJP24TI3KIQIBQGXP4&client_secret=1NCXUQ4W3DNPUD4QPCMVVGWBQBVTAAO2V1CT4B0NLKD3OIFP");
  const companys = await res.json();
    const companyInfo = companys["response"]["groups"][0]["items"];

    let matches = companyInfo.filter(company=>{
    const regex = new RegExp(`^${searchText}`,`gi`);
    console.log(company.text.match(regex));


    return company.text.match(regex);
    });

    if(searchText.length === 0){
        matches = [];
        matchList.innerHTML="";
        }
    //console.log(matches);


//console.log(companyInfo);
 outputHtml(matches);
};

//Show results in HTML
const outputHtml = matches=>{
    if(matches.length > 0){
        const html = matches
            .map(
                match => `<a href="#"><div id="${match["object"].id}"class="card card-body mb-1">
            <h4>${match["object"].name}</h4>
            <small ><span class="address">${match["object"].location.address}</span><span class="city"> ${match["object"].location.city}</span> <span class="postalCode">${match["object"].location.postalCode}</span></small>
            </div></a>`
            )
            .join("");

    matchList.innerHTML=html;

            document.querySelector('.card-body').addEventListener('click',function(e){
                e.preventDefault();


                console.log(this.children[1].child);
                let c = this.children;
                console.log(c[0].innerHTML);
                cName.value = c[0].innerHTML;
                for (let i = 0; i < c.length; i++) {
                    //console.log(c[1].children[2].innerHTML);

                    city.value = c[1].children[1].innerHTML;
                    address.value = c[1].children[0].innerHTML;

                }


                if(city.value.length > 0 && address.value.length>0){
                   matchList.innerHTML = "";
                }
            });


    }
}
search.addEventListener('input',()=>searchCompany(search.value));
