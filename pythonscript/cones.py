import json
import utils
import re

def listOfCones():
    baseQuery = "INSERT INTO `light_cones` (`cone_name_id`, `cone_path`) VALUES ("
    arr = utils.fileList('lightcones/')
    res = list()
    for item in arr:
        data = utils.openJson('lightcones/' + item)
        res.append(data['name'])
    return res

def makeQueryLightConeParams():
    lightConeList = listOfCones()

def makeQueryDesc():
    baseQuery = "INSERT INTO `light_cone_desc` (`light_cone_desc_id`, `cone_name_id`, `cone_desc`) VALUES ("
    arr = utils.fileList('lightcones/')
    temp = list()
    for item in arr:
        data = utils.openJson('lightcones/' + item)
        for _ in range(5 ):
            desc = f'{data["skill"]["descHash"]}'
            desc = re.sub(r"<span.*?>", "", desc)
            desc = re.sub(r"</span>", "", desc)
            desc = re.sub(r"<nobr>", "", desc)
            desc = re.sub(r"</nobr>", "", desc)
            for enum, i in enumerate(data['skill']['levelData'][_]['params'], 1):
                if i % 1 == i and i < 1:
                    i = round(i * 100)
                desc = re.sub(r"#1\[i\]", f'{i}', desc)
                if enum == 2:
                    desc = re.sub(r"#2\[i\]", f'{i}', desc)

                if enum == 3:
                    desc = re.sub(r"#3\[i\]", f'{i}', desc)

                if enum == 4:
                    desc = re.sub(r"#4\[i\]", f'{i}', desc)

                if enum == 5:
                    desc = re.sub(r"#5\[i\]", f'{i}', desc)
            desc = desc.replace("'", r"\'")
            name = data['name'].replace("'", r"\'")
            baseQuery += "'" + name + str(_ + 1) + "',"
            baseQuery += "'" + name + "',"
            baseQuery += "'" + desc + "');"
            print(baseQuery)
            baseQuery = "INSERT INTO `light_cone_desc` (`light_cone_desc_id`, `cone_name_id`, `cone_desc`) VALUES ("
def makeQueryLightCone():
    baseQuery = "INSERT INTO `light_cones` (`cone_name_id`, `cone_path`) VALUES ("
    arr = utils.fileList('lightcones/')
    temp = list()
    for item in arr:
        data = utils.openJson('lightcones/' + item)
        baseQuery += f'"{data["name"]}",'
        baseQuery += f'"{data["baseType"]["name"]}");'
        print(baseQuery)
        baseQuery = "INSERT INTO `light_cones` (`cone_name_id`, `cone_path`) VALUES ("
def main():
    makeQueryDesc()


if __name__ == '__main__':
    main()