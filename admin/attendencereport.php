<?php include "../db.php" ?>
<?php
require("../admin/fpdf182/fpdf.php");

// declare FPDF class obj
$pdf = new FPDF();
$pdf->SetFont('Arial', 'B', 14);			//set font
$pdf->AddPage();											//add page

$header = ['S.No', 'Name', 'Roll No', 'Year', 'Month', 'Date', 'Day', 'Status'];

// if any fiield missing
if (!isset($_POST['fromMonth']) || !isset($_POST['fromDate']) || !isset($_POST['fromYear']) || !isset($_POST['toDate'])) {
	$pdf->Cell(40, 10, 'please provide valid information');
	$pdf->Ln();
	$pdf->Cell(40, 10, 'check if u have filled all fields');
}
// else make a report for attendence
else {

	$reportDates = [$_POST['fromMonth'], intval($_POST['fromDate']), intval($_POST['fromYear']), intval($_POST['toDate'])];

	// extract data from database
	global $connection;
	$query = "SELECT * FROM attendence WHERE month='$reportDates[0]' AND year=$reportDates[2] AND date BETWEEN $reportDates[1] AND $reportDates[3]";
	$result = mysqli_query($connection, $query);

	$pdf->SetFont('Arial', 'B', 14);			//font
	$pdf->SetTextColor(255, 255, 255);		//text color
	$pdf->SetDrawColor(185, 183, 183);		//borders
	$pdf->SetFillColor(69, 169, 81);			//fill/bg color
	$pdf->SetLineWidth(.1);								//line/border width


	// first hedaers
	for ($i = 0; $i < count($header); $i++) {
		$pdf->Cell(24, 8, $header[$i], 1, 0, 'C', true);
	}

	//new line
	$pdf->Ln();

	// then other data
	$pdf->SetFont('Arial', '', 12);			//again change font for body/cells
	$pdf->SetTextColor(0, 0, 0);

	$i = 1;
	while ($row = mysqli_fetch_assoc($result)) {
		if ($i % 2 == 0) {
			$pdf->SetFillColor(224, 235, 255);
		} else {
			$pdf->SetFillColor(255, 255, 255);
		}
		$pdf->Cell(24, 8, $i, 1, 0, 'C', true);
		$pdf->Cell(24, 8, $row['username'], 1, 0, 'C', true);
		$pdf->Cell(24, 8, $row['rollNo'], 1, 0, 'C', true);
		$pdf->Cell(24, 8, $row['year'], 1, 0, 'C', true);
		$pdf->Cell(24, 8, $row['month'], 1, 0, 'C', true);
		$pdf->Cell(24, 8, $row['date'], 1, 0, 'C', true);
		$pdf->Cell(24, 8, $row['day'], 1, 0, 'C', true);
		$pdf->Cell(24, 8, $row['attendence_status'], 1, 0, 'C', true);
		$i++;
		$pdf->Ln();
	}

	if (mysqli_num_rows($result) == 0) {
		$pdf->SetFillColor(200, 0, 0);
		$pdf->SetTextColor(255, 255, 255);
		$pdf->Ln();
		$pdf->Cell(192, 15, 'No Attendence Found!', 1, 0, 'C', true);
	}
}

$pdf->Output();
