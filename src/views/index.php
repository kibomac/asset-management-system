<?php
require_once '../components/header.php';
require_once '../components/navbar.php';
require_once '../controllers/AssetController.php';

$assetController = new AssetController();
$assets = $assetController->getAllAssets();
?>

<div class="container">
    <h1>Asset Management System</h1>
    <a href="add-asset.php" class="btn btn-primary">Add New Asset</a>
    
    <h2>Asset Overview</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assets as $asset): ?>
                <tr>
                    <td><?php echo $asset['id']; ?></td>
                    <td><?php echo $asset['name']; ?></td>
                    <td><?php echo $asset['description']; ?></td>
                    <td>
                        <a href="edit-asset.php?id=<?php echo $asset['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="view-asset.php?id=<?php echo $asset['id']; ?>" class="btn btn-info">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../components/footer.php'; ?>