let attackSpe = 0;
document.querySelector('#attack').addEventListener('click', function () {
    fetch('/1751707/Api/attack')
        .then(response =>{
        if(response.ok){
            return response.json()
                .then(data => {
                    document.querySelector('#playerHP').innerText = 'Vie : ' + data[0];
                    document.querySelector('#enemiHP').innerText = 'Vie : ' + data[2];
                    document.querySelector('#log').append(document.createElement('p').innerText = 'Vous avez fait ' + data[1] + ' dommages a l\'ennemi , ');
                    document.querySelector('#log').append(document.createElement('p').innerText = 'l\'ennemi vous as fait ' + data[3] + ' dommages');
                    document.querySelector('#log').append(document.createElement('br'));
                    if(data[2] <= 0){
                        document.querySelector('#log').append(document.createElement('p').innerText = 'Vous avez tuer  l\'ennemi' );
                        let button = document.createElement('button');
                        button.innerText = 'Continuer';
                        button.type = 'submit';
                        button.classList.add('btn');
                        button.classList.add('btn-primary');
                        document.querySelector('#quit').append(button);
                        document.querySelector('#attack').disabled = true;
                        document.querySelector('#special').disabled = true;
                    }
                    if (data[0] <= 0){
                        document.querySelector('#log').append(document.createElement('p').innerText = 'Vous avez perdu' );
                        let button = document.createElement('button');
                        button.innerText = 'Continuer';
                        button.type = 'submit';
                        button.classList.add('btn');
                        button.classList.add('btn-danger');
                        document.querySelector('#quit').append(button);
                        document.querySelector('#attack').disabled = true;
                        document.querySelector('#special').disabled = true;
                    }
                });
        }
    });
});

document.querySelector('#special').addEventListener('click', function () {
    console.log('special');
    fetch('/1751707/Api/specialAttack')
        .then(response =>{
            if(response.ok){
                return response.json()
                    .then(data => {
                        attackSpe = 1;
                        document.querySelector('#playerHP').innerText = 'Vie : ' + data[0];
                        document.querySelector('#enemiHP').innerText = 'Vie : ' + data[2];
                        document.querySelector('#log').append(document.createElement('p').innerText = 'Vous avez fait ' + data[1] + ' dommages a l\'ennemi , ');
                        document.querySelector('#log').append(document.createElement('p').innerText = 'l\'ennemi vous as fait ' + data[3] + ' dommages');
                        document.querySelector('#log').append(document.createElement('br'));
                        if(data[2] <= 0){
                            document.querySelector('#log').append(document.createElement('p').innerText = 'Vous avez tuer  l\'ennemi' );
                            let button = document.createElement('button');
                            button.innerText = 'Continuer';
                            button.type = 'submit';
                            button.classList.add('btn');
                            button.classList.add('btn-primary');
                            document.querySelector('#quit').append(button);
                            document.querySelector('#attack').disabled = true;
                            document.querySelector('#special').disabled = true;
                        }
                        if (data[0] <= 0){
                            document.querySelector('#log').append(document.createElement('p').innerText = 'Vous avez perdu' );
                            let button = document.createElement('button');
                            button.innerText = 'Continuer';
                            button.type = 'submit';
                            button.classList.add('btn');
                            button.classList.add('btn-danger');
                            document.querySelector('#quit').append(button);
                            document.querySelector('#attack').disabled = true;
                            document.querySelector('#special').disabled = true;
                        }
                        if (attackSpe === 1){
                            document.querySelector('#special').disabled = true;
                        }
                    });
            }
    });
});