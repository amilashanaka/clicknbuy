<?php





// Define a function to validate the session key
function validateSessionKey() {
    if (!isset($_SESSION['session_key'], $_SESSION['csrf_token'], $_SESSION['email'])) {
        return false;
    }

    $session_auth_key = $_SESSION['csrf_token'] . $_SESSION['email'] . session_id();
    $key = hash_hmac('sha256', $session_auth_key, $_ENV['APP_KEY']);

    return hash_equals($_SESSION['session_key'], $key);

}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the CSRF token is valid
    if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
        http_response_code(404);
        exit();
    }

    // Validate session key (if needed)
    if (!validateSessionKey()) {
        http_response_code(404);
        exit();
    }
   
}

