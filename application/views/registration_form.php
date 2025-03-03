<?php include('include/header.php'); ?>
<style>
      .error {
            color: red;
            margin-top: 5px;
        }

        .custom-alert {
        position: fixed;
        top: 20px; 
        right: 20px; 
        width: 300px; 
        z-index: 1050; 
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="main">
    <div class="container">
        <div class="row">
            <div>
                <?php  if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12"><h2>Registartion form</h2></div>
            <div class="col-12">
                <form action="<?php echo base_url("home/register") ?>" method="post" id="registration" autocomplete="off">
                    <label for="">Email:</label>
                    <input type="text" name="email" id="email">
                    <div id="emailError" class="error"></div>

                    <label for="">Password:</label>
                    <input type="password" name="password" id="password">


                    <label for="retypePassword">Retype Password:</label>
                    <input type="password" name="retypePassword" id="retypePassword">
                    <div id="passwordError" class="error"></div>

                    <label for="">Location:</label>
                    <select name="location" id="location">
                        <option value="0">Select Location</option>
                        <?php foreach ($locations as $location): ?>
                            <option value="<?php echo $location['location_id'] ?>"><?php echo $location['location_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div id="locationError" class="error"></div>

                    <label for="">Date of Birth:</label>
                    <input type="date" name="dob" id="dob">
                    <div id="dobError" class="error"></div>

                    <button type="submit" id="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    
    
</div>
<?php include('include/footer.php'); ?>

<script>
    $(document).ready(function() {
        $('#registration').on('submit', function(event) {

            event.preventDefault();
            const email = $('#email').val();
            const password = $('#password').val();
            const retypePassword = $('#retypePassword').val();
            const location = $('#location').val();
            const dob = $('#dob').val();

            const emailError = $('#emailError');

            emailError.text('');
            $('#passwordError').text('');
            $('#locationError').text('');
            $('#dobError').text('');


            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                emailError.text('Please enter a valid email address.');
                return false;
            }

            if (password.length < 8) {
                $('#passwordError').text("Password must be 8 characters long");
                return false;
            }

            if (retypePassword !== password) {
                $('#passwordError').text('Passwords do not match.');
                return false;
            }

            if (location === '0') {
                $('#locationError').text("Please select a valid location.");
                return false;
            }

            if (!dob) {
                $('#dobError').text("Please enter your date of birth.");
                return false;
            }

            $.ajax({
                url: '<?php echo base_url("home/check_login") ?>',
                type: 'POST',
                data: JSON.stringify({
                    email,
                    password
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    if (data.exists) {
                        emailError.text('Email already exists.');
                    } else {
                        $('#registration').off('submit').submit();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error during login validation:', error);
                }
            });

        });
    });
</script>

