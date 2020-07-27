
<?php
$settings = $this->db->select("*")
->get('setting')
->row();

?>

<?php 

$i=1; 

foreach ($article as $key => $value) { 

    $article_image[] = $value->article_image;



    $i++;

} 



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ucwords($title).' - '.$settings->title; ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url("assets/website/login/"); ?>fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url("assets/website/login/"); ?>css/style.css?v=<?php echo PROJE_VERSION; ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>sweetalert2/dist/sweetalert2.min.css">
    
    <body>

        <div class="main">

            <!-- Sign up form -->
            <section class="sign-in">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-form">
                            <h2 class="form-title"><?php echo display('login'); ?></h2>
                            <?php echo form_open('home/login','id="loginForm" '); ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="useremail" placeholder="<?php echo display('username_or_email'); ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" required placeholder="<?php echo display('password'); ?>" />
                            </div>
                            <div class="input">
                                <a  id="btnckeck" href="#"><?php echo display('forgot_password'); ?>? </a>
                                <span><?php echo display('dont_have_an_account'); ?>?</span> 
                                <a class="modalbtn signbtn" href="<?php echo base_url('home/register');?>" style="color: orange; "><?php echo display('sign_up_now'); ?></a>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </section>

        <div id="forgotModal" class="modal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><?php echo display('forgot_password'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <?php echo form_open('home/forgotPassword','id="forgotPassword"'); ?>
                <div class="form-group">
                    <input class="form-control" name="f_email" id="f_email" placeholder="<?php echo display('email'); ?>" type="email" autocomplete="off" required>
                </div>
                <button  type="button" class="btn btn-reg btn-block" style="color: orange;border: 1px orange solid;" 
                onclick="frgt()"><?php echo display('send_code'); ?></button>
                <?php echo form_close();?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="background-color: white;color: red;border: 1px red solid;" data-dismiss="modal"><?php echo display('close'); ?></button>
            </div>
        </div>




    </div>
    <script src="<?php echo base_url("assets/website/login/"); ?>vendor/jquery/jquery.min.js?v=1"></script>

    <script src="<?php echo base_url("assets/website/"); ?>vendor/popper/umd/popper.min.js"></script>
    <script src="<?php echo base_url("assets/website/"); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url("assets/website/login/"); ?>js/main.js?v=1"></script>
    <script src="<?php echo base_url("assets/"); ?>sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- JS -->
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('#btnckeck').on('click', function(e){
              e.preventDefault();
              $("#forgotModal").modal('show');

          });
        });
        function frgt(){ 
           var email=$("#f_email").val();
            Swal.fire({
              title: 'Are you sure?',
              text: "",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Send Me Reset Code!'
          }).then((result) => {
              if (result.value) {
               
                $.ajax({
                   
                    url:"<?php echo base_url('home/forgotPassword');?>",
                    type:"post",
                    data:{<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>','email':email},
                    success:function(resultayax){
                        if (resultayax=='ok'){
                            Swal.fire(
                          'success!',
                          'Password reset code sent.Check your email.',
                          'success'
                          )
                        }
                         else {
                             Swal.fire(
                          'Error!',
                          resultayax,
                          'error'
                          )
                         }
                        
                    }

                })

            }

        });
      };






  </script>

</body>
</html>