<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL SIGNAGE</title>
</head>
<body>
    <div class="header-container">
        <div class="header-title">
            <h1>QUEZON CITY PUBLIC LIBRARY</h1>
        </div>
        <div class="time-date-container">
            <div class="current-time" id="current-time">1</div>
            <div class="current-date" id="current-date">1</div>
        </div>
    </div>
    <div class="body-container">
        <div class="video-container">
            <video id="video_player" controls loop autoplay>
                <source src="video/video_1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="books-container">
            <h3>NEW ARRIVAL</h3> 
            <div class="slideshow-container">
            </div>
        </div>
        <div class="announcement-container">
            <div class="announcement-box">
                <h1>Announcement</h1>
        </div>  
        <div class="announcement-text">
                <p></p>
        </div>
    </div>
    <div class="footer-container">
        <h1>
            STATISTICS: Visitor - 0
        </h1>
    </div>
    <script src="script.js"></script>
</body>
</html>
