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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
        
     <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">  -->

    </title>
    <?= $this->Html->meta('icon') ?>

   <?=  $this->Html->css('style'); ?>
   <?=  $this->Html->css('animate'); ?>
   <?=  $this->Html->css('bootstrap.min'); ?>
   <?=  $this->Html->css('plugins/iCheck/custom'); ?>
   <?=  $this->Html->css('font-awesome/css/font-awesome'); ?>
   <?=  $this->Html->css('plugins/datapicker/datepicker3'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
        
    <?= $this->Flash->render() ?>
    <!-- side navigation start -->
    
    <!-- side navigation ends -->

      
        

        <?= $this->fetch('content') ?>


        
    
    </div>
       <?=  $this->Html->script('jquery-2.1.1'); ?>
       <?=  $this->Html->script('bootstrap.min'); ?>
       <?=  $this->Html->script('plugins/metisMenu/jquery.metisMenu'); ?>
       <?=  $this->Html->script('plugins/slimscroll/jquery.slimscroll.min'); ?>
       <?=  $this->Html->script('inspinia'); ?>
       <?=  $this->Html->script('plugins/pace/pace.min'); ?>
       <?=  $this->Html->script('plugins/iCheck/icheck.min'); ?>
       <?=  $this->Html->script('plugins/datapicker/bootstrap-datepicker'); ?>
       <!-- Flot -->
       <?=  $this->Html->script('plugins/flot/jquery.flot'); ?>
       <?=  $this->Html->script('plugins/flot/jquery.flot.tooltip.min'); ?>
       <?=  $this->Html->script('plugins/flot/jquery.flot.resize'); ?>
       <?=  $this->Html->script('plugins/flot/jquery.flot.pie'); ?>
       <?=  $this->Html->script('plugins/flot/jquery.flot.time'); ?>
       <!-- ChartJS-->
       <?=  $this->Html->script('plugins/chartJs/Chart.min'); ?>
       
    
       
    

       
       <!-- <?=  $this->Html->script('demo/peity-demo'); ?> -->
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
                $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            });
            //Flot Bar Chart
$(function() {
    var barOptions = {
        series: {
            bars: {
                show: true,
                barWidth: 0.6,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.8
                    }, {
                        opacity: 0.8
                    }]
                }
            }
        },
        xaxis: {
            tickDecimals: 0
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "x: %x, y: %y"
        }
    };
    var barData = {
        label: "bar",
        data: <?php echo json_encode($coordinates); ?>
    };
    $.plot($("#flot-bar-chart"), [barData], barOptions);




});
$(function() {
    var barOptions = {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.0
                    }]
                }
            }
        },
        xaxis: {
            tickDecimals: 0
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "x: %x, y: %y"
        }
    };
    var barData = {
        label: "bar",
        data: <?php echo json_encode($coordinatesDay); ?>
    };
    $.plot($("#flot-line-chart"), [barData], barOptions);

});
        </script>
        
</body>
</html>
