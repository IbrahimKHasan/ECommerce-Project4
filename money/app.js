const Counters = document.querySelectorAll('.box_counter');
function amountChange(itemno, change) {
    itemCount = Counters[itemno-1].querySelector('.count').innerHTML;
    itemCount = `${itemCount} ${change} 1`;
    itemCount = eval(itemCount) < 1 ? 1 : eval(itemCount);    
    Counters[itemno-1].querySelector('.count').innerHTML = eval(itemCount);
}

const Country = document.querySelector('#country');
function countryChoice(country) {    
    Country.value = country;
}

function validateForm() {
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.forms["form"]["email"].value)))
    {
        alert("Email is in incorrect format");
        return;
    }
    if(!(/^[0-9]/.test(document.forms["form"]["phone"].value))) {
        alert("Phone number is in incorrect format");
        return;
    }
    if(!(/^[0-9]/.test(document.forms["form"]["postal"].value))) {
        alert("Postal code is in incorrect format");
        return;
    }
    if(document.forms["form"]["fullname"].value == '') {
        alert("Please enter a name");
        return;
    }
    if(document.forms["form"]["address"].value == '') {
        alert("Please enter your address");
        return;
    }
    if(document.forms["form"]["city"].value == '') {
        alert("Please enter a city");
        return;
    }    
    if(document.forms["form"]["country"].value == '' || (document.forms["form"]["country"].value != 'United States' && document.forms["form"]["country"].value != 'Canada' && document.forms["form"]["country"].value != 'Australia')) {
        console.log(document.forms["form"]["country"].value);
        alert("Please choose a valid country");
        return;
    }    
    alert("Order Submit");
}