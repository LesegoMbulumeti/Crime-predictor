<?php
$conn = new mysqli("sql210.epizy.com", "epiz_34121291", "zYvP2EB3S099guV","epiz_34121291_crime_p");



require('../fpdf/fpdf/fpdf.php');

//echo ('hello');



if(isset($_POST['filter_report'])){

    $officer = $_POST['officer'];
    $crime_type = $_POST['crime_type'];
    $location = $_POST['location'];




if($location === 'all'){
        $sql = "SELECT * FROM location";
        $results = mysqli_query($conn, $sql);
}else {
      $sql = "SELECT * FROM location WHERE location_id = '$location'";
        $results = mysqli_query($conn, $sql);

}

      
        $loc_name = mysqli_fetch_assoc($results);
        $loc_name = $loc_name['name'];
    //    print_r('the location is  : ' . $loc_name);
      
        $loc = substr($loc_name, 0, strpos($loc_name, ","));


    if($officer != 'all' && $crime_type != 'all' && $location != 'all'){
        //get filtered crime
        $sql = "SELECT * FROM case_info WHERE officer_id_no = '$officer' AND crime_type_id = '$crime_type' AND location LIKE '%$loc%'";
        $cases = mysqli_query($conn, $sql);

 
    }else if($officer != 'all' && $crime_type === 'all' && $location === 'all'){
        $sql = "SELECT * FROM case_info WHERE officer_id_no = '$officer'";
        $cases = mysqli_query($conn, $sql);


    }else if($officer === 'all' && $crime_type != 'all' && $location === 'all'){
        $sql = "SELECT * FROM case_info WHERE crime_type_id = '$crime_type'";
        $cases = mysqli_query($conn, $sql);


    }else if($officer === 'all' && $crime_type === 'all' && $location != 'all'){
        $sql = "SELECT * FROM case_info WHERE location LIKE '%$loc%'";
        $cases = mysqli_query($conn, $sql);


    }else if($officer != 'all' && $crime_type != 'all' && $location === 'all'){
        $sql = "SELECT * FROM case_info WHERE officer_id_no = '$officer' AND crime_type_id = '$crime_type'";
        $cases = mysqli_query($conn, $sql);


    }else if($officer != 'all' && $crime_type === 'all' && $location != 'all'){
        $sql = "SELECT * FROM case_info WHERE officer_id_no = '$officer' AND location LIKE '%$loc%'";
        $cases = mysqli_query($conn, $sql);

        //filter by crime type & location 
    }else if($officer === 'all' && $crime_type != 'all' && $location != 'all'){
        $sql = "SELECT * FROM case_info WHERE crime_type_id = '$crime_type' AND location LIKE '%$loc%'";
        $cases = mysqli_query($conn, $sql);


    }else{
        $sql = "SELECT * FROM case_info";
        $cases = mysqli_query($conn, $sql);  
  
    }

}

$pdf = new FPDF('L', 'mm', "A4");

$pdf->AddPage();

$pdf->SetTitle('Crime Prediction', true);
$pdf->SetTextColor(91, 48, 131);
$pdf->SetDrawColor(91, 48, 131);
$pdf->Image('../assets/logo.PNG',240, 10, 50);



$pdf->SetFont('Arial', 'B', 23.5);
$pdf->Cell(0, 10, "CRIME REPORT", 0, 1);

if($crime_type === 'all'){
    $fd= 'All';
}else{
    $sql = "SELECT * FROM crime_type WHERE crime_type_id = '$crime_type'";
    $results_crimmmmm = mysqli_query($conn, $sql);
    $results_crimmmmm = mysqli_fetch_assoc($results_crimmmmm);
    $fd = $results_crimmmmm['crime_type'];
}

$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(0, 30, 'This document consists of ' . $fd . ' cases' , 0, 1);

$date = date("Y-m-d");

$pdf->Cell(0, -15, 'Date: ' . $date, 0, 1);


$pdf->Cell(60, 40, 'VICTIM', 0, 0);
$pdf->Cell(60, 40, 'OFFICER', 0, 0);
$pdf->Cell(50, 40, 'LOCATION', 0, 0);
$pdf->Cell(60, 40, 'CRIME TYPE', 0, 0);
$pdf->Cell(40, 40, 'DATE', 0, 1);


$pdf->Rect(10, 50, 280, 10);

while ($case = mysqli_fetch_assoc($cases)) {



    //get victim
    $v_id =  $case['criminal_id_n'];
    $sql = "SELECT * FROM victim WHERE id = '$v_id'";
    $victim = mysqli_query($conn, $sql);
    $victim = mysqli_fetch_assoc($victim);
    $pdf->Cell(60, -15, $victim['fname'] . ' ' . $victim['lname'] , 0, 0);

    //get officer
    $o_id =  $case['officer_id_no'];
    $sql = "SELECT * FROM officer WHERE officer_id = '$o_id'";
    $officer = mysqli_query($conn, $sql);
    $officer = mysqli_fetch_array($officer);

    $pdf->Cell(60, -15, $officer['fname'] . ' ' . $officer['lname'], 0, 0);
    $pdf->Cell(50, -15, $case['location'], 0, 0);

    //get crime type
    $c_id =  $case['crime_type_id'];
    $sql = "SELECT * FROM crime_type WHERE crime_type_id = '$c_id'";
    $crime = mysqli_query($conn, $sql);
    $crime = mysqli_fetch_array($crime);

    $pdf->Cell(60, -15, $crime['crime_type'], 0, 0);

    $pdf->Cell(40, -15, $case['date'], 0, 0);
    $pdf->Cell(30, 10, '', 0, 1);
}



$pdf->Output('', 'Crimes.pdf', true);


?>