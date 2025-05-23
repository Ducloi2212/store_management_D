document.addEventListener("DOMContentLoaded", function () {
  const stars = document.querySelectorAll('.star-rating .fa-star');
  const ratingInput = document.getElementById('rating-value');
  let currentRating = 0;

  stars.forEach((star, index) => {
    star.addEventListener('mouseover', () => {
      highlightStars(index + 1);
    });

    star.addEventListener('mouseout', () => {
      highlightStars(currentRating);
    });

    star.addEventListener('click', () => {
      currentRating = index + 1;
      ratingInput.value = currentRating;
      highlightStars(currentRating);
    });
  });

  function highlightStars(rating) {
    stars.forEach((star, i) => {
      star.classList.toggle('checked', i < rating);
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll('.star-rating .fa-star');
    const ratingInput = document.getElementById('rating-value');
    const ratingText = document.getElementById('rating-text');

    const ratingLabels = {
        1: "Tệ",
        2: "Tạm",
        3: "Được",
        4: "Tốt",
        5: "Rất tốt"
    };

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            const value = star.dataset.value;
            ratingInput.value = value;

            stars.forEach(s => s.classList.remove('checked'));

            for (let i = 0; i < value; i++) {
                stars[i].classList.add('checked');
            }

            ratingText.textContent = ratingLabels[value];
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll('.star-rating .fa-star');
    const ratingInput = document.getElementById('rating-value');
    const ratingError = document.getElementById('rating-error');

    const commentInput = document.querySelector('textarea[name="comment"]');
    const commentError = document.getElementById('comment-error');

    stars.forEach((star, index) => {
        star.addEventListener('click', function () {
            ratingInput.value = this.dataset.value;

            stars.forEach(s => s.classList.remove('checked'));
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('checked');
            }

            if (ratingError) {
                ratingError.style.display = 'none';
            }
        });
    });

    commentInput?.addEventListener('input', function () {
        if (this.value.trim() !== '' && commentError) {
            commentError.style.display = 'none';
        }
    });
});