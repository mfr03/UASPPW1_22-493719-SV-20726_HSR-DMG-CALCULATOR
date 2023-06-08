function mainFormula()
{
    var outgoingDamage = baseDamage() * damageMultiplier() * defenseMultiplier() * resMultiplier() * dmgTakenMultiplier() *  universalDamageReduction();
}

function baseDamage()
{
    var baseDamage = (skillMultiplier + extraMultiplier) * statsAtk + flatAtkDamage;
}

function damageMultiplier()
{
    var damageMultiplier = 1 + characterDamageBoost + extraBoost;
}

function defenseMultiplier()
{   
    var defenseMultiplier = (characterLevel + 20) / ((enemyLevel + 20) * (1 - enemyDefenseReduction - characterDefenseIgnore)) + characterlevel + 20;

}

function resMultiplier()
{
    var resMultiplier = 1 - (enemyResistance - characterPenetration);
}

function dmgTakenMultiplier()
{
    var resMultiplier = 1 + elementalDmgTaken + allTypeDmgTaken;
}

function universalDamageReduction()
{
    if(enemyIsBroken)
    {
        return 0.9;
    }
    else
    {
        return 1;
    }
}