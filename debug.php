<?php
	include_once("Log.inc.php");
	$spacer = "";
	$logger = new Logger("./log/server.log");
	$logger->trace("Debug page called");
	$loggerLevel=$logger->getLogLevel();
	$logger->info("Old log level: " . $loggerLevel);
	$logger->setLogLevel(5);

function array2html($custArray) {
	global $logger;
	
	global $spacer;
	$strResponse="";
	if (is_array($custArray)) {
		$logger->trace("Array accepted");
		foreach($custArray as $key => $value) {
			if (is_array($value)) {
				$spacer = $spacer . "&nbsp;&nbsp;";
				$strResponse = $strResponse . "\"" . $key . "\"" . " {<br/> " . array2html($value)."}, <br/>";
				$spacer = substr($spacer, 0, -12);
			} elseif (is_string($value)) {
				$strResponse = $strResponse . $spacer . "\"$key\" => \"$value\",<br/>";
			} else {
				$strResponse = $strResponse . $spacer . "\"$key\" => $value,<br/>";
			}//end if
		}//end foreach
	} else {
		$logger->trace("Array denied");
		return false;
	}//end if
	return $strResponse;
}//end function

//	echo (array2html($debugArray));
//	$logger->trace("Debug page ended");
?>

<div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
  <div class="panel panel-default">
    <div id="headingOne" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="">
              REQUEST
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse in" id="collapseOne" aria-expanded="true" style="">
      <div class="panel-body">
            <?php 
            	echo (array2html($_REQUEST));
				$logger->trace('Debug $_REQUEST');
			?>
          </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div id="headingTwo" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseTwo" aria-expanded="false" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed">
              POST
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
            <?php 
            	echo (array2html($_POST));
				$logger->trace('Debug $_POST');
			?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div id="headingThree" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseThree" aria-expanded="false" href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed">
              GET
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseThree" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
            <?php 
            	echo (array2html($_GET));
				$logger->trace('Debug $_GET');
			?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div id="headingFour" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseFour" aria-expanded="false" href="#collapseFour" data-parent="#accordion" data-toggle="collapse" class="collapsed">
              COOKIE
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingFour" role="tabpanel" class="panel-collapse collapse" id="collapseFour" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
            <?php 
            	echo (array2html($_COOKIE));
				$logger->trace('Debug $_COOKIE');
			?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div id="headingFive" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseFive" aria-expanded="false" href="#collapseFive" data-parent="#accordion" data-toggle="collapse" class="collapsed">
              ENV
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingFive" role="tabpanel" class="panel-collapse collapse" id="collapseFive" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
            <?php 
            	echo (array2html($_ENV));
				$logger->trace('Debug $_ENV');
			?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div id="headingSix" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseSix" aria-expanded="false" href="#collapseSix" data-parent="#accordion" data-toggle="collapse" class="collapsed">
              FILES
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingSix" role="tabpanel" class="panel-collapse collapse" id="collapseSix" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
            <?php 
            	echo (array2html($_FILES));
				$logger->trace('Debug $_FILES');
			?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div id="headingSeven" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseSeven" aria-expanded="false" href="#collapseSeven" data-parent="#accordion" data-toggle="collapse" class="collapsed">
              SESSION
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingSeven" role="tabpanel" class="panel-collapse collapse" id="collapseSeven" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
            <?php 
            	echo (array2html($_SESSION));
				$logger->trace('Debug $_SESSION');
			?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div id="headingEight" role="tab" class="panel-heading">
      <h4 class="panel-title">
        <a aria-controls="collapseEight" aria-expanded="false" href="#collapseEight" data-parent="#accordion" data-toggle="collapse" class="collapsed">
              SERVER
            </a>
      </h4>
    </div>
    <div aria-labelledby="headingEight" role="tabpanel" class="panel-collapse collapse" id="collapseEight" aria-expanded="false" style="height: 0px;">
      <div class="panel-body">
            <?php 
            	echo (array2html($_SERVER));
				$logger->trace('Debug $_SERVER');
			?>
      </div>
    </div>
  </div>
</div>
<?php $logger->setLogLevel($loggerLevel); ?>