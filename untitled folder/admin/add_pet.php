<?php
session_start();
require_once '../config/database.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$errors = [];
$success = '';

if ($_POST) {
    $name = trim($_POST['name']);
    $breed = trim($_POST['breed']);
    $story = trim($_POST['story']);
    
    // Validation
    if (empty($name)) {
        $errors[] = 'Pet name is required';
    }
    if (empty($breed)) {
        $errors[] = 'Breed is required';
    }
    if (empty($story)) {
        $errors[] = 'Story is required';
    }
    
    // Handle file upload
    $photo_name = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; // 5MB
        
        if (!in_array($_FILES['photo']['type'], $allowed_types)) {
            $errors[] = 'Invalid file type. Only JPEG, PNG and GIF allowed.';
        } elseif ($_FILES['photo']['size'] > $max_size) {
            $errors[] = 'File too large. Maximum size is 5MB.';
        } else {
            $upload_dir = '../uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            
            $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $photo_name = uniqid() . '.' . $file_extension;
            $upload_path = $upload_dir . $photo_name;
            
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $upload_path)) {
                $errors[] = 'Failed to upload file.';
            }
        }
    }
    
    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO pets (name, breed, story, photo) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $breed, $story, $photo_name])) {
            $success = 'Pet added successfully!';
            // Clear form data
            $name = $breed = $story = '';
        } else {
            $errors[] = 'Failed to add pet to database.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet - Pet Profiles CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Pet Profiles CMS</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
                <a class="nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-plus"></i> Add New Pet</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                        <?php endif; ?>
                        
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Pet Name *</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="breed" class="form-label">Breed *</label>
                                <input type="text" class="form-control" id="breed" name="breed" 
                                       value="<?php echo htmlspecialchars($breed ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="story" class="form-label">Story *</label>
                                <textarea class="form-control" id="story" name="story" rows="4" required><?php echo htmlspecialchars($story ?? ''); ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                <div class="form-text">Optional. Supported formats: JPEG, PNG, GIF. Max size: 5MB.</div>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Add Pet
                                </button>
                                <a href="dashboard.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
