<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Dashboard</title>
    <!-- FontAwesome Icons for UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Premium Dark & Vibrant Palette */
            --bg-body: #090d16;
            --card-bg: #111827;
            --topbar-bg: rgba(17, 24, 39, 0.8);
            
            /* Primary Colors */
            --primary: #6366f1;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --primary-glow: rgba(99, 102, 241, 0.25);
            
            /* Text Colors */
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --border-color: #1f2937;
            
            /* Table Custom Colors */
            --tr-hover: rgba(31, 41, 55, 0.6);
            --edit-btn: #38bdf8;
            --edit-bg: rgba(56, 189, 248, 0.1);
            --delete-btn: #f43f5e;
            --delete-bg: rgba(244, 63, 94, 0.1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            /* Background subtle glow */
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(168, 85, 247, 0.08) 0%, transparent 40%);
            background-attachment: fixed;
        }

        /* --- TOPBAR / NAVIGATION --- */
        .topbar {
            height: 70px;
            background: var(--topbar-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand-section {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.3px;
        }

        .brand-icon {
            background: var(--primary-gradient);
            color: white;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 16px;
            box-shadow: 0 0 15px var(--primary-glow);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            position: relative;
            width: 280px;
        }

        .search-box input {
            width: 100%;
            padding: 9px 14px 9px 40px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 13px;
            outline: none;
            background-color: #1f2937;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-glow);
        }

        .search-box input::placeholder {
            color: #6b7280;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 14px;
        }

        .user-info {
            font-size: 13px;
            color: var(--text-muted);
        }

        .user-info strong {
            color: #ffffff;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-actions a {
            color: var(--text-muted);
            text-decoration: none;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background-color: #1f2937;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .topbar-actions a:hover {
            color: #ffffff;
            border-color: var(--primary);
            background: var(--primary-gradient);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--primary-glow);
        }

        /* --- PAGE CONTENT CONTAINER --- */
        .container {
            max-width: 1280px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-header h1 {
            font-size: 28px;
            color: #ffffff;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .page-header p {
            color: var(--text-muted);
            font-size: 14px;
            margin-top: 4px;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        /* --- BUTTON STYLES --- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.25s ease;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: #ffffff;
            box-shadow: 0 4px 14px var(--primary-glow);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-secondary {
            background-color: #1f2937;
            color: var(--text-main);
            border-color: var(--border-color);
        }

        .btn-secondary:hover {
            background-color: #374151;
            color: #ffffff;
        }

        .btn-sm {
            padding: 7px 12px;
            font-size: 12px;
            border-radius: 8px;
        }

        .btn-edit {
            background-color: var(--edit-bg);
            color: var(--edit-btn);
            border: 1px solid rgba(56, 189, 248, 0.2);
        }

        .btn-edit:hover {
            background-color: var(--edit-btn);
            color: #000;
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.3);
        }

        .btn-delete {
            background-color: var(--delete-bg);
            color: var(--delete-btn);
            border: 1px solid rgba(244, 63, 94, 0.2);
        }

        .btn-delete:hover {
            background-color: var(--delete-btn);
            color: #fff;
            box-shadow: 0 0 10px rgba(244, 63, 94, 0.3);
        }

        /* --- MODERN TABLE DESIGN --- */
        .card {
            background-color: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #1a2234;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.8px;
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
            vertical-align: middle;
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            background-color: var(--tr-hover);
            transform: scale(1.001);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Custom Table Elements */
        .product-title {
            font-weight: 600;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-avatar {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 14px;
        }

        .price-badge {
            font-weight: 700;
            color: #10b981;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
            font-size: 13px;
        }

        .stock-badge {
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
        }

        .stock-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #10b981;
            box-shadow: 0 0 8px #10b981;
        }

        .stock-dot.low {
            background-color: #f59e0b;
            box-shadow: 0 0 8px #f59e0b;
        }

        /* --- ALERTS & EMPTY STATE --- */
        .alert {
            padding: 14px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .success {
            background-color: rgba(16, 185, 129, 0.1);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .error {
            background-color: rgba(244, 63, 94, 0.1);
            color: #fb7185;
            border: 1px solid rgba(244, 63, 94, 0.2);
        }

        .empty {
            padding: 60px 20px;
            text-align: center;
            color: var(--text-muted);
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .actions form {
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- HEADER BAR -->
    <header class="topbar">
        <div class="brand-section">
            <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
            <span>ProductHub</span>
        </div>

        <div class="topbar-right">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search product name, ID...">
            </div>

            <div class="user-info">
                <span>Welcome back, <strong><?= htmlspecialchars($username ?? 'User') ?></strong></span>
            </div>

            <div class="topbar-actions">
                <a href="<?= site_url('products/create') ?>" title="Add Product"><i class="fa-solid fa-plus"></i></a>
                <a href="#" title="Notifications"><i class="fa-regular fa-bell"></i></a>
                <a href="<?= site_url('logout') ?>" title="Logout"><i class="fa-solid fa-power-off"></i></a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTAINER -->
    <main class="container">
        <div class="page-header">
            <div>
                <h1>Products Directory</h1>
                <p>Manage, edit, and track your store inventory in real-time.</p>
            </div>
            <div class="action-buttons">
                <a class="btn btn-secondary" href="#">
                    <i class="fa-solid fa-file-export"></i> Export CSV
                </a>
                <a class="btn btn-primary" href="<?= site_url('products/create') ?>">
                    <i class="fa-solid fa-plus"></i> Add New Product
                </a>
            </div>
        </div>

        <?php if (!empty($success)): ?>
            <div class="alert success">
                <i class="fa-solid fa-circle-check"></i>
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <section class="card">
            <?php if (empty($products)): ?>
                <div class="empty">
                    <i class="fa-solid fa-box-open" style="font-size: 40px; margin-bottom: 12px; color: #374151; display: block;"></i>
                    <p style="font-size: 16px; font-weight: 500; color: #ffffff;">No products found</p>
                    <p style="font-size: 13px; margin-top: 4px;">Get started by adding your first product above.</p>
                </div>
            <?php else: ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th>Created Date</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td style="color: var(--text-muted); font-weight: 600;">#<?= (int) $product['id'] ?></td>

                                <td>
                                    <div class="product-title">
                                        <div class="product-avatar">
                                            <i class="fa-solid fa-box"></i>
                                        </div>
                                        <?= htmlspecialchars($product['product_name']) ?>
                                    </div>
                                </td>

                                <td style="color: var(--text-muted); max-width: 260px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?= htmlspecialchars($product['description']) ?>
                                </td>

                                <td>
                                    <span class="price-badge">₱<?= number_format((float) $product['price'], 2) ?></span>
                                </td>

                                <td>
                                    <div class="stock-badge">
                                        <span class="stock-dot <?= ((int)$product['quantity'] < 5) ? 'low' : '' ?>"></span>
                                        <span><?= (int) $product['quantity'] ?> items</span>
                                    </div>
                                </td>

                                <td style="color: var(--text-muted); font-size: 13px;">
                                    <?= htmlspecialchars($product['created_at']) ?>
                                </td>

                                <td>
                                    <div class="actions" style="justify-content: flex-end;">
                                        <a
                                            class="btn btn-sm btn-edit"
                                            href="<?= site_url('products/edit/' . $product['id']) ?>"
                                        >
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="<?= site_url('products/delete/' . $product['id']) ?>"
                                            onsubmit="return confirm('Delete this product?');"
                                        >
                                            <button
                                                class="btn btn-sm btn-delete"
                                                type="submit"
                                            >
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </section>
    </main>
</body>
</html>