<?php include('include/header.php'); ?>
<style>
      .error {
            color: red;
            margin-top: 5px;
        }
</style>
<div class="main">
    <div class="row">
    <?php $email= $this->session->email; ?>
    <h2><?php echo $email; ?></h2>
    </div>

    <div class="row">
    <form action="javascript:void(0)" method="post" id="profile_upload" autocomplete="off" enctype="multipart/form-data">
                    <label for="">Email:</label>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*">
                    <div id="profileError" class="error"></div>
                    <button type="button" id="upload">UPLOAD</button>
                </form>
    </div>
</div>
<?php include('include/footer.php'); ?>
<script>
       $(document).ready(function() {
        $('#upload').on('click', function(event) { 

            $('#profileError').text('');

            var file_input = $('#profile_photo')[0];  

            if (file_input.files.length > 0) {  
                var file_data = file_input.files[0];  
                var form_data = new FormData();  
                form_data.append('file', file_data);  
            } else {  
                $('#profileError').text('No file selected. Please choose a file.'); 
                return;  
            }  

            $.ajax({
                url: '<?php echo base_url("home/profile_upload") ?>',
                type: 'POST',
                data:form_data,
                contentType: false,
                processData: false,
                success: function(response) {
                    var jsonResponse = JSON.parse(response);
                    alert(jsonResponse.message);  
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error during login validation:', error);
                }
            });

        });
       });
</script>