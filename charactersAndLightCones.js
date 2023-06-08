function setValues(characterName)
{

}


function changeRelic(relicName, relicPiece)
{
    var preference = document.getElementById("chooseSetSwitch" + capitalize(relicPiece))
    if(preference.checked)
    {   
        if(relicPiece == "sphere" || relicPiece == "rope")
        {   
            console.log('here')
            var relics = ["sphere", "rope"];
            for(let i = 0; i < relics.length; i++)
            {
                document.getElementById("relic_"+ relics[i]).src = "rsc/relics_png/" + relicName + "_" + relics[i] + ".png";
            }
        }
        else
        {
            var relics = ["head", "body", "feet", "hands"];
            for(let i = 0; i < relics.length; i++)
            {
                document.getElementById("relic_"+ relics[i]).src = "rsc/relics_png/" + relicName + "_" + relics[i] + ".png";
            }
        }
    }
    else
    {   
        document.getElementById("relic_"+ relicPiece).src = "rsc/relics_png/" + relicName + "_" + relicPiece + ".png";
    }
}

function changeCone(coneName)
{
    var selectedImage = document.getElementById("selected-cone");
    selectedImage.src = "rsc/light-cones/" + coneName + ".png";
    setValues(coneName);
}


function changeCharacter(characterName)
{
    var selectedImage = document.getElementById("selected-image");
    selectedImage.src = "rsc/characters/" + characterName + ".png";
    setValues(characterName);
}


function changeSelection(changeTo)
{
    var characterSelection = document.getElementById("selection-characters");
    var lightConeSelection = document.getElementById("selection-cones");
    if(changeTo == "cone")
    {
        if(isElementVisible(characterSelection))
        {   
            console.log('here');
            characterSelection.classList.add("d-none");
            lightConeSelection.classList.remove("d-none");
        } 
    }
    else if (changeTo == 'character')
    {   
        if(isElementVisible(lightConeSelection))
        {
            characterSelection.classList.remove('d-none');
            lightConeSelection.classList.add('d-none');
        }
    }

}


function isElementVisible(el) {
    var rect     = el.getBoundingClientRect(),
        vWidth   = window.innerWidth || document.documentElement.clientWidth,
        vHeight  = window.innerHeight || document.documentElement.clientHeight,
        efp      = function (x, y) { return document.elementFromPoint(x, y) };     

    // Return false if it's not in the viewport
    if (rect.right < 0 || rect.bottom < 0 
            || rect.left > vWidth || rect.top > vHeight)
        return false;

    // Return true if any of its four corners are visible
    return (
          el.contains(efp(rect.left,  rect.top))
      ||  el.contains(efp(rect.right, rect.top))
      ||  el.contains(efp(rect.right, rect.bottom))
      ||  el.contains(efp(rect.left,  rect.bottom))
    );
}

function capitalize(s)
{
    return s && s[0].toUpperCase() + s.slice(1);
}