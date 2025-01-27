<div class="templates-showcase">
    <h2>Choose Your Perfect Template</h2>
    <div class="template-grid">
        <div class="template-card" data-template="template1">
            <div class="template-preview">
                <iframe src="templates/template1.html" frameborder="0"></iframe>
            </div>
            <div class="template-info">
                <h3>Cheerful & Colorful</h3>
                <p>A vibrant design with floating balloons</p>
            </div>
        </div>
        <div class="template-card" data-template="template2">
            <div class="template-preview">
                <iframe src="templates/template2.html" frameborder="0"></iframe>
            </div>
            <div class="template-info">
                <h3>Elegant & Sophisticated</h3>
                <p>A luxurious design with golden accents</p>
            </div>
        </div>
        <div class="template-card" data-template="template3">
            <div class="template-preview">
                <iframe src="templates/template3.html" frameborder="0"></iframe>
            </div>
            <div class="template-info">
                <h3>Modern & Minimalist</h3>
                <p>A clean, contemporary design with subtle animations</p>
            </div>
        </div>
        <div class="template-card" data-template="template4">
            <div class="template-preview">
                <iframe src="templates/template4.html" frameborder="0"></iframe>
            </div>
            <div class="template-info">
                <h3>Fun & Playful</h3>
                <p>A lively design with confetti and animations</p>
            </div>
        </div>
    </div>
</div>

<div class="card-designer">
    <h2><i class="fas fa-magic"></i> Customize Your Card</h2>
    <div class="designer-container">
        <div class="preview-section">
            <h3>Live Preview</h3>
            <div class="preview-card" id="previewCard">
                <div class="card-content">
                    <h2 id="previewGreeting">Happy Birthday!</h2>
                    <p id="previewMessage">Wishing you a fantastic day!</p>
                </div>
            </div>
        </div>

        <div class="controls">
            <form id="cardForm">
                <div class="form-group">
                    <label for="templateSelect">
                        <i class="fas fa-palette"></i> Select Template
                    </label>
                    <select id="templateSelect" required>
                        <option value="template1">Cheerful & Colorful</option>
                        <option value="template2">Elegant & Sophisticated</option>
                        <option value="template3">Modern & Minimalist</option>
                        <option value="template4">Fun & Playful</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="recipientName">
                        <i class="fas fa-user"></i> Recipient's Name
                    </label>
                    <input type="text" id="recipientName" required placeholder="Enter recipient's name">
                </div>

                <div class="form-group">
                    <label for="recipientEmail">
                        <i class="fas fa-envelope"></i> Recipient's Email
                    </label>
                    <input type="email" id="recipientEmail" required placeholder="Enter recipient's email">
                </div>

                <div class="form-group">
                    <label for="customMessage">
                        <i class="fas fa-heart"></i> Your Message
                    </label>
                    <textarea id="customMessage" rows="4" placeholder="Write your heartfelt message here..."></textarea>
                </div>

                <button type="submit" class="send-btn">
                    <i class="fas fa-paper-plane"></i> Send Birthday Card
                </button>
            </form>
        </div>
    </div>
</div>

<div class="features-section">
    <h2>Why Choose Our Birthday Cards?</h2>
    <div class="features-grid">
        <div class="feature-card">
            <i class="fas fa-paint-brush"></i>
            <h3>Beautiful Designs</h3>
            <p>Professionally crafted templates that stand out</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-bolt"></i>
            <h3>Quick & Easy</h3>
            <p>Create and send cards in minutes</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-mobile-alt"></i>
            <h3>Mobile Friendly</h3>
            <p>Works perfectly on all devices</p>
        </div>
    </div>
</div>
