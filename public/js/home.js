
document.addEventListener('DOMContentLoaded', () => {
    // Add click handlers for navigation buttons
    const loginBtn = document.querySelector('.primary-btn');
    const registerBtn = document.querySelector('.secondary-btn');

    loginBtn.addEventListener('click', () => {
        // Add your login navigation logic here
        console.log('Navigate to login page');
    });

    registerBtn.addEventListener('click', () => {
        // Add your register navigation logic here
        console.log('Navigate to register page');
    });

    // Make article cards clickable
    const articleCards = document.querySelectorAll('.article-card');
    articleCards.forEach(card => {
        card.addEventListener('click', () => {
            // Add your article navigation logic here
            console.log('Navigate to article:', card.querySelector('h3').textContent);
        });
    });

    // Make category cards clickable
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', () => {
            // Add your category navigation logic here
            console.log('Navigate to category:', card.querySelector('h3').textContent);
        });
    });

    // Add parallax effect to hero section
    const heroSection = document.querySelector('.hero-section');
    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;
        heroSection.style.backgroundPositionY = `${scrollY * 0.5}px`;
    });
});