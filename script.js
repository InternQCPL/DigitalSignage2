// Function to update time
function updateTime() {
    const timeElement = document.getElementById('current-time');
    const dateElement = document.getElementById('current-date');
    const now = new Date();
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; 

    timeElement.textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    dateElement.textContent = now.toLocaleDateString('en-US', options);
}

updateTime();
setInterval(updateTime, 1000);

// Function to fetch book data
function fetchBooks() {
    fetch('fetchBooks.php')
        .then(response => response.json())
        .then(data => {
            const slideshowContainer = document.querySelector('.slideshow-container');
            slideshowContainer.innerHTML = ''; // Clear any existing slides

            data.forEach(book => {
                const slide = document.createElement('div');
                slide.className = 'mySlides fade';

                const img = document.createElement('img');
                img.src = 'uploads/' + book.book_img; // Fetch images from the 'uploads' folder
                img.alt = book.Title;
                img.className = 'book-image';

                const text = document.createElement('div');
                text.className = 'text';
                text.textContent = book.Title;

                slide.appendChild(img);
                slide.appendChild(text);
                slideshowContainer.appendChild(slide);
            });

            showSlides(); // Initialize the slideshow
        })
        .catch(error => console.error('Error fetching books:', error));
}

// Fetch books when the page loads
document.addEventListener('DOMContentLoaded', fetchBooks);

// Slideshow logic
let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}

// Display Announcement
document.addEventListener("DOMContentLoaded", function() {
    fetch('displayAnnouncement.php')
        .then(response => response.json())
        .then(data => {
            const announcementContainer = document.querySelector('.announcement-container');
            const announcementBox = document.querySelector('.announcement-box');
            
            // Clear existing content within announcement-box but keep the box
            announcementBox.innerHTML = '<h1>Announcement</h1>';

            // Assuming data is an array with the latest announcement as the only item
            if (data.length > 0) {
                const announcement = data[0];
                const announcementElement = document.createElement('div');
                announcementElement.classList.add('announcement-item');
                announcementElement.innerHTML = `<p>${announcement.Content}</p>`;
                announcementBox.appendChild(announcementElement);
            }
        })
        .catch(error => console.error('Error fetching announcements:', error));
});
