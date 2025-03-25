<?php
// Utility functions for the Asset Management System

/**
 * Function to sanitize input data
 *
 * @param string $data
 * @return string
 */
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

/**
 * Function to generate a unique asset ID
 *
 * @return string
 */
function generateAssetId() {
    return 'ASSET-' . uniqid();
}

/**
 * Function to format date
 *
 * @param string $date
 * @return string
 */
function formatDate($date) {
    return date('Y-m-d', strtotime($date));
}

/**
 * Function to check if an asset exists in the database
 *
 * @param mysqli $conn
 * @param string $assetId
 * @return bool
 */
function assetExists($conn, $assetId) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM assets WHERE asset_id = ?");
    $stmt->bind_param("s", $assetId);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    return $count > 0;
}
?>