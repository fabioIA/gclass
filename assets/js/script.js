const ifra = document.getElementById("ifra");
const nav = document.querySelector('nav');
let k = '';

function styles(key) {
    ifra.classList.remove('row');
    document.getElementById(key).style.borderBottom = '1px solid #101010';
    document.getElementById(key).style.color = 'rgb(170, 170, 170)';
}

function replace(key) {
    document.getElementById(key).style.borderBottom = '2px solid white';
    document.getElementById(key).style.color = 'aliceblue';
}

function menu() {
    nav.classList.toggle('active');
}

function change(key) {
    nav.classList.remove('active');

    switch (key) {
        case 'reserve':
            ifra.src = "assets/php/reservation.php"; 
    
            if (k !== '') styles(k);
            replace('reserve');
            setTimeout(() => ifra.classList.add('row'), 800);
        break;

        case 'available':
            ifra.src= "assets/php/available.php"; 
            
            if (k !== '') styles(k);
            replace('available');
            setTimeout(() => ifra.classList.add('row'), 800);
        break;
        
        case 'register':
            ifra.src = "assets/php/register.php"; 
            
            if (k !== '') styles(k);
            replace('register');
            setTimeout(() => ifra.classList.add('row'), 800);
        break;

    }

    k = key;
}

function mascaracpf(i){
   
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
 
}

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
  }
  
  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
}