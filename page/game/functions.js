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
//kaart
const map1AElement = document.getElementById('map1A')
const map1BElement = document.getElementById('map1B')
const map1CElement = document.getElementById('map1C')
const map1DElement = document.getElementById('map1D')
const map1EElement = document.getElementById('map1E')
const map1FElement = document.getElementById('map1F')
const map1GElement = document.getElementById('map1G')
const map1HElement = document.getElementById('map1H')
const map1JElement = document.getElementById('map1J')

const map2AElement = document.getElementById('map2A')
const map2BElement = document.getElementById('map2B')
const map2CElement = document.getElementById('map2C')
const map2DElement = document.getElementById('map2D')
const map2EElement = document.getElementById('map2E')
const map2FElement = document.getElementById('map2F')
const map2GElement = document.getElementById('map2G')
const map2HElement = document.getElementById('map2H')
const map2JElement = document.getElementById('map2J')

const map3AElement = document.getElementById('map3A')
const map3BElement = document.getElementById('map3B')
const map3CElement = document.getElementById('map3C')
const map3DElement = document.getElementById('map3D')
const map3EElement = document.getElementById('map3E')
const map3FElement = document.getElementById('map3F')
const map3GElement = document.getElementById('map3G')
const map3HElement = document.getElementById('map3H')
const map3JElement = document.getElementById('map3J')

function getRandomNum(max) {
    return Math.floor(Math.random() * max);
}

function figure(answer,antwoord,state){
    answer += "";
    const code1 = antwoord.value.charAt(0);
    const code3 = antwoord.value.slice(-1);
    const code2 = (antwoord.value-code3-(code1*100))/10;
    const ans1 = answer.charAt(0);
    const ans3 = answer.slice(-1);
    const ans2 = (answer-ans3-(ans1*100))/10;
    let figuur1;
    let figuur2;
    let figuur3;
    if(antwoord.value==answer){
        //geef key
        if(!state.includes('figuurKey')){
        descElement.innerHTML = "▧▧▧ You hear a click and a hatch opens, a key with a square handle falls out."}
        else{"▧▧▧ You hear a click and the hatch opens up once again, this time not dispensing anything."}
        state.push("figuurKey")
    } else if(antwoord.value.includes(code1||code2||code3)){
        if(ans1==code1){figuur1="▧"} 
        else if(ans2==code1||ans3==code1){figuur1="▲"}
        else{figuur1="◍"}
            if(ans2==code2){figuur2="▧"} 
            else if(ans1==code2||ans3==code2){figuur2="▲"}
            else{figuur2="◍"}
                if(ans3==code3){figuur3="▧"} 
                else if(ans1==code3||ans2==code3){figuur3="▲"}
                else{figuur3="◍"}
        descElement.innerHTML = figuur1 + figuur2 + figuur3;
    } else {
        descElement.innerHTML = "puzzle error";
    }
}

function verwijderknoppen(){
    //verwijderd de vorige opties
    while(optionButtonsElement?.firstChild){
        optionButtonsElement.removeChild(optionButtonsElement.firstChild)
    }
    while(northElement?.firstChild){
        northElement.removeChild(northElement.firstChild)
    }
    while(westElement?.firstChild){
        westElement.removeChild(westElement.firstChild)
    }
    while(eastElement?.firstChild){
        eastElement.removeChild(eastElement.firstChild)
    }
    while(southElement?.firstChild){
        southElement.removeChild(southElement.firstChild)
    }
    //verwijderd de beschrijving
    while(descElement?.firstChild){
        descElement.removeChild(descElement.firstChild)
    }
    //verwijderd de compas
    while(compassElement?.firstChild){
        compassElement.removeChild(compassElement.firstChild)
    }
}

//maakt de kaart aan
export default function kaart(image,alt){
    const map = document.createElement('IMG')
    map.setAttribute("src", image);
    map.setAttribute("width", "80");
    map.setAttribute("class", "map");
    map.setAttribute("alt", alt);

    const dot = document.createElement('IMG')
    dot.setAttribute("src",'dot.png');
    dot.setAttribute("width", "20");
    dot.setAttribute("class", "dot");
    dot.setAttribute("alt", alt);
    switch(alt) {
        case '1a':
            if(map1AElement.childNodes.length == 0){
                map1AElement?.appendChild(map)
                //map1AElement?.classList.add("map");
            }
            // map1AElement?.appendChild(dot)  
            // map1AElement?.classList.add("dot");
        break;
        case '1b':
            if(map1BElement.childNodes.length == 0){
                map1BElement?.appendChild(map)
            }     
            // map1BElement?.appendChild(dot)  
            // map1BElement?.classList.add("dot");
        break;
        case '1c':
            if(map1CElement.childNodes.length == 0){
                map1CElement?.appendChild(map)
            }     
            // map1CElement?.appendChild(dot)  
            // map1CElement?.classList.add("dot");
            break;
        case '1d':
            if(map1DElement.childNodes.length == 0){
                map1DElement?.appendChild(map)
            }     
        break;
        case '1e':
            if(map1EElement.childNodes.length == 0){
                map1EElement?.appendChild(map)
            }     
        break;
        case '1f':
            if(map1FElement.childNodes.length == 0){
                map1FElement?.appendChild(map)
            }     
        break;
        case '1g':
            if(map1GElement.childNodes.length == 0){
                map1GElement?.appendChild(map)
            }     
        break;
        case '1h':
            if(map1HElement.childNodes.length == 0){
                map1HElement?.appendChild(map)
            }     console.log("test")   
        break;
        case '2a':
            if(map2AElement.childNodes.length == 0){
                map2AElement?.appendChild(map)
            }
        break;
        case '2b':
            if(map2BElement.childNodes.length == 0){
                map2BElement?.appendChild(map)
            }
        break;
        case '2c':
            if(map2CElement.childNodes.length == 0){
                map2CElement?.appendChild(map)
            }
        break;
        case '2d':
            if(map2DElement.childNodes.length == 0){
                map2DElement?.appendChild(map)
            }
        case '2e':
            if(map2EElement.childNodes.length == 0){
                map2EElement?.appendChild(map)
            }
        break;
        case '2f':
            if(map2FElement.childNodes.length == 0){
                map2FElement?.appendChild(map)
            }
        break;
        case '2g':
            if(map2GElement.childNodes.length == 0){
                map2GElement?.appendChild(map)
            }
        break;
        case '2h':
            if(map2HElement.childNodes.length == 0){
                map2HElement?.appendChild(map)
            }
        break;
        case '3a':
            if(map3AElement.childNodes.length == 0){
                map3AElement?.appendChild(map)
            }
        break;
        case '3b':
            if(map3BElement.childNodes.length == 0){
                map3BElement?.appendChild(map)
            }
        break;
        case '3c':
            if(map3CElement.childNodes.length == 0){
                map3CElement?.appendChild(map)
            }
        break;
        case '3d':
            if(map3DElement.childNodes.length == 0){
                map3DElement?.appendChild(map)
            }
        case '3e':
            if(map3EElement.childNodes.length == 0){
                map3EElement?.appendChild(map)
            }
        break;
        case '3f':
            if(map3FElement.childNodes.length == 0){
                map3FElement?.appendChild(map)
            }
        break;
        case '3g':
            if(map3GElement.childNodes.length == 0){
                map3GElement?.appendChild(map)
            }
        break;
        case '3h':
            if(map3HElement.childNodes.length == 0){
                map3HElement?.appendChild(map)
            }
        break;
        default:
            descElement.innerHTML = "map error"
    }
}

function verwijderkaart(){
    //1
    while(map1AElement?.firstChild){
        map1AElement.removeChild(map1AElement.firstChild)
    }
    while(map1BElement?.firstChild){
        map1BElement.removeChild(map1BElement.firstChild)
    }
    while(map1CElement?.firstChild){
        map1CElement.removeChild(map1CElement.firstChild)
    }
    while(map1DElement?.firstChild){
        map1DElement.removeChild(map1DElement.firstChild)
    }
    while(map1EElement?.firstChild){
        map1EElement.removeChild(map1EElement.firstChild)
    }
    while(map1FElement?.firstChild){
        map1FElement.removeChild(map1FElement.firstChild)
    }
    while(map1GElement?.firstChild){
        map1GElement.removeChild(map1GElement.firstChild)
    }
    while(map1HElement?.firstChild){
        map1HElement.removeChild(map1HElement.firstChild)  
    }
    while(map1JElement?.firstChild){
        map1JElement.removeChild(map1JElement.firstChild)
    }
    //2
    while(map2AElement?.firstChild){
        map2AElement.removeChild(map2AElement.firstChild)
    }
    while(map2BElement?.firstChild){
        map2BElement.removeChild(map2BElement.firstChild)
    }
    while(map2CElement?.firstChild){
        map2CElement.removeChild(map2CElement.firstChild)
    }
    while(map2DElement?.firstChild){
        map2DElement.removeChild(map2DElement.firstChild)
    }
    while(map2EElement?.firstChild){
        map2EElement.removeChild(map2EElement.firstChild)
    }
    while(map2FElement?.firstChild){
        map2FElement.removeChild(map2FElement.firstChild)
    }
    while(map2GElement?.firstChild){
        map2GElement.removeChild(map2GElement.firstChild)
    }
    while(map2HElement?.firstChild){
        map2HElement.removeChild(map2HElement.firstChild)
    }
    while(map2JElement?.firstChild){
        map2JElement.removeChild(map2JElement.firstChild)
    }
    //3
    while(map3AElement?.firstChild){
        map3AElement.removeChild(map3AElement.firstChild)
    }
    while(map3BElement?.firstChild){
        map3BElement.removeChild(map3BElement.firstChild)
    }
    while(map3CElement?.firstChild){
        map3CElement.removeChild(map3CElement.firstChild)
    }
    while(map3DElement?.firstChild){
        map3DElement.removeChild(map3DElement.firstChild)
    }
    while(map3EElement?.firstChild){
        map3EElement.removeChild(map3EElement.firstChild)
    }
    while(map3FElement?.firstChild){
        map3FElement.removeChild(map3FElement.firstChild)
    }
    while(map3GElement?.firstChild){
        map3GElement.removeChild(map3GElement.firstChild)
    }
    while(map3HElement?.firstChild){
        map3HElement.removeChild(map3HElement.firstChild)
    }
    while(map3JElement?.firstChild){
        map3JElement.removeChild(map3JElement.firstChild)
    }
}

export {getRandomNum,verwijderknoppen,verwijderkaart,kaart,figure};