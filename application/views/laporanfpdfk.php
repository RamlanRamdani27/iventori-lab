 <?php

function kepsek(){
    $this->Ln(5);
    $this->Cell(130);
    $this->Cell(0,5,'UPT Politeknik',0,1,'L'); 
  }
  function cap($tangan){
    $this->Ln(5);
    // $this->Image($tangan,120,145,55,35);
  }
  function kepsek2(){
    $this->Ln(10);
    $this->Cell(130);
    $this->SetFont('Times','B',12);
    $this->Cell(0,5,'Samirah Rahayu,M.Kom',0,1,'L');
    $this->SetFont('Times','',12);
    $this->Cell(130);
    $this->Cell(0,5,'NIP.197308172002121002,',0,1,'L');
  }


   $pdf = new FPDF('L', 'pt', 'A4');
   $pdf->SetTitle('Laporan Barang Keluar');
   $pdf->AliasNbPages();
   $pdf->SetTopMargin(30);
   $pdf->SetLeftMargin(20);
   $pdf->SetRightMargin(20);
   $pdf->SetAutoPageBreak(true, 50);
   
   $pdf->AddPage();
   // $pdf->Image('./assets/images/Logo_iventori.png',32,25,50);
   $pdf->SetFont('Times', 'B', 16);
   $pdf->Cell(200);
   $pdf->Cell(400,10,'Iventori Lab POLITEKNIK SMI',0,0,'C');
   $pdf->Ln(14);
   $pdf->SetFont('Times','',14);
   $pdf->Cell(200);
   $pdf->Cell(400,10,'Iventori Lab POLITEKNIK SMI',0,0,'C');
   $pdf->Ln(14);
   $pdf->Cell(200);
   $pdf->SetFont('Times','I',9);
   $pdf->Cell(400,10,'Jalan Babakan Sirna',0,0,'C');
   $pdf->SetLineWidth(1);
   $pdf->Line(20, 77, 828, 77);
   $pdf->SetLineWidth(1,5);
   $pdf->Line(20, 79, 828, 79);
   
   $pdf->SetY(120);
   $pdf->SetFont('Times', 'BU', 16);
   $pdf->Cell(0,10,'Laporan Barang Keluar');
   $pdf->Ln(25);
   $pdf->SetX(100);
   $pdf->SetFont('Times','B',10);
   $pdf->SetLineWidth(1,5);
   $pdf->SetFillColor(252,255,189);
   $pdf->Cell(20,15,"No",1,"LR","C", true);
   $pdf->Cell(130,15,"No  Keluar",1 ,"LR", "C", true);
   $pdf->Cell(130,15,"Tanggal",1 ,"LR", "C", true);
   $pdf->Cell(130,15,"Jumlan Barang ",1 ,"LR", "C", true);
   $pdf->Cell(130,15,"Nama Barang",1 ,"LR", "C", true);
   $pdf->Cell(130,15,"Nama Penginput",1 ,"LR", "C", true);
  
   
   $pdf->Ln();
   if(!empty($data_gallery)){
       $no = 0;
       $nilaiY = $pdf->GetY();
       foreach ($data_gallery as $foto){
           $no ++;
           $pdf->SetX(100);
           $pdf->Cell(20,40,$no,1,"LR","C");
           $pdf->Cell(130,40, $foto->nokeluar,1,"LR","C");
           $pdf->Cell(130,40, date("d-m-Y", strtotime($foto->tanggalkeluar)),1,"LR","C");
           
           $pdf->Cell(130,40,$foto->qty ,1,"LR","C");
           $pdf->Cell(130,40,  $foto->nama  ,1,"LR","C");
           $pdf->Cell(130,40,$foto->namalengkap ,1,"LR","C");
           $pdf->Ln();
           $nilaiY = $pdf->GetY();
       }
   }
   
   $pdf->Output('Rekap-Gallery-'.  date('dFY').'.pdf','I');
?>