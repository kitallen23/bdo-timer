
var orangeItems = [
    // Enhancement items
    "Black Stone (Weapon)",
    "Black Stone (Armor)",
    "Concentrated Magical Black Stone (Weapon)",
    "Concentrated Magical Black Stone (Armor)",
    "Ultimate Weapon Reform Stone",
    "Ultimate Armor Reform Stone"
];

var yellowItems = [
    // Boss armor
    "Giath's Helmet",
    "Bheg's Gloves",
    "Dim Tree Spirit's Armor",
    "Red Nose's Armor",
    "Muskan's Shoes",

    // Boss mainhand weapons
    "Kzarka Longsword",
    "Kzarka Longbow",
    "Kzarka",
    "Kzarka Axe",
    "Kzarka Shortsword",
    "Kzarka Blade",
    "Kzarka Staff",
    "Kzarka Kriegsmesser",
    "Kzarka Gauntlet",

    // Boss offhand weapons
    "Nouver Shield",
    "Nouver Dagger",
    "Nouver Talisman",
    "Nouver Ornamental Knot",
    "Nouver Trinket",
    "Nouver Horn Bow",
    "Nouver Kunai",
    "Nouver Shuriken",
    "Nouver Vambrace",

    "Kutum Shield",
    "Kutum Dagger",
    "Kutum Talisman",
    "Kutum Ornamental Knot",
    "Kutum Trinket",
    "Kutum Horn Bow",
    "Kutum Kunai",
    "Kutum Shuriken",
    "Kutum Vambrace",

    // Boss awakening weapons
    "Dandelion Great Sword",
    "Dandelion Scythe",
    "Dandelion Iron Buster",
    "Dandelion Kamasylven Sword",
    "Dandelion Celestial Bo Staff",
    "Dandelion Lancia",
    "Dandelion Crescent Blade",
    "Dandelion Kerispear",
    "Dandelion Sura Katana",
    "Dandelion Sah Chakram",
    "Dandelion Aad Sphera",
    "Dandelion Godr Sphera",
    "Dandelion Vediant",
    "Dandelion Garbrace",

    // Jewelery (neck)
    "Ogre Ring",
    "Serap's Necklace",
    "Sicil's Necklace",
    "Tungrad Necklace",
    "Laytenn's Power Stone",
    "Manos Diamond Necklace",
    "Manos Ruby Necklace",
    "Manos Topaz Necklace",
    "Manos Sapphire Necklace",
    "Manos Emerald Necklace",

    // Jewelery (ring)
    "Ring of Crescent Guardian",
    "Ring of Cadry Guardian",
    "Manos Diamond Ring",
    "Manos Ruby Ring",
    "Manos Topaz Ring",
    "Manos Sapphire Ring",
    "Manos Emerald Ring",

    // Jewelery (earring)
    "Tungrad Earring",
    "Manos Diamond Earrings",
    "Manos Ruby Earrings",
    "Manos Topaz Earrings",
    "Manos Sapphire Earrings",
    "Manos Emerald Earrings",

    // Jewelery (belt)
    "Basilisk's Belt",
    "Centaurus Belt",
    "Manos Golden Coral Belt",
    "Manos Red Coral Belt",
    "Manos White Coral Belt",
    "Manos Blue Coral Belt",
    "Manos Green Coral Belt",

    // Fishing rods
    "Golden Fishing Rod",
    "Triple-Float Fishing Rod"
];

var blueItems = [
    // Liverto mainhand weapons
    "Liverto Longsword",
    "Liverto Longbow",
    "Liverto Amulet",
    "Liverto Axe",
    "Liverto Shortsword",
    "Liverto Blade",
    "Liverto Staff",
    "Liverto Kriegsmesser",
    "Liverto Gauntlet",

    // Blue awakening weapons
    "Mercenary's Steel Great Sword",
    "Spell of Seduction Scythe",
    "Upgraded Iron Buster",
    "Heiress's Kamasylven Sword",
    "Azure Thunder Celestial Bo Staff",
    "Piece of Purification Lancia",
    "Immaculate Crescent Blade",
    "Frosty Cloud Kerispear",
    "Yagakmu Sura Katana",
    "Oeki's Sah Chakram",
    "Alloria Aad Sphera",
    "Lord Godr Sphera",
    "Light-Swallowing Vediant",
    "Backflow Garbrace",

    // Jewelery (neck)
    "Ancient Guardian's Seal",
    "Necklace of Shultz the Gladiator",

    // Jewelery (ring)
    "Mark of Shadow",
    "Red Coral Ring",
    "Blue Coral Ring",

    // Jewelery (earring)
    "Witch's Earring",
    "Red Coral Earring",
    "Blue Coral Earring",
    "Blue Whale Molar Earring",
    "Fugitive Khalk's Earring",

    // Jewelery (belt)
    "Ancient Weapon Core",
    "Belt of Shultz the Gladiator",
    "Tree Spirit Belt",

    // Enhancement
    "Hard Black Crystal Shard",
    "Sharp Black Crystal Shard",

    // Fishing rods
    "Balenos Fishing Rod",
    "Epheria Fishing Rod",
    "Mediah Fishing Rod",
    "Calpheon Fishing Rod",

    "Maple Float",
    "Ash Tree Float"
];

var greenItems = [
    // Armor
    // Grunil
    "Grunil Helmet",
    "Grunil Armor",
    "Grunil Gloves",
    "Grunil Shoes",

    // Agerian
    "Agerian Helmet",
    "Agerian Armor",
    "Agerian Gloves",
    "Agerian Shoes",

    // Heve
    "Strength Helmet of Heve",
    "Strength Armor of Heve",
    "Strength Gloves of Heve",
    "Strength Shoes of Heve",

    // Talis
    "Talis Helmet",
    "Talis Armor",
    "Talis Gloves",
    "Talis Shoes",

    // Taritas
    "Taritas Helmet",
    "Taritas Armor",
    "Taritas Gloves",
    "Taritas Shoes",

    // Zereth
    "Zereth Helmet",
    "Zereth Armor",
    "Zereth Gloves",
    "Zereth Shoes",

    // Offhands
    "Axion Shield",
    "Vangertz Shield",
    "Kite Shield",
    "Krea Shield",
    "Rosar Shield",

    "Steel Dagger",
    "Bronze Dagger",
    "Parrying Dagger",
    "Krea Dagger",
    "Rosar Dagger",

    "Jubre Talisman",
    "Helrick Talisman",
    "Rosar Talisman",
    "Krea Talisman",
    "Rhik Talisman",

    "Oros Ornamental Knot",
    "Krea Ornamental Knot",
    "Theos Ornamental Knot",
    "Rosar Ornamental Knot",
    "Saiyer Ornamental Knot",

    "Incense Trinket",
    "Krea Trinket",
    "Rosar Trinket",
    "Blade Trinket",
    "Needle Trinket",

    "White Horn Bow",
    "White Horn Warrior Bow",
    "Black Horn Warrior Bow",
    "Krea Horn Bow",
    "Rosar Horn Bow",

    "Estique Kunai",
    "Quitar Kunai",
    "Tadd Kunai",
    "Krea Kunai",
    "Rosar Kunai",

    "Estique Shuriken",
    "Quitar Shuriken",
    "Tadd Shuriken",
    "Krea Shuriken",
    "Rosar Shuriken",

    "Scale Vambrace",
    "Krea Vambrace",
    "Rosar Vambrace",
    "Iron Vambrace",
    "Leather Vambrace",

    // Mainhands
    "Yuria Longsword",
    "Krea Longsword",
    "Bares Longsword",
    "Rosar Longsword",
    "Kalis Longsword",
    "Seleth Longsword",
    "Azwell Longsword",
    "Elsh Longsword",
    "Ain Longsword",

    "Yuria Longbow",
    "Bares Longbow",
    "Krea Longbow",
    "Kalis Longbow",
    "Rosar Longbow",
    "Azwell Longbow",
    "Seleth Longbow",
    "Elsh Longbow",
    "Ain Longbow",

    "Yuria Amulet",
    "Bares Amulet",
    "Krea Amulet",
    "Kalis Amulet",
    "Rosar Amulet",
    "Azwell Amulet",
    "Seleth Amulet",
    "Elsh Amulet",
    "Ain Amulet",

    "Yuria Axe",
    "Bares Axe",
    "Krea Axe",
    "Kalis Axe",
    "Rosar Axe",
    "Azwell Axe",
    "Seleth Axe",
    "Elsh Axe",
    "Ain Axe",

    "Yuria Shortsword",
    "Bares Shortsword",
    "Krea Shortsword",
    "Kalis Shortsword",
    "Rosar Shortsword",
    "Azwell Shortsword",
    "Seleth Shortsword",
    "Elsh Shortsword",
    "Ain Shortsword",

    "Yuria Staff",
    "Bares Staff",
    "Krea Staff",
    "Kalis Staff",
    "Rosar Staff",
    "Azwell Staff",
    "Seleth Staff",
    "Elsh Staff",
    "Ain Staff",

    "Yuria Kriegsmesser",
    "Bares Kriegsmesser",
    "Krea Kriegsmesser",
    "Kalis Kriegsmesser",
    "Rosar Kriegsmesser",
    "Azwell Kriegsmesser",
    "Seleth Kriegsmesser",
    "Elsh Kriegsmesser",
    "Ain Kriegsmesser",

    "Yuria Gauntlet",
    "Bares Gauntlet",
    "Krea Gauntlet",
    "Kalis Gauntlet",
    "Rosar Gauntlet",
    "Azwell Gauntlet",
    "Seleth Gauntlet",
    "Elsh Gauntlet",
    "Ain Gauntlet"
];

var ultimateItems = [

    // Blue awakening weapons
    "Ultimate Mercenary's Steel Great Sword",
    "Ultimate Spell of Seduction Scythe",
    "Ultimate Upgraded Iron Buster",
    "Ultimate Heiress's Kamasylven Sword",
    "Ultimate Azure Thunder Celestial Bo Staff",
    "Ultimate Piece of Purification Lancia",
    "Ultimate Immaculate Crescent Blade",
    "Ultimate Frosty Cloud Kerispear",
    "Ultimate Yagakmu Sura Katana",
    "Ultimate Oeki's Sah Chakram",
    "Ultimate Alloria Aad Sphera",
    "Ultimate Lord Godr Sphera",
    "Ultimate Light-Swallowing Vediant",
    "Ultimate Backflow Garbrace",

    // Armor
    // Grunil
    "Ultimate Grunil Helmet",
    "Ultimate Grunil Armor",
    "Ultimate Grunil Gloves",
    "Ultimate Grunil Shoes",

    // Agerian
    "Ultimate Agerian Helmet",
    "Ultimate Agerian Armor",
    "Ultimate Agerian Gloves",
    "Ultimate Agerian Shoes",

    // Heve
    "Ultimate Strength Helmet of Heve",
    "Ultimate Strength Armor of Heve",
    "Ultimate Strength Gloves of Heve",
    "Ultimate Strength Shoes of Heve",

    // Talis
    "Ultimate Talis Helmet",
    "Ultimate Talis Armor",
    "Ultimate Talis Gloves",
    "Ultimate Talis Shoes",

    // Taritas
    "Ultimate Taritas Helmet",
    "Ultimate Taritas Armor",
    "Ultimate Taritas Gloves",
    "Ultimate Taritas Shoes",

    // Zereth
    "Ultimate Zereth Helmet",
    "Ultimate Zereth Armor",
    "Ultimate Zereth Gloves",
    "Ultimate Zereth Shoes",

    // Offhands
    "Ultimate Axion Shield",
    "Ultimate Vangertz Shield",
    "Ultimate Kite Shield",
    "Ultimate Krea Shield",
    "Ultimate Rosar Shield",

    "Ultimate Steel Dagger",
    "Ultimate Bronze Dagger",
    "Ultimate Parrying Dagger",
    "Ultimate Krea Dagger",
    "Ultimate Rosar Dagger",

    "Ultimate Jubre Talisman",
    "Ultimate Helrick Talisman",
    "Ultimate Rosar Talisman",
    "Ultimate Krea Talisman",
    "Ultimate Rhik Talisman",

    "Ultimate Oros Ornamental Knot",
    "Ultimate Krea Ornamental Knot",
    "Ultimate Theos Ornamental Knot",
    "Ultimate Rosar Ornamental Knot",
    "Ultimate Saiyer Ornamental Knot",

    "Ultimate Incense Trinket",
    "Ultimate Krea Trinket",
    "Ultimate Rosar Trinket",
    "Ultimate Blade Trinket",
    "Ultimate Needle Trinket",

    "Ultimate White Horn Bow",
    "Ultimate White Horn Warrior Bow",
    "Ultimate Black Horn Warrior Bow",
    "Ultimate Krea Horn Bow",
    "Ultimate Rosar Horn Bow",

    "Ultimate Estique Kunai",
    "Ultimate Quitar Kunai",
    "Ultimate Tadd Kunai",
    "Ultimate Krea Kunai",
    "Ultimate Rosar Kunai",

    "Ultimate Estique Shuriken",
    "Ultimate Quitar Shuriken",
    "Ultimate Tadd Shuriken",
    "Ultimate Krea Shuriken",
    "Ultimate Rosar Shuriken",

    "Ultimate Scale Vambrace",
    "Ultimate Krea Vambrace",
    "Ultimate Rosar Vambrace",
    "Ultimate Iron Vambrace",
    "Ultimate Leather Vambrace",

    // Mainhands
    "Ultimate Yuria Longsword",
    "Ultimate Krea Longsword",
    "Ultimate Bares Longsword",
    "Ultimate Rosar Longsword",
    "Ultimate Kalis Longsword",
    "Ultimate Seleth Longsword",
    "Ultimate Azwell Longsword",
    "Ultimate Elsh Longsword",
    "Ultimate Ain Longsword",

    "Ultimate Yuria Longbow",
    "Ultimate Bares Longbow",
    "Ultimate Krea Longbow",
    "Ultimate Kalis Longbow",
    "Ultimate Rosar Longbow",
    "Ultimate Azwell Longbow",
    "Ultimate Seleth Longbow",
    "Ultimate Elsh Longbow",
    "Ultimate Ain Longbow",

    "Ultimate Yuria Amulet",
    "Ultimate Bares Amulet",
    "Ultimate Krea Amulet",
    "Ultimate Kalis Amulet",
    "Ultimate Rosar Amulet",
    "Ultimate Azwell Amulet",
    "Ultimate Seleth Amulet",
    "Ultimate Elsh Amulet",
    "Ultimate Ain Amulet",

    "Ultimate Yuria Axe",
    "Ultimate Bares Axe",
    "Ultimate Krea Axe",
    "Ultimate Kalis Axe",
    "Ultimate Rosar Axe",
    "Ultimate Azwell Axe",
    "Ultimate Seleth Axe",
    "Ultimate Elsh Axe",
    "Ultimate Ain Axe",

    "Ultimate Yuria Shortsword",
    "Ultimate Bares Shortsword",
    "Ultimate Krea Shortsword",
    "Ultimate Kalis Shortsword",
    "Ultimate Rosar Shortsword",
    "Ultimate Azwell Shortsword",
    "Ultimate Seleth Shortsword",
    "Ultimate Elsh Shortsword",
    "Ultimate Ain Shortsword",

    "Ultimate Yuria Staff",
    "Ultimate Bares Staff",
    "Ultimate Krea Staff",
    "Ultimate Kalis Staff",
    "Ultimate Rosar Staff",
    "Ultimate Azwell Staff",
    "Ultimate Seleth Staff",
    "Ultimate Elsh Staff",
    "Ultimate Ain Staff",

    "Ultimate Yuria Kriegsmesser",
    "Ultimate Bares Kriegsmesser",
    "Ultimate Krea Kriegsmesser",
    "Ultimate Kalis Kriegsmesser",
    "Ultimate Rosar Kriegsmesser",
    "Ultimate Azwell Kriegsmesser",
    "Ultimate Seleth Kriegsmesser",
    "Ultimate Elsh Kriegsmesser",
    "Ultimate Ain Kriegsmesser",

    "Ultimate Yuria Gauntlet",
    "Ultimate Bares Gauntlet",
    "Ultimate Krea Gauntlet",
    "Ultimate Kalis Gauntlet",
    "Ultimate Rosar Gauntlet",
    "Ultimate Azwell Gauntlet",
    "Ultimate Seleth Gauntlet",
    "Ultimate Elsh Gauntlet",
    "Ultimate Ain Gauntlet"
];

$(document).ready(function() {

    var appendTo = document.getElementById("item-list");

    if(appendTo)
    {
        for(i = 0; i < orangeItems.length; ++i)
        {
            el = document.createElement("option");
            el.textContent = orangeItems[i];
            appendTo.appendChild(el);
        }
        for(var i = 0; i < yellowItems.length; ++i)
        {
            var el = document.createElement("option");
            el.textContent = yellowItems[i];
            appendTo.appendChild(el);
        }
        for(i = 0; i < blueItems.length; ++i)
        {
            el = document.createElement("option");
            el.textContent = blueItems[i];
            appendTo.appendChild(el);
        }
        for(i = 0; i < greenItems.length; ++i)
        {
            el = document.createElement("option");
            el.textContent = greenItems[i];
            appendTo.appendChild(el);
        }
        for(i = 0; i < ultimateItems.length; ++i)
        {
            el = document.createElement("option");
            el.textContent = ultimateItems[i];
            appendTo.appendChild(el);
        }
    }
});

var accessoryItems = [
    // YELLOW
    // Jewelery (neck)
    "Ogre Ring",
    "Serap's Necklace",
    "Sicil's Necklace",
    "Tungrad Necklace",
    "Laytenn's Power Stone",
    "Manos Diamond Necklace",
    "Manos Ruby Necklace",
    "Manos Topaz Necklace",
    "Manos Sapphire Necklace",
    "Manos Emerald Necklace",

    // Jewelery (ring)
    "Ring of Crescent Guardian",
    "Ring of Cadry Guardian",
    "Manos Diamond Ring",
    "Manos Ruby Ring",
    "Manos Topaz Ring",
    "Manos Sapphire Ring",
    "Manos Emerald Ring",

    // Jewelery (earring)
    "Tungrad Earring",
    "Manos Diamond Earrings",
    "Manos Ruby Earrings",
    "Manos Topaz Earrings",
    "Manos Sapphire Earrings",
    "Manos Emerald Earrings",

    // Jewelery (belt)
    "Basilisk's Belt",
    "Centaurus Belt",
    "Manos Golden Coral Belt",
    "Manos Red Coral Belt",
    "Manos White Coral Belt",
    "Manos Blue Coral Belt",
    "Manos Green Coral Belt",

    // BLUE
    // Jewelery (neck)
    "Ancient Guardian's Seal",
    "Necklace of Shultz the Gladiator",

    // Jewelery (ring)
    "Mark of Shadow",
    "Red Coral Ring",
    "Blue Coral Ring",

    // Jewelery (earring)
    "Witch's Earring",
    "Red Coral Earring",
    "Blue Coral Earring",
    "Blue Whale Molar Earring",
    "Fugitive Khalk's Earring",

    // Jewelery (belt)
    "Ancient Weapon Core",
    "Belt of Shultz the Gladiator",
    "Tree Spirit Belt"
];

var otherItems = [
    // ORANGE
    // Enhancement items
    "Black Stone (Weapon)",
    "Black Stone (Armor)",
    "Concentrated Magical Black Stone (Weapon)",
    "Concentrated Magical Black Stone (Armor)",
    "Ultimate Weapon Reform Stone",
    "Ultimate Armor Reform Stone"
];

var accessoryEnhancements = [
    "-",
    "PRI",
    "DUO",
    "TRI",
    "TET",
    "PEN"
];

var regularEnhancements = [
    "-",
    "+1",
    "+2",
    "+3",
    "+4",
    "+5",
    "+6",
    "+7",
    "+8",
    "+9",
    "+10",
    "+11",
    "+12",
    "+13",
    "+14",
    "+15",
    "PRI",
    "DUO",
    "TRI",
    "TET",
    "PEN"
];

var otherEnhancements = [
    "-"
];

function isJewellery(n)
{
    return accessoryItems.indexOf(n) > -1;
}
function isOther(n)
{
    return otherItems.indexOf(n) > -1;
}
function setEnhancementList(id, name, optionID)
{
    var _name = name.replace(/&#039;/g, "'");
    var enhancementList = document.getElementById(id);

    if(isJewellery(_name))
    {
        while(enhancementList.length > 0) {
            enhancementList.remove(0);
        }

        for(var j = 0; j < accessoryEnhancements.length; ++j)
        {
            var el = document.createElement("option");
            el.textContent = accessoryEnhancements[j];
            if(optionID !== "") el.setAttribute("id", accessoryEnhancements[j]+"-"+optionID);
            enhancementList.appendChild(el);
        }
    }
    else if(isOther(_name))
    {
        while(enhancementList.length > 0) {
            enhancementList.remove(0);
        }
        var el = document.createElement("option");
        el.textContent = "-";
        if(optionID !== "") el.setAttribute("id", "--"+optionID);
        enhancementList.appendChild(el);
    }
    else
    {
        while(enhancementList.length > 0) {
            enhancementList.remove(0);
        }
        for(var k = 0; k < regularEnhancements.length; ++k)
        {
            var el = document.createElement("option");
            el.textContent = regularEnhancements[k];
            if(optionID !== "") el.setAttribute("id", regularEnhancements[k]+"-"+optionID);
            enhancementList.appendChild(el);
        }
    }

}
