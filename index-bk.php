<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Media Query Generator</title>

<link rel="stylesheet" href="themes/dexpense.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="css/jquery.mobile.custom.structure.min.css" />

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>

<style type="text/css">
.TextArea{
	height:150px !important;
}
.TextArea2{
	height:250px !important;
}
</style>
<script language="javascript" type="text/javascript">
function GenerateQuerry(){

	// Resolution Sizes
	
	
	var rs320 = document.getElementById('resolution-size-a').checked ;
	var rs360 = document.getElementById('resolution-size-b').checked ;
	var rs640 = document.getElementById('resolution-size-c').checked ;
	var rs768 = document.getElementById('resolution-size-d').checked ;
	var rs800 = document.getElementById('resolution-size-e').checked ;
	var rs980 = document.getElementById('resolution-size-f').checked ;
	var rs1024 = document.getElementById('resolution-size-g').checked ;
	var rs1152 = document.getElementById('resolution-size-h').checked ;
	var rs1280 = document.getElementById('resolution-size-i').checked ;
	var rs1920 = document.getElementById('resolution-size-j').checked ;
	
	// User CSS
	var UserCss = document.getElementById('css').value;
	
	// Media Query for
	var mqfor = $("input:radio[name='max-min']:checked").val();
	
	// Generated Querry Result
	var Mq = document.getElementById('mq');
	
	/*if ( rs320 == true ){
		Mq.value += '\n' + GenerateCss('320',mqfor,UserCss);
	}*/
		
	var RSize = document.forms[0].resolutionsize;
	var txt = "";
	var i;
	for (i = 0; i < RSize.length; i++) {
		if (RSize[i].checked) {
			Mq.value += '\n' + GenerateCss(RSize[i].value,mqfor,UserCss);
		}
	}	

	$("textarea").textinput();
	$("textarea").textinput( "refresh" );
	
	
}

function GenerateCss(ResolutionSize,Mqfor,css){
	var MediaQuerryfor = '';
	var Css = '';
	var MediaType = $('#mediatype option:selected').text() + " " + 	document.getElementById('token').value;
	var MaxWidth = $('#max-width option:selected').text();
	
	if ( Mqfor == 'min'){
		MediaQuerryfor = '@media ' + MediaType + ' ( min-width: ' + ResolutionSize + 'px ) {\n';
	}
	
	if ( Mqfor == 'max'){
		MediaQuerryfor = '@media ' + MediaType + ' ( max-width: ' + ResolutionSize + 'px ) {\n';
	}
	
	if ( Mqfor == 'both'){
		MediaQuerryfor = '@media ' + MediaType + ' ( min-width: ' + ResolutionSize + 'px ) and ( max-width: ' + MaxWidth + 'px ) {\n';
	}
	
	Css = MediaQuerryfor + css + '\n}';
	
	return Css;
}
function DoAnimation(AnimationType){
	if ( AnimationType == 'hide'){
		$( "#min-max" ).fadeOut( "slow" );	
	}else{
		$( "#min-max" ).fadeIn( "slow" );
	}
}
$(document).ready(function(){
	DoAnimation('hide');
	$("#both").click(function(){
		DoAnimation('show');
	});
	$("#min, #max, #resetbtt").click(function(){
		DoAnimation('hide');
	});
	
});
</script>
</head>
<body style="background-color:#e6e6e6 !important;">
<div data-role="page">
    <div data-role="content" data-theme="a">
        <form name="myform" action="#" data-ajax="false">
            <fieldset data-role="controlgroup" data-type="horizontal" >
                <legend>Media Querry of</legend>                
                <input type="checkbox" name="resolutionsize" id="resolution-size-a" value="320" checked>
                <label for="resolution-size-a">320</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-b" value="360">
                <label for="resolution-size-b">360</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-c" value="640">
                <label for="resolution-size-c">640</label>                
                <input type="checkbox" name="resolutionsize" id="resolution-size-d" value="768">
                <label for="resolution-size-d">768</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-e" value="800">
                <label for="resolution-size-e">800</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-f" value="980">
                <label for="resolution-size-f">980</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-g" value="1024">
                <label for="resolution-size-g">1024</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-h" value="1152">
                <label for="resolution-size-h">1152</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-i" value="1280">
                <label for="resolution-size-i">1280</label>
                <input type="checkbox" name="resolutionsize" id="resolution-size-j" value="gallery">
                <label for="resolution-size-j">1920</label>
            </fieldset>
            
            <fieldset data-role="controlgroup" data-type="horizontal">
            	<legend>Media Type</legend>
                <select id="mediatype" data-native-menu="false">
                    <option value="all">all</option>
                    <option value="screen" selected="">screen</option>
                    <option value="braille">braille</option>
                    <option value="embossed">embossed</option>
                    <option value="handheld">handheld</option>
                    <option value="print">print</option>
                    <option value="projection">projection</option>
                    <option value="speech">speech</option>
                    <option value="tty">tty</option>
                    <option value="tv">tv</option>
                </select>
                
                <select id="token">
                    <option value="" selected="">none</option>
                    <option value="only">only</option>
                    <option value="not">not</option>
                </select>
                
            </fieldset>
            
            <fieldset data-role="controlgroup" data-type="horizontal">
                <legend>Media Query for</legend>
                <input type="radio" name="max-min" id="min" value="min" checked="checked">
                <label for="min">min</label>
                <input type="radio" name="max-min" id="max" value="max">
                <label for="max">max</label>
                <input type="radio" name="max-min" id="both" value="both">
                <label for="both">Both</label>
            </fieldset>
            
            <fieldset id="min-max" data-role="controlgroup" data-type="horizontal">
    			<legend>Maximum Width</legend>
                <label for="max-width">Maximum Width:</label>
                <select name="max-width" id="max-width" data-native-menu="false">
                    <option value="320">320</option>
                    <option value="360">360</option>
                    <option value="640">640</option>
                    <option value="768">768</option>
                    <option value="800">800</option>
                    <option value="980">980</option>
                    <option value="1024">1024</option>
                    <option value="1152">1152</option>
                    <option value="1280">1280</option>
                    <option value="1920">1920</option>
                </select>
            </fieldset>

            <label for="css">Css:</label>
            <textarea class="TextArea" cols="" rows="" data-inline="true"  name="css" id="css">
            label{
                    margin-top: 10px !important;
            }
            </textarea>            
            
			<input data-inline="true" type="button" value="Generate" onClick="GenerateQuerry()" />&nbsp;&nbsp;&nbsp;<input data-inline="true" id="resetbtt" type="reset" value="Clear All" />
            
			<label for="Mq">Media Query:</label>
            <textarea cols="40" rows="8" name="mq" id="mq" data-inline="true" ></textarea>
            
        </form>
	</div>
</div>
</body>
</html>