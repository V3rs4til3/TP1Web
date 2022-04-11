function showSelected(e){
    console.log(this.id);
    if(this.checked){
        //document.querySelector("img").src = '/MVC/Assets/Images/' + this.value + '.png';
        document.querySelector("img").src = '/1751707/Assets/Images/' + this.value + '.png';

        let name = this.value.toString();
        let attack = document.querySelector('#attack'); //to fix
        let defense =  document.getElementById('defense');
        let health = document.getElementById('health');
        let special = document.getElementById('special');
        let passive = document.getElementById('passive');
        switch(name){
            case "Shrek":
                attack.innerText = "Attaque : 20";
                console.log('marche');
                //document.getElementById('attack').innerText = "Attaque : 5";
                defense.innerText = "Defense : 30";
                health.innerText = "Vie : 50";
                special.innerText = "Attaque special : Regenere 50% de sa vie manquante," +
                    " ajoute 10% de vie maximum (seulement pour cette partie)";
                passive.innerText = "Passif : Regenere 10% de ses points de vies perdus";
                break;
            case "Donkey":
                console.log('marche');
                attack.innerText = "Attaque : 20";
                defense.innerText = "Defense : 5";
                health.innerText = "Vie : 20";
                special.innerText = "Attaque special : Boost sa defense par 5 a chaque utilisation";
                passive.innerText = "Passif : Regenere 1hp a chaque tour";
                break;
        }
    }
}

let radioBtn = document.querySelectorAll('[name=radio]')
for(let rad of radioBtn){
    rad.addEventListener('click', showSelected)
}