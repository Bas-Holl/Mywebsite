import {getRandomNum} from './functions.js';
import {Makebutton,kaart, state, form} from './game.js';

//zet de textbox in de variabel
const textElement = document.getElementById('text')
//zet plek van de bescrhijving in de variabel
const descElement = document.getElementById('desc')

const optionButtonsElement = document.getElementById('option-buttons')

const code1 = getRandomNum(9)+1;
const code2 = getRandomNum(10);
const code3 = getRandomNum(10);

const code = code1*100+code2*10+code3;

function level3form(){
    const input = document.createElement('input')
    input.id = "input"
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
    
            if(soort=="figuur"){
                if(antwoord.value==answer){
                    //geef key
                    descElement.innerHTML = "sleutel."
                    kamerfunctie()
                } else {
                    
                }
            } else if(soort=="create"){
                descElement.innerHTML = antwoord.value
                gamedata(antwoord.value)
            } else {
                descElement.innerHTML = "form error"
            }
        }
    });
}

function level3(kamer,once) {

    if(kamer == "1a"){
        //figuren slot
        textElement.innerHTML  = "The room is almost completely empty safe for a single three digit nummeric lock." + code
        Makebutton("North","empty")
        Makebutton("West","empty")
        Makebutton("East","1b")
        Makebutton("South","empty")
        form("figuur","1a",code,"Enter code",3);
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1b") {
        textElement.innerHTML  = "1b"
        Makebutton("North","empty")
        Makebutton("West","1a")
        Makebutton("South","2b")
        kaart('level2/'+kamer+'.png',kamer)
        if(once[1]==false){
            Makebutton("East","empty")
            if(state.includes('figuurKey')){
                console.log(state)
                Makebutton("Use the key on the locked door","once","The door creaks as it swings open.",1)
            }
        }
        if(once[1]==true){
            textElement.innerHTML  = "1b deur open naar 1c"
            Makebutton("East","1c")
        }
        //tijdelijk voor het testen
        Makebutton("East","1c")
    } else if(kamer == "1c") {
        textElement.innerHTML  = "The room is filled with furniture: an old dresser with mirror and lit candle, a chair placed in front of it, a carpet on the floor and a cabinet with it's doors closed."
        Makebutton("North","empty")
        Makebutton("West","1b")
        Makebutton("East","empty")
        Makebutton("South","empty")
        Makebutton("Look in the mirror","desc","You see the same room but mirrored, an old dresser with the drawer open and lit candle, a chair placed in the middle of the room, a carpet on the floor and a cabinet with it's doors open.")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1d") {
        //start/code
        let text ="Before you stands the imposing castle of the dragon Abeloth, the original name is long forgotten."
        text +="<br>Time has taken its toll on the castle and several towers and roofs have collapsed."
        text +="<br>However it still stands mighty and might be tricky to get in, the large gate is reinforced with black iron and sealed with a <b>4 number lock</b>."
        //text +="<br>There is something written under neath the lock: The first digit is the order, the second is the code"
        textElement.innerHTML = text
        //descElement.innerHTML = code + " a" + code1 + " b" + code2 + " c" + code3 + " d" + code4
        Makebutton("North","empty")
        Makebutton("West","1c")
        Makebutton("East","1e")
        Makebutton("South","empty")
        const knock1 = "You knock on the old gate but there is no response."
        const knock2 = "You knock again but alas no response, however a piece of moss fell from the door revealing the number: <b>B"+code2+"</b>."
        const knock3 = "You knock again but unsurprisingly again no response."
        const knock4 = "Again no response"
        const knock5 = "It’s an old castle that houses a dragon why are you expecting someone to actually open the door?"
        const knock6 = "Stop knocking on the door nothing will happen."
        const knock7 = "knock it of already!"
        const knock8 = "Stop it!"
        const knock9 = "…"
        const knock10 = "I might be the narrator, but I swear if you knock one more time!"
        if(once[3]==false){
            Makebutton("Knock","once",knock1,3)
        } else {
            Makebutton("Knock again","switch",[knock2, knock3, knock4, knock5, knock6, knock7, knock8, knock9, knock10])
        } 

        form("code","3j",code,"Enter code")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1e") {
    } else if(kamer == "1f") {

    } else if(kamer == "1g") {
        if(once[4]==false){
            Makebutton("Kick gravestone","once","You kick one of the gravestones into the lava. What is wrong with you?",4)
        }
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1h") {
    } else if(kamer == "2a") {
        textElement.innerHTML = "2a"
        Makebutton("North","empty")
        Makebutton("West","empty")
        Makebutton("East","2b")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2b") {
        textElement.innerHTML = "2b"
        Makebutton("North","1b")
        Makebutton("West","2a")
        Makebutton("East","2c")
        Makebutton("South","3b")
        //Makebutton("Look at the gorge",kamer,"The deep gorge has lava sputtering out of the bottom and lights up the walls in a red light.")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2c") {
        textElement.innerHTML = "2c"
        Makebutton("North","empty")
        Makebutton("West","2b")
        Makebutton("East","empty")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2d") {
        textElement.innerHTML = "<h1>Game over</h1><br>The plant grabs your sword arm with a branch and pulls you closer.<br>It lowers its head and swallows you whole."
        Makebutton("Restart","dood")
    } else if(kamer == "2e") {
    } else if(kamer == "2f") {
    } else if(kamer == "2g") {
        // if(state.includes('rustedkey')){
        //     Makebutton("Use the key on the old tomb","3i")
        // }
    } else if(kamer == "3a") {
    } else if(kamer == "3b") {
        textElement.innerHTML = "3b"
        Makebutton("North","2b")
        Makebutton("West","empty")
        Makebutton("East","empty")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "3h") {
        // if(once[2]==true){
        //     if(!state.includes('zombie')){
        //         Makebutton("Pick up the dead zombie","item","You've picked up the zombie's corpse","zombie")
        //     }
        //     textElement.innerHTML = "The zombie left behind a now disturbed shallow grave, pieces of the coffin are still visible."
        // } else {
        //     Makebutton("Slay the zombie","once","You've killed the zombie.",2)
        // }
        // console.log(once[2])
    } else if(kamer == "3i") {
        const text1 = "<h1>You've done it!</h1><br>"
        const text2 = "You walk through the catacombs twisting and turning through narrow passages and eventually finding stairs going up.<br>"
        const text3 = "The stairs lead you to a door that bring you to the entrance hall of the castle.";
        const text = text1+text2+text3
        textElement.innerHTML = text
        Makebutton("Start level 2","1d",2)
    } else if(kamer == "3j") {
        textElement.innerHTML = "<h1>You've done it!</h1></br>The door opens with a creak, and you enter the castle.";
        Makebutton("Start level 2","1d",2)
    } else if(kamer == "switchs") {
        textElement.innerHTML = "<h1>Game over</h1><br> You know what, the dragon opens the door, takes a deep breath and envelops you in its fiery breaths."
        Makebutton("Restart","dood")
    }
}
export {level3};