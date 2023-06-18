import re

import utils

def processRelics(string):
    possibleKey = [
        'Physical',
        'Fire',
        'Ice',
        'Lightning',
        'Wind',
        'Quantum',
        'Imaginary',
        'CRIT DMG',
        'CRIT Rate',
        'Effect RES',
        'Effect Hit Rate',
        'Outgoing Healing',
        'Energy Regeneration',
        'Break Effect',
        'HP',
        'ATK',
        'DEF',
        'Ultimate'
    ]
    res = list()
    for key in possibleKey:
        if string.find(key) != -1:
            res.append(key)
    return res
def main():
    for path in utils.fileList('relics/'):
        data = utils.openJson('relics/' + path)
        name = data['name'].split(" ")[0] + "s"
        if name == "Pan-Galactics":
            name = 'Ipcs'
        elif name == "Talia:s":
            name = 'Talias'
        elif name == 'Spaces':
            name = "Hertas"
        elif name == 'Inerts':
            name = "Salsottos"
        elif name == 'Sprightlys':
            name = "Vonwacqs"
        elif name == "Celestials":
            name = "Planets"
        elif name == "Fleets":
            name = "Xianzhou"

        if len(data['skills']) > 1:
            baseQuery = "INSERT INTO `relics` (`relics_id`, `two_piece_set_bonus`, `four_piece_set_bonus`) VALUES ("
            baseQuery += "'" + name + "', "
            # two-piece set
            if data['skills'][0]['params']:
                descTwo = data['skills'][0]['desc']
                for enum, param in enumerate(data['skills'][0]['params'], 1):

                    if param < 1:
                        param *=100

                    descTwo = re.sub(r"<nobr>", "", descTwo)
                    descTwo = re.sub(r"</nobr>", "", descTwo)
                    descTwo = re.sub(r"#" + f"{enum}" + r".{0,4}\]", f"{param}", descTwo);
            else:
                descTwo = data['skills'][0]['desc'].replace("'", r"\'")

            baseQuery += "'" + descTwo.replace("'", r"\'") + "', "
            # four-piece set
            if data['skills'][1]['params']:
                descFour = data['skills'][1]['desc']
                for enum, param in enumerate(data['skills'][1]['params'], 1):

                    if param < 1:
                        param *= 100
                    descFour= re.sub(r"<nobr>", "", descFour)
                    descFour = re.sub(r"</nobr>", "", descFour)
                    descFour = re.sub(r"#" + fr"{enum}" + r".{0,4}\]", f"{param}", descFour);

            else:
                descFour = data['skills'][1]['desc'].replace("'", r"\'")

            baseQuery += "'" + descFour.replace("'", r"\'") + "'); "
            print(baseQuery)
        else:
            baseQuery = "INSERT INTO `relics` (`relics_id`, `two_piece_set_bonus`) VALUES ("
            baseQuery += "'" + name + "', "
            desc = data['skills'][0]['desc']
            for enum, param in enumerate(data['skills'][0]['params'], 1):

                if param < 1:
                    param *= 100

                desc = re.sub(r"<nobr>", "", desc)
                desc = re.sub(r"</nobr>", "", desc)
                desc = re.sub(r"#" + fr"{enum}" + r".{0,4}\]", f"{param}", desc);
            baseQuery += "'" + desc.replace("'", r"\'") + "'); "
            print(baseQuery)


if __name__ == '__main__':
    main()