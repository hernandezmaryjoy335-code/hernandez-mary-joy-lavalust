<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Home</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f2f5;
            color: #1c1e21;
        }

        /* Top Navigation Bar */
        .navbar {
            background-color: #1877f2;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 24px;
            text-decoration: none;
        }

        .navbar-menu a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 15px;
            font-weight: 600;
            font-size: 14px;
        }

        .navbar-menu a:hover {
            text-decoration: underline;
        }

        /* Main Container Layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 16px;
            padding: 16px;
        }

        /* Welcome Banner Card */
        .welcome-card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .welcome-card h1 {
            font-size: 24px;
            margin-bottom: 8px;
            color: #1c1e21;
        }

        .welcome-card p {
            color: #65676b;
            font-size: 15px;
            line-height: 1.5;
        }

        /* Action/Link Cards Grid */
        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #050505;
        }

        .btn-link {
            display: inline-block;
            margin-top: 12px;
            padding: 8px 16px;
            background-color: #e4e6eb;
            color: #050505;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.2s;
        }

        .btn-link:hover {
            background-color: #d8dadf;
        }

        .btn-primary {
            background-color: #1877f2;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #166fe5;
        }

        /* Right Sidebar Styling */
        .sidebar-right {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .widget-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f2f5;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #31a24c;
        }

        /* Responsive Layout */
        @media (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <nav class="navbar">
        <a href="<?=site_url('student');?>" class="navbar-brand">f</a>
        <div class="navbar-menu">
            <a href="<?=site_url('student');?>">Home</a>
            <a href="<?=site_url('student/profile');?>">Student Profile</a>
        </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container">
        <!-- Main Column -->
        <main>
            <!-- Hero Welcome Card -->
            <div class="welcome-card">
                <h1>Welcome to the Student Portal</h1>
                <p>Access your profile details, check academic updates, and manage your student information from this dashboard.</p>
            </div>

            <!-- Quick Navigation Cards -->
            <div class="grid-cards">
                <div class="card">
                    <div class="card-title">My Profile</div>
                    <p style="color: #65676b; font-size: 14px;">View and verify your personal details, section, and skills list.</p>
                    <a href="<?=site_url('student/profile');?>" class="btn-link btn-primary">Go to Profile</a>
                </div>

                <div class="card">
                    <div class="card-title">Announcements</div>
                    <p style="color: #65676b; font-size: 14px;">Stay updated with campus news and academic schedules.</p>
                    <a href="#" class="btn-link">View Feed</a>
                </div>
            </div>
        </main>

        <!-- Sidebar -->
        <aside class="sidebar-right">
            <div class="card">
                <div class="card-title">System Status</div>
                <div class="widget-item">
                    <span class="status-dot"></span>
                    <span>Portal Online</span>
                </div>
                <div class="widget-item">
                    <span class="status-dot"></span>
                    <span>Enrollment System Open</span>
                </div>
            </div>
        </aside>
    </div>

</body>
</html>