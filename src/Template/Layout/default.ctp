<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Budget-Planner';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

   

<?= $this->Html->css(['Inspinia/css/bootstrap.min.css',
                        'Inspinia/font-awesome/css/font-awesome.css',
                        'Inspinia/css/plugins/iCheck/custom.css',
                        'Inspinia/css/animate.css',
                        'Inspinia/css/style.css',
                        'Inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
                        'Inspinia/css/plugins/chosen/chosen.css',
                        'Inspinia/css/plugins/colorpicker/bootstrap-colorpicker.min.css',
                        'Inspinia/css/plugins/cropper/cropper.min.css',
                        'Inspinia/css/plugins/switchery/switchery.css',
                        'Inspinia/css/plugins/jasny/jasny-bootstrap.min.css',
                        'Inspinia/css/plugins/nouslider/jquery.nouislider.css',
                        'Inspinia/css/plugins/datapicker/datepicker3.css',
                        'Inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.css',
                        'Inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css',
                        'Inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
                        'Inspinia/css/plugins/clockpicker/clockpicker.css',
                        'Inspinia/css/plugins/daterangepicker/daterangepicker-bs3.css',
                        'Inspinia/css/plugins/select2/select2.min.css',
                        'Inspinia/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css',
                        'Inspinia/css/plugins/toastr/toastr.min.css'
                        ]) ?>
                        
                        
    

    
  <?= $this->Html->script(['Inspinia/js/jquery-2.1.1.js',
                          'Inspinia/js/plugins/gritter/jquery.gritter.css',  
                        'Inspinia/js/bootstrap.min.js',
                        'Inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js',
                        'Inspinia/js/inspinia.js',
                        'Inspinia/js/plugins/pace/pace.min.js',
                        'Inspinia/js/plugins/iCheck/icheck.min.js',
                        'Inspinia/js/plugins/chosen/chosen.jquery.js',
                        'Inspinia/js/plugins/jsKnob/jquery.knob.js',
                        'Inspinia/js/plugins/jasny/jasny-bootstrap.min.js',
                        'Inspinia/js/plugins/datapicker/bootstrap-datepicker.js',
                        'Inspinia/js/plugins/nouslider/jquery.nouislider.min.js',
                        'Inspinia/js/plugins/switchery/switchery.js',
                        'Inspinia/js/plugins/ionRangeSlider/ion.rangeSlider.min.js',
                        'Inspinia/js/plugins/iCheck/icheck.min.js',
                        'Inspinia/js/plugins/metisMenu/jquery.metisMenu.js',
                        'Inspinia/js/plugins/colorpicker/bootstrap-colorpicker.min.js',
                        'Inspinia/js/plugins/clockpicker/clockpicker.js',
                        'Inspinia/js/plugins/cropper/cropper.min.js',
                        'Inspinia/js/plugins/fullcalendar/moment.min.js',
                        'Inspinia/s/plugins/daterangepicker/daterangepicker.js',
                        'Inspinia/js/plugins/select2/select2.full.min.js',
                        'Inspinia/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js'
                        ]) ?> 
                    

              
    <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>                      

    
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    


         


    <?= $this->Html->css(['Inspinia/css/bootstrap.min.css','Inspinia/font-awesome/css/font-awesome.css','Inspinia/css/plugins/iCheck/custom.css','Inspinia/css/plugins/chosen/chosen.css','Inspinia/css/plugins/chosen/chosen.css','Inspinia/css/plugins/colorpicker/bootstrap-colorpicker.min.css','Inspinia/css/plugins/cropper/cropper.min.css','Inspinia/css/plugins/switchery/switchery.css','Inspinia/css/plugins/jasny/jasny-bootstrap.min.css','Inspinia/css/plugins/nouslider/jquery.nouislider.css','Inspinia/css/plugins/datapicker/datepicker3.css','Inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.css','Inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css','Inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css','Inspinia/css/plugins/clockpicker/clockpicker.css','Inspinia/css/plugins/daterangepicker/daterangepicker-bs3.css','Inspinia/css/plugins/select2/select2.min.css','Inspinia/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css','Inspinia/css/animate.css','Inspinia/css/style.css']) ?>
    <?= $this->Html->script(['Inspinia/js/jquery-2.1.1.js','Inspinia/js/bootstrap.min.js','Inspinia/js/inspinia.js','Inspinia/js/plugins/pace/pace.min.js','Inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js','Inspinia/js/plugins/chosen/chosen.jquery.js','Inspinia/js/plugins/jsKnob/jquery.knob.js','Inspinia/js/plugins/jasny/jasny-bootstrap.min.js','Inspinia/js/plugins/datapicker/bootstrap-datepicker.js','Inspinia/js/plugins/nouslider/jquery.nouislider.min.js','Inspinia/js/plugins/switchery/switchery.js','Inspinia/js/plugins/ionRangeSlider/ion.rangeSlider.min.js','Inspinia/js/plugins/iCheck/icheck.min.js','Inspinia/js/plugins/metisMenu/jquery.metisMenu.js','Inspinia/js/plugins/colorpicker/bootstrap-colorpicker.min.js','Inspinia/js/plugins/daterangepicker/daterangepicker.js','Inspinia/js/plugins/select2/select2.full.min.js','Inspinia/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js']) ?>

    <?= $this->Html->css('style.css') ?>




</head>
<body class="pace-done">

    <?= $this->Flash->render() ?>


        <?= $this->fetch('content') ?>

    <footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    </div>
</body>
</html>
