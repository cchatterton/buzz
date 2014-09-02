<?php

function fx_detector($ua) {

	echo '		<div data-alert class="alert-box info" style="font-size:0.8em;font-family:Courier, monospace;margin-bottom: 0px!important;">'."\n";


	foreach ($ua as $key => $value) {
		if ($value == 1) {
			$value = '<span class="yes">yes</span>';
		} elseif (strlen($value)==0) {
			$value ='<span class="no">no</span>';
		} else {
			$value = '<span class="blue">'.$value.'</span>';
		}
			echo '<div style="display:block;height:35px;"><span style="display:inline-block;width:150px;">'.$key.': </span>'.$value.'</div>'."\n";
	}

echo '			<a href="#" class="close">&times;</a>'."\n";
	echo '</div>'."\n";

	return fx_encrypt('encrypt',serialize($ua));

}


?>