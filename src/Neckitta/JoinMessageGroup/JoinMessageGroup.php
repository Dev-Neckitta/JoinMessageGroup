<?php

namespace Neckitta\JoinMessageGroup;

use pocketmine\event\Listener;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};
use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class JoinMessageGroup extends PluginBase implements Listener{

	public function onEnable(): void{ 
		$this->saveResource("config.yml");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	/** @param PlayerJoinEvent $ev */
	public function onJoin(PlayerJoinEvent $ev){
		$player = $ev->getPlayer();
		$name = $player->getName();
		foreach($this->getConfig()->getAll()["list"] as $rank => $data){
			if($player->hasPermission($data["permission"])){
				$msg = str_replace("{name}", $name, $data["join"]);
       		 $ev->setJoinMessage($msg);
       	 }
		}
	}
	
	/** @param PlayerQuitEvent $ev */
	public function onQuit(PlayerQuitEvent $ev){
		$name = $player->getName();
		foreach($this->getConfig()->getAll()["list"] as $rank => $data){
			if($player->hasPermission($data["permission"])){
				$msg = str_replace("{name}", $name, $data["quit"]);
       		 $ev->setQuitMessage($msg);
       	 }
		}
	}
}
