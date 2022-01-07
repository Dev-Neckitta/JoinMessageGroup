<?php
namespace msggroup;
use pocketmine\event\Listener;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};
use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class main extends PluginBase implements Listener{

public function onEnable() 
{
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->getLogger()->info("Plugin Enabled");
    @mkdir($this->getDataFolder());
}
public function onDisable()
{
	$this->getLogger()->info("Disable");
}
public function join(PlayerJoinEvent $ev)
{
$player = $ev->getPlayer();
$name = $player->getName();
$api = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

$group = $api->getUserDataMgr()->getGroup($player);


    if($player->hasPermission("vip.msg") && !$player->isOp()){
        $msg = str_replace("{name}", $player->getNameTag(), $this->getConfig()->get("vip.msg"));
        $ev->setJoinMessage($msg);
    }

    if($player->hasPermission("vipplus.msg") && !$player->isOp()){
        $msg = str_replace("{name}", $player->getNameTag(), $this->getConfig()->get("vipplus.msg"));
        $ev->setJoinMessage($msg);
    }

    if($player->hasPermission("mvpplus.msg") && !$player->isOp()){
        $msg = str_replace("{name}", $player->getNameTag(), $this->getConfig()->get("mvpplus.msg"));
        $ev->setJoinMessage($msg);
    }

    if($player->hasPermission("mvpplusplus.msg") && !$player->isOp()){
        $msg = str_replace("{name}", $player->getNameTag(), $this->getConfig()->get("mvpplusplus.msg"));
        $ev->setJoinMessage($msg);
    }

    if($player->hasPermission("youtube.msg") && !$player->isOp()){
        $msg = str_replace("{name}", $player->getNameTag(), $this->getConfig()->get("youtube.msg"));
        $ev->setJoinMessage($msg);
    }
/*$groups = ["VIP", "VIP±", "MVP+", "MVP++", "YOUTUBE"];
if($group == "VIP") return $ev->setJoinMessage("§2[§aVIP§2]§a $name Joined The Lobby ! ");
if($group == "VIP±") return $ev->setJoinMessage("§2[§aVIP§6+§2]§a, $name Joined The Lobby ! ");
if($group == "MVP±") return $ev->setJoinMessage("§3[§bMVP§c+§3]§b, $name Joined The Lobby ! ");
if($group == "MVP±±") return $ev->setJoinMessage("§3[§bMVP§c++§3]§b, $name Joined The Lobby ! ");
if($group == "YOUTUBE") return $ev->setJoinMessage("§4[§fYOUTUBE§4]§f, $name Joined The Lobby ! ");

if($group !== $groups) return $ev->setJoinMessage("");*/

}
public function quit(PlayerQuitEvent $ev){
$ev->setQuitMessage("");
}
}
