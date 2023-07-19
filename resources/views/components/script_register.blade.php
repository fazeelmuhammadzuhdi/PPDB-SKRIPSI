 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
     integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
 </script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
 </script>

 <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

 <script>
     feather.replace()
 </script>

 <script>
     const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');
     const checkboxIcon = document.getElementById('checkboxIcon');
     const checkboxIconConfirmation = document.getElementById('checkboxIconConfirmation');
     const passwordInput = document.getElementById(
         'password');
     const passwordInputConfirmation = document.getElementById(
         'password-confirm');

     showPasswordCheckbox.addEventListener('click', function() {
         if (showPasswordCheckbox.checked) {
             passwordInput.type = 'text';
             checkboxIcon.setAttribute('data-feather', 'eye-off');
         } else {
             passwordInput.type = 'password';
             checkboxIcon.setAttribute('data-feather', 'eye');
         }
         feather.replace(); // If you are using the Feather Icons library, this line updates the icon appearance
     });

     showPasswordConfirmationCheckbox.addEventListener('click', function() {
         if (showPasswordConfirmationCheckbox.checked) {
             passwordInputConfirmation.type = 'text';
             checkboxIconConfirmation.setAttribute('data-feather', 'eye-off');
         } else {
             passwordInputConfirmation.type = 'password';
             checkboxIconConfirmation.setAttribute('data-feather', 'eye');
         }
         feather.replace(); // If you are using the Feather Icons library, this line updates the icon appearance
     });
 </script>
