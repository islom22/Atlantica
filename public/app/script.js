$(document).ready(function() {
  $('.nav-tabs button').first().addClass('active');
  $('.nav-tabs button').on('click', function() {
    $('.nav-tabs button').removeClass('active');
    $(this).addClass('active');
  });

  $('.tab-content .tab-pane').first().addClass('active show');

  const deleteBtns = document.querySelectorAll(".delete-btn");

  deleteBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      let deleteConfirm = confirm('Удалить?');

      if (!deleteConfirm) {
        e.preventDefault()
      }
    })
  })
});