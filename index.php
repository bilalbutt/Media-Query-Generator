<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Media Query Generator!</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"></link>
<link rel="stylesheet" href="css/style.css" />
</head>
<body style="background-color:#e6e6e6 !important;">

<?php 
define( "APP_NAME", "Media Query Generator!");
$Columns = "40";
$Rows = "23";
$SampleCss = "";
$SampleCss .= "label {\n";
$SampleCss .= "\tmargin-top: 10px !important;\n";
$SampleCss .= "}";
?>

<form name="myform" action="#">

    <div class="container-xl">
        <div class="row g-2">

            <div class="col-12">
                <h1 class="text-center"><?php echo APP_NAME; ?></h1>
            </div>

            <div class="col-12">
                <h4>Media Query of</h4>
            </div>

            <div class="col-12">
                <div class="screensizes">
                    <?php $ScreenSize = array( "320", "375", "425", "475", "500", "550", "600", "640", "768", "800", "980", "1024", "1152", "1280", "1300", "1360", "1366", "1400", "1440", "1600", "1920" ); 
                    foreach( $ScreenSize as $ind => $val ){ ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="resolutionsize" id="resolution-size-<?php echo $ind; ?>" value="<?php echo $val; ?>">
                            <label class="form-check-label" for="resolution-size-<?php echo $ind; ?>"><?php echo $val; ?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

        <div class="clear-fix">&nbsp;</div>

        <div class="row g-3">

            <div class="col-12 col-sm-6 col-lg-3">
                <h4>Media Type</h4>
                <?php $MediaType = array( "All", "Screen", "Braille", "Embossed", "Handheld", "Print", "Projection", "Speech", "TTY", "TV"); ?>
                <select id="mediatype" name="mediatype" class="form-select form-select-lg mb-3" aria-label="Large select example">
                    <?php foreach( $MediaType as $ind => $val ){ ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <h4>Media Type</h4>
                <?php $MediaToken = array( "Only", "Not"); ?>
                <select id="token" name="token" class="form-select form-select-lg mb-3">
                    <?php foreach( $MediaToken as $ind => $val ){ ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <h4>Media Query For</h4>
                <?php $MediaFor = array( "Min", "Max", "Both");
                foreach( $MediaFor as $ind => $val ){ ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="max-min" id="<?php echo strtolower($val); ?>" value="<?php echo strtolower($val); ?>">
                        <label class="form-check-label" for="<?php echo strtolower($val); ?>"><?php echo $val; ?></label>
                    </div>
                <?php } ?>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div id="min-max">
                    <h4>Maximum Width</h4>
                    <?php $MaxWidth = array( "320", "375", "425", "475", "500", "550", "600", "640", "768", "800", "980", "1024", "1152", "1280", "1300", "1360", "1366", "1400", "1440", "1600", "1920" ); ?>
                    <select name="max-width" id="max-width" class="form-select form-select-lg mb-3">
                        <?php foreach( $MaxWidth as $ind => $val ){ ?>
                            <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div  class="btn-group" role="toolbar">
                    <button type="button" id="resetbtt" class="btn btn-danger btn-lg1 w-auto" onClick="ClearAll()" >Clear All</button>
                    <button type="button" id="clear" class="btn btn-warning btn-lg1 w-auto" onClick="ClearQuerry()">Clear Media Querries</button>
                    <button type="button" class="btn btn-success btn-lg1 w-auto" onClick="GenerateQuerry()">Generate</button>
                </div>
            </div>

            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="exp_for">
                    <label class="form-check-label" for="exp_for">Use Experimental CSS Formating</label>
                </div>
            </div>

            <div class="col-12  col-sm-6">
                <h4>CSS:</h4>
                <div class="mb-3">
                    <textarea class="form-control" cols="<?php echo $Columns; ?>" rows="<?php echo $Rows; ?>" name="css" id="css"><?php echo $SampleCss; ?></textarea>
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <h4>Media Query:</h4>
                <textarea class="form-control" cols="<?php echo $Columns; ?>" rows="<?php echo $Rows; ?>" name="mq" id="mq"></textarea>
            </div>

        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>