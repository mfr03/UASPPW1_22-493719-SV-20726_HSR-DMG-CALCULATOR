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
    var returv = 10;
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
