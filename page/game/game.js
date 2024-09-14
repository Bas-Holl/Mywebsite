//zet de textbox in de variabel
const textElement = document.getElementById('text')
//zet de plek van de knoppen in de variabel
const optionButtonsElement = document.getElementById('option-buttons')
const northElement = document.getElementById('North')
const westElement = document.getElementById('West')
const eastElement = document.getElementById('East')
const southElement = document.getElementById('South')
//zet plek van de bescrhijving in de variabel
const descElement = document.getElementById('desc')
//compass
const compassElement = document.getElementById('compass')

//imports
import {verwijderknoppen,verwijderkaart,kaart, figure} from './functions.js';
import {level1} from './level1.js';
import {level2} from './level2.js';
import {level3} from './level3.js';
//status van spel
let state = [];

let north = "empty";
let west = "empty";
let east = "empty";
let south = "empty";
let omschrijvingen = "empty";
let voorwerpen = "empty";
let kamernrs = "empty";

let kamer = 0;
let once = [false,false,false,false,false,false,false,false,false,false,false,false,false,false];

function Makebutton(richting,kamernr,omschrijving,item){
    //maakt de nieuwe knop aan
    const button = document.createElement('button')
    button.classList.add('btn-outline-dark')
    button.classList.add("option");
    omschrijvingen = omschrijving;
    voorwerpen = item;
    kamernrs = kamernr;
    if(kamernr=="empty"){
        button.disabled = true;
    } else if(kamernr=="item") {
        //items
        button.addEventListener('click',() => items(omschrijving,item))
    } else if(kamernr=="dood"){
        //dood
        button.addEventListener('click',() => dood())
    } else if(kamernr=="switch"){
        //array beschrijving
        button.addEventListener('click',() => switches(omschrijving,item))
    } else if(kamernr=="desc"){
        //beschrijving
        button.addEventListener('click',() => desc(omschrijving))
        console.log('desc')
    } else if(kamernr=="deleteNaam"){
        //niet af
        localStorage.removeItem("Naam");
        start()
    } else if(kamernr=="once"){
        //knop dat maar 1 keer geklikt kan worden
        button.addEventListener('click',() => doOnce(omschrijving,item))
    } else if(kamernr=="style"){
        //style aanpassen
        button.addEventListener('click',() => style(omschrijving,item))
    } else {
        //opties/righting
        button.addEventListener('click',() => opties(kamernr,omschrijving))
        console.log(kamer)
    }

    button.innerHTML = richting;

    if(richting=="North"){
        northElement?.appendChild(button)
        north = kamernr;
    } else if(richting=="West"){
        westElement?.appendChild(button)
        west = kamernr;
    } else if(richting=="East"){
        eastElement?.appendChild(button)
        east = kamernr;
    } else if(richting=="South"){
        southElement?.appendChild(button)
        south = kamernr;
    } else {
        optionButtonsElement?.appendChild(button)
    }
}

function desc(omschrijving){
    kamerfunctie()
    console.log(state)
    descElement.innerHTML = omschrijving
}

function doOnce(omschrijving,item){
    once[item]=true;
    kamerfunctie()
    descElement.innerHTML = omschrijving
}
let interval = 0
let handle
function style(omschrijving,item){
    kamerfunctie()
    descElement.innerHTML = omschrijving
    if(item=="darkmode"){
        clearInterval(handle)
        interval=0;
        if(document.body.style.backgroundColor === "rgb(48, 48, 48)"){
            document.body.style.backgroundColor = "white";
        } else{
            document.body.style.backgroundColor = "#303030";
            var el = document.getElementsByClassName("btn-grid")[0].button;
            //console.log(el.style);
            //el.style.backgroundColor = "#303030";

            var targetDiv = document.getElementById("West").getElementsByClassName("west")[0];
            console.log(targetDiv)
            //console.log(document.body.style.backgroundColor)
        }
    } else if (item=="caramell"){
        console.log(document.body.style.backgroundColor)
        if(interval!=0){
            document.body.style.backgroundColor = "white";
            console.log("test2")
            clearInterval(handle)
            interval=0;
        } else{
            handle = setInterval(myCaramell, 500);
            console.log("test")  
        }
    }
    start()
}

//caramell mode
function myCaramell() {
    interval++
    switch(interval){
        case 0: document.body.style.backgroundColor = "white"; break;
        case 1: document.body.style.backgroundColor = "#FF10F0"; break;
        case 2: document.body.style.backgroundColor = "#39FF14"; break;
        case 3: document.body.style.backgroundColor = "#BC13FE"; break;
        case 4: document.body.style.backgroundColor = "#cfff04"; break; 
        case 5: document.body.style.backgroundColor = "#e20000"; interval = 0; break;
    }
}

function items(omschrijving,item){
    state.push(item)
    kamerfunctie()
    descElement.innerHTML = omschrijving
}

let switchs = 0;

//switch
function switches(omschrijving,item){
    let length = omschrijving.length-1;
    kamerfunctie()
    if(switchs<length+1){
    descElement.innerHTML = omschrijving[switchs]
    } else {
        if(item=="dood"){
            switchs=-1
            kamer = "switchs"
            kamerfunctie()
        }
    }
    switchs++
}

var level = 1;
//verplaatsen
function opties(kamernr,omschrijving){
    if(typeof omschrijving !== 'undefined' && !isNaN(omschrijving)){
        reset()
        //verwijderkaart()
        level = omschrijving
        //level nummer veranderen
        localStorage.setItem('Level', omschrijving);
    }
    kamer = kamernr
    textElement.innerHTML = kamer
    kamerfunctie()
}

function selectlevel(kamernr,omschrijving){
    kamer = kamernr
    level = omschrijving
    textElement.innerHTML = kamer
    kamerfunctie()
}

//dood
function dood(){
    reset()
    if(localStorage.getItem("Level")==1){
        kamer = "1a";
    } else if(localStorage.getItem("Level")==2){
        kamer = "1d";
    } else if(localStorage.getItem("Level")==3){
        kamer = "1b";
    } else {
        descElement.innerHTML = "Error"
    }
    kamerfunctie()
}

//reset level
function reset(){
    verwijderknoppen()
    verwijderkaart()
    once = [false,false,false,false,false,false,false,false,false,false,false,false,false,false];
    switchs = 0;
    state = [];
}

//localstorage
function gamedata(naam){
    localStorage.setItem('Naam', naam);
    localStorage.setItem('Level', 1);
    let array = ["Sword","Shield"];
    let string = JSON.stringify(array)
    localStorage.setItem('Items', string);
    //console.log("cats")
    //descElement.innerHTML = localStorage.getItem("Naam");
    let retString = localStorage.getItem("Items");
    descElement.innerHTML = JSON.parse(retString)
}

//start
start()
function start(){
    reset()
    //kijkt of character bestaad
    if(localStorage.getItem("Naam")!=='undefined'){
        if(localStorage.getItem("Level")==1){
            Makebutton("Start level 1","1a",1)
        } else if(localStorage.getItem("Level")==2){
            Makebutton("Start level 2","1d",2)
        } else if(localStorage.getItem("Level")==3){
            Makebutton("Start level 3","1b",3)
        } else {
            descElement.innerHTML = "Error"
        }
        //test knoppen
        // Makebutton("Start level 1","1a",1)
        // Makebutton("Start level 2","1d",2)
        // Makebutton("Start level 3","1b",3)
        //styling
        Makebutton("Darkmode","style","","darkmode")
        Makebutton("CaremellMode","style","","caramell")
        var lineBreak = document.createElement("br");
        optionButtonsElement?.appendChild(lineBreak)
        //Makebutton("DeleteNaam")
        descElement.innerHTML = localStorage.getItem("Naam");
    }   //console.log("cats")
    form("create","","","Create character")
}

//de kamers
function kamerfunctie(){  
    verwijderknoppen()
    
    switch(level){
        case 1:
            level1(kamer)
        break;
        case 2:
            level2(kamer,once)
        break;
        case 3:
            level3(kamer,once)
        break;
    }

    let compass = document.createElement("IMG");
    compass.setAttribute("src", "compass-icon-13572.png");
    // compass.setAttribute("width", "64%");//64%
    compass.setAttribute("class", "center");
    compass.setAttribute("alt", "Compass");
    compassElement.appendChild(compass);
}

function form(soort,ga,answer,knop,maxlength){
    const input = document.createElement('input')
    input.id = "input"
    input.setAttribute("maxlength",maxlength)
    optionButtonsElement?.appendChild(input)

    //maakt de nieuwe knop aan
    const button = document.createElement('button')
    button.classList.add('btn-outline-dark')
    button.type = "submit"
    if(knop!== 'undefined'){
        button.innerHTML = "Answer"
    } else {
        button.innerHTML = knop
    }
    button.innerHTML = knop
    optionButtonsElement?.appendChild(button)

    let loginForm = document.getElementById("form");
    loginForm.addEventListener("submit", (e) => {
        e.preventDefault();
    
        let antwoord = document.getElementById("input");
    
        if (antwoord.value == "") {
        } else {
            console.log(`This form has a aquired ${antwoord.value} en ${ga}`);
    
            if(soort=="vraag"){
                if(antwoord.value.includes(answer)){
                    kamer = ga
                    kamerfunctie()
                } else {
                    kamer = "3a"
                    kamerfunctie()
                }
            } else if(soort=="code"){
                if(antwoord.value.includes(answer)){
                    kamer = ga
                    kamerfunctie()
                } else {
                    kamerfunctie()
                    descElement.innerHTML = "The lock remains shut."                    
                }
            } else if(soort=="figuur"){
                //figuur puzzel
                figure(answer,antwoord,state)
            } else if(soort=="create"){
                descElement.innerHTML = antwoord.value
                gamedata(antwoord.value)
                console.log("test")
            } else {
                descElement.innerHTML = "form error"
            }
        }
    });
}

document.addEventListener('keydown', function(event) {
    if(optionButtonsElement.contains(event.target)){
       return;
    }
    let key = event.key;
    console.log("The key was: " + key)
    if(key=="w"&&north!="empty"||key=="ArrowUp"&&north!="empty"){
        kamer = north;
        kamerfunctie()
    } else if(key=="a"&&west!="empty"||key=="ArrowLeft"&&west!="empty"){
        kamer = west;
        kamerfunctie()
    } else if(key=="d"&&east!="empty"||key=="ArrowRight"&&east!="empty"){
        kamer = east;
        kamerfunctie()
    } else if(key=="s"&&south!="empty"||key=="ArrowDown"&&south!="empty"){
        kamer = south;
        kamerfunctie()
    } 
    else if(key==" "&&omschrijvingen!="empty"){
        if(kamernrs=="once"){
            doOnce(omschrijvingen,voorwerpen);
            //kamerfunctie()
            console.log("test")
            omschrijvingen="empty";
            console.log(omschrijvingen)
        } else if(kamernrs=="desc"){
            desc(omschrijvingen);
        } else if(kamernrs=="item"){
            items(omschrijvingen,voorwerpen);
            console.log("item"+voorwerpen);
        } else if(kamernrs=="switch"){
            switches(omschrijvingen,voorwerpen)
        } else if(kamernrs=="dood"){
            dood()
        }
    }
});

export {Makebutton, kaart, state, form};

//test
console.log(level)

//nog te doen

//1 V html code mee geven via javascript
//2 V typbare antwoord kunnen geven via raadsel
//3 V overige raadsels oplossen
//4 V ruimte tussen kaarten wegkrijgen
//5 V dood kamer maken (3a)
//6 V boom ontsnapping
//7 (Niet nodig) maak de kamers if statement een switch
//8 V haal undifened weg bij a1
//9 je bent hier stip toevoegen
//10 V level kunnen selecteren
//11 V character kunnen aanmaken
//12 V goede dood knop maken
//13 V kan de lava in springen
//14 V level 2
//15 darkmode
//16 duidelijk aangeven welke richting de brug is/ en waar de boom neergelecht word.
//17 V kan naar noorden maar eindigt spel.
//18 V van level 1 naar 2 gaan laten werken.
//19 V once funtion maken
//20 V dood gaan brengt je naar de begin van de level
//21 V code slot maken
//22 toetsenbord kunnen gebruiken
//23 switch vaker dan 1 keer in een level kunnen gebruiken
//24 caramelldanse mode.
//25 level 3
//26 3 cijverige puzzel
//27 sloten op deuren zetten
//28 spiegel puzzel
//29 maak nieuwe kaart

//12
//4d in level 1 kaart doet het niet goed.
//reset bij nieuwe level


//localstorage
//node/require kan draaien in index.js