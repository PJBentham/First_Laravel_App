<?php
//header("refresh: 3; form.html");
//If this code is used please leave this header in place
//Written by Paul Bentham, pjbentham@gmail.com
set_time_limit(0);
ignore_user_abort(1);
ini_set('memory_limit','512M');
error_reporting(E_ALL); 
ini_set('display_errors', 1);

require_once('fpdf/fpdf.php');
require_once('phpmailer/PHPMailer-master/class.phpmailer.php');

$Customer = "Customer:\t".$_POST["Customer"]."\n";
$JLoc = "Job Location:\t".$_POST["Location"]."\n";
$PNumber = "PO Number (if known...):\t".$_POST["PNumber"]."\n";
$JNumber = "Job Number:\t".$_POST["JNumber"]."\n";
$Date1 = "Date:\t".$_POST["Date1"]."\n";
$Value = "Value of Receipt:\t".$_POST["Receipt"]."\n";
$Declaration = "I confirm that the above job has been completed to my satisfaction and Example Company are authorised to raise the final invoice.\n";
$Name = "Print Name:\t".$_POST["Name"]."\n";
$Position = "Position in Company:\t".$_POST["Position"]."\n";
$Date2 = "Date of Signature:\t".$_POST["Date2"]."\n";
$Data = $Customer.$JLoc.$PNumber.$JNumber.$Date1.$Value.$Declaration.$Name.$Position.$Date2;
// make sure the image-data exists and is not empty
// php is particularly sensitive to empty image-data 
if ( isset($_POST["signature"]) && !empty($_POST["signature"]) ) {    

    // get the dataURL
    $dataURL = $_POST["signature"];  

    // the dataURL has a prefix (mimetype+datatype) 
    // that we don't want, so strip that prefix off
    $parts = explode(',', $dataURL);  
    $data = $parts[1];  

    // Decode base64 data, resulting in an image
    $data = base64_decode($data);  

    // create a temporary unique file name
    $file = uniqid() . '.png';

    // write the file to the upload directory
    $success = file_put_contents($file, $data);

    // return the temp file name (success)
    // or return an error message just to frustrate the user (kidding!)
    //print $success ? $file."<br>" : 'Unable to save this image.';
}
else {
  print "Unable to save this image.";
}

$pdf = new FPDF();
$pdf->AddPage('P','A4');
$pdf->SetFont('Helvetica','B',10);
$pdf->Image('http://www.marketingpilgrim.com/wp-content/uploads/2013/05/Your-Logo-Here-Black-2.jpg',10,10,50,50,'jpg');
$pdf->SetXY(70,28);
$pdf->Cell(0,0,"Example Company",0,0,'C');
$pdf->SetXY(70,40);
$pdf->Cell(0,0,"Job Completion Certificate",0,0,'C');
$pdf->SetY(60);
$pdf->Write(14,$Data);
$pdf->SetY(225);
if(! empty($_POST["signature"])){
$pdf->Image($file,null,null,0,0,'png');
};

// $allowedExts = array("gif", "jpeg", "jpg", "JPG", "JPEG", "PNG","png");
// $pictures = array("file1", "file2", "file3");
// $counter = 10;

// foreach ($pictures as $value)
// {
// $temp = explode(".", $_FILES[$value]["name"]);
// $extension = end($temp);	
// if ( ! empty($_FILES[$value]["tmp_name"])
// &&($_FILES[$value]["size"] < 4000000)
// && in_array($extension, $allowedExts))
// {
//   move_uploaded_file($_FILES[$value]["tmp_name"],$_FILES[$value]["name"]);
//   $pdf->Image($_FILES[$value]["name"],25,$counter,80,80);
//   unlink($_FILES[$value]["name"]);
//   $counter += 90;
// }
// else
//   {
//   print $value." is either Invalid or Not Attached<br>";
//   }	
// }

$pdf->Output($_POST["Customer"]."_".$_POST["Location"].'.pdf', 'F');

// print "Thanks,<br> Your sign off has been succesfully submitted.<br>"; 

$signoff = $_POST["Customer"]."_".$_POST["Location"].'.pdf';
header("Content-disposition: attachment;filename=$signoff");
readfile($signoff);

$mail = new PHPMailer(); // defaults to using php "mail()"
$mail->AddReplyTo("noreply@paulbentham.com","Paul Bentham");
$mail->SetFrom('noreply@paulbentham.com', 'Paul Bentham');
$mail->AddReplyTo("noreply@paulbentham.com","Paul Bentham");
$address = "pjbentham@gmail.com";
$mail->AddAddress($address, "Paul Bentham");
$mail->Subject    = "Sign off ".$_POST["Customer"]." ".$_POST["Location"];
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->MsgHTML("Sign off attached for ".$_POST["Customer"]." ".$_POST["Location"]);
$mail->AddAttachment($signoff);

// if(!$mail->Send()) {
//   echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//   echo "E-mail sent!";
// }
unlink($signoff);
unlink($file);
?>