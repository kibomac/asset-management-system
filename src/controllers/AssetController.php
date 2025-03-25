<?php
class AssetController {
    private $assetModel;

    public function __construct($assetModel) {
        $this->assetModel = $assetModel;
    }

    public function addAsset($data) {
        // Validate and sanitize input data
        // Call the model's method to save the asset
        return $this->assetModel->save($data);
    }

    public function editAsset($id, $data) {
        // Validate and sanitize input data
        // Call the model's method to update the asset
        return $this->assetModel->update($id, $data);
    }

    public function viewAsset($id) {
        // Call the model's method to retrieve the asset
        return $this->assetModel->find($id);
    }

    public function deleteAsset($id) {
        // Call the model's method to delete the asset
        return $this->assetModel->delete($id);
    }

    public function listAssets() {
        // Call the model's method to retrieve all assets
        return $this->assetModel->getAll();
    }
}
?>