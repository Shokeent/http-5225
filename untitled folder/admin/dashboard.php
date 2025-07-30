<?php
session_start();
require_once '../config/database.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get all pets
$stmt = $pdo->query("SELECT * FROM pets ORDER BY name");
$pets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profiles CMS - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Pet Profiles CMS</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
                <a class="nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Pet Profiles</h2>
            <a href="add_pet.php" class="btn btn-success">
                <i class="fas fa-plus"></i> Add New Pet
            </a>
        </div>

        <div class="row">
            <?php foreach ($pets as $pet): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <?php if ($pet['photo']): ?>
                        <img src="../uploads/<?php echo htmlspecialchars($pet['photo']); ?>" 
                             class="card-img-top" style="height: 250px; object-fit: cover;" 
                             alt="<?php echo htmlspecialchars($pet['name']); ?>">
                    <?php else: ?>
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                             style="height: 250px;">
                            <i class="fas fa-paw fa-3x text-muted"></i>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($pet['name']); ?></h5>
                        <p class="card-text">
                            <strong>Breed:</strong> <?php echo htmlspecialchars($pet['breed']); ?><br>
                            <small class="text-muted"><?php echo htmlspecialchars(substr($pet['story'], 0, 100)) . '...'; ?></small>
                        </p>
                    </div>
                    
                    <div class="card-footer">
                        <div class="btn-group w-100">
                            <a href="view_pet.php?id=<?php echo $pet['id']; ?>" class="btn btn-outline-primary">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="edit_pet.php?id=<?php echo $pet['id']; ?>" class="btn btn-outline-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete_pet.php?id=<?php echo $pet['id']; ?>" class="btn btn-outline-danger"
                               onclick="return confirm('Are you sure you want to delete this pet?')">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($pets)): ?>
        <div class="text-center py-5">
            <i class="fas fa-paw fa-5x text-muted mb-3"></i>
            <h3 class="text-muted">No pets found</h3>
            <p class="text-muted">Start by adding your first pet profile!</p>
            <a href="add_pet.php" class="btn btn-primary">Add Pet</a>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
