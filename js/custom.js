$(document).ready(function(){
	$("#resolution-size-0").prop("checked", true);
	$("#max").prop("checked", true);
	DoAnimation('hide');
	$("#both").click(function(){
		DoAnimation('show');
	});
	$("#min, #max, #resetbtt").click(function(){
		DoAnimation('hide');
	});
});

function GenerateQuerry(){
	// User CSS
	var UserCss = document.getElementById('css').value;
	
	// Media Query for
	var mqfor = $("input:radio[name='max-min']:checked").val();
	
	// Generated Querry Result
	var Mq = document.getElementById('mq');
		
	var RSize = document.forms[0].resolutionsize;
	var txt = "";
	var i;

	for ( i = RSize.length - 1; i >= 0; i--) {
		if (RSize[i].checked) {
			if ( Mq.value == "" ){
				Mq.value += GenerateCss(RSize[i].value, mqfor, UserCss);
			}else{
				Mq.value += '\n' + GenerateCss(RSize[i].value, mqfor, UserCss);
			}
		}
	}
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
	
	Css = MediaQuerryfor + css + '\n}\n';

	if ( $("#exp_for").prop("checked") ){
		return formatCss(Css);
	}else{
		return (Css);
	}	
}

function DoAnimation(AnimationType){
	if ( AnimationType == 'hide'){
		$( "#min-max" ).fadeOut( "slow" );	
	}else{
		$( "#min-max" ).fadeIn( "slow" );
	}
}

function ClearQuerry(){
	$("#mq").val('');
}


function ClearAll(){
	$("#mq").val('');
	document.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
		checkbox.checked = false;
	});
	document.getElementById('resolution-size-0').checked = true;

}

function formatCss(css) {
	let formatted = '';
	let indentLevel = 0;
	const indentSize = '	'; // 4 spaces for indentation
	// Break CSS into lines and process
	css.split(/[\r\n]+/).forEach(line => {
		line = line.trim();
		if (line.endsWith('}')) {
			indentLevel--; // Reduce indentation for closing braces
		}
		//console.log( "indentLevel: " + indentLevel );
		// Add the line with proper indentation
		if ( indentLevel <= 0 ){
			// do nothing
			formatted += line + '\n';
		}else{
			formatted += indentSize.repeat(indentLevel) + line + '\n';
		}

		if (line.endsWith('{')) {
			indentLevel++; // Increase indentation for opening braces
		}
	});
	return formatted.trim(); // Return formatted CSS
}