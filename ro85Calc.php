<?php 
const TOTAL_YEARS = 85;
$yearDate = date("Y");

$inputAge = 0;
$inputYears = 0;
$outputRetire = 0;
$calcAge = 0;
$calcYears = 0;

$inputAge = $_POST['inputAge'];
$inputYears = $_POST['inputYears'];

$calcAge = $inputAge;
$calcYears = $inputYears;
$totYears = TOTAL_YEARS;

$i = 0;

while ($i <= TOTAL_YEARS) {
	$outputRetire = $calcAge + $calcYears;
	$even = $outputRetire % 2;
		if ($even == 0){
			$outputRetire--;
			if ($outputRetire == TOTAL_YEARS) {
				$yearRetire = $yearDate + $i;
				$ageRetire = $calcAge;
			}			
		}
		else {
			if ($outputRetire == TOTAL_YEARS) {
				$yearRetire = $yearDate + $i;
				$ageRetire = $calcAge;
			}
		}
	$calcAge++;
	$calcYears++;
	$i++;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Retirement Calculator</title>
</head>
<body>
	<h1>Retirement Breakdown</h1>
	<p>
		You can retire when you are <?php echo $ageRetire  ?> years old. <br/>
		It will be in the year <?php echo $yearRetire?>.		
	</p>


		&laquo; <a href="http://www.mindjax.com/PHPTraining/RuleOf85.php">Back to Calculator</a>
</body>
</html>