<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculate Investment</title>
    <?php require_once('header.php'); ?>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <b>Calculate Investment</b>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form method="post" id="chkInvestmentForm" action="<?php echo base_url();?>index.php/welcome/processInvestment" enctype="multipart/form-data">
                            <div class="row js-rowinvest">
                                <div class="col-md-12" id="investdiv_1">
                                    <div class="row">
                                        <div class="col-md-6 formdiv form-group mt15">
                                            <label>Date</label>
                                            <p><input type="text" id="txtDate" name="txtDate" placeholder="Date" value="" /></p>
                                        </div>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-6 formdiv form-group mt15">
                                            <label>Investment Amount</label>
                                            <p><input type="text" id="txtAmount" name="txtAmount" placeholder="Investment Amount" value="" /></p>
                                        </div>
                                     </div>
                                </div>
                            </div>       
                            <div class="height17"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 pad0">
                                        <button type="submit" id="btnFetchData" class="btnFetchData btnSave">Fetch Details</button>
                                    </div>
                                </div>
                            </div>
                            <div class="errorMsg"></div>
                        </form>
                    </div>
                </div><!-- /.panel-body-->
            </div><!-- /.panel-default -->
        </div><!--/.col-->
    </div><!--/.row-->
</div><!--/.main-->
<script type="text/javascript">
$(document).ready(function(){
    $("#txtDate").datepicker({
        format: 'dd-M-yyyy',
        autoclose: true
    });

    $("#chkInvestmentForm").validate({
        errorElement:'div',
        rules: {
            txtDate: "required",
            txtAmount: "required"
        },
        messages: {
            txtDate: "Please enter date",
            txtAmount: "Please enter amount"
        },
        submitHandler: function(response) {
            $.ajax({
                    url:"<?php echo $this->router->routes['process-calculate-investment'];?>",
                    type:"POST",
                    dataType:"JSON",
                    data:{
                       txtDate:$("#txtDate").val(),
                       txtAmount:$("#txtAmount").val()
                    },
                    success:function(response)
                    {
                        if(response.error == false)
                        {
                            alert("Today's investment "+response.todayInvestment+" and previous investment "+response.prevInvestment);
                        }
                        else
                        {
                            return false;
                        }
                    },
                error: function (error) {
                   $(".errorMsg").html('error: ' + eval(error));
                }
            });
        }
    });
});
</script>
</body>
</html>