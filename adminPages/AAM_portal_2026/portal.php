<?php
<<<<<<< HEAD
    include 'db.php';

    require __DIR__ . '/../../../vendor/autoload.php';

    session_start();

    $stmt1 = $conn->prepare("SELECT count(*) FROM guests");
    $stmt1->execute();
    $count = $stmt1->get_result();
    $row   = $count->fetch_row();
    $count = $row[0];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect form data
        $name       = $_POST['name'] ?? '';
        $mobile     = $_POST['mobile'] ?? '';
        $roll       = $_POST['roll'] ?? '';
        $batch      = $_POST['batch'] ?? '';
        $screenshot = $_FILES['screenshot'] ?? null;

        if ($screenshot && $screenshot['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/uploads/';
            if (! is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filePath = $uploadDir . basename($screenshot['name']);
            move_uploaded_file($screenshot['tmp_name'], $filePath);
            $uploadMsg = "Screenshot uploaded successfully.";
        } else {
            $uploadMsg = "No screenshot uploaded.";
        }

        $client = new Google_Client();
        $client->setAuthConfig('credential.json');
        $client->addScope(Google_Service_Drive::DRIVE_FILE);
        $client->setAccessType('offline');
        $client->setRedirectUri('http://localhost/new_sac/sac/adminPages/AAM_portal_2026/portal.php');

        // Redirect for OAuth
        if (! isset($_SESSION['access_token']) || $_SESSION['access_token'] === null) {
            $authUrl = $client->createAuthUrl();
            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
            exit();
        } else {
            $client->setAccessToken($_SESSION['access_token']);
        }

        $service = new Google_Service_Drive($client);

        // Upload file
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => 'my_image.jpg',
        ]);
        // Use correct variable
        $content = file_get_contents($filePath);

    // Unique file name
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => basename($screenshot['name']),
        ]);
        $file = $service->files->create($fileMetadata, [
            'data'       => $content,
            'mimeType'   => mime_content_type($filePath),
            'uploadType' => 'multipart',
            'fields'     => 'id',
        ]);

    // Make it shareable
        $permission = new Google_Service_Drive_Permission([
            'type' => 'anyone',
            'role' => 'reader',
        ]);
        $service->permissions->create($file->id, $permission);

    // Public link
        $link = "https://drive.google.com/uc?id=" . $file->id . "&export=view";

        if (! $name || ! $mobile || ! $roll || ! $batch || ! $screenshot) {
            echo "<script>alert('Please fill all the fields');</script>";
            exit;
        } else {
            if (getUser($roll)) {
                echo "<script>alert('Sorry sir, you have already registered!');</script>";

                exit;
            } else {
                $stmt = $conn->prepare("INSERT INTO guests (naam, phoneNo, roll, batch,link) VALUES (?, ?, ?, ?,?)");
                $stmt->bind_param("sssss", $name, $mobile, $roll, $batch, $link);
                if ($stmt->execute()) {
                    echo "<script>alert('Registration successful!');</script>";
                    // Get updated count after successful insert
                    $count++;
                    echo "<script>document.querySelector('h3').innerText='Total registered Alumni: $count';</script>";
                } else {
                    echo "<script>alert('Error: " . $stmt->error . "');</script>";
                }
            }
        }
    }

    function getUser($roll)
    {
        global $conn; // Make sure $conn is your database connection from db.php
        $stmt = $conn->prepare("SELECT * FROM guests where roll=?");
        $stmt->bind_param("s", $roll);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; // Returns true if roll exists, false otherwise

    }

    // Example: Handle file upload (save to 'uploads/' directory)
=======
include 'db.php';

$stmt1 = $conn->prepare("SELECT count(*) FROM guests");
$stmt1->execute();
$count = $stmt1->get_result();
$row = $count->fetch_row();
$count = $row[0];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $roll = $_POST['roll'] ?? '';
    $batch = $_POST['batch'] ?? '';
    $screenshot = $_FILES['screenshot'] ?? null;

    if (!$name || !$mobile || !$roll || !$batch || !$screenshot) {
        echo "<script>alert('Please fill all the fields');</script>";
        exit;
    } else {
        if (getUser($roll)) {
            echo "<script>alert('Sorry sir, you have already registered!');</script>";
            
            exit;
        } else {
            $stmt = $conn->prepare("INSERT INTO guests (naam, phoneNo, roll, batch) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $mobile, $roll, $batch);
            if ($stmt->execute()) {
                echo "<script>alert('Registration successful!');</script>";
                // Get updated count after successful insert
                $count++;
                echo "<script>document.querySelector('h3').innerText='Total registered Alumni: $count';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
        }
    }
}

function getUser($roll) {
    global $conn; // Make sure $conn is your database connection from db.php
    $stmt=$conn->prepare("SELECT * FROM guests where roll=?");
    $stmt->bind_param("s",$roll);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0; // Returns true if roll exists, false otherwise
     
}
    
    // Example: Handle file upload (save to 'uploads/' directory)
    // if ($screenshot && $screenshot['error'] === UPLOAD_ERR_OK) {
    //     $uploadDir = __DIR__ . '/uploads/';
    //     if (!is_dir($uploadDir)) {
    //         mkdir($uploadDir, 0777, true);
    //     }
    //     $filePath = $uploadDir . basename($screenshot['name']);
    //     move_uploaded_file($screenshot['tmp_name'], $filePath);
    //     $uploadMsg = "Screenshot uploaded successfully.";
    // } else {
    //     $uploadMsg = "No screenshot uploaded.";
    // }
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7

    // You can process/store the other fields as needed

?>


<!DOCTYPE html>
<html>
<head>
    <title>AAM Portal</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ece9e6;
            background: radial-gradient(circle at top left, #d1d8e0, #ece9e6, #a8b0c1);
            font-family: Arial, sans-serif;
        }

        /* Header box styling */
        .header-box {
            width: 500px;
            margin-bottom: 30px;
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            border-radius: 15px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.10);
            display: flex;
            transform: translate(-50px,0);
            justify-content: space-between;
            align-items: center;
            padding: 24px 32px;
        }
        .header-title {
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .header-count {
            color: #fff;
            font-size: 1.2rem;
            background: rgba(255,255,255,0.15);
            padding: 10px 22px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }

        .input-box {
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            background: linear-gradient(145deg, #ff9a9e, #fad0c4);
            box-shadow: 8px 8px 25px rgba(0,0,0,0.3), -8px -8px 25px rgba(255,255,255,0.6);
        }

        .input-box label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
            color: #333;
        }

        .input-box input[type="text"],
        .input-box input[type="name"],
        .input-box input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .input-box button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background: #ff758c;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .input-box button:hover {
            background: #ff4b6e;
        }

        .input-box p {
            margin-top: 15px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div>
        <div class="header-box">
            <div class="header-title">AAM Portal 2026</div>
            <div class="header-count">
                Total registered Alumni: <span id="alumni-count"><?php echo $count; ?></span>
            </div>
        </div>
        <div class="input-box">
            <form method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="mobile">Mobile No:</label>
                <input type="text" name="mobile" id="mobile" required>

                <label for="roll">Roll No:</label>
                <input type="text" name="roll" id="roll" required>

                <label for="batch">Batch:</label>
                <input type="text" name="batch" id="batch" required>

                <label for="qr_link">Link for QR Code:</label>
                <input type="text" name="qr_link" id="qr_link" required>

                <label for="screenshot">Screenshot:</label>
                <input type="file" name="screenshot" id="screenshot" accept="image/*" required>

                <button type="submit">Submit</button>
            </form>
<<<<<<< HEAD
            <?php if (! empty($uploadMsg)) {echo "<p>$uploadMsg</p>";}?>
=======
            <?php if (!empty($uploadMsg)) { echo "<p>$uploadMsg</p>"; } ?>
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
        </div>
    </div>
    <script>
        // Update alumni count dynamically if needed
        // This is for compatibility with your PHP echo after registration
        function updateAlumniCount(newCount) {
            document.getElementById('alumni-count').innerText = newCount;
        }
    </script>
</body>
</html>