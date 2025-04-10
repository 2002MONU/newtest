$(document).ready(function () {
   const modal = new bootstrap.Modal(document.getElementById('addModal'));

   $('#addBtn').on('click', function () {
       modal.show();
   });


   $('#addForm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
          url: 'saveMember.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function (res) {
              if (res.trim() === 'success') {
                  location.reload();
              } else {
                  alert("Failed to add member");
              }
          }
      });
   });

});