var isSphereRopeSet = '';
var isRestFourPieceSet = '';
var isRestTwoPieceSet = [];
var currentHead = 'geniuss';
var currentBody = 'geniuss';
var currentFeet = 'geniuss';
var currentHands = 'geniuss';
var currentSphere = 'herta';
var currentRope = 'herta';

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
            var relics = ["sphere", "rope"];
            for(let i = 0; i < relics.length; i++)
            {
                document.getElementById("relic_"+ relics[i]).src = "rsc/relics_png/" + relicName + "_" + relics[i] + ".png";
                if(relics[i] == "sphere")
                {
                    currentSphere = relicName;
                }
                else if(relics[i] == "rope")
                {
                    currentRope = relicName;
                }
            }
        }
        else
        {
            var relics = ["head", "body", "feet", "hands"];
            for(let i = 0; i < relics.length; i++)
            {
                document.getElementById("relic_"+ relics[i]).src = "rsc/relics_png/" + relicName + "_" + relics[i] + ".png";
                if(relics[i] == "head")
                {
                    currentHead = relicName;
                }
                else if(relics[i] == "body")
                {
                    currentBody = relicName;
                }
                else if(relics[i] == "feet")
                {
                    currentFeet = relicName;
                }
                else if(relics[i] == "hands")
                {
                    currentHands = relicName;
                }
            }
        }
    }
    else
    {       
        if(relicPiece == "sphere" || relicPiece == "rope")
        {   
            document.getElementById("relic_"+ relicPiece).src = "rsc/relics_png/" + relicName + "_" + relicPiece + ".png";
            if(relicPiece  == "sphere")
            {
                currentSphere = relicName;
            }
            else if(relicPiece  == "rope")
            {
                currentRope = relicName;
            }
        }
        else
        {
            document.getElementById("relic_"+ relicPiece).src = "rsc/relics_png/" + relicName + "_" + relicPiece + ".png";
            if(relicPiece == "head")
            {
                currentHead = relicName;
            }
            else if(relicPiece == "body")
            {
                currentBody = relicName;
            }
            else if(relicPiece == "feet")
            {
                currentFeet = relicName;
            }
            else if(relicPiece == "hands")
            {
                currentHands = relicName;
            }
        }
    }
    checkSetBonus()
}

function checkSetBonus()
{

    var two = 0;
    var twoSR = 0;
    var four = 0;
    var templist = [currentHead, currentBody, currentHands, currentFeet];
    var tempListSR = [currentSphere, currentRope];
    var tempset  = new Set(templist);
    var tempSetSR = new Set(tempListSR);
    for(const rel of tempset.values())
    {
        if(countItemInArray(templist, rel) == 2)
        {
            two++;
            if(!isRestTwoPieceSet.includes(rel))
            {
                isRestTwoPieceSet.push(rel);
            }
        }
        else if(countItemInArray(templist, rel) == 3)
        {
            two++;
            if(!isRestTwoPieceSet.includes(rel))
            {
                isRestTwoPieceSet.push(rel);
            }
        }
        else if(countItemInArray(templist, rel) == 4)
        {
            four++;
            two++;
            isRestTwoPieceSet.push(rel);
            isRestFourPieceSet = rel;
        }

    }
    for(const rel of tempSetSR.values())
    {
        if(countItemInArray(tempListSR, rel) == 2)
        {
            twoSR++;
            isSphereRopeSet = rel;
        }
    }

    if(four == 0)
    {
        isRestFourPieceSet = '';
    }
    if(two == 0)
    {
        isRestTwoPieceSet = [];
    }
    if(twoSR == 0)
    {
        isSphereRopeSet = '';
    }

    giveSetBonus(isRestTwoPieceSet, isRestFourPieceSet, isSphereRopeSet)
}

function giveSetBonus(two, four, twoSR)
{
    var setBonus = document.getElementById("set_bonuses");
    if(two.length != 0)
    {   
        // make the query
        // add the element to DOM
        // call function to update the stats according to bonus
        setBonus.innerHTML += "<p>two set bonus</p>"
    }

    if(four != '')
    {
        setBonus.innerHTML += "<p>tfour set bonus</p>"
    }

    if(twoSR != '')
    {
        console.log("fouck");
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
    document.getElementById("placeholderForCharacter").value = characterName;
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


function isElementVisible(el) 
{
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

function countItemInArray(array, val)
{
    count = 0;
    for(var i = 0; i < array.length; i++)
    {
        if(array[i] == val)
        {
            count++;
        }
    }
    return count;
}