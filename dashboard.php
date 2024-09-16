<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "css/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = "header-container">
        <div class = "header-title">
            <h1> QUEZON CITY PUBLIC LIBRARY </h1>
        </div>
        <div class="time-date-container">
            <div class="current-time" id="current-time">1</div>
            <div class="current-date" id="current-date">1</div>
        </div>
    </div>
    <div class = "body-container">
        <div class = "video-container">
        <video id = "video_player" controls loop autoplay>
            <source src="video/video_1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        </div>
        <div class = "books-container">
        <<h3>NEW ARRIVAL</h3> 
            <div class="slideshow-container">

            
                <div class="mySlides fade">
                    <img src="images/book_1.png" alt="Book 1" class="book-image">
                    <div class="text">Holt Elements of Literature</div>
                </div>
                
                <div class="mySlides fade">
                    <img src="images/book_2.png" alt="Book 2" class="book-image">
                    <div class="text">Book Title 2</div>
                </div>

             
                <div class="mySlides fade">
                    <img src="images/book_3.png" alt="Book 3" class="book-image">
                    <div class="text">Book Title 3</div>
                </div>

                
            </div>
        </div>
        <div class = "announcement-container">
            <div class = "announcement-box">
                <h1>Announcement <h1>
            </div>
        </div>
    </div>
    
    <div class="footer-container">
        <h1>
            STATISTICS: Visitor - 0; TOTAL BIBLIO: 0
        </h1>
    </div>

</body>

<script src="js/script.js"></script>
</html>


