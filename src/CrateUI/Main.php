<?php

namespace CrateUI;

use pocketmine\item\Item;
use pocketmine\utils\TextFormat;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\inventory\Inventory;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\level\particle\LavaParticle;
use pocketmine\level\sound\EndermanTeleportSound;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
	
	public function onEnable(){
		$this->getServer()->getCommandMap()->register("getkey", new Commands\getkey());
		$this->getLogger()->info("§aEnabled.");
	}
	
	public function onDisable(){
	    $this->getLogger()->info("§cDisalbed.");
	}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
	     if($cmd->getName() == "crate"){
			 if($sender instanceof Player){
				$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
				if ($api === null || $api->isDisabled()) {
				}
				$form = $api->createSimpleForm(function (Player $sender, array $data) {
					$result = $data[0];
					if ($result === null) {
					}
					switch ($result) {
						case 1:
							//common
							$inv = $sender->getInventory();
							if($inv->contains(Item::get(131,1,1))){
								$level = $sender->getLevel();
								$x = $sender->getX();
								$y = $sender->getY();
								$z = $sender->getZ();
								$pos = new Vector3($x, $y + 2, $z);
								$pos1 = new Vector3($x, $y, $z);
								$name = $sender->getName();
								$level->addSound(new EndermanTeleportSound($pos1));
								$level->addParticle(new LavaParticle($pos1));
								$inv->removeItem(Item::get(131,1,1));
								$this->getServer()->broadcastMessage("§b$name §ajust opened §aCommon §aCrate!");
								$result = rand(1,3);
									 switch($result){
							case 1:
								$inv->addItem(Item::get(265,0,15));
								$sender->sendMessage("§9Crate> §bYou won 15 IronIngot!");
								 break;
							case 2:
								$inv->addItem(Item::get(264,0,1));
								$sender->sendMessage("§9Crate> §bYou won 1 diamond!");
								 break;
							case 3:
									$inv->addItem(Item::get(17,0,20));
									$sender->sendMessage("§9Crate> §bYou won 20 oak wood!");
								 break;
									 }
							}else{
								$sender->sendMessage("§9Crate> §fYou don't have §aCommon §fKey.");
							}
							break;
						case 2:
							//vote
							$inv = $sender->getInventory();
							if($inv->contains(Item::get(131,2,1))){
								$level = $sender->getLevel();
								$x = $sender->getX();
								$y = $sender->getY();
								$z = $sender->getZ();
								$pos = new Vector3($x, $y + 2, $z);
								$pos1 = new Vector3($x, $y, $z);
								$name = $sender->getName();
								$level->addSound(new EndermanTeleportSound($pos1));
								$level->addParticle(new LavaParticle($pos1));
								$inv->removeItem(Item::get(131,2,1));
								$this->getServer()->broadcastMessage("§b$name §ajust opened §cVote §aCrate!");
								$result = rand(1,3);
									 switch($result){
							case 1:
								$inv->addItem(Item::get(265,0,15));
								$sender->sendMessage("§9Crate> §bYou won 15 IronIngot!");
								 break;
							case 2:
								$inv->addItem(Item::get(264,0,1));
								$sender->sendMessage("§9Crate> §bYou won 1 diamond!");
								 break;
							case 3:
									$inv->addItem(Item::get(17,0,20));
									$sender->sendMessage("§9Crate> §bYou won 20 oak wood!");
								 break;
									 }
							}else{
								$sender->sendMessage("§9Crate> §fYou don't have §cVote §fKey.");
							}
						break;
						case 3:
							//rare
							$inv = $sender->getInventory();
							if($inv->contains(Item::get(131,3,1))){
								$level = $sender->getLevel();
								$x = $sender->getX();
								$y = $sender->getY();
								$z = $sender->getZ();
								$pos = new Vector3($x, $y + 2, $z);
								$pos1 = new Vector3($x, $y, $z);
								$level->addSound(new EndermanTeleportSound($pos1));
								$level->addParticle(new LavaParticle($pos1));
								$inv->removeItem(Item::get(131,3,1));
								$result = rand(1,6);
									 switch($result){
							case 1:
								$inv->addItem(Item::get(265,0,20));
								$sender->sendMessage("§9Crate> §bYou won 20 IronIngot!");
								 break;
							case 2:
								$inv->addItem(Item::get(264,0,5));
								$sender->sendMessage("§9Crate> §bYou won 5 diamonds!");
								 break;
							case 3:
									$inv->addItem(Item::get(322,0,1));
									$sender->sendMessage("§9Crate> §bYou won a Golden Apple!");
								 break;
							case 4:
									$i = Item::get(267,0,1);
									$e = Enchantment::getEnchantment(9);
									$e->setLevel(2);
									$i->addEnchantment($e);
									$inv->addItem($i);
									$sender->sendMessage("§9Crate> §bYou won a Enchanted Iron Sword!"); 
								 break;
							case 5:
									   $inv->addItem(Item::get(466,0,1));
									$sender->sendMessage("§9Crate> §bYou won a Enchanted Golden Apple!");
								 break;
							case 5:
									$inv->addItem(Item::get(17,0,64));
									$sender->sendMessage("§9Crate> §bYou won 64 oak wood!");
								 break;
									 }
							}else{
								$sender->sendMessage("§9Crate> §fYou don't have §6Rare §fKey.");
							}
						break;
						case 4:
							//mythic
							$inv = $sender->getInventory();
							if($inv->contains(Item::get(131,4,1))){
								$level = $sender->getLevel();
								$x = $sender->getX();
								$y = $sender->getY();
								$z = $sender->getZ();
								$pos = new Vector3($x, $y + 2, $z);
								$pos1 = new Vector3($x, $y, $z);
								$level->addSound(new EndermanTeleportSound($pos1));
								$level->addParticle(new LavaParticle($pos1));
								$inv->removeItem(Item::get(131,4,1));
								$result = rand(1,9);
									 switch($result){
							case 1:
								$inv->addItem(Item::get(266,0,20));
								$inv->addItem(Item::get(265,0,20));
								$inv->addItem(Item::get(264,0,20));
								$inv->addItem(Item::get(351,0,20));
								$inv->addItem(Item::get(263,0,20));
								$sender->sendMessage("§9Crate> §bYou won 20 of all ores!");
								 break;
							case 2:
								$inv->addItem(Item::get(264,0,30));
								$sender->sendMessage("§9Crate> §bYou won 30 diamonds!");
								 break;
							case 3:
									$inv->addItem(Item::get(322,0,20));
									$sender->sendMessage("§9Crate> §bYou won 20 Golden Apples!");
								 break;
							case 4:
									$i = Item::get(276,0,1);
									$e = Enchantment::getEnchantment(9);
									$e->setLevel(3);
									$e1 = Enchantment::getEnchantment(12);
									$e1->setLevel(2);
									$e2 = Enchantment::getEnchantment(13);
									$e2->setLevel(2);
									$i->addEnchantment($e);
									$i->addEnchantment($e1);
									$i->addEnchantment($e2);
									$i->setCustomName("§6§lMythic§bSword");
									$inv->addItem($i);
									$sender->sendMessage("§9Crate> §bYou won a Enchanted §6§lMythic§bSword!"); 
								 break;
							case 5:
									   $inv->addItem(Item::get(466,0,15));
									$sender->sendMessage("§9Crate> §bYou won 15 Enchanted Golden Apple!");
								 break;
							case 6:
									$inv->addItem(Item::get(17,5,64));
									$sender->sendMessage("§9Crate> §bYou won 64 spruce wood!");
								 break;
							case 7:
									$i = Item::get(276,0,1);
									$e = Enchantment::getEnchantment(9);
									$e->setLevel(5);
									$i->addEnchantment($e);
									$inv->addItem($i);
									$sender->sendMessage("§9Crate> §bYou won a Enchanted Diamond Sword!");
								 break;
							case 8:
									$chest = Item::get(311,0,1);
									$e = Enchantment::getEnchantment(1);
									$e->setLevel(4);
									$chest->addEnchantment($e);
									$inv->addItem(Item::get(310,0,1));
									$inv->addItem($chest);
									$inv->addItem(Item::get(312,0,1));
									$inv->addItem(Item::get(313,0,1));
									$sender->sendMessage("§9Crate> §bYou won full set of Diamond Armor with enchanted chestplate!");
								 break;
							case 9:
									$inv->addItem(Item::get(388,0,30));
									$sender->sendMessage("§9Crate> §bYou won 30 crate key!");
						break;
									 }
							}else{
								$sender->sendMessage("§9Crate> §fYou don't have §5Mythic §fKey.");
							}
						break;
						case 5:
							//legendary
							$inv = $sender->getInventory();
							if($inv->contains(Item::get(131,5,1))){
								$level = $sender->getLevel();
								$x = $sender->getX();
								$y = $sender->getY();
								$z = $sender->getZ();
								$pos = new Vector3($x, $y + 2, $z);
								$pos1 = new Vector3($x, $y, $z);
								$level->addSound(new EndermanTeleportSound($pos1));
								$level->addParticle(new LavaParticle($pos1));
								$inv->removeItem(Item::get(131,5,1));
								$result = rand(1,9);
									 switch($result){
							case 1:
								$inv->addItem(Item::get(266,0,20));
								$sender->sendMessage("§9Crate> §bYou won 20 Gold!");
								 break;
							case 2:
								$inv->addItem(Item::get(264,0,10));
								$sender->sendMessage("§9Crate> §bYou won 10 diamonds!");
								 break;
							case 3:
									$inv->addItem(Item::get(322,0,2));
									$sender->sendMessage("§9Crate> §bYou won 2 Golden Apples!");
								 break;
							case 4:
									$i = Item::get(267,0,1);
									$e = Enchantment::getEnchantment(9);
									$e->setLevel(3);
									$i->addEnchantment($e);
									$inv->addItem($i);
									$sender->sendMessage("§9Crate> §bYou won a Enchanted Iron Sword!"); 
								 break;
							case 5:
									   $inv->addItem(Item::get(466,0,5));
									$sender->sendMessage("§9Crate> §bYou won 5 Enchanted Golden Apple!");
								 break;
							case 6:
									$inv->addItem(Item::get(17,5,64));
									$sender->sendMessage("§9Crate> §bYou won 64 spruce wood!");
								 break;
							case 7:
									$i = Item::get(276,0,1);
									$e = Enchantment::getEnchantment(9);
									$e->setLevel(5);
									$i->addEnchantment($e);
									$inv->addItem($i);
									$sender->sendMessage("§9Crate> §bYou won a Enchanted Diamond Sword!");
								 break;
							case 8:
									$inv->addItem(Item::get(310,0,1));
									$inv->addItem(Item::get(311,0,1));
									$inv->addItem(Item::get(312,0,1));
									$inv->addItem(Item::get(313,0,1));
									$sender->sendMessage("§9Crate> §bYou won full set of Diamond Armor!");
								 break;
							case 9:
									$inv->addItem(Item::get(388,0,20));
									$sender->sendMessage("§9Crate> §bYou won 20 crate key!");
						break;
									 }
							}else{
								$sender->sendMessage("§9Crate> §fYou don't have §bLegendary §fKey.");
							}
						break;
					}
				});

				$form->setTitle("§9Crates");
				$form->setContent("§eYou need key to open any crate!");

				$form->addButton("§fCrates List");
				$form->addButton("§aCommon", 1, "http://xxniceyt.ga/games/Vote.jpg");
				$form->addButton("§cVote", 2, "http://xxniceyt.ga/games/Common.jpg");
				$form->addButton("§6Rare", 3, "http://xxniceyt.ga/games/Rare.jpg");
				$form->addButton("§5Mythic", 4, "http://xxniceyt.ga/games/Mythic.jpg");
				$form->addButton("§bLegendary", 5, "http://xxniceyt.ga/games/Legendary.jpg");

				$form->sendToPlayer($sender);
			 }else{
				 $sender->sendMessage("§cYou are not In-Game.");
			 }
			 return true;
		}
	}
}
