<?php
// edit-asset.php

require_once '../config/database.php';
require_once '../controllers/AssetController.php';

$assetController = new AssetController();
$assetId = $_GET['id'] ?? null;
$asset = $assetController->getAssetById($assetId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedAsset = [
        'id' => $assetId,
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'value' => $_POST['value'],
        'location' => $_POST['location']
    ];
    $assetController->updateAsset($updatedAsset);
    header('Location: view-asset.php?id=' . $assetId);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Edit Asset</title>
</head>
<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/navbar.php'; ?>

    <div class="container">
        <h2>Edit Asset</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($asset['id']); ?>">
            <div class="form-group">
                <label for="name">Asset Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($asset['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?php echo htmlspecialchars($asset['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="value">Value:</label>
                <input type="number" id="value" name="value" value="<?php echo htmlspecialchars($asset['value']); ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($asset['location']); ?>" required>
            </div>
            <button type="submit">Update Asset</button>
        </form>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>