// ... Same as before

const commentForm = document.getElementById('comment-form'); // Corrected variable name
const commentsDiv = document.getElementById('comments');

commentForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(commentForm);
    fetch('submit_comment.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            fetchComments();
            commentForm.reset();
        }
    })
    .catch(error => console.error('Error:', error));
});

// ... Rest of the code remains the same



function fetchComments() {
    fetch('fetch_comments.php')
    .then(response => response.json())
    .then(data => {
        commentsDiv.innerHTML = '';
        data.comments.forEach(comment => {
            const commentElement = document.createElement('div');
            commentElement.innerHTML = `<strong>${comment.name}:</strong> ${comment.comment}`;
            commentsDiv.appendChild(commentElement);
        });
    })
    .catch(error => console.error('Error:', error));
}

// ... Same as before
