<?php include('include/header.php'); ?>
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
                <?php  if($this->session->flashdata('danger')): ?>
                    <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
                    <?php echo $this->session->flashdata('danger'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12"><h2>Login</h2></div>
            <div class="col-12">
                <form action="<?php echo base_url("home/login") ?>" method="post" id="login" autocomplete="off">
                    <label for="">Email:</label>
                    <input type="text" name="email" id="email">
                    <div id="emailError" class="error"></div>

                    <label for="">Password:</label>
                    <input type="password" name="password" id="password">

                    <button type="submit" id="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
    
    
</div>
<?php include('include/footer.php'); ?>