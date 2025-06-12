<?php
$client = new MongoDB\Driver\Manager("mongodb://localhost:27017");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bulk = new MongoDB\Driver\BulkWrite;
    $document = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];
    $bulk->insert($document);
    try {
        $result = $client->executeBulkWrite('stportal.students', $bulk);
        echo "User registered successfully!";
        header("Location: dashboard.html");
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $email = $_GET['email'];
    $password = $_GET['password'];

    $query = new MongoDB\Driver\Query([]);

    try {
        $rows = $client->executeQuery('stportal.students', $query);

        foreach ($rows as $row) {
            if ($row->email === $email && $row->password === $password) {
                $username = urlencode($row->name);
                echo "Login successful!";
                header("Location: dashboard.html?name=$username");
                return;
            }
        }

        echo "Invalid email or password.";
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>