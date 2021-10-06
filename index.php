<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>location</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="span3" style="margin-left: 40%; margin-top:7%;">
    <h2>Get city and state from pin code</h2>
    <form method="POST">
        <label>Enter Pincode</label>
        <input type="text" class="span3" name="pincode" id="pincode">
        <input type="button" value="Get data" onclick="getdata()" class="btn btn-primary pull-left"><br><br>
        <input type="text" class="span3" id="circle" disabled placeholder="Circle">
        <input type="text" class="span3" id="district" disabled placeholder="District">
        <input type="text" class="span3" id="state" disabled placeholder="State">
    </form>
</div>

<script>
    function getdate(){
        var pincode = jQuery('#pincode').val();
        if(pincode == ''){
            jQuery('#circle').val('No Record Found');
            jQuery('#district').val('No Record Found');
            jQuery('#state').val('No Record Found');
        }else{
            jQuery.ajax({
                url:"data.php",
                type:"post",
                data:"pincode=" +pincode,
                success:function(data){
                    if(data == 'No')
                    {
                        jQuery('#circle').val('wrong input');
                        jQuery('#district').val('wrong input');
                        jQuery('#state').val('wrong input');
                    }else{
                        var getData = $.parseJSON(data);
                        jQuery('#circle').val(getData.circle);
                        jQuery('#district').val(getData.district);
                        jQuery('#state').val(getData.state);
                    }
                }
            });
        }
    }
    </script>
  </body>
</html>