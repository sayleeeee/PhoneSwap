<?php
require __DIR__ . '/../dbcon/dbcon.php'; // Ensure correct path

try {
    $collection = $db->users;
    
    // Fetch all Team Leaders (TL)
    $teamLeadersCursor = $collection->find(['userType' => 'TL']);

    // Store TLs in an array
    $teamLeaders = [];
    foreach ($teamLeadersCursor as $tl) {
        $teamLeaders[] = [
            'hfId' => $tl['hfId'],
            'first_name' => $tl['first_name'],
            'last_name' => $tl['last_name'],
            'email' => $tl['username'] ?? 'No Email',
        ];
    }
} catch (Exception $e) {
    $teamLeaders = [];
}
?>
