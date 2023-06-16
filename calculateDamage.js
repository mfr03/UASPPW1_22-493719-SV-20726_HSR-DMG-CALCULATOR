
function mainFormula(skillType)
{   
    console.log(baseDamage(skillType));
    console.log(damageMultiplier());
    console.log(defenseMultiplier());
    console.log((resMultiplier()));
    console.log(dmgTakenMultiplier());
    console.log(universalDamageReduction());
    console.log("_____________________" + skillType);
    var outgoingDamage = baseDamage(skillType) * damageMultiplier() * defenseMultiplier() * resMultiplier() * dmgTakenMultiplier() *  universalDamageReduction();
    var nonCrit = document.getElementById(skillType + "-res");
    var crit = document.getElementById(skillType + "-res-crit");
    nonCrit.value = Math.round(outgoingDamage);
    var critdmg = parseInt(document.getElementById("base-crit-dmg").value) + parseInt(document.getElementById("flat-crit-dmg").value);
    crit.value = Math.round(outgoingDamage * (1 + (critdmg)/100))
}

function baseDamage(skillType)
{   
    var characterName = "Seele";
    var skillMultiplier = getSkill(skillType, characterName);
    var extraMultiplier = 0;
    var statsAtk = parseInt(document.getElementById("base-attack").value) + parseInt(document.getElementById("flat-attack").value)
    var flatAtkDamage = 0;
    var baseDamage = (skillMultiplier + extraMultiplier) * statsAtk + flatAtkDamage;
    return baseDamage;
}

function damageMultiplier()
{   
    var characterDamageBoost = parseInt(document.getElementById("base-elemental-boost").value) + parseInt(document.getElementById("flat-elemental-boost").value);
    var extraBoost = 0;
    var damageMultiplier = 1 + (characterDamageBoost/100) + (extraBoost/100);
    return damageMultiplier;
}

function defenseMultiplier()
{   
    var characterLevel = document.getElementById("chara-level").value;
    if(characterLevel.charAt(characterLevel.length - 1) == '+')
    {
        characterLevel = parseInt(characterLevel.replace(characterLevel.charAt(characterLevel.length - 1), ''));
    }
    else
    {
        characterLevel = parseInt(characterLevel);
    }
    var enemyLevel = parseInt(document.getElementById("enemy-level").value);
    var enemyDefenseReduction = 0;
    var characterDefenseIgnore = 0.1;
    var defenseMultiplier = (characterLevel + 20) / ((enemyLevel + 20) * (1 - enemyDefenseReduction - characterDefenseIgnore) + characterLevel + 20);
    return defenseMultiplier;
}

function resMultiplier()
{   
    var enemyResistance;
    if(document.getElementById("enemy_resist_to_element").checked)
    {
        enemyResistance = 0.4;
    }
    else if(document.getElementById("enemy_weak_to_element").checked)
    {
        enemyResistance = 0;
    }
    else
    {
        enemyResistance = 0.2;
    }
    var characterPenetration = document.getElementById("base-elemental-pen").value + document.getElementById("flat-elemental-pen").value
    var resMultiplier = 1 - (enemyResistance - characterPenetration);
    return resMultiplier;
}

function dmgTakenMultiplier()
{
    var elementalDmgTaken = 0;
    var allTypeDmgTaken = 0;
    var dmgTakenMultiplier = 1 + elementalDmgTaken + allTypeDmgTaken;
    return dmgTakenMultiplier;
}

function universalDamageReduction()
{
    if(document.getElementById("enemy_toughness_broken").checked)
    {
        return 1;
    }
    else
    {
        return 0.9;
    }
}
