function callStack()
{   
    setBaseStats();
    changeConeDesc(document.getElementById("cone-name").innerText);
    changeCharaTalentDesc(document.getElementById("chara-name").innerText + document.getElementById("talent-level").value.toString());
    changeCharaTraces(document.getElementById("chara-name").innerText);
    checkSetBonus();
    mainFormula('Ultimate'); 
    mainFormula('BasicATK'); 
    mainFormula('Skill')
}
