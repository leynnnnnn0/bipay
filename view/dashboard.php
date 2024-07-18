<?php use app\core\Application; ?>
<?php require_once Application::$ROOT_PATH . "/view/partial/header.php"; ?>
<?php require_once Application::$ROOT_PATH . "/view/partial/nav.php"; ?>
<div class="flex h-screen">
    <div class="w-64 bg-gray-200 border-r border-gray-300">
        <div class="h-14 bg-gray-300">
            <span><i class="bi bi-house-door"></i></span> Dashboard
        </div>
    </div>
</div>
<?php require_once Application::$ROOT_PATH . "/view/partial/footer.php"; ?>
