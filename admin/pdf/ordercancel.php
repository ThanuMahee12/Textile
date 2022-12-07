
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
		$this->Cell(50 ,10,'UserName',1,0,'C');
		$this->Cell(20 ,10,'OrderId',1,0,'C');
		$this->Cell(60 ,10,'ProdcutName',1,0,'C');
		$this->Cell(20 ,10,'Price',1,0,'C');
		$this->Cell(20 ,10,'Quantity',1,0,'C');
		
		$this->Cell(20 ,10,'Total',1,0,'C');
		$this->Cell(55 ,10,'Order Date',1,0,'C');
		$this->Cell(30 ,10,'Order Status',1,0,'C');
		$this->Ln();

	}
	function view($conn)
	{
		$this->SetFont('Times','',12);
		$sql = "select * from tbl_order where order_status='canceled'";
		$retval = mysqli_query($conn,$sql);


		while($row=mysqli_fetch_assoc($retval))
		{
			$this->Cell(50 ,10,$row['uname'],1,0,'L');
			$this->Cell(20 ,10,$row['order_id'],1,0,'L');
			$this->Cell(60 ,10,$row['p_name'],1,0,'L');
			$this->Cell(20 ,10,$row['price'],1,0,'L');
			$this->Cell(20 ,10,$row['p_quantity'],1,0,'L');
			$this->Cell(20 ,10,$row['total'],1,0,'L');
			$this->Cell(55 ,10,$row['order_date'],1,0,'L');
			$this->Cell(30 ,10,$row['order_status'],1,0,'L');
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
