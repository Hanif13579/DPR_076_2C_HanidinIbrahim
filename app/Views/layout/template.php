<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <?= $this->include('layout/sidebar') ?>

        <main class="flex-1 p-8">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

</body>
</html>