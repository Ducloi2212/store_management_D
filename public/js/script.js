
document.getElementById('avatar-upload').addEventListener('change', function (event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('avatar-preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
});

document.getElementById('avatar-upload').addEventListener('change', function (e) {
  const file = e.target.files[0];
  if (file) {
    const preview = document.getElementById('avatar-preview');
    preview.src = URL.createObjectURL(file);
  }
});

document.querySelectorAll('.profile-menu a li').forEach(item => {
  item.addEventListener('click', function () {
    document.querySelectorAll('.profile-menu a li').forEach(li => li.classList.remove('active'));
    this.classList.add('active');
  });
});


