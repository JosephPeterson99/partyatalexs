<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party at Alex's</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div id="header-section">
            <?php 
                include('logo.php');
                render_logo(); // No parameter - will use random text from JSON
            ?>
        </div>
          <!-- Navbar section -->
        <div class="navbar-wrapper">
            <nav class="navbar">
                <a href="#header-section" class="btn-play"><img src="img/btn/btn-play.png" alt="Play Now"></a>
                <a href="#event-details" class="btn-rules"><img src="img/btn/btn-rules.png" alt="Rules"></a>
                <a href="#map" class="btn-map"><img src="img/btn/btn-map.png" alt="Live Map"></a>
                <a href="#event-details" class="btn-mods"><img src="img/btn/btn-mods.png" alt="Mods & Datapacks"></a>
            </nav>
        </div>
        
        <main>
            <!-- Empty red rectangular sections -->
            <div class="section-container" id="event-details">
                <section class="event-details">
                    <h2>Event Details</h2>
                    <p><strong>Date:</strong> June 15, 2025</p>
                    <p><strong>Time:</strong> 8:00 PM - 2:00 AM</p>
                    <p><strong>Location:</strong> Alex's Place</p>
                    <p><strong>Days until party:</strong> 27 days</p>
                </section>
            </div>
            
            <div class="section-container" id="about">
                <section class="about">
                    <h2>About the Party</h2>
                    <p>Get ready for the most exciting party of the year! We've got amazing music, delicious food, and the coolest people in town.</p>
                    <p>Don't miss out on this incredible night!</p>
                </section>
            </div>
            
            <div class="section-container" id="rsvp">
                <section class="rsvp">
                    <h2>RSVP</h2>
                    <form>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="guests">Number of Guests:</label>
                            <select id="guests" name="guests">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <button type="submit">Submit RSVP</button>
                    </form>
                </section>
            </div>
            
            <div class="section-container" id="gallery">
                <section class="gallery">
                    <h2>Party Gallery</h2>
                    <p>Check out some photos from our previous events!</p>
                    <div class="gallery-grid">
                        <div class="gallery-item">
                            <div class="placeholder-image">Image 1</div>
                            <p>Last year's summer bash</p>
                        </div>
                        <div class="gallery-item">
                            <div class="placeholder-image">Image 2</div>
                            <p>New Year's Eve Celebration</p>
                        </div>
                        <div class="gallery-item">
                            <div class="placeholder-image">Image 3</div>
                            <p>Halloween Party 2024</p>
                        </div>
                        <div class="gallery-item">
                            <div class="placeholder-image">Image 4</div>
                            <p>Spring Fling</p>
                        </div>
                    </div>
                </section>
            </div>
            
            <div class="section-container">
                <section class="testimonials">
                    <h2>What People Say</h2>
                    <div class="testimonial">
                        <p>"Alex's parties are always the highlight of my year! Can't wait for the next one!"</p>
                        <cite>- Jamie S.</cite>
                    </div>
                    <div class="testimonial">
                        <p>"The music was amazing, the food was delicious, and the company was even better!"</p>
                        <cite>- Taylor M.</cite>
                    </div>
                    <div class="testimonial">
                        <p>"I've never had so much fun in one night. Already looking forward to the next party!"</p>
                        <cite>- Jordan R.</cite>
                    </div>
                </section>
            </div>
            
            <div class="section-container">
                <section class="faq">
                    <h2>Frequently Asked Questions</h2>
                    <div class="faq-item">
                        <h3>What should I wear?</h3>
                        <p>Dress to impress! Smart casual is our recommended attire.</p>
                    </div>
                    <div class="faq-item">
                        <h3>Can I bring additional guests?</h3>
                        <p>Please RSVP with the total number of guests. If you need to bring more than 4, contact us directly.</p>
                    </div>
                    <div class="faq-item">
                        <h3>Is there parking available?</h3>
                        <p>Yes, limited parking is available on-site. Carpooling is encouraged!</p>
                    </div>
                    <div class="faq-item">
                        <h3>What time does the party end?</h3>
                        <p>The official end time is 2:00 AM, but the fun often continues!</p>
                    </div>
                </section>
            </div>
        </main>
        
        <div class="section-container">
            <footer>
                <p>&copy; <?php echo date('Y'); ?> Party at Alex's. All rights reserved.</p>
                <p>Contact: party@alexs.com | (555) 123-4567</p>
            </footer>
        </div>
    </div>

    <script>
        // JavaScript to handle the sticky navbar behavior
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const navbarWrapper = document.querySelector('.navbar-wrapper');
            const headerSection = document.getElementById('header-section');
            
            // Get the position where the navbar should become sticky
            const stickyPosition = headerSection.offsetTop + headerSection.offsetHeight;
            
            // Check if we've scrolled past the header
            if (window.pageYOffset >= stickyPosition) {
                navbar.classList.add('sticky');
                navbarWrapper.classList.add('has-sticky');
            } else {
                navbar.classList.remove('sticky');
                navbarWrapper.classList.remove('has-sticky');
            }
        });

        // Ensure <a> tags expand to the size of their images dynamically
        document.addEventListener('DOMContentLoaded', function() {
            const navbarLinks = document.querySelectorAll('.navbar a');

            navbarLinks.forEach(link => {
                const img = link.querySelector('img');
                if (img) {
                    const adjustLinkSize = () => {
                        link.style.width = img.offsetWidth + 'px';
                        link.style.height = img.offsetHeight + 'px';
                    };

                    // Adjust size immediately if the image is already loaded
                    if (img.complete) {
                        adjustLinkSize();
                    } else {
                        img.onload = adjustLinkSize;
                    }
                }
            });
        });
    </script>
</body>
</html>