OPBE
====

**O**game **P**robabilistic **B**attle **E**ngine  
live: http://opbe.webnet32.com

### Introduction
OPBE is the first(and only) battle engine in the world that use Probability theory:  
battles is processed very very fast and required few memory resources.  
Also memory and cpu usage are O(1), this means they are COSTANTS and independent of the ships amount.    

features:
* Multiple players and fleets (ACS)
* Fake targets
* Rapid fire
* Ordered fires
* Bounce rule
* Waste of damage
* Moon attempt
* Defenses rebuilt
* Report generated by templates

---

### Accuracy
One of main concept used in this battle engine is the **expected value**: instead calculate each ship case, opbe 
creates an estimation of their behavior. 
This estimation is improved analyzing behavior for infinite simulations, so 
to test opbe accuracy you have to set speedsim(dragosim)'s battles amount to a big number, such as 3k.  


---

### Quick start
Ok, seems so cool! How i can use it?  
You can check in **implementations** directory for your game version, read the installation.txt file.  
Be sure you had read the *license* with respect for the author.


---
### Implementation developing guide 
The system organization is like :
* PlayerGroup
   * Player1
   * Player2
      * Fleet1
      * Fleet2
         * Fighters1
         * Fighters2

So in a PlayerGroup there are differents Player,  
each Player have differents Fleets,  
each Fleet have differents Figthers.  

An easy way to display them:
```php   
    $fleet = new Fleet($idFleet);
    $fleet->add($this->getFighters($id, $count));
    
    $player = new Player($idPlayer);
    $player->addFleet($fleet);
    
    $playerGroup = new PlayerGroup();
    $playerGroup->addPlayer($player);
```

#### Fighters

Fighters is the smallest object in the system: it rappresent a group of specific object type able to fight.
For some reason, opbe need to categorize it in two type extending Fighters:
* Defense
* Ship

Don't care about this fact because you should use this automatic code:

```php
    $fighters =  $this->getFighters($idFighters, $count);
```    

```php
   
   public function getFighters($idFighters, $count)
    {
        global $CombatCaps, $pricelist;
        $rf = $CombatCaps[$id]['sd'];
        $shield = $CombatCaps[$id]['shield'];
        $cost = array($pricelist[$id]['metal'], $pricelist[$id]['crystal']);
        $power = $CombatCaps[$id]['attack'];
        if ($id <= 217)
        {
            return new Ship($id, $count, $rf, $shield, $cost, $power);
        }
        return new Defense($id, $count, $rf, $shield, $cost, $power);
    }
   
```

Note that you can assign differents techs to each Fighters, see functions inside this class. 

#### Fleet

Fleet is a group of Fighters and it is extended by a single object 
* HomeFleet : rappresent the ships and defense in the planet (of owner)

This time you have to manually choose the right class and HomeFleet should have $id = 0;

```php
    $fleet = new Fleet($idFleet); // $idFleet is a must
    $fleet = new HomeFleet(0); // 0 is a must
    $fleet->add($fighters);
```
Note that you can assign differents techs to each Fleets, see functions inside this class.   
In this case, all Fighters contained in a Fleet will take it techs.

#### Player

Player is a group of Fleets, don't care about the question attacker or defender.

```php
    $player = new Player($idPlayer); // $idPlayer is a must
    $player->addFleet($fleet);
```

#### PlayerGroup

PlayerGroup is a group of Player, don't care about the question attacker or defender.

```php
    $playerGroup = new PlayerGroup();
    $playerGroup->addPlayer($player);
```

#### Battle

Battle is the main class of OPBE.  
The first argument of constructor is the **attacking** PlayerGroup, instead,   
the second one is the **defending** PlayerGroup.  

There are two methods needed for you:
* startBattle(boolean $debug) : start the battle, if $debug == true, informations will be writtem in output.
* getReport() : return an object usefull to retrive each type of battle informations


```php
    $engine = new Battle($attackingPlayerGroup, $defendingPlayerGroup);
    $engine->startBattle(false);
    $info = $engine->getReport();
```

#### Report

Report is a big container of informations about the battle simulated.  
In the web interface of OPBE, the instance of Report is injected in templates.   

```php
    $info = $engine->getReport();
```

Report contains all the ships status in each round, also have usefull functions to fill templates or update  
the database after the batte.

---

### License

![license](http://www.gnu.org/graphics/agplv3-155x51.png)  
    
    Copyright (C) 2013  Jstar

    OPBE is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    OPBE is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
  
    
[why affero GPL](http://www.gnu.org/licenses/why-affero-gpl.html)

