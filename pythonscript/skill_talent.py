import utils
import re
import math

def talent():
    # arr = utils.fileList('characters/')
    # for chara in arr:
    #     data = utils.openJson('characters/' + chara)
    baseQuery = "INSERT INTO `character_talent` (`character_talent_id`,`character_name_id`," \
                " `talent_type`, `talent_stats_type`, " \
                "`talent_params`) VALUES ("
    data = utils.openJson('characters/' + 'seele.json')
    datas = data['skills'][3]
    for level in datas['levelData']:
        baseQuery += "'" + data['name'] + str(level['level']) + "', "
        baseQuery += "'" + data['name'] + "', "
        baseQuery += "'" + datas['tagHash'] + "', "
        baseQuery += "'" + 'dmg boost' + "', "
        baseQuery += "'" + str(level['params'][0]) + "');"
        print(baseQuery)
        baseQuery = "INSERT INTO `character_talent` (`character_talent_id`,`character_name_id`," \
                    " `talent_type`, `talent_stats_type`, " \
                    "`talent_params`) VALUES ("

def skill():
    data = utils.openJson('characters/' + 'seele.json')
    baseQuery = "INSERT INTO `character_skills` (`character_skill_id`,`character_name_id`," \
                " `skill_name`, `skill_type`, `skill_scaling_type`, `skill_base_multiplier`," \
                "`skill_level_multiplier`, `skill_max_level`) VALUES ("
    for _ in range(3):
        datas = data['skills'][_]
        baseQuery += "'" + data['name'] + datas['typeDescHash'].replace(' ', '') + "', "
        baseQuery += "'" + data['name'] + "', "
        baseQuery += "'" + datas['name'] + "', "
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
    # talent()
    skill()

if __name__ == '__main__':
    main()