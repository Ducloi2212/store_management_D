document.addEventListener("DOMContentLoaded", function () {
  const stars = document.querySelectorAll('.star-rating .fa-star');
  const ratingInput = document.getElementById('rating-value');
  let currentRating = 0;

  stars.forEach((star, index) => {
    // Hover
    star.addEventListener('mouseover', () => {
      highlightStars(index + 1);
    });

    // Rời chuột
    star.addEventListener('mouseout', () => {
      highlightStars(currentRating);
    });

    // Click để chọn rating
    star.addEventListener('click', () => {
      currentRating = index + 1;
      ratingInput.value = currentRating;
      highlightStars(currentRating);
    });
  });

  // Tô màu từ trái qua phải
  function highlightStars(rating) {
    stars.forEach((star, i) => {
      star.classList.toggle('checked', i < rating);
    });
  }
});