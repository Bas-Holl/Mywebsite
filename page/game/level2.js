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
const code4 = getRandomNum(10);

const code = code1*1000+code2*100+code3*10+code4;

function level2(kamer,once) {

    if(kamer == "1a"){
        textElement.innerHTML  = "A skeleton is hanging in the rose bushes, searching his clothes you find a rusted key.<br>But as your search further the roses start to move and begin to slowly pull the skeleton in, breaking even a few bones."
        Makebutton("North","empty")
        Makebutton("West","2a")
        Makebutton("East","1b")
        Makebutton("South","empty")
        if(!state.includes('rustedkey')){
            Makebutton("Grab rusted key","item","You've picked up the rusted key","rustedkey")
        }
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1b") {
        textElement.innerHTML  = "The roses become thicker by each step, while cutting your way through you find a number carved into a stone wall <b>C"+code3+"</b>."
        Makebutton("North","empty")
        Makebutton("West","1a")
        Makebutton("East","1c")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1c") {
        textElement.innerHTML  = "An enormous venus flytrap stands before you, snapping at you but out of reach."
        Makebutton("North","empty")
        Makebutton("East","1d")
        Makebutton("Slay the plant with your sword","2d")
        if(once[1]==false){
            Makebutton("West","empty")
            Makebutton("South","empty")
            if(state.includes('zombie')){
                console.log(state)
                Makebutton("Feed the plant the corpse","once","The plant happily devours the corpse and lets you through.",1)
            }
        }
        if(once[1]==true){
            textElement.innerHTML  = "An enormous venus flytrap stands before you, however, it does not show a sign of agression towards you."
            Makebutton("West","1b")
            Makebutton("South","2c")
        }
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
            Makebutton("Knock again","switch",[knock2, knock3, knock4, knock5, knock6, knock7, knock8, knock9, knock10],"dood")
        } 

        form("code","3j",code,"Enter code",4)
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1e") {
        textElement.innerHTML = "A half sunken path along the gorge, takes you to an old cemetery.";
        Makebutton("North","empty")
        Makebutton("West","1d")
        Makebutton("East","1f")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1f") {
        textElement.innerHTML = "The cemetery is filled with dead trees and shrubbery.";
        Makebutton("North","empty")
        Makebutton("West","1e")
        Makebutton("East","1g")
        Makebutton("South","2f")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1g") {
        textElement.innerHTML = "Some of the graves hang partly into the gorge and some of the stones have even fallen in.";
        Makebutton("North","empty")
        Makebutton("West","1f")
        Makebutton("East","1h")
        Makebutton("South","empty")
        const kick1 = "You kick a second gravestone.";
        const kick2 = "A third gravestone is kicked into the lava below.";
        const kick3 = "This one was a bit stuborn, but after several kicks it fell into the gorge anyway.";
        const kick4 = "You kick the fith and final gravestone into the gorge. Why did they send you on this quest?";
        if(once[4]==false){
            Makebutton("Kick gravestone","once","You kick one of the gravestones into the lava. What is wrong with you?",4)
        } else {
            Makebutton("Kick another gravestone","switch",[kick1, kick2, kick3, kick4])
        }
        
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "1h") {
        textElement.innerHTML = "There is nothing of interest here.";
        Makebutton("North","empty")
        Makebutton("West","1g")
        Makebutton("East","empty")
        Makebutton("South","2h")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2a") {
        textElement.innerHTML = "<h1>Game over</h1><br>The roses begin to move and twist while you chop away even more, they begin to close the gap you’ve made. <br>The roses grab your arms and pull you in."
        Makebutton("Restart","dood")
    } else if(kamer == "2b") {
        textElement.innerHTML = "between the leaves on the ground you see a number carved into one of the tiles D<b>"+code4+"</b>."
        Makebutton("North","empty")
        Makebutton("West","empty")
        Makebutton("East","2c")
        Makebutton("South","empty")
        //Makebutton("Look at the gorge",kamer,"The deep gorge has lava sputtering out of the bottom and lights up the walls in a red light.")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2c") {
        textElement.innerHTML = "You walk past a dangerously rotten gazebo."
        Makebutton("North","1c")
        Makebutton("West","2b")
        Makebutton("East","empty")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2d") {
        textElement.innerHTML = "<h1>Game over</h1><br>The plant grabs your sword arm with a branch and pulls you closer.<br>It lowers its head and swallows you whole."
        Makebutton("Restart","dood")
    } else if(kamer == "2e") {
    } else if(kamer == "2f") {
        textElement.innerHTML = "A large catacomb is to your east but there is no door on this side."
        Makebutton("North","1f")
        Makebutton("West","empty")
        Makebutton("East","empty")
        Makebutton("South","3f")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2g") {
        textElement.innerHTML = "Before you stands a dilapidated catacomb, but checking the door reveals that its locked.<br>You will need a key to go through here."
        Makebutton("North","empty")
        Makebutton("West","empty")
        Makebutton("East","empty")
        Makebutton("South","3g")
        if(state.includes('rustedkey')){
            Makebutton("Use the key on the old tomb","3i")
        }
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "2h") {
        textElement.innerHTML = "An old worn gravestone stands lobsided and all the text has been worn off,but something new been carved into the stone: <b>A"+code1+"</b>."
        Makebutton("North","1h")
        Makebutton("West","empty")
        Makebutton("East","empty")
        Makebutton("South","3h")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "3f") {
        textElement.innerHTML = "There is nothing of interest here."
        Makebutton("North","2f")
        Makebutton("West","empty")
        Makebutton("East","3g")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "3g") {
        textElement.innerHTML = "You can see a sealed catacomb to the north."
        Makebutton("North","2g")
        Makebutton("West","3f")
        Makebutton("East","3h")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
    } else if(kamer == "3h") {
        textElement.innerHTML = "While you walk past a grave, you hear some dirt moving and before you know it a half rotten corpse has been risen from the grave."
        Makebutton("North","2h")
        Makebutton("West","3g")
        Makebutton("East","empty")
        Makebutton("South","empty")
        kaart('level2/'+kamer+'.png',kamer)
        if(once[2]==true){
            if(!state.includes('zombie')){
                Makebutton("Pick up the dead zombie","item","You've picked up the zombie's corpse","zombie")
            }
            textElement.innerHTML = "The zombie left behind a now disturbed shallow grave, pieces of the coffin are still visible."
        } else {
            Makebutton("Slay the zombie","once","You've killed the zombie.",2)
        }
        console.log(once[2])
    } else if(kamer == "3i") {
        const text1 = "<h1>You've done it!</h1><br>"
        const text2 = "You walk through the catacombs twisting and turning through narrow passages and eventually finding stairs going up.<br>"
        const text3 = "The stairs lead you to a door that bring you to the entrance hall of the castle.";
        const text = text1+text2+text3
        textElement.innerHTML = text
        Makebutton("Start level 3","1b",3)
    } else if(kamer == "3j") {
        textElement.innerHTML = "<h1>You've done it!</h1></br>The door opens with a creak, and you enter the castle.";
        Makebutton("Start level 3","1b",3)
    } else if(kamer == "switchs") {
        textElement.innerHTML = "<h1>Game over</h1><br> You know what, the dragon opens the door, takes a deep breath and envelops you in its fiery breaths."
        Makebutton("Restart","dood")
    }
}
export {level2};