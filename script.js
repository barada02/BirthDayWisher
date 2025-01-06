// Initialize EmailJS with your public key
const PUBLIC_KEY = 'whjtvClDkO_irD9Ox';
const serviceID = 'service_65plppr';
const templateID = 'template_id2dvpg';

emailjs.init(PUBLIC_KEY);

// DOM Elements
const cardForm = document.getElementById('cardForm');
const previewCard = document.getElementById('previewCard');
const recipientName = document.getElementById('recipientName');
const customMessage = document.getElementById('customMessage');
const templateSelect = document.getElementById('templateSelect');

// Get logged in user's details
const userName = document.querySelector('meta[name="user-name"]')?.content || '';
const userEmail = document.querySelector('meta[name="user-email"]')?.content || '';

// Generate Email Template
function generateEmailTemplate(name, message, selectedTemplate) {
    let template = '';
    
    if (selectedTemplate === 'template1') {
        template = `
        <div style="background: linear-gradient(45deg, #ff6b6b, #ffd93d); border-radius: 15px; padding: 30px; text-align: center; font-family: Arial, sans-serif; color: white; max-width: 600px; margin: 0 auto;">
            <div style="font-size: 40px; margin: 10px;">🎈</div>
            <div style="font-size: 1.2em; line-height: 1.6; margin: 20px 0;">
                <p>${message}</p>
                <p>May all your dreams come true!</p>
            </div>
            <div style="margin-top: 30px;">
                <p>With love,</p>
                <p>${userName}</p>
            </div>
            <div style="font-size: 40px; margin: 10px;">🎁</div>
        </div>`;
    } else if (selectedTemplate === 'template2') {
        template = `
        <div style="background: linear-gradient(135deg, #1a1a1a, #4a4a4a); border-radius: 20px; padding: 40px; text-align: center; font-family: Arial, sans-serif; color: gold; max-width: 600px; margin: 0 auto; border: 2px solid gold;">
            <div style="font-size: 30px; margin: 15px;">✨</div>
            <div style="height: 2px; background: linear-gradient(90deg, transparent, gold, transparent); margin: 20px auto; width: 80%;"></div>
            <div style="color: white; font-size: 1.3em; line-height: 1.7; margin: 25px 0;">
                <p>${message}</p>
                <p>Here's to another wonderful year ahead!</p>
            </div>
            <div style="height: 2px; background: linear-gradient(90deg, transparent, gold, transparent); margin: 20px auto; width: 80%;"></div>
            <div style="margin-top: 35px; color: gold;">
                <p>Warmest wishes,</p>
                <p>${userName}</p>
            </div>
            <div style="font-size: 30px; margin: 15px;">✨</div>
        </div>`;
    } else if (selectedTemplate === 'template3') {
        template = `
        <div style="background-color: #ffffff; border-radius: 10px; padding: 40px; text-align: center; font-family: Helvetica Neue, sans-serif; color: #333; max-width: 600px; margin: 0 auto; border: 1px solid #eee;">
            <div style="width: 60px; height: 60px; border-radius: 50%; background: #f0f0f0; margin: 0 auto 20px; text-align: center; line-height: 60px; font-size: 24px;">🎂</div>
            <div style="width: 40px; height: 3px; background: #3498db; margin: 20px auto;"></div>
            <div style="font-size: 1.1em; line-height: 1.8; margin: 25px 0; color: #555;">
                <p>${message}</p>
                <p>May your day be as special as you are.</p>
            </div>
            <div style="width: 40px; height: 3px; background: #3498db; margin: 20px auto;"></div>
            <div style="margin-top: 35px; color: #2c3e50;">
                <p>Warmest wishes,</p>
                <p>${userName}</p>
            </div>
        </div>`;
    } else if (selectedTemplate === 'template4') {
        template = `
        <div style="background: #fff; border-radius: 25px; padding: 40px; text-align: center; font-family: Comic Sans MS, cursive; color: #333; max-width: 600px; margin: 0 auto; position: relative;">
            <div style="height: 10px; background: linear-gradient(90deg, #ff6b6b 0%, #4ecdc4 25%, #45b7d1 50%, #96c93d 75%, #ff6b6b 100%);"></div>
            <div style="margin: 15px 0; font-size: 30px;">
                <span>🌟</span>
                <span>✨</span>
                <span>🎈</span>
            </div>
            <div style="font-size: 2.5em; margin: 20px 0; color: #ff6b6b;">
                <p>Happy Birthday!</p>
            </div>
            <div style="font-size: 1.3em; line-height: 1.6; margin: 25px 0; color: #666;">
                <p>${message}</p>
                <p>Time to celebrate YOU! 🎉</p>
            </div>
            <div style="margin: 15px 0; font-size: 30px;">
                <span>🎂</span>
                <span>🎁</span>
                <span>🎈</span>
            </div>
            <div style="margin-top: 30px; color: #45b7d1;">
                <p>Party on!</p>
                <p>${userName}</p>
            </div>
        </div>`;
    }
    return template;
}

// Update preview
function updatePreview() {
    const name = recipientName.value || 'Friend';
    const message = customMessage.value || 'Wishing you a fantastic birthday filled with joy and happiness!';
    const selectedTemplate = templateSelect.value;
    
    previewCard.innerHTML = generateEmailTemplate(name, message, selectedTemplate);
}

// Handle form submission
cardForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const sendButton = e.target.querySelector('button[type="submit"]');
    sendButton.textContent = 'Sending...';
    sendButton.disabled = true;

    try {
        const templateParams = {
            to_name: recipientName.value,
            recipient_email: document.getElementById('recipientEmail').value,
            message_html: generateEmailTemplate(
                recipientName.value,
                customMessage.value || 'Wishing you a fantastic birthday filled with joy and happiness!',
                templateSelect.value
            ),
            user_name: userName,
            user_mail: userEmail,
            reply_to: userEmail
        };

        await emailjs.send(serviceID, templateID, templateParams);
        alert('Birthday card sent successfully!');
        cardForm.reset();
        updatePreview();
    } catch (error) {
        console.error('Error sending email:', error);
        alert('Failed to send birthday card. Please try again.');
    } finally {
        sendButton.textContent = 'Send Birthday Card';
        sendButton.disabled = false;
    }
});

// Add event listeners
recipientName.addEventListener('input', updatePreview);
customMessage.addEventListener('input', updatePreview);
templateSelect.addEventListener('change', updatePreview);

// Initial preview
updatePreview();
