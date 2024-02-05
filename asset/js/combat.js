let text = document.getElementById('pokemon-winner').innerText;
text = text.replace(/ /g, ' ');
let delay = 100;
let i = 0;

document.getElementById('pokemon-winner').innerText = '  ';

function typeWriter() {
    if (i < text.length) {
        let char = text.charAt(i);
        document.getElementById('pokemon-winner').innerText += char;
        i++;
        setTimeout(typeWriter, delay);
    }
}

setTimeout(typeWriter, 1600);


let text2 = document.getElementById('res').innerText;
text2 = text2.replace(/ /g, ' ');
let delay2 = 100;
let j = 0;

document.getElementById('res').innerText = '  ';

function typeWriter2() {
    if (j < text2.length) {
        let char = text2.charAt(j);
        document.getElementById('res').innerText += char;
        j++;
        setTimeout(typeWriter2, delay2);
    }
}

typeWriter2();