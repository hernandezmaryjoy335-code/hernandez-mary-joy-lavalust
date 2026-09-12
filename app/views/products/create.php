<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- FontAwesome Icons for UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Premium Dark & Vibrant Palette (Same as Dashboard) */
            --bg-body: #090d16;
            --card-bg: #111827;
            --input-bg: #1f2937;
            
            /* Primary Colors */
            --primary: #6366f1;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --primary-glow: rgba(99, 102, 241, 0.25);
            
            /* Text & Border Colors */
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --border-color: #1f2937;
            --border-focus: #6366f1;
            
            /* Status Colors */
            --error-bg: rgba(244, 63, 94, 0.1);
            --error-border: rgba(244, 63, 94, 0.2);
            --error-text: #fb7185;
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            /* Matching glowing background */
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(168, 85, 247, 0.08) 0%, transparent 40%);
            background-attachment: fixed;
        }

        /* --- FORM CARD CONTAINER --- */
        .card {
            width: 100%;
            max-width: 600px;
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
        }

        /* Top Line Decorator */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        /* Header Styling */
        .card-header {
            margin-bottom: 28px;
        }

        .card-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header p {
            color: var(--text-muted);
            font-size: 13.5px;
            margin-top: 6px;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #e5e7eb;
        }

        label i {
            color: var(--primary);
            font-size: 13px;
        }

        .input-wrapper {
            position: relative;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 16px;
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: #ffffff;
            font-size: 14px;
            outline: none;
            transition: all 0.25s ease;
        }

        input:focus,
        textarea:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px var(--primary-glow);
            background-color: #1a2332;
        }

        input::placeholder,
        textarea::placeholder {
            color: #6b7280;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        /* Prefix Icon for Currency Input */
        .price-input-wrapper {
            position: relative;
        }

        .price-input-wrapper span {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-weight: 600;
            font-size: 14px;
        }

        .price-input-wrapper input {
            padding-left: 32px;
        }

        /* --- BUTTONS --- */
        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 32px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.25s ease;
            flex: 1;
        }

        .btn-submit {
            background: var(--primary-gradient);
            color: #ffffff;
            box-shadow: 0 4px 14px var(--primary-glow);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-cancel {
            background-color: var(--input-bg);
            color: var(--text-main);
            border-color: var(--border-color);
        }

        .btn-cancel:hover {
            background-color: #374151;
            color: #ffffff;
        }

        /* --- ERROR ALERT --- */
        .alert-error {
            background-color: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 500;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>

<body>
    <main class="card">
        <div class="card-header">
            <h1><i class="fa-solid fa-square-plus" style="color: var(--primary);"></i> Add Product</h1>
            <p>Fill in the details below to add a new item to your inventory.</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= htmlspecialchars($error) ?></span>
            </div>
        <?php endif; ?>

        <form
            method="POST"
            action="<?= site_url('products/store') ?>"
        >
            <div class="form-group">
                <label for="product_name">
                    <i class="fa-solid fa-tag"></i> Product Name
                </label>
                <input
                    id="product_name"
                    type="text"
                    name="product_name"
                    placeholder="e.g. Wireless Gaming Mouse"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">
                    <i class="fa-solid fa-align-left"></i> Description
                </label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Provide a brief product description..."
                    required
                ></textarea>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="price">
                        <i class="fa-solid fa-peso-sign"></i> Price
                    </label>
                    <div class="price-input-wrapper">
                        <span>₱</span>
                        <input
                            id="price"
                            type="number"
                            name="price"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="quantity">
                        <i class="fa-solid fa-boxes-stacked"></i> Quantity
                    </label>
                    <input
                        id="quantity"
                        type="number"
                        name="quantity"
                        placeholder="0"
                        min="0"
                        step="1"
                        required
                    >
                </div>
            </div>

            <div class="actions">
                <a
                    class="btn btn-cancel"
                    href="<?= site_url('products') ?>"
                >
                    <i class="fa-solid fa-xmark"></i> Cancel
                </a>

                <button class="btn btn-submit" type="submit">
                    <i class="fa-solid fa-check"></i> Save Product
                </button>
            </div>
        </form>
    </main>
</body>
</html>