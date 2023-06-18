function getCharacter()
{
    $('.char').click
    (
        function()
        {
            $.ajax
            ({
                type:'POST',
                url:'pureHopelessPain/getCharacter.php',
                data:
                {
                    character:$('#placeholderForCharacter').val()
                },
                success:function(data)
                {
                    console.log(data);
                }
            });
        }
    );
}



function getSkill(skillType, characterName)
{   
    var returv;
    if(characterName == "March 7th")
    {
        characterName = "Mar7th"
    }
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getSkill.php',
        async:false,
        data:
        {
            type:skillType,
            character:characterName,
        },
        success:function(base)
        {   
            const arr = base.split("'");
            base = parseFloat(arr[0]);
            var level = parseFloat(arr[1]);
            returv = base + (parseInt(document.getElementById(skillType + "-level").value) - 1) * (level);
        }
    });
    return returv;
}

function getBaseStatsCharacter(characterLevel, characterName)
{
    var returnv;
    var x = characterLevel.charAt(characterLevel.length - 1);
    var ogLevel;
    if(x == '+')
    {   
        start = characterLevel.replace(characterLevel.charAt(characterLevel.length - 1), 'A');
        end = parseInt(characterLevel.replace(characterLevel.charAt(characterLevel.length - 1), '')) + 10;
        ogLevel = parseInt(characterLevel.replace(characterLevel.charAt(characterLevel.length - 1), ''))
        characterLevel = "_" + start + "_" + toString(end);
    }
    else
    {
        temp = parseInt(characterLevel);
        ogLevel = temp;
        if(temp <= 20)
        {
            characterLevel = "_1_20";
        }
        else if(temp <= 30)
        {
            characterLevel = "_20A_30";
        }
        else if(temp <= 40)
        {
            characterLevel = "_30A_40";
        }
        else if(temp <= 50)
        {
            characterLevel = "_40A_50";
        }
        else if(temp <= 60)
        {
            characterLevel = "_50A_60";
        }
        else if(temp <= 70)
        {
            characterLevel = "_60A_70";
        }
        else if(temp <= 80)
        {
            characterLevel = "_70A_80";
        }
    }
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getBaseChara.php',
        async:false,
        data:
        {
            level: characterLevel,
            name: characterName,
        },
        dataType:'json',
        success:function(base)
        {   
            var atkStats = parseFloat(base.base_atk) + (parseFloat(base.add_atk) * (ogLevel - 1 ));
            var defStats = parseFloat(base.base_def) + (parseFloat(base.add_def) * (ogLevel - 1));
            returnv = [atkStats, defStats]
        }
    });
    return returnv;
}

function getBaseStatsCone(coneLevel, coneName)
{   
    var returnv;
    var x = coneLevel.charAt(coneLevel.length - 1);
    var ogLevel;
    if(x == '+')
    {   
        start = coneLevel.replace(coneLevel.charAt(cconeLevel.length - 1), 'A');
        end = parseInt(coneLevel.replace(coneLevel.charAt(coneLevel.length - 1), '')) + 10;
        ogLevel = parseInt(coneLevel.replace(coneLevel.charAt(coneLevel.length - 1), ''))
        coneLevel = "_" + start + "_" + toString(end);
    }
    else
    {
        temp = parseInt(coneLevel);
        ogLevel = temp;
        if(temp <= 20)
        {
            coneLevel = "_1_20";
        }
        else if(temp <= 30)
        {
            coneLevel = "_20A_30";
        }
        else if(temp <= 40)
        {
            coneLevel = "_30A_40";
        }
        else if(temp <= 50)
        {
            coneLevel = "_40A_50";
        }
        else if(temp <= 60)
        {
            coneLevel = "_50A_60";
        }
        else if(temp <= 70)
        {
            coneLevel = "_60A_70";
        }
        else if(temp <= 80)
        {
            coneLevel = "_70A_80";
        }
    }
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getBaseCone.php',
        async:false,
        data:
        {
            level: coneLevel,
            name: coneName,
        },
        dataType: 'json',
        success:function(base)
        {   
            var atkStats = parseFloat(base.base_atk) + (parseFloat(base.add_atk) * (ogLevel - 1 ));
            var defStats = parseFloat(base.base_def) + (parseFloat(base.add_def) * (ogLevel - 1));
            returnv = [atkStats, defStats]
        }
    });
    return returnv;
}

function getConeDesc(coneName)
{
    var returnv;
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getConeDesc.php',
        async:false,
        data:
        {
            name: coneName,
        },
        success:function(base)
        {   
            returnv = base;
        }
    });
    return returnv;
}

function getCharaTalentDesc(charaterName)
{
    var returnv;
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getCharaTalentDesc.php',
        async:false,
        data:
        {
            name: charaterName,
        },
        success:function(base)
        {   
            returnv = base;
        }
    });
    return returnv;
}

function getRelicDesc(relicName)
{
    var returnv;
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getRelicDesc.php',
        async:false,
        data:
        {
            name: relicName,
        },
        dataType: 'json',
        success:function(base)
        {   
            returnv = [base.two_piece_bonus, base.four_piece_bonus];
        }
    });
    return returnv;
}

function getCharaTraces(charaName)
{
    var returnv;
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getCharaTraces.php',
        async:false,
        data:
        {
            name: charaName,
        },
        dataType: 'json',
        success:function(base)
        {   
            returnv = [base.minor_traces, base.major_traces];
        }
    });
    return returnv;
}