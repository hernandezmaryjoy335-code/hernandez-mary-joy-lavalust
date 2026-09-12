<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Login</title>

    <!-- FontAwesome Icons for UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Premium Dark & Vibrant Palette */
            --bg-body: #090d16;
            --card-bg: #111827;
            --input-bg: #1f2937;
            
            /* Primary Accent Colors */
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
            justify-content: center;
            align-items: center;
            padding: 20px;
            /* Glowing background effect */
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(168, 85, 247, 0.1) 0%, transparent 40%);
            background-attachment: fixed;
        }

        /* --- LOGIN CARD CONTAINER --- */
        .login-card {
            width: 100%;
            max-width: 420px;
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 40px 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
        }

        /* Top Line Accent Decorator */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        /* Header & Logo Styling */
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-icon {
            background: var(--primary-gradient);
            color: white;
            width: 50px;
            height: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            font-size: 22px;
            margin-bottom: 16px;
            box-shadow: 0 0 20px var(--primary-glow);
        }

        .login-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.5px;
        }

        .login-header p {
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

        input {
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

        input:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px var(--primary-glow);
            background-color: #1a2332;
        }

        input::placeholder {
            color: #6b7280;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 10px;
            background: var(--primary-gradient);
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 14px var(--primary-glow);
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        /* Error Alert Styling */
        .error {
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
    <div class="login-card">
        <div class="login-header">
            <div class="brand-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <h1>Product Login</h1>
            <p>Welcome back! Please enter your details.</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?= site_url('login') ?>">
            <div class="form-group">
                <label for="username">
                    <i class="fa-solid fa-user"></i> Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fa-solid fa-lock"></i> Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button type="submit">
                <span>Sign In</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>
</body>
</html>