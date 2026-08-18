<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile - <?= $student['name']; ?></title>
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

        /* Profile Header Section */
        .profile-header {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 16px;
        }

        .cover-photo {
            height: 200px;
            background: linear-gradient(135deg, #1877f2, #00c6ff);
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .profile-details-bar {
            padding: 16px;
            position: relative;
            display: flex;
            align-items: flex-end;
            border-bottom: 1px solid #e4e6eb;
        }

        .avatar-placeholder {
            width: 130px;
            height: 130px;
            background-color: #3b5998;
            border: 4px solid #ffffff;
            border-radius: 8px;
            margin-top: -60px;
            margin-right: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 36px;
            font-weight: bold;
        }

        .user-title h1 {
            font-size: 24px;
            margin-bottom: 4px;
        }

        .user-title p {
            color: #65676b;
            font-size: 14px;
        }

        /* Two-Column Grid for Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 16px;
        }

        /* Card Widgets */
        .card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 12px;
            color: #050505;
        }

        .info-list {
            list-style: none;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            color: #050505;
        }

        .info-item strong {
            color: #65676b;
            width: 100px;
            display: inline-block;
        }

        .badge {
            display: inline-block;
            background-color: #e4e6eb;
            color: #050505;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            margin: 2px;
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
            .main-content {
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

    <!-- Main Grid Layout -->
    <div class="container">
        <!-- Main Column -->
        <main>
            <!-- Profile Cover and Header Card -->
            <div class="profile-header">
                <div class="cover-photo"></div>
                <div class="profile-details-bar">
                    <div class="avatar-placeholder">
                        <?= strtoupper(substr($student['name'], 0, 1)); ?>
                    </div>
                    <div class="user-title">
                        <h1><?= $student['name']; ?></h1>
                        <p><?= $student['course']; ?> • Year <?= $student['year']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Profile Details Split View -->
            <div class="main-content">
                <!-- Left Details Box -->
                <div>
                    <div class="card">
                        <div class="card-title">Intro</div>
                        <ul class="info-list">
                            <li class="info-item"><strong>Student ID:</strong> <?= $student['student_id']; ?></li>
                            <li class="info-item"><strong>Section:</strong> <?= $student['section']; ?></li>
                            <li class="info-item"><strong>Email:</strong> <?= $student['email']; ?></li>
                            <li class="info-item"><strong>Address:</strong> <?= $student['address']; ?></li>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="card-title">Skills & Tags</div>
                        <div>
                            <?php 
                                $skills = explode(',', $student['skills']);
                                foreach($skills as $skill): 
                            ?>
                                <span class="badge"><?= trim($skill); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Center Content Box -->
                <div>
                    <div class="card">
                        <div class="card-title">Academic Overview</div>
                        <p style="color: #65676b; font-size: 14px;">
                            Currently enrolled in <strong><?= $student['course']; ?></strong>, Section <strong><?= $student['section']; ?></strong>.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Right Side Sidebar -->
        <aside class="sidebar-right">
            <div class="card">
                <div class="card-title">Quick Status</div>
                <div class="widget-item">
                    <span class="status-dot"></span>
                    <span>Active Enrollment</span>
                </div>
                <div class="widget-item">
                    <span class="status-dot"></span>
                    <span>Academic Standing: Good</span>
                </div>
            </div>
        </aside>
    </div>

</body>
</html> 