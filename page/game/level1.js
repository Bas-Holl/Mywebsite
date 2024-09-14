import {getRandomNum} from './functions.js';
import {Makebutton,kaart, state, form} from './game.js';

//zet de textbox in de variabel
const textElement = document.getElementById('text')
//zet plek van de bescrhijving in de variabel
const descElement = document.getElementById('desc')

function level1(kamer) {

    if(kamer == "1a"){
        textElement.innerHTML  = "You are knight in a dark forest out to safe the princess from the mighty dragon Abeloth.<br>In the South is the castle visible with the tall tower where the princess is being kept prison."
        Makebutton("North","3h")
        Makebutton("West","empty")
        Makebutton("East","1b")
        Makebutton("South","2a")
        kaart('level1/'+kamer+'.png',kamer)
    } else if(kamer == "1b") {
        textElement.innerHTML  = "The forest is dense and lets little light through."
        Makebutton("North","empty")
        Makebutton("West","1a")
        Makebutton("East","1c")
        Makebutton("South","2b")
        kaart('level1/1b.png',kamer)
    } else if(kamer == "1c") {
        textElement.innerHTML  = "There is nothing out of the ordinary compared to the rest of the forest, safe for a large dead hollowed out oak tree."
        Makebutton("North","empty")
        Makebutton("West","1b")
        Makebutton("East","1d")
        Makebutton("South","2c")
        Makebutton("Dead tree","desc","There is nothing here but dirt, not every hollow tree has treasure you know.")
        kaart('level1/1c.png',kamer)
    } else if(kamer == "1d") {
        textElement.innerHTML = "There is another dead tree here but this time it’s a long and thin, you could possibly use this for something"
        Makebutton("North","empty")
        Makebutton("West","1c")
        Makebutton("East","empty")
        Makebutton("South","2d")
        if(!state.includes('tree')){
            Makebutton("Grab fallen tree","item","You've picked up the tree","tree")
        }
        kaart('level1/1d.png',kamer)
    } else if(kamer == "2a") {
        textElement.innerHTML = "The castle is still to the south but a narrow but long gorge prevents you from going further south."
        Makebutton("North","1a")
        Makebutton("West","empty")
        Makebutton("East","2b")
        Makebutton("South","empty")
        Makebutton("Look at the gorge","desc","The deep gorge has lava sputtering out of the bottom and lights up the walls in a red light.")
        Makebutton("Jump into the gorge","3g")
        kaart('level1/2a.png',kamer)
    } else if(kamer == "2b") {
        textElement.innerHTML = "Directly to your south is a rope bridge, its old depilated with several boards missing, in the middle is an hunched cloaked figure."
        Makebutton("North","1b")
        Makebutton("West","2a")
        Makebutton("East","2c")
        Makebutton("South","3b")
        kaart('level1/2b.png',kamer)
    } else if(kamer == "2c") {
        textElement.innerHTML = "There is nothing of interest here.<br>To the east is an old bridge that hangs over it."
        Makebutton("North","1c")
        Makebutton("West","2b")
        Makebutton("East","2d")
        Makebutton("South","empty")
        kaart('level1/2c.png',kamer)
    } else if(kamer == "2d") {
        textElement.innerHTML = "The gorge is here at its slimmest if you had something to use as a bridge, like a ladder then you could get across."
        Makebutton("North","1d")
        Makebutton("West","2c")
        Makebutton("East","empty")
        Makebutton("South","empty")
        kaart('level1/2d.png',kamer)
        if(state.includes('tree')){
            console.log(state)
            Makebutton("tree","3f")
        }
    } else if(kamer == "3a") {
        textElement.innerHTML = "WRONG! The old bridge troll lifts up his hand and holds it towards you, he mutters something under his breath and you can feel a magical grip around you. And with a fell swoop he moves his arm to the right and throws you of the bridge."
        Makebutton("Restart","dood")
    } else if(kamer == "3b") {
        Makebutton("North","empty")
        Makebutton("West","empty")
        Makebutton("East","empty")
        Makebutton("South","empty")
        textElement.innerHTML = "Walking over the bridge and approaching the cloaked figure appears to have green skin and a crooked nose it seems like its an old bridge troll.<br>He lifts his head and says: He who wishes to cross this bridge has to answer questions three. Ere the other side he see.<br>"
        switch(getRandomNum(2)){
            case 0:
                descElement.innerHTML = "<b>What</b> is your favourite colour?"
                Makebutton("Blue",'3c',"Correct")
                Makebutton("Yellow",'3c',"Correct")
                Makebutton("Green",'3c',"Correct")
                Makebutton("Red",'3c',"Correct")
                Makebutton("Orange",'3c',"Correct")
                Makebutton("Purple",'3c',"Correct")
                Makebutton("Black",'3a',"Wrong")
            break
            case 1:
                descElement.innerHTML = "<b>What</b> is the name of the dragon that has made this castle his abode?"
                Makebutton("Abeloth",'3c',"Correct")
                Makebutton("Gargoyle",'3a',"Wrong")
                Makebutton("Smaug",'3a',"Wrong")
                Makebutton("Aragon",'3a',"Wrong")
            break
            default:
                descElement.innerHTML = "question error"
        }
        kaart('level1/3b.png',kamer)
    } else if(kamer == "3c") {
        textElement.innerHTML  = "<b>What</b> is your quest?"
        Makebutton("To slay the mighty dragon",'3d',"Correct")
        Makebutton("To save the poor princess",'3d',"Correct")
        Makebutton("To loot the castle empty to its last dime",'3a',"Wrong")
    } else if(kamer == "3d") {
        switch(getRandomNum(3)){
            case 0:
                form("vraag","3e","andle","Answer")
                textElement.innerHTML = "<b>What</b> serves by expiring and has the wind as its enemy."
            break
            case 1:
                form("vraag","3e","fri","Answer")
                textElement.innerHTML = "<b>What</b> is the air speed velocity of an unladen swallow?"
            break
            case 2:
                form("vraag","3e","oin","Answer")
                textElement.innerHTML = "<b>What</b> has a tail and a head but is made out of gold?"
            break
            default:
                textElement.innerHTML = "question error"
        }
    } else if(kamer == "3e") {
        textElement.innerHTML = "Congratulations, you crossed the bridge and finished level 1."
        Makebutton("Start level 2","1d",2)
    } else if(kamer == "3f") {
        textElement.innerHTML = "Congratulations, you crossed the gorge and finished level 1."
        Makebutton("Start level 2","1d",2)
    } else if(kamer == "3g") {
        textElement.innerHTML = "Congratulations you jumped straight into the lava. I hope that you're proud with yourself."
        Makebutton("Restart","dood")
    } else if(kamer == "3h") {
        textElement.innerHTML = "Instead of saving the princess or even attempting to do anything, you decided to just go home."
        Makebutton("Restart","dood")
    }
}
export {level1};