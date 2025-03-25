<?php
require_once '../components/header.php';
require_once '../components/navbar.php';
require_once '../controllers/AssetController.php';

$assetController = new AssetController();
$assets = $assetController->getAllAssets();
?>

<div class="container mt-4">
    <h1 class="text-center">Asset Management System</h1>
    <div class="text-end mb-3">
        <a href="add-asset.php" class="btn btn-primary">Add New Asset</a>
    </div>

    <h2>Asset Overview</h2>
    <?php if (!empty($assets)): ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assets as $asset): ?>
                    <tr id="asset-row-<?php echo $asset['id']; ?>">
                        <td><?php echo htmlspecialchars($asset['id']); ?></td>
                        <td><?php echo htmlspecialchars($asset['name']); ?></td>
                        <td><?php echo htmlspecialchars($asset['description']); ?></td>
                        <td>
                            <a href="view-asset.php?id=<?php echo $asset['id']; ?>" class="btn btn-info btn-sm view-asset-btn"
                                data-asset-id="<?php echo $asset['id']; ?>">View</a>
                            <a href="edit-asset.php?id=<?php echo $asset['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm delete-asset-btn"
                                data-asset-id="<?php echo $asset['id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No assets found. Click "Add New Asset" to get started.</p>
    <?php endif; ?>
</div>

<!-- Modal for viewing asset details -->
<div id="asset-details-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role