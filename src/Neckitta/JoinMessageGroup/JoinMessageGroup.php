<?php

namespace Neckitta\JoinMessagePerm;

use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};

class JoinMessagePerm extends PluginBase implements Listener{

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
