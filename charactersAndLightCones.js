var isSphereRopeSet = '';
var isRestFourPieceSet = '';
var isRestTwoPieceSet = [];
var currentHead = 'geniuss';
var currentBody = 'geniuss';
var currentFeet = 'geniuss';
var currentHands = 'geniuss';
var currentSphere = 'hertas';
var currentRope = 'hertas';


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
    setBonus.innerHTML = "";
    var getBonus;
    if(two.length != 0 && four == '') 
    {   
        for(var i = 0; i < two.length; i++)
        {
            getBonus = getRelicDesc(two[i]);
            setBonus.innerHTML += "<p>" + getBonus[0] + "</p>";
        }
        
    }

    if(four != '')
    {   
        getBonus = getRelicDesc(four);
        setBonus.innerHTML += "<p>" + getBonus[0] + "</p>";
        setBonus.innerHTML += "<p>" + getBonus[1] + "</p>";
    }

    if(twoSR != '')
    {
        getBonus = getRelicDesc(twoSR);
        setBonus.innerHTML += "<p>" + getBonus[0] + "</p>";
    }
}

function changeCone(coneName)
{
    var selectedImage = document.getElementById("selected-cone");
    selectedImage.src = "rsc/light-cones/" + coneName + ".png";
    var x = ultraBodge(coneName);
    document.getElementById("cone-name").innerText = capitalize(x);
    changeConeDesc(x);
}
function changeConeDesc(coneName)
{
    var coneDesc = getConeDesc(coneName + document.getElementById("superimposition").value.toString());
    document.getElementById("cone-desc").innerHTML = "<p>" + coneDesc + "</p>"
}

function changeCharacter(characterName)
{   
    var selectedImage = document.getElementById("selected-image");
    selectedImage.src = "rsc/characters/" + characterName + ".png";
    document.getElementById("placeholderForCharacter").value = characterName;
    document.getElementById("chara-name").innerText = capitalize(characterName);
}

function changeCharaTalentDesc(characterName)
{      
    if(characterName == "March 7th"){}
    var talentDesc = getCharaTalentDesc(characterName);
    document.getElementById("chara-talent").innerHTML = "<p>" + talentDesc + "</p>";
}

function changeCharaTraces(characterName)
{
    var traces = getCharaTraces(characterName);
    document.getElementById("minorTraces").innerHTML = traces[0];
    document.getElementById("majorTraces").innerHTML = traces[1];
}
function changeSelection(changeTo)
{
    var characterSelection = document.getElementById("selection-characters");
    var lightConeSelection = document.getElementById("selection-cones");
    if(changeTo == "cone")
    {
        if(isElementVisible(characterSelection))
        {   
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

function ultraBodge(file)
{
    switch (file) {
        case "20000": return "Arrows";
        case "20001": return "Cornucopia";
        case "20002": return "Collapsing Sky";
        case "20003": return "Amber";
        case "20004": return "Void";
        case "20005": return "Chorus";
        case "20006": return "Data Bank";
        case "20007": return "Darting Arrow";
        case "20008": return "Fine Fruit";
        case "20009": return "Shattered Home";
        case "20010": return "Defense";
        case "20011": return "Loop";
        case "20012": return "Meshing Cogs";
        case "20013": return "Passkey";
        case "20014": return "Adversarial";
        case "20015": return "Multiplication";
        case "20016": return "Mutual Demise";
        case "20017": return "Pioneering";
        case "20018": return "Hidden Shadow";
        case "20019": return "Mediation";
        case "20020": return "Sagacity";
        case "21000": return "Post-Op Conversation";
        case "21001": return "Good Night and Sleep Well";
        case "21002": return "Day One of My New Life";
        case "21003": return "Only Silence Remains";
        case "21004": return "Memories of the Past";
        case "21005": return "The Moles Welcome You";
        case "21006": return "The Birth of the Self";
        case "21007": return "Shared Feeling";
        case "21008": return "Eyes of the Prey";
        case "21009": return "Landau's Choice";
        case "21010": return "Swordplay";
        case "21011": return "Planetary Rendezvous";
        case "21012": return "A Secret Vow";
        case "21013": return "Make the World Clamor";
        case "21014": return "Perfect Timing";
        case "21015": return "Resolution Shines As Pearls of Sweat";
        case "21016": return "Trend of the Universal Market";
        case "21017": return "Subscribe for More!";
        case "21018": return "Dance! Dance! Dance!";
        case "21019": return "Under the Blue Sky";
        case "21020": return "Geniuses' Repose";
        case "21021": return "Quid Pro Quo";
        case "21022": return "Fermata";
        case "21023": return "We Are Wildfire";
        case "21024": return "River Flows in Spring";
        case "21025": return "Past and Future";
        case "21026": return "Woof! Walk Time!";
        case "21027": return "The Seriousness of Breakfast";
        case "21028": return "Warmth Shortens Cold Nights";
        case "21029": return "We Will Meet Again";
        case "21030": return "This Is Me!";
        case "21031": return "Return to Darkness";
        case "21032": return "Carve the Moon, Weave the Clouds";
        case "21033": return "Nowhere to Run";
        case "21034": return "Today Is Another Peaceful Day";
        case "23000": return "Night on the Milky Way";
        case "23001": return "In the Night";
        case "23002": return "Something Irreplaceable";
        case "23003": return "But the Battle Isn't Over";
        case "23004": return "In the Name of the World";
        case "23005": return "Moment of Victory";
        case "23010": return "Before Dawn";
        case "23012": return "Sleep Like the Dead";
        case "23013": return "Time Waits for No One";
        case "24000": return "On the Fall of an Aeon";
        case "24001": return "Cruising in the Stellar Sea";
        case "24002": return "Texture of Memories";
        default:
            break;
    }
}