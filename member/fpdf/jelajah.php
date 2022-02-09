<?php
require('fpdf.php');
include "../conwarta.php";
$que=mysql_query("select *, date_format(tanggal, '%d-%m-%Y') as tanggal from wartaluar where row_id=$news");
$dta=mysql_fetch_array($que);


class PDF extends FPDF
{
function Header()
{
	global $title;

	//Arial bold 15
	$this->SetFont('Arial','B',15);
	//Calculate width of title and position
	$w=$this->GetStringWidth($title)+6;
	$this->SetX((210-$w)/2);
	//Colors of frame, background and text
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(220,220,220);
	$this->SetTextColor(220,50,50);
	//Thickness of frame (1 mm)
	//$this->SetLineWidth(0);
	//Title
	$this->Cell($w,9,$title,1,1,'C',1);
	//Line break
	$this->Ln(10);
}

function Footer()
{
	//Position at 1.5 cm from bottom
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//Text color in gray
	$this->SetTextColor(128);
	//Page number
	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num,$label)
{
	//Arial 12
	$this->SetFont('Arial','',10);
	//Background color
	$this->SetFillColor(200,220,255);
	//Title
	$this->Cell(0,6,"Chapter $num : $label",0,1,'L',1);
	//Line break
	$this->Ln(4);
}

function ChapterBody($file)
{
	//Read text file
	//$f=fopen($file,'r');
	//$txt=fread($f,filesize($file));
	$txt = $file;
	$txt = $this->WriteHTML($txt);
	//fclose($f);
	//Times 12
	$this->SetFont('Times','',12);
	//Output justified text
	$this->MultiCell(0,5,$txt);
	//Line break
	$this->Ln();
	//Mention in italics
	$this->SetFont('','I');
	$this->Cell(0,5,'(end of excerpt)');
}
function OpenTag($tag,$attr)
{
    //Opening tag
    if($tag=='B' or $tag=='I' or $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF=$attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    //Closing tag
    if($tag=='B' or $tag=='I' or $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
}
function SetStyle($tag,$enable)
{
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style='';
    foreach(array('B','I','U') as $s)
        if($this->$s>0)
            $style.=$s;
    $this->SetFont('',$style);
}
function WriteHTML($html)
{
    //HTML parser
    $html=str_replace("\n",' ',$html);
    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            //Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            //Tag
            if($e{0}=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                //Extract attributes
                $a2=explode(' ',$e);
                $tag=strtoupper(array_shift($a2));
                $attr=array();
                foreach($a2 as $v)
                    if(ereg('^([^=]*)=["\']?([^"\']*)["\']?$',$v,$a3))
                        $attr[strtoupper($a3[1])]=$a3[2];
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function PrintChapter($num,$title,$file)
{
	$this->AddPage();
	$this->ChapterTitle($num,$title,$dta[tanggal]);
	$this->ChapterBody($file);
}
}

$pdf=new PDF();
$title=$dta[judul];
$tgl=$dta[tanggal];
$pdf->SetTitle($title);
$pdf->SetAuthor($dta[asal]);
$pdf->SetLeftMargin(45);
//$pdf->Image('../../photo/'.$dta[photo],10,10,30,0,'','http://www.fpdf.org');
$pdf->PrintChapter($dta[tanggal],'Source = ?',$dta[isi]);

//$pdf->WriteHTML($dta[isi]);
$pdf->Output();


/*
$pdf->Cell(10,500,'<h1>Berita</h1>
		<h3>$dta[judul]</h3>
		<h3>$dta[tanggal] :: $dta[penulis]</h3>
		<h3>$dta[isi]</h3>');
		
$pdf->Cell(5,20,$dta[judul]);
$pdf->Cell(5,30,$dta[tanggal]);
$pdf->Cell(5,40,$dta[penulis]);
$pdf->Cell(5,50,$dta[isi]);
$pdf->Output();
*/
?>