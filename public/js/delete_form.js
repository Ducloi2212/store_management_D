window.onload = function () {
  const deleteBtn = document.getElementById('deleteBtn');
  const modal = document.getElementById('confirmModal');
  const confirmDelete = document.getElementById('confirmDelete');
  const cancelDelete = document.getElementById('cancelDelete');

  deleteBtn.onclick = () => {
    modal.style.display = 'flex';
  }

  cancelDelete.onclick = () => {
    modal.style.display = 'none';
  }

  confirmDelete.onclick = () => {
    document.getElementById('deleteForm').submit();
  }
}