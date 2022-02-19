 <?php
   $pdf = new FPDF('P', 'pt', 'A4');
   $pdf->SetTitle('Laporan Berita');
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


if(!empty($data_gallery)){
   
   $pdf->SetY(120);
   $pdf->SetFont('Times', 'BU', 16);
   $name=$this->session->userdata('SESS_NAME');
   $pdf->SetFont('Times', '', 10);
        $pdf->Cell(20 ,30, "    Sehubungan dengan adanya surat ini menyatakan bahwa  : $name",0,0, "L");
        $pdf->Ln(23);
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(20 ,30, "Permohonan untuk pengambilan barang yang ada di Gudang lab kampus guna untuk di pergunkan",0,0, "L");
        $pdf->Ln(24);
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(20 ,30, "Adapun barang barang yang di ambil sebagai berikut",0,0, "L");
        $pdf->Ln(25);
   $pdf->Ln(25);
   $pdf->SetX(100);
   $pdf->SetFont('Times','B',10);
   $pdf->SetLineWidth(1,5);
   $pdf->SetFillColor(252,255,189);
   $pdf->Cell(20,15,"No",1,"LR","C", true);
   $pdf->Cell(100,15,"No  keluar",1 ,"LR", "C", true);
   $pdf->Cell(100,15,"Nama Barang",1 ,"LR", "C", true);
   $pdf->Cell(100,15,"Ruangan",1 ,"LR", "C", true);
   $pdf->Cell(100,15,"jumlah Barang",1 ,"LR", "C", true);
  
   
   $pdf->Ln();
      
       $no = 0;
       $nilaiY = $pdf->GetY();
       foreach ($data_gallery as $foto){
           $no ++;
           $pdf->SetX(100);
           $pdf->Cell(20,40,$no,1,"LR","C");
           $pdf->Cell(100,40, $foto->nokeluar,1,"LR","C");
           $pdf->Cell(100,40,  $foto->nama.' '.$foto->namamerek,1,"LR","C");
           $pdf->Cell(100,40, $foto->namaruangan,1,"LR","C");
           $pdf->Cell(100,40,$foto->qty ,1,"LR","C");
           $pdf->Ln();
           $nilaiY = $pdf->GetY();
       }
   }

   $pdf->Ln(150);
   $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->Cell(0,5,'UPT',0,1,'L'); 
 
  
    $pdf->Ln(30);
    

    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(0,5,'Samirah Rahayu.,M.Kom',0,1,'L');
    $pdf->SetFont('Times','',12);
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->Cell(0,5,'NIP.197308172002121002,',0,1,'L');
   
   $pdf->Output('Rekap-Gallery-'.  date('dFY').'.pdf','I');
?>