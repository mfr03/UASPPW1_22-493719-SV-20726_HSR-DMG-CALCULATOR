function setBaseStats()
{
    var arr = baseStatsAll();
    document.getElementById("base-attack").value = Math.round(arr[0][0]) + Math.round(arr[1][0]);
    document.getElementById("base-defense").value = Math.round(arr[0][1]) + Math.round(arr[1][1]);
    document.getElementById("base-crit-rate").value = 5;
    document.getElementById("base-crit-dmg").value = 50;
    document.getElementById("base-break-effect").value = 0;
    document.getElementById("base-elemental-boost").value = 0;
    document.getElementById("base-elemental-pen").value = 0;
}
function baseStatsAll()
{   
    var level = document.getElementById("chara-level").value;
    var name = document.getElementById("chara-name").innerText;
    
    if(name == "March 7th")
    {
        name = "Mar7th";
    }

    baseStatsChara = getBaseStatsCharacter(level, name);
    var coneLevel = document.getElementById("cone-level").value;
    var coneName = document.getElementById("cone-name").innerText;
    baseStatsCone = getBaseStatsCone(coneLevel, coneName);
    return [baseStatsChara, baseStatsCone]
}
