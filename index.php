<?php
require_once 'src/config/database.php';
require_once 'src/controllers/AssetController.php';

$assetController = new AssetController();

$assets = $assetController->getAllAssets();

include 'src/components/header.php';
include 'src/components/navbar.php';
?>

<div class="container">
    <h1>Asset Management System</h1>
    <a href="src/views/add-asset.php" class="btn btn-primary">Add New Asset</a>
    <h2>Asset List</h2>
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
                        <a href="src/views/edit-asset.php?id=<?php echo $asset['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="src/controllers/AssetController.php?action=delete&id=<?php echo $asset['id']; ?>"
                            class="btn btn-danger">Delete</a>
                        <a href="src/views/view-asset.php?id=<?php echo $asset['id']; ?>" class="btn btn-info">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'src/components/footer.php'; ?>