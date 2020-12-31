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



let userInput = (search)? document.querySelector("#name").value:"";
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
                    postalCode.value = c[1].children[2].innerHTML;

                }


                if(city.value.length > 0 && address.value.length>0){
                   matchList.innerHTML = "";
                }
            });


    }
}
if(search){
    search.addEventListener('input',()=>searchCompany(search.value));
}

var linkedinValidation = new Vue({
    el: "#app",
    data: {
        accountExist: false,
        formPath: '/register',
        emailValidClass: '',
        emailFbClass: 'valid-feedback',
        emailErrors: [],
        showBackButton: false,
        title: 'Geef je school email in'

    },
    methods: {
        checkEmail: function(e){
            e.preventDefault();
            var appVue = this;
            let token = $('input[name="_token"]').val();
            let email = $('#email').val();
            
            $.ajax({
                type:'POST',
                url:'/ajax/check-email',
                data:{
                    email: email,
                    _token: token
                },
                success:function(data) {
                    console.log('success');
                    console.log(data);
                    appVue.emailValidClass='';
                    appVue.emailFbClass='valid-feedback';
                    appVue.emailErrors = [];

                    if(data.accountExist){
                        appVue.accountExist = true;
                        appVue.formPath = '/provide-email';
                        appVue.title = 'Geef het wachtwoord voor ' + data.email;
                        appVue.showBackButton = true;
                        let password = $("#password").val();

                        if(password && password != ""){
                            appVue.$refs.form.submit();
                        }
                    }else if(data.accountExist == false && appVue.accountExist == false){
                        appVue.$refs.form.submit();
                    }
                    
                },
                error:function(err){
                    console.log('error');
                    if(err.status == 422){
                        console.log(err.responseJSON.errors);
                        if(err.responseJSON.errors.email){
                            appVue.emailErrors = err.responseJSON.errors.email;
                            appVue.emailValidClass='is-invalid';
                            appVue.emailFbClass='invalid-feedback';
                        }
                    }
                    
                }
            });
        },
        createAccount: function(){
            this.accountExist = false;
            this.formPath = '/register';
            this.showBackButton = false;
            this.title = 'Geef je school email in';
        }
    }
});
