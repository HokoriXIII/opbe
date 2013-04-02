<?php
/**
 *  OPBE
 *  Copyright (C) 2013  Jstar
 *
 * This file is part of OPBE.
 * 
 * OPBE is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OPBE is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with OPBE.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OPBE
 * @author Jstar <frascafresca@gmail.com>
 * @copyright 2013 Jstar <frascafresca@gmail.com>
 * @license http://www.gnu.org/licenses/ GNU AGPLv3 License
 * @version alpha(2013-2-4)
 * @link https://github.com/jstar88/opbe
 */
require (PATH."utils/DeepClonable.php");
require (PATH."utils/Math.php");
require (PATH."utils/Number.php");
require (PATH."utils/Events.php");
require (PATH."models/Type.php");
require (PATH."models/Fighters.php");
require (PATH."models/Fleet.php");
require (PATH."models/HomeFleet.php");
include (PATH."models/Defense.php");
include (PATH."models/Ship.php");
require (PATH."models/Player.php");
require (PATH."models/PlayerGroup.php");
require (PATH."combatObject/Fire.php");
require (PATH."combatObject/PhysicShot.php");
require (PATH."combatObject/ShipsCleaner.php");
require (PATH."combatObject/FireManager.php");
require (PATH."core/Battle.php");
require (PATH."core/BattleReport.php");
require (PATH."core/Round.php");
require (PATH."constants/vars.php");
require (PATH."constants/battle_constants.php");
?>