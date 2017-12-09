<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 09/12/2017
 * Time: 8:54
 */
class Paybills_report extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        $this->Image(upload_url('avatar/').'car.png',10,6,30);
        $this->Image(upload_url('avatar/').'paper_report.jpg',0,0,$this->w,$this->h);

        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,utf8_decode('DANH SACH SAN PHAM NHAP'),0,0,'C');
        // Line break
        $this->Ln(20);
    }
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }
  //Page chapter
    function Chapter($num,$label){
        $this->SetFont('Arial','',17);
        $this->SetFillColor(280,210,12);
        $this->Cell(8,6,"Chaper $num $label",8,1,'L',true);
        $this->Ln(4);
    }
  //  Cotent
    function MyBody($file,$type){
    if ($type =='file'){
        $txt = file_get_contents($file);
        $this->SetFont('Times','',12);
        $this->MultiCell(8,5,$txt);
        $this->Ln();
    }else if($type =='cvs'){
        $w = array(40, 35, 40,45);
        for ($i = 0;$i<count($header);$i++){
            $this->Cell($w[$i],7,$header[$i],1,8,'C');
        }
        $this->Ln();
//        Data
        foreach ($data as $row){
            $this->Cell($w[0],6,$row[0],'LR');
            $this->Cell($w[1],6,$row[1],'LR');
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            $this->Cell($w[2],6,number_format($row[3]),'LR',0,'R');
            $this->Ln();
        }
        $this->Cell(array_sum($w),0,'','T');

    }else{
        for ($i = 1;$i <=40;$i++){
            $this->Cell('0','10','aaaaaa',$i,0,1);
            }
        }
    }
    //Layout
    function Layout($num, $label, $file, $type){
        $this->AddPage();
        $this->Chapter($num,$label);
        $this->MyBody($file,$type);
    }
// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
   public function convert_vi_to_en($str) {
      $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
      $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
      $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
      $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
      $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
      $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
      $str = preg_replace('/(đ)/', 'd', $str);
      $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
      $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
      $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
      $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
      $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
      $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
      $str = preg_replace('/(Đ)/', 'D', $str);
      //$str = str_replace(' ', '-', str_replace('&*#39;','",$str));
      return $str;
    }
}
/*Lấy dữ liệu từ MYSQL*/

// Instanciation of inherited class
$pdf = new Paybills_report('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();//3 tham số: a: loại giấy ngang or dọc; b : A4; c: rolat
$pdf->SetFont('Arial','I',10);
$pdf->Cell(200,10,'Ngay lap:'.date('d/m/Y',strtotime($info['NGAYLAP_PHIEUNHAP'])),0,0,'R');
$pdf->SetFont('Times','',12);
$pdf->Ln(10);
$pdf->Cell(12,8,'Nha cung cap:'.$pdf->convert_vi_to_en($info['TEN_NHA_CUNGCAP']),0,0,'L');
$title = "Danh sách các sản phẩm";
$pdf->SetTitle( utf8_decode($title));
$pdf->SetAuthor('Tiến Tài');
//$pdf->Layout('1','T&T','','file');
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(12,8,'STT',1,0,'C');
$pdf->Cell(32,8,'MA SAN PHAM',1,0,'C');
$pdf->Cell(52,8,utf8_decode('SAN PHAM'),1,0,'C');
$pdf->Cell(32,8,'SO LUONG',1,0,'C');
$pdf->Cell(32,8,'DON GIA',1,0,'C');
$pdf->Cell(32,8,'THANH TIEN',1,0,'C');
$pdf->Ln(8);

/*Data*/
$pdf->SetFont('Times','I',9);
$idx = 0;

foreach ($list as $item){
    $idx++;
    $pdf->Cell(12,8,$idx,1,0,'C');
    $pdf->Cell(32,8,$item['MA_SANPHAM'],1,0,'C');
    $pdf->Cell(52,8,$pdf->convert_vi_to_en($item['TEN_SANPHAM']),1,0,'C');
    $pdf->Cell(32,8,$item['SOLUONGNHAP'],1,0,'C');
    $pdf->Cell(32,8,$item['DONGIA_NHAP'],1,0,'C');
    $pdf->Cell(32,8,$item['THANHTIEN'],1,0,'C');
    $pdf->Ln(8);
}
$pdf->Cell(160,8,'TONG THANH TIEN',1,0,'C');
//$pdf->Cell(116,8,'',1,0,'C');
$pdf->Cell(32,8,$info['TONG_THANHTIEN'],1,0,'C');

$pdf->Ln(12);
$date = getdate();
$pdf->Cell(150,8,'.................,',0,0,'R');
$pdf->Cell(12,8, "Ngay ".$date['mday'],0,0,'C');
$pdf->Cell(13,8, "thang ".$date['mon'],0,0,'C');
$pdf->Cell(14,8, "nam ".$date['year'],0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Times','B',11);
$pdf->Cell(150,8,'',0);
$pdf->Cell(30,8,'Nhan vien lap phieu',0,0,'C');
$pdf->Ln(30);
$pdf->Cell(150,8,'',0);
$pdf->Cell(30,8,$pdf->convert_vi_to_en($info['HO_VA_TEN']),0,0,'C');
$pdf->Output('I','Hóa_đơn.pdf',true);
?>