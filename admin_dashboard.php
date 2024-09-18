<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_dash.css">
</head>
<body>
    <header>
        <h1>QCPL Admin Dashboard</h1>
        <nav>
            <a href="#">Dashboard</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <!-- Video Section -->
        <section class="container">
            <h2>Video Container</h2>
            <div class="preview">
                <video id="videoPreview" controls>
                    <source src="current-video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <input type="file" id="videoUpload" accept="video/*"> 
            <br>
            <button>Save Video</button>
        </section>

        <!-- Announcement Section with Form -->
        <section class="container">
        <h2>Announcement Container</h2>
        <form id="announcementForm" action="addAnnouncement.php" method="POST">
            <div>
                <label for="announcementText">Announcement Content:</label>
                <textarea id="announcementText" name="announcement_text" rows="4" placeholder="Enter announcement text here..." required></textarea>
            </div>
            <button type="submit">Add Announcement</button>
        </form>
    </section>

        <!-- Add New Book Section -->
        <section class="container">
            <h2>Add New Book</h2>
            <form id="addBookForm" action="addBook.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="title">Book Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="book_img">Upload Book Image:</label>
                    <input type="file" id="book_img" name="book_img" accept="image/*" required>
                </div>
                <button type="submit">Add Book</button>
            </form>
        </section>

        <!-- Footer Section with Form -->
        <section class="container">
            <h2>Footer Container</h2>
            <form id="footerForm" action="update_footer.php" method="POST">
                <textarea id="footerText" name="footer_text" rows="4" placeholder="Enter footer text here...">Current footer text</textarea>
                <button type="submit">Update Footer</button>
            </form>
        </section>
    </main>

</body>
</html>
