<?php use app\core\Application; ?>
<?php require_once Application::$ROOT_PATH . "/view/partial/header.php"; ?>
<?php require_once Application::$ROOT_PATH . "/view/partial/nav.php"; ?>
<div class="flex h-screen">
    <?php require_once Application::$ROOT_PATH . "/view/partial/sidebar.php"; ?>
    <div class="flex-1 bg-gray-200 border-l border-gray-300 p-5">
        {{Main Content}}
    </div>
</div>
<?php require_once Application::$ROOT_PATH . "/view/partial/footer.php"; ?>