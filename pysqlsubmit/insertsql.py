import pyperclip
from pathlib import Path
import json

# Information provided by forum.
creator = "".replace("'", r"\'") # backslashes single quotes to make sql work
buildTitle = "".replace("'", r"\'")
buildDesc = "".replace("'", r"\'")
date = ""
link = ""

p = Path(__file__).with_name('items.json')
with p.open('r') as file:
    idMap = json.load(file)
hash = link.split("#")[1]

def base64_to_int(encoded_str):
    alphabet = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz+-"
    digits_map = {char: index for index, char in enumerate(alphabet)}
    result = 0
    for char in encoded_str:
        index = digits_map[char]
        result = (result << 6) + index
    return result

def getItemNameFromID(id):
    for item in idMap['items']:
        if item['id'] == id:
            return item['name']
    return None # means no itme found
# god is dead
def parse_hash(url_tag):
    global equipment
    global conCrafted
    equipment = [None] * 9
    info = url_tag.split("_")
    version = info[0]
    version_number = int(version)
    data_str = info[1]
    if version_number < 4:
        equipments = info[1]
        for i in range(9):
            equipment_str = equipments[i * 3 : i * 3 + 3]
            equipment[i] = getItemNameFromID(base64_to_int(equipment_str))
        data_str = equipments[27:]
    elif version_number == 4:
        info_str = data_str
        start_idx = 0
        for i in range(9):
            if info_str[start_idx] == "-":
                equipment[i] = "CR-" + info_str[start_idx + 1 : start_idx + 18]
                conCrafted = "check"
                start_idx += 18
            else:
                equipment_str = info_str[start_idx : start_idx + 3]
                conCrafted = "false"
                equipment[i] = getItemNameFromID(base64_to_int(equipment_str))
                start_idx += 3
        data_str = info_str[start_idx:]
    elif version_number <= 8:
        info_str = data_str
        start_idx = 0
        for i in range(9):
            if info_str[start_idx : start_idx + 3] == "CR-":
                conCrafted = "check"
                equipment[i] = info_str[start_idx : start_idx + 20]
                start_idx += 20
            elif info_str[start_idx + 3 : start_idx + 6] == "CI-":
                conCrafted = "ewwww custom item? you odd!!!!!" # error making. you are odd if you use ci's tho.
                len_1 = base64_to_int(info_str[start_idx : start_idx + 3])
                equipment[i] = info_str[start_idx + 3 : start_idx + 3 + len_1]
                start_idx += 3 + len_1
            else:
                equipment_str_1 = info_str[start_idx : start_idx + 3]
                conCrafted = "false"
                equipment[i] = getItemNameFromID(base64_to_int(equipment_str_1))
                start_idx += 3
        data_str = info_str[start_idx:]
parse_hash(hash)

def checkRarity(name):
    rarity = [None] * 9
    for item in idMap['items']:
        if item['name'] == name:
            rarity[r] = item['tier']
            return(rarity[r])

def checkLevel(name):
    rarity = [None] * 9
    for item in idMap['items']:
        if item['name'] == name:
            rarity[r] = item['lvl']
            return(rarity[r])
        
def checkQuest(name):
    for item in idMap['items']:
        if item['name'] == name:
            try:
                item['quest']
            except KeyError:
                conQuest = "x"
                return(conQuest)
            conQuest = "check"
            return(conQuest)
  
def checkLI(items):
    filtered_items = []
    for item in items:
        if item['name'].startswith(('Bronze', 'Silver', 'Gold', 'Diamond')) and \
           item.get('tier') == 'Legendary' and \
           item.get('fixID') == True and \
           item.get('drop') == 'never' and \
           item.get('restrict') == 'Untradable' and \
           item.get('category') == 'accessory':
            filtered_items.append(item['name'])
    return filtered_items
filtered_items = checkLI(idMap['items'])

minlvl = 0
altarItems = ["Durum's Serenity", "The Scarecrow's Vest", "Greenhoof",
              "Crossbolt", "Haros' Oar", "Obolus",
              "Deadeye", "Redrock Bandanna", "Sundown Poncho",
              "Binding Brace", "Constrict Collar", "Marius' Prison", "Shackles of the Beast",
              "Plague Staff", "Plague Mask", "Purification Bead",
              "Kahontsi Ohstyen", "Ohonte Kerhite", "Onenya Hronkas",
              "Capsid Frame", "Crystal Coil", "Phage Pins",
              "Blade of Shade", "Shadestep", "Shackle of Shade",
              "Helm Splitter", "Quick-Strike Leggings", "Back-Up Plan",
              "Stave of the Legends", "Legend Guard's Plate", "Trainer's Pendant",
              "Breakbore", "Tera", "Summa",
              "Eidolon", "Nona", "Dondasch",
              "Braker", "Bonder", "Stinger", "Slider", "Lower",
              "Dissociation", "Anxiolytic", "Panic Zealot"
            ]

for i in range(9):
    if equipment[i] in filtered_items:
        conLI = "check"
        break
    else:
        conLI = "x"
        
for r in range(9):
    if checkRarity(equipment[r]) == "Mythic":
        conMythic = "check"
    try:
        conMythic
    except NameError:
        conMythic = "x"
    if checkQuest(equipment[r]) == "check":
        conQuest = "check"
    try:
        conQuest
    except NameError:
        conQuest = "x"
    if checkLevel(equipment[r]) > minlvl:
        minlvl = checkLevel(equipment[r])
    
for t in range(9):
    if equipment[t] in altarItems:
        conAltar = "check"
        break
    else:
        conAltar = "x"

for item in idMap['items']:
    if item['name'] == equipment[8]: # get the weapon.
        itemtype = item['type']
        if itemtype == "wand":
            classURL = "mage"
            break
        elif itemtype == "dagger":
            classURL = "assassian"
            break
        elif itemtype == "relik":
            classURL = "shaman"
            break
        elif itemtype == "spear":
            classURL = "warrior"
            break
        elif itemtype == "bow":
            classURL = "assassian"
            break
        raise Exception("Weapon not provided")

#  Quest items have a tag called "quest". If present, it is a quest item.
#  LI all legendary, all acsessories, "fixID": true, "type": "ring", "restrict": "Untradable"
#  Boss altar's have no specific way to check, so I'm gonna have to make a dict with all of them by hand

def sqlsub(name):
    return """INSERT INTO `"""+name+"""` (`classURL`, `creator`, `buildTitle`, `buildDesc`, `conMythic`, `conQuest`, `conCrafted`, `conLI`, `conAltar`, `minlvl`, `date`, `link`) VALUES 
('"""+str(classURL)+"""', '"""+str(creator)+"""', '"""+str(buildTitle)+"""', '"""+str(buildDesc)+"""', '"""+str(conMythic)+"""', '"""+str(conQuest)+"""', '"""+str(conCrafted)+"""', '"""+str(conLI)+"""', '"""+str(conAltar)+"""', '"""+str(minlvl)+"""', '"""+str(date)+"""', '"""+str(link)+"""')"""

pyperclip.copy(sqlsub('sqlProd')) # sqlProd, sqlProdLR, sqlProdXP