<?php

use app\constant\AuxTag;
use app\core\Application;
use app\core\Session;
use app\core\Style;

?>
<nav class="flex bg-red-white h-[50px] px-10 items-center justify-between">
    <div class="logo-area">
        <img class="cursor-pointer" src="image/mainLogo.png" alt="logo">
    </div>
    <div class="flex items-center gap-3">
        <ul class="flex gap-5 text-sm items-center">
            <li class="cursor-pointer">
                <span><i class="bi bi-globe"></i> EN</span>
            </li>
            <li class="cursor-pointer">
                <span><i class="bi bi-bell"></i></span>
            </li>
            <li class="cursor-pointer">
                <img class="h-8 w-8 rounded-full" src="/avatar/<?= Style::emptyImage(Application::$application->applicationUser->getPhoto()) ?>" alt="profile">
            </li>
        </ul>
        <div id="taggingContainer" class="<?php if(!Session::get('PUNCH IN') || Session::get('PUNCH OUT')) echo 'hidden' ?>">
            <select name="aux" id="aux" class="h-8 text-xs">
                <?php foreach (AuxTag::getAux() as $aux): ?>
                    <?php if(Session::get('aux') && Session::get('aux') == $aux): ?>
                        <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="<?= $aux ?>" selected><?= $aux ?></option>
                    <?php continue; endif; ?>
                    <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="<?= $aux ?>"><?= $aux ?></option>
                <?php endforeach; ?>
            </select>
            <span id="timer">00:00:00</span>
        </div>
    </div>
</nav>