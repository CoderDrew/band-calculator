<?php 
const BAND_FUND_PERCENTAGE = .1;
const CREW_PERCENTAGE = .5;

setlocale(LC_MONETARY, 'en_US');

$totPay = 0.0;
$totBandFund = 0.0;
$grossMemberPay = 0.0;
$netMemberPay = 0.0;
$totCrewPay = 0.0;

$totPay = $_POST['totPay'];
$subTotBandFund = $totPay * BAND_FUND_PERCENTAGE;
$grossMemberPay = ($totPay - $subTotBandFund) / 5;
$totCrewPay = $grossMemberPay * CREW_PERCENTAGE;
$distMemberPay  = $totCrewPay / 5;
$netMemberPay = $grossMemberPay - $distMemberPay;

function roundToFive($number, $decimal) {
    return floor($number / $decimal) * $decimal;
}


$remainderCrewPay = $totCrewPay - roundToFive($totCrewPay, 5);
$remainderMemberPay = $netMemberPay - roundToFive($netMemberPay, 5);
$totAddBandFund =  ($remainderMemberPay * 5) + $remainderCrewPay;
$totBandFund = $subTotBandFund + $totAddBandFund;

/*echo $totPay;  // 400
echo '<br />';
echo $subTotBandFund;  // 40
echo '<br />';
echo $grossMemberPay;  // 72
echo '<br />';
echo $totCrewPay; // 36
echo '<br />';
echo $distMemberPay;  // 7.2
echo '<br />';
echo $netMemberPay;  //64.80
echo '<br />';
echo $remainderCrewPay; // 1
echo '<br />';
echo $remainderMemberPay; // 4.8
echo '<br />';
echo $totAddBandFund; // 25
echo '<br />';
echo $totBandFund;*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Band Calculator</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>With Crew</h2>
				<div class="table-responsive">
					<table class="table">
							<tr>
								<td>Band Fund </td>
								<td><?php echo money_format('%(#10n',$totBandFund) ?></td> <?php // ?>
							</tr>
							<tr>
								<td>Member Pay </td>
								<td><?php echo money_format('%(#10n',roundToFive($netMemberPay, 5)) ?></td><?php // 70 ?>
							</tr>
							<tr>
								<td>Crew Pay </td>
								<td><?php echo money_format('%(#10n',roundToFive($totCrewPay, 5)) ?></td> <?php // 35 ?>
							</tr>
					</table>
				</div>
			</div>
			<div class="col-md-4">
				<h2>Without Crew</h2>
				<div class="table-responsive">	
					<table class="table">
							<tr>
								<td>Band Fund </td>
								<td><?php echo money_format('%(#10n',$totBandFund) ?></td>
							</tr>
							<tr>
								<td>Member Pay </td>
								<td><?php echo money_format('%(#10n',roundToFive($grossMemberPay, 5)) ?></td> <?php // 70 ?>
							</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
							<div style="margin: 15px 0">
					<a href="http://www.mindjax.com/PHPTraining/Brand307Calc.php" class="btn btn-primary">&laquo; Back to Calculator</a>
				</div>
		</div>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		
</body>
</html>