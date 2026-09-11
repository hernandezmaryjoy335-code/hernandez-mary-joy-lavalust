<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f3f4f6;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 7%;
            background: #111827;
            color: white;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .card {
            overflow-x: auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,.07);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f9fafb;
        }

        .btn {
            display: inline-block;
            padding: 9px 14px;
            border: none;
            border-radius: 7px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .edit { background: #0ea5e9; }
        .delete { background: #dc2626; }
        .logout { background: #ef4444; }

        .actions {
            display: flex;
            gap: 7px;
        }

        .actions form {
            margin: 0;
        }

        .alert {
            margin-bottom: 18px;
            padding: 12px;
            border-radius: 7px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            padding: 35px;
            text-align: center;
            color: #6b7280;
        }
    </style>
</head>

<body>
    <nav>
        <h2>Product Manager</h2>

        <div>
            Welcome,
            <?= htmlspecialchars($username ?? 'User') ?>

            <a
                class="btn logout"
                href="<?= site_url('logout') ?>"
            >
                Logout
            </a>
        </div>
    </nav>

    <main class="container">
        <div class="page-header">
            <div>
                <h1>Products</h1>
                <p>Manage the available products.</p>
            </div>

            <a
                class="btn"
                href="<?= site_url('products/create') ?>"
            >
                Add Product
            </a>
        </div>

        <?php if (!empty($success)): ?>
            <div class="alert success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <section class="card">
            <?php if (empty($products)): ?>
                <div class="empty">No products found.</div>
            <?php else: ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= (int) $product['id'] ?></td>

                                <td>
                                    <?= htmlspecialchars(
                                        $product['product_name']
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $product['description']
                                    ) ?>
                                </td>

                                <td>
                                    ₱<?= number_format(
                                        (float) $product['price'],
                                        2
                                    ) ?>
                                </td>

                                <td>
                                    <?= (int) $product['quantity'] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $product['created_at']
                                    ) ?>
                                </td>

                                <td>
                                    <div class="actions">
                                        <a
                                            class="btn edit"
                                            href="<?= site_url(
                                                'products/edit/' .
                                                $product['id']
                                            ) ?>"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="<?= site_url(
                                                'products/delete/' .
                                                $product['id']
                                            ) ?>"
                                            onsubmit="return confirm(
                                                'Delete this product?'
                                            );"
                                        >
                                            <button
                                                class="btn delete"
                                                type="submit"
                                            >
                                                Delete
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
