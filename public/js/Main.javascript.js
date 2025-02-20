

// Handle active nav items
const navItems = document.querySelectorAll('.nav-item');
navItems.forEach(item => {
    item.addEventListener('click', () => {
        navItems.forEach(nav => nav.classList.remove('active'));
        item.classList.add('active');
    });
});

// Profile Functions
function toggleEdit(fieldId) {
    const input = document.getElementById(fieldId);
    input.readOnly = !input.readOnly;

    if (!input.readOnly) {
        input.focus();
        if (fieldId === 'password') {
            input.type = 'text';
            input.value = ''; // Clear the asterisks
        }
    } else {
        if (fieldId === 'password' && input.value) {
            input.type = 'password';
        }
    }
}

// Comment deletion functionality (from second code)
function initializeCommentDelete() {
    const deleteButtons = document.querySelectorAll('.delete-comment-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent any default button behavior
            const commentId = this.dataset.commentId;
            
            if (confirm('Are you sure you want to delete this comment?')) {
                const token = document.querySelector('meta[name="csrf-token"]').content;
                
                fetch(`/responsable/delete-comment/${commentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const commentElement = document.getElementById(`comment-${commentId}`);
                        if (commentElement) {
                            commentElement.remove();
                            // Optional: Show success message
                            const successMessage = document.createElement('div');
                            successMessage.className = 'alert alert-success';
                            successMessage.textContent = 'Comment deleted successfully';
                            document.querySelector('.comments-section').insertBefore(successMessage, document.querySelector('.comments-list'));
                            setTimeout(() => successMessage.remove(), 1000);
                        }
                    } else {
                        throw new Error(data.message || 'Error deleting comment');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Show error message to user
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'alert alert-danger';
                    errorMessage.textContent = error.message || 'Error deleting comment';
                    document.querySelector('.comments-section').insertBefore(errorMessage, document.querySelector('.comments-list'));
                    setTimeout(() => errorMessage.remove(), 3000);
                });
            }
        });
    });
}

// Rating system functionality (from first code)
function initializeRating() {
    const ratingStars = document.querySelectorAll('.star-rating');
    const ratingInput = document.getElementById('ratingInput');
    const ratingForm = document.getElementById('ratingForm');

    if (!ratingStars.length || !ratingInput || !ratingForm) {
        return; // Exit if elements don't exist
    }

    // Handle star hover and click events
    ratingStars.forEach(star => {
        // Hover effects
        star.addEventListener('mouseover', function() {
            const rating = this.dataset.rating;
            highlightStars(rating);
        });

        star.addEventListener('mouseout', function() {
            const currentRating = ratingInput.value;
            highlightStars(currentRating);
        });

        // Click effect
        star.addEventListener('click', function() {
            const rating = this.dataset.rating;
            ratingInput.value = rating;
            highlightStars(rating);
        });
    });

    // Function to highlight stars
    function highlightStars(rating) {
        ratingStars.forEach(star => {
            const starRating = parseInt(star.dataset.rating);
            if (starRating <= rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }

    // Handle form submission
    ratingForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const token = document.querySelector('meta[name="csrf-token"]').content;
        const articleId = document.querySelector('input[name="article_id"]').value;
        const rating = ratingInput.value;

        fetch(this.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                article_id: articleId,
                rate: rating
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Rating submitted successfully!');
            } else {
                alert('Error submitting rating. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error submitting rating. Please try again.');
        });
    });
}

// Handle avatar upload
document.getElementById('avatar-upload')?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Initialize everything when document is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeRating();
    initializeCommentDelete();
    
    // Flash messages
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.display = 'none';
        }, 3000);
    });
});