<?php
// add-asset.php

include_once '../components/header.php';
include_once '../components/navbar.php';
?>

<div class="container">
    <h2>Add New Asset</h2>
    <form action="../controllers/AssetController.php?action=add" method="POST">
        <div class="form-group">
            <label for="assetName">Asset Name:</label>
            <input type="text" class="form-control" id="assetName" name="assetName" required>
        </div>
        <div class="form-group">
            <label for="assetDescription">Description:</label>
            <textarea class="form-control" id="assetDescription" name="assetDescription" required></textarea>
        </div>
        <div class="form-group">
            <label for="assetValue">Value:</label>
            <input type="number" class="form-control" id="assetValue" name="assetValue" required>
        </div>
        <div class="form-group">
            <label for="assetCategory">Category:</label>
            <input type="text" class="form-control" id="assetCategory" name="assetCategory" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Asset</button>
    </form>
</div>

<?php
include_once '../components/footer.php';
?>