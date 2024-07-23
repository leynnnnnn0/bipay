<?php

use app\core\Application;
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
        <div>
            <select name="aux" id="aux" class="h-8 text-xs">
                <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="READY" selected>NOT READY</option>
                <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="READY">WORKING</option>
                <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="READY">PERSONAL TIME</option>
                <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="READY">BREAK</option>
                <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="READY">MEAL BREAK</option>
                <option class="border-b border-gray-500 px-3 py-2 font-bold h-10" value="READY">MEETING</option>
            </select>

        </div>
    </div>
</nav>