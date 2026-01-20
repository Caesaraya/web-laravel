<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Simulate HTTP request
$request = \Illuminate\Http\Request::create(
    '/login',
    'POST',
    [
        'email' => 'admin@email.com',
        'password' => 'password',
        '_token' => csrf_token(), // Add CSRF token
    ]
);

// Set user agent and other header
$request->setUserResolver(function () {
    return null;
});

echo "Simulating POST /login with credentials:\n";
echo "Email: admin@email.com\n";
echo "Password: password\n\n";

// Try manual authentication
$credentials = [
    'email' => 'admin@email.com',
    'password' => 'password',
];

echo "Testing with Illuminate\\Auth\\Events:\\n";

$guard = auth('web');
echo "Guard: " . get_class($guard) . "\n";

if ($guard->attempt($credentials)) {
    echo "✓ Authentication SUCCESS\n";
    echo "Authenticated as: " . auth()->user()->email . " (" . auth()->user()->role . ")\n";
} else {
    echo "✗ Authentication FAILED\n";
    
    // Debug user provider
    $provider = $guard->getProvider();
    echo "Provider: " . get_class($provider) . "\n";
    
    $user = $provider->retrieveByCredentials($credentials);
    if ($user) {
        echo "User retrieved: " . $user->email . "\n";
        $passwordValid = $provider->validateCredentials($user, $credentials);
        echo "Password validation: " . ($passwordValid ? 'true' : 'false') . "\n";
    } else {
        echo "User NOT retrieved by provider\n";
    }
}
