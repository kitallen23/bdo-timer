
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
    "Manos Green Coral Belt"
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
    "Sharp Black Crystal Shard"
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
    }
});

var accessoryItems = [
    // YELLOW
    // Jewelery (neck)
    "Ogre Ring",
    "Serap's Necklace",
    "Sicil's Necklace",
    "Tungrad Necklace",
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
