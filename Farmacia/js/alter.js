const alterTable = document.querySelector('#alterTable');
let tr = document.createElement('tr');
    tr.setAttribute('id', 'alterInputs');
    alterTable != null ? alterTable.appendChild(tr) : null;

const names = ['name', 'manufacture', 'amount', 'controll', 'price', 'cod'];

const alterButton = document.querySelectorAll('.alterButton');

alterButton.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        let alterA = btn.children[0];
        alterTable.removeChild(tr);
        
        tr = document.createElement('tr');
        tr.setAttribute('id', 'alterInputs');
    
        let values = [];
            values = alterA.href.split(';');
            values[4] = values[4] == 'yes' ? 'Sim' : 'Não';

        for (let i = 0; i < 6; i++) {
            td = document.createElement('td')
            input = document.createElement('input');
            input.style.width = 100 + 'px';
            input.value = values[i + 1];
            input.setAttribute('name', names[i]);
            td.appendChild(input)
            tr.appendChild(td)
        }
        input = document.createElement('input');
        input.setAttribute('type', 'submit');
        tr.appendChild(input)
        alterTable.appendChild(tr)
    
        e.preventDefault();
    });
});