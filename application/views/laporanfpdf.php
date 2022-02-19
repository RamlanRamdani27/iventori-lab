 <?php
   $pdf = new FPDF('P', 'pt', 'A4');
   $pdf->SetTitle('Laporan Barang Masuk');
   $pdf->AliasNbPages();
   $pdf->SetTopMargin(30);
   $pdf->SetLeftMargin(20);
   $pdf->SetRightMargin(20);
   $pdf->SetAutoPageBreak(true, 50);
   
   $pdf->AddPage();
   // $pdf->Image('./assets/images/Logo_iventori',32,25,50);
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
   $pdf->Cell(0,10,'Laporan Barang Masuk');
   $pdf->Ln(25);
   $pdf->SetX(100);
   $pdf->SetFont('Times','B',10);
   $pdf->SetLineWidth(1,5);
   $pdf->SetFillColor(252,255,189);
   $pdf->Cell(20,15,"No",1,"LR","C", true);
   $pdf->Cell(130,15,"No  Masuk",1 ,"LR", "C", true);
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
           $pdf->Cell(130,40, $foto->nomasuk,1,"LR","C");
           $pdf->Cell(130,40, date("d-m-Y", strtotime($foto->tgl)),1,"LR","C");
           
           $pdf->Cell(130,40,$foto->qty ,1,"LR","C");
           $pdf->Cell(130,40,  $foto->nama.' '.$foto->namamerek,1,"LR","C");
           $pdf->Cell(130,40,$foto->namalengkap ,1,"LR","C");
           $pdf->Ln();
           $nilaiY = $pdf->GetY();
       }
   }
   
   $pdf->Output('Rekap-Gallery-'.  date('dFY').'.pdf','I');
?>