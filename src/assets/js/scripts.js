// This file contains JavaScript code for client-side functionality, including event handling and dynamic content updates.

document.addEventListener('DOMContentLoaded', function() {
    // Example function to handle adding an asset
    document.getElementById('add-asset-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        
        fetch('/api/assets/add', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Asset added successfully!');
                // Optionally, redirect or update the UI
            } else {
                alert('Error adding asset: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding the asset.');
        });
    });

    // Example function to handle editing an asset
    document.getElementById('edit-asset-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        
        fetch('/api/assets/edit', {
            method: 'PUT',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Asset updated successfully!');
                // Optionally, redirect or update the UI
            } else {
                alert('Error updating asset: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the asset.');
        });
    });

    // Function to handle viewing an asset
    document.querySelectorAll('.view-asset-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const assetId = this.dataset.assetId;

            fetch(`/api/assets/view/${assetId}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Display asset details in a modal
                    const assetDetails = data.asset;
                    const modal = document.getElementById('asset-details-modal');
                    modal.innerHTML = `
                        <h3>${assetDetails.name}</h3>
                        <p>${assetDetails.description}</p>
                        <p>Category: ${assetDetails.category}</p>
                        <p>Value: ${assetDetails.value}</p>
                    `;
                    modal.style.display = 'block';
                } else {
                    alert('Error fetching asset details: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching the asset details.');
            });
        });
    });

    // Function to handle deleting an asset
    document.querySelectorAll('.delete-asset-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const assetId = this.dataset.assetId;

            if (confirm('Are you sure you want to delete this asset?')) {
                fetch(`/api/assets/delete/${assetId}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Asset deleted successfully!');
                        // Remove the asset from the UI
                        const assetRow = document.getElementById(`asset-row-${assetId}`);
                        if (assetRow) {
                            assetRow.remove();
                        }
                    } else {
                        alert('Error deleting asset: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the asset.');
                });
            }
        });
    });
});