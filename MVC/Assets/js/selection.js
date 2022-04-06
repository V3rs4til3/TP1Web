function showSelected(e){
    console.log(this.id);
    if(this.checked){
        document.querySelector("img").src = '/MVC/Assets/Images/' + this.value + '.png';
        let name = this.value.toString();
        let attack = document.querySelector('[name=attack]');
        let defense =  document.querySelector('[name=defense]');
        let health = document.querySelector('[name=health]');
        let special = document.querySelector('[name=special]');
        let passive = document.querySelector('[name=passive]');
        switch(name){
            case "shrek":
                attack.textContent = "Attaque : 5";
                defense.textContent = "Defense : 30";
                health.textContent = "Vie : 50";
                special.textContent = "Attaque special : Regenere 50% de sa vie manquante," +
                    " ajoute 10% de vie maximum (seulement pour cette partie)";
                passive.textContent = "Passif : +5 d'attaque a tout les 10% de pv perdu";
                break;
            case "donkey":
                attack.textContent = "Attaque : 20";
                defense.textContent = "Defense : 5";
                health.textContent = "Vie : 20";
                special.textContent = "Attaque special : Inflige 20 d'attaque a tout les ennemis";
                passive.textContent = "Passif : +5 d'attaque a tout les 10% de pv perdu";
                break;
            case "cookie":
                attack.textContent = "Attaque : 1";
                defense.textContent = "Defense : 1";
                health.textContent = "Vie : 1";
                special.textContent= "Attaque special : Inflige 1 d'attaque a tout les ennemis";
                passive.textContent= "Passif : +1 d'attaque a tout les 10% de pv perdu";
                break;
        }
    }
}

let radioBtn = document.querySelectorAll('[name=radio]')
for(let rad of radioBtn){
    rad.addEventListener('click', showSelected)
}