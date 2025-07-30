<?php
require_once 'config/database.php';

// Get all pets for public display
$stmt = $pdo->query("SELECT * FROM pets ORDER BY name");
$pets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Profiles - Find Your Perfect Companion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        .pet-card {
            transition: transform 0.3s ease;
        }
        .pet-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-paw"></i> Pet Profiles
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="admin/login.php">Admin Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 mb-4">Find Your Perfect Companion</h1>
            <p class="lead mb-4">Discover amazing pets looking for their forever homes</p>
            <i class="fas fa-heart fa-3x"></i>
        </div>
    </section>

    <!-- Pets Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Amazing Pets</h2>
            
            <div class="row">
                <?php foreach ($pets as $pet): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card pet-card h-100 shadow">
                        <?php if ($pet['photo']): ?>
                            <img src="uploads/<?php echo htmlspecialchars($pet['photo']); ?>" 
                                 class="card-img-top" style="height: 300px; object-fit: cover;" 
                                 alt="<?php echo htmlspecialchars($pet['name']); ?>">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                 style="height: 300px;">
                                <i class="fas fa-paw fa-4x text-muted"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-heart text-danger"></i> 
                                <?php echo htmlspecialchars($pet['name']); ?>
                            </h5>
                            <p class="card-text">
                                <strong><i class="fas fa-tag"></i> Breed:</strong> 
                                <?php echo htmlspecialchars($pet['breed']); ?>
                            </p>
                            <p class="card-text"><?php echo htmlspecialchars($pet['story']); ?></p>
                        </div>
                        
                        <div class="card-footer text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" 
                                    data-bs-target="#petModal<?php echo $pet['id']; ?>">
                                <i class="fas fa-info-circle"></i> Learn More
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pet Modal -->
                <div class="modal fade" id="petModal<?php echo $pet['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="fas fa-paw"></i> <?php echo htmlspecialchars($pet['name']); ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php if ($pet['photo']): ?>
                                            <img src="uploads/<?php echo htmlspecialchars($pet['photo']); ?>" 
                                                 class="img-fluid rounded" 
                                                 alt="<?php echo htmlspecialchars($pet['name']); ?>">
                                        <?php else: ?>
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                                 style="height: 300px;">
                                                <i class="fas fa-paw fa-5x text-muted"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><?php echo htmlspecialchars($pet['name']); ?></h4>
                                        <p><strong>Breed:</strong> <?php echo htmlspecialchars($pet['breed']); ?></p>
                                        <p><strong>Story:</strong></p>
                                        <p><?php echo nl2br(htmlspecialchars($pet['story'])); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-heart"></i> Interested in Adoption
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <?php if (empty($pets)): ?>
            <div class="text-center py-5">
                <i class="fas fa-paw fa-5x text-muted mb-3"></i>
                <h3 class="text-muted">No pets available yet</h3>
                <p class="text-muted">Check back soon for amazing pets looking for homes!</p>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Pet Profiles CMS. Made with <i class="fas fa-heart text-danger"></i> for our furry friends.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
