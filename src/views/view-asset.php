<?php
require_once '../config/database.php';
require_once '../controllers/AssetController.php';

$assetController = new AssetController();
$assetId = isset($_GET['id']) ? $_GET['id'] : null;

if ($assetId) {
    $asset = $assetController->viewAsset($assetId);
} else {
    echo "Asset ID is missing.";
    exit;
}

if (!$asset) {
    echo "Asset not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Asset</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php include '../components/navbar.php'; ?>

    <div class="container">
        <h1>Asset Details</h1>
        <div class="asset-details">
            <p><strong>ID:</strong> <?php echo htmlspecialchars($asset['id']); ?></p>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($asset['name']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($asset['description']); ?></p>
            <p><strong>Value:</strong> <?php echo htmlspecialchars($asset['value']); ?></p>
            <p><strong>Created At:</strong> <?php echo htmlspecialchars($asset['created_at']); ?></p>
            <p><strong>Updated At:</strong> <?php echo htmlspecialchars($asset['updated_at']); ?></p>
        </div>
        <a href="edit-asset.php?id=<?php echo htmlspecialchars($asset['id']); ?>">Edit Asset</a>
        <a href="index.php">Back to Asset List</a>
    </div>

    <?php include '../components/footer.php'; ?>
</body>

</html>