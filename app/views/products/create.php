<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 40px 20px;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .card {
            max-width: 650px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        textarea {
            min-height: 120px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 11px 17px;
            border: none;
            border-radius: 8px;
            background: #4f46e5;
            color: white;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .cancel {
            background: #64748b;
        }
    </style>
</head>

<body>
    <main class="card">
        <h1>Add Product</h1>

        <?php if (!empty($error)): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form
            method="POST"
            action="<?= site_url('products/store') ?>"
        >
            <div class="form-group">
                <label>Product Name</label>

                <input
                    type="text"
                    name="product_name"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label>Description</label>

                <textarea
                    name="description"
                    required
                ></textarea>
            </div>

            <div class="row">
                <div class="form-group">
                    <label>Price</label>

                    <input
                        type="number"
                        name="price"
                        min="0"
                        step="0.01"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Quantity</label>

                    <input
                        type="number"
                        name="quantity"
                        min="0"
                        step="1"
                        required
                    >
                </div>
            </div>

            <div class="actions">
                <button class="btn" type="submit">
                    Save Product
                </button>

                <a
                    class="btn cancel"
                    href="<?= site_url('products') ?>"
                >
                    Cancel
                </a>
            </div>
        </form>
    </main>
</body>
</html>