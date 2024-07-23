<?php use app\core\Session;
if(Session::get_flash('success')): ?>
    <script>alertSuccess("<?= Session::get_flash('success')['message'] ?>")</script>
<?php endif; ?>
<script src="/animation/auxTag.js"></script>
</body>
</html>