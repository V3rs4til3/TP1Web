function showSelected(e){
    console.log(this.id);
    if(this.checked){
        let img = document.querySelector("img").src = '/MVC/Assets/Images/' + this.value + '.png';
    }
}

let radioBtn = document.querySelectorAll('[name=radio]')
for(let rad of radioBtn){

    rad.addEventListener('click', showSelected)
}