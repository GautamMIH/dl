<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['session_id'])){
    header('Location: index.php');
}
$sessionid = $_SESSION['session_id'];

$querysel = "SELECT * FROM userdata WHERE sessionid = '$sessionid'";
$result = mysqli_query($conn, $querysel);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$id = $row['ID'];
$fname = $row['FName'];
$mname = $row['MName'];

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Get form data from $_POST or $_GET, depending on your setup

$usphone = $_SESSION['usphone'];
$category = $_SESSION['category'];
$ovdate = $_SESSION['ovdate'];
$olocation = $_SESSION['olocation'];
$wn = $_SESSION['wn'];
$wr = $_SESSION['wr'];
$tempadd = $_SESSION['tempadd'];
$nlide = $_SESSION['nlid'];

// Retrieve other form fields

// Create a new TCPDF instance
$pdf = new TCPDF();

// Set PDF properties
$pdf->SetCreator('DOL');
$pdf->SetAuthor('DOL');
$pdf->SetTitle('New License Data');
$pdf->SetSubject('PDF Data');


$pdf->SetHeaderData('/images/gov-logo.png', 60, 'Government Of Nepal', 'Electronic Driving License System');

// Set header font and font size
$pdf->setHeaderFont(['helvetica', '', 10]);




// Add a page
$pdf->AddPage();

// Set font and font size
$pdf->SetFont('helvetica', '', 13);

$centerX = ($pdf->GetPageWidth() - $pdf->GetStringWidth($name)) / 2;

// Write content to the PDF

// Add other form fields to the PDF

$dataTable = '<table style="height: 200px;">
                <tr >
                    <td style="height: 50px;"></td>
                    <td style="height: 50px;"></td>
                </tr>
                <tr >
                    <td style="height: 25px;"><strong>New License ID:</strong></td>
                    <td style="height: 25px;">' . $nlide. '</td>
                </tr>
                <tr >
                    <td style="height: 25px;"><strong>Name:</strong></td>
                    <td style="height: 25px;">' . $name . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Phone:</strong></td>
                    <td style="height: 25px;">' . $usphone . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Fathers Name:</strong></td>
                    <td style="height: 25px;">' . $fname . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Mothers Name:</strong></td>
                    <td style="height: 25px;">' . $mname . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Category:</strong></td>
                    <td style="height: 25px;">' . $category . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Office Visit Date:</strong></td>
                    <td style="height: 25px;">' . $ovdate . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Office Location:</strong></td>
                    <td style="height: 25px;">' . $olocation . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Witness Name:</strong></td>
                    <td style="height: 25px;">' . $wn . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Witness Relationship:</strong></td>
                    <td style="height: 25px;">' . $wr . '</td>
                </tr>
                <tr>
                    <td style="height: 25px;"><strong>Address:</strong></td>
                    <td style="height: 25px;">' . $tempadd . '</td>
                </tr>
                <!-- Add other form fields as needed -->
             </table>';

// Output the table to the PDF
$pdf->writeHTML($dataTable, true, false, true, false, '');


// Output the PDF to the browser
$pdf->Output('generated_pdf.pdf', 'I');
?>
