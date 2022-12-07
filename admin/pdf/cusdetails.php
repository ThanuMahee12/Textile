
<?php
//call the FPDF library
require('fpdf17/fpdf.php');


$conn = mysqli_connect("localhost","root","","online_shopping");


class mypdf extends fpdf
{

	function header()
	{
		$this->SetFont('Arial','B',14);
		$this->Cell(276 ,5,'Unitel co',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276 ,10,'WijeyaRama Mawatha',0,0,'C');
		$this->Ln(20);
				

	}
	function footer()
	{
			$this->SetY(-15);
			$this->SetFont('Arial','',8);
			$this->Cell(0 ,10,'Page '.$this->PageNo(),0,0,'C');


	}
	function headertable()
	{
		$this->SetFont('Times','B',12);
		$this->Cell(40 ,10,'UserName',1,0,'C');
		$this->Cell(40 ,10,'First Name',1,0,'C');
		$this->Cell(40 ,10,'Last Name',1,0,'C');
		$this->Cell(50 ,10,'Address',1,0,'C');
		$this->Cell(30 ,10,'City',1,0,'C');
		
		$this->Cell(30 ,10,'Country',1,0,'C');
		$this->Cell(25 ,10,'Postal Code',1,0,'C');
		
		$this->Ln();

	}
	function view($conn)
	{
		$this->SetFont('Times','',12);
		$sql = "select * from cus_details";
		$retval = mysqli_query($conn,$sql);


		while($row=mysqli_fetch_assoc($retval))
		{
			$this->Cell(40 ,10,$row['UserName'],1,0,'L');
			$this->Cell(40 ,10,$row['FirstName'],1,0,'L');
			$this->Cell(40 ,10,$row['LastName'],1,0,'L');
			$this->Cell(50 ,10,$row['Address'],1,0,'L');
			$this->Cell(30 ,10,$row['City'],1,0,'L');
			$this->Cell(30 ,10,$row['Country'],1,0,'L');
			$this->Cell(25 ,10,$row['Postalcode'],1,0,'L');
			$this->Ln();
		}
	}
}



$pdf = new mypdf();
$pdf ->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headertable();
$pdf->view($conn);
$pdf->Output();
?>
