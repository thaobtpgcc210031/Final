<?php
include_once('connection.php'); // Connect to the database

// Check if TourID is provided in the URL
if (isset($_GET['TourID'])) {
    $tour_id = intval($_GET['TourID']); // Ensure the ID is an integer

    // Start a transaction to ensure all deletions happen atomically
    $conn->begin_transaction();

    try {
        // Delete related data from the detail_tour table (foreign key constraint violation fix)
        $deleteDetailTourQuery = $conn->prepare("DELETE FROM detail_tour WHERE Tour_ID = ?");
        $deleteDetailTourQuery->bind_param("i", $tour_id);
        $deleteDetailTourQuery->execute();

        // Delete related data from other tables (if applicable, like bookings or reviews)
        // Example: Deleting related bookings
        $deleteBookingsQuery = $conn->prepare("DELETE FROM ticket WHERE TourID = ?");
        $deleteBookingsQuery->bind_param("i", $tour_id);
        $deleteBookingsQuery->execute();
        
        // Example: Deleting related reviews
        $deleteReviewsQuery = $conn->prepare("DELETE FROM feedback WHERE TourID = ?");
        $deleteReviewsQuery->bind_param("i", $tour_id);
        $deleteReviewsQuery->execute();
         // Example: Deleting related reviews
        $deleteReviewsQuery = $conn->prepare("DELETE FROM chat WHERE TourID = ?");
        $deleteReviewsQuery->bind_param("i", $tour_id);
        $deleteReviewsQuery->execute();
        

        // Now delete the tour itself
        $deleteTourQuery = $conn->prepare("DELETE FROM tour WHERE TourID = ?");
        $deleteTourQuery->bind_param("i", $tour_id);
        $deleteTourQuery->execute();

        // Commit the transaction
        $conn->commit();

        // Redirect to the tour management page after successful deletion
        header("Location: T_manageTour.php");
        exit;
    } catch (Exception $e) {
        // Rollback the transaction if anything goes wrong
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "TourID is not provided.";
}
?>