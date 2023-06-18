import utils
import re
import math

def talent():
    baseQuery = "INSERT INTO `character_talent` (`character_talent_id`,`character_name_id`," \
                " `talent_type`, `talent_params`, " \
                "`talent_desc`) VALUES ("
    for item in utils.fileList('characters/'):
        data = utils.openJson('characters/' + item)
        datas = data['skills'][3]
        name = data['name']
        if name == "March 7th":
            name = "Mar7th"
        elif name == "Dan Heng":
            name = "DanHeng"
        elif name == "Jing Yuan":
            name = "JingYuan"
        elif name == "Silver Wolf":
            name = "SilverWolf"
        elif item == "playerboy.json":
            name = "Playerboy"
        elif item == "playerboy2.json":
            name = "Playerboy2"
        elif item == "playergirl.json":
            name = "Playergirl"
        elif item == "playergirl2.json":
            name = "Playergirl2"
        for level in datas['levelData']:
            baseQuery += "'" + name + str(level['level']) + "', "
            baseQuery += "'" + name + "', "
            baseQuery += "'" + datas['tagHash'] + "', "
            baseQuery += "'" + str(level['params']) + "', "

            desc = datas['descHash']
            desc = re.sub(r"<nobr>", "", desc)
            desc = re.sub(r"</nobr>", "", desc)
            for enum, param in enumerate(level['params'], 1):
                if isinstance(param, float):
                    param *=100;

                desc = re.sub(r"#" + f"{enum}" + r".{0,4}\]", f"{param}", desc);
            desc = desc.replace("'", r"\'")
            baseQuery += "'" + desc + "');"
            print(baseQuery)
            baseQuery = "INSERT INTO `character_talent` (`character_talent_id`,`character_name_id`," \
                        " `talent_type`, `talent_params`, " \
                        "`talent_desc`) VALUES ("

def skill():
    arr = utils.fileList('characters/')
    for item in arr:
        data = utils.openJson('characters/' + item)
        baseQuery = "INSERT INTO `character_skills` (`character_skill_id`,`character_name_id`," \
                    " `skill_name`, `skill_type`, `skill_scaling_type`, `skill_base_multiplier`," \
                    "`skill_level_multiplier`, `skill_max_level`) VALUES ("
        name = data['name']
        if name == "March 7th":
            name = "Mar7th"
        elif name == "Dan Heng":
            name = "DanHeng"
        elif name == "Jing Yuan":
            name = "JingYuan"
        elif name == "Silver Wolf":
            name = "SilverWolf"
        elif item == "playerboy.json":
            name = "Playerboy"
        elif item == "playerboy2.json":
            name = "Playerboy2"
        elif item == "playergirl.json":
            name = "Playergirl"
        elif item == "playergirl2.json":
            name = "Playergirl2"
        for _ in range(3):
            datas = data['skills'][_]
            baseQuery += "'" + name + datas['typeDescHash'].replace(' ', '') + "', "
            baseQuery += "'" + name + "', "
            baseQuery += "'" + datas['name'].replace("'", r"\'") + "', "
            baseQuery += "'" + datas['tagHash'] + "', "
            baseQuery += "'" + 'atk' + "', "
            baseQuery += "'" + str(datas['levelData'][0]['params'][0]) + "', "
            multiplier = round((datas['levelData'][1]['params'][0] * 100) - (datas['levelData'][0]['params'][0] * 100)) / 100
            baseQuery += "'" + str(multiplier) + "', "
            baseQuery += "'" + str(len(datas['levelData'])) + "');"
            print(baseQuery)
            baseQuery = "INSERT INTO `character_skills` (`character_skill_id`,`character_name_id`," \
                        " `skill_name`, `skill_type`, `skill_scaling_type`, `skill_base_multiplier`," \
                        "`skill_level_multiplier`, `skill_max_level`) VALUES ("


def main():
    talent()


if __name__ == '__main__':
    main()