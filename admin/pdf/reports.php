
<?php
//call the FPDF library
require('fpdf17/fpdf.php');


$conn = mysqli_connect("localhost","root","","unitel_co");


class mypdf extends fpdf
{

	function header()
	{
		$this->SetFont('Arial','B',14);
		$this->Cell(276 ,5,'Unitel co',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276 ,10,'Street Address',0,0,'C');
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
		$this->Cell(100 ,10,'ID',1,0,'C');
		$this->Cell(130 ,10,'Name',1,0,'C');
		$this->Cell(20 ,10,'Price',1,0,'C');
		$this->Cell(20 ,10,'Quantity',1,0,'C');
		$this->Ln();

	}
	function view($conn)
	{
		$this->SetFont('Times','',12);
		$sql = "select p_id,p_name,price,p_quantity from tbl_product";
		$retval = mysqli_query($conn,$sql);


		while($row=mysqli_fetch_assoc($retval))
		{
			$this->Cell(100 ,10,$row['p_id'],1,0,'L');
			$this->Cell(130 ,10,$row['p_name'],1,0,'L');
			$this->Cell(20 ,10,$row['price'],1,0,'L');
			$this->Cell(20 ,10,$row['p_quantity'],1,0,'L');
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
