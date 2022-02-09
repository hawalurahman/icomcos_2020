<?php
error_reporting(0);
session_start(); 
$_SESSION[thnsnma]=2020;
//include "./config/koneksi.php";
include "templ.php";
include "menu.php";//742
$utama = "<center>
			<table width='100%'>
			<tr><td align='left'><img src='./icon/homeputih.jpg'></td></tr>
			<tr><td align='center'><img src='./icon/icomcos2020_br.png' width='60%' height='60%'><br><br></td></tr>
			<tr><td align=center  style='line-height:3.0em;'><font color=#800000 size=6><b>INTERNATIONAL CONFERENCE on MATHEMATICS, <br>COMPUTATIONAL SCIENCES AND STATISTICS 2020</b></font><br>
			<font color=#000040 size=5><b>29<sup>th</sup> September, 2020 <font color=#FFCC33><b>|</b></font> Online Conference</b></font>
			</td></tr>
			<tr>
				<td align='center'>
					<br>
					<font color=#F20000 size=6 style='font-family: Cambria,Times New Roman,serif;'>
						<b>Mathematics, Computational Sciences and Statistics for Better Future</b>
					</font>
				</td>
			</tr>
			<tr>
				<td style='font-family: Arial, Helvetica, sans-serif;padding-right:15px;'><br><font color=#000000 size=3>
<font size=4 color=#9F0000><b>I<font color=#45CAE7>CoM</font><font color=#00008C>CoS</font></b></font> is an annual event hosted by Mathematics Department, Faculty of Science and Technology, Universitas Airlangga. The conference is a multidisciplinary forum for promoting and fostering interactions between mathematics (Analysis and Geometry, Algebra and Combinatoric, Applied Mathematics), computational sciences (algorithm analysis, network security and cryptography, artificial intelligence and machine learning, knowledge discovery and data mining, machine translation, image processing), and statistics (statistical theory, statistics modeling, forecasting methods, multivariate methods, econometrics, biostatistics, actuarial sciences) as well as related methodologies in studying various phenomena in the area. <br><br>
<font size=4 color=#9F0000><b>I<font color=#45CAE7>CoM</font><font color=#00008C>CoS</font> <font color=#008040>2020</font></b></font> will be held on 29<sup>th</sup> September 2020, The committee decided to organize the conference online due to covid-19 pandemic. The conference program includes keynote talks and regular session (paper presentation).<br><br>
Keynote talks are scheduled at the plenary. Academicians, researchers and graduated students are invited to participate at the plenary. Participants need to submit the full paper indicating the research results. However, it is also allowed for participants who want to submit the abstract only if they do not want to publish their work in the conference proceeding.
<br><br>

The selected papers (which are subject to a full review process) will be considered for publications in:
Conference proceeding series-indexed by Scopus.<br><br>

<font size=5><b>Scope</b></font><br>
The scope of this conference is, but not limited to, in the fields of:<br>
<li>Analysis and Geometry</li>
<li>Algebra and Combinatoric</li>
<li>Applied Mathematics</li>
<li>Statistics</li>
<li>Computational Sciences</li>
<li>Informatics</li>
<li>Actuarial Sciences</li>
<li>Data Science</li>
				</font>
				</td>
			</tr>
			</table><br><br>
		</center>";

/*
$bawah ="			<center>
						<hr width='100%' size='3' align='center' color='#800000'><br>
						<font size=5 color='#400000'><b>Keynote Speaker</b></font><br>
						<hr width='70' size='3' align='center' color='#FFCC33'><br>
						<table width='100%'>
							<tr>
							<td valign='top' align='center' width='25%' style='margin-right:20px;'>
							<center>
								<img src='./images/Martin_Bees.jpg' width='150' height='200'><br>
								<font color='#804000'><b>Prof. Martin Alan Bees<sup>*</sup></b></font><br>
								<font color='#400000'><b>(Mathematics, University of York, United Kingdom)</b></font><br>
								<a href='https://www.york.ac.uk/maths/staff/martin-bees/' title='Detail' target='_blank'><b>Detail...</b></a>
							</center>
							</td>
							<td valign='top' align='center' width='25%' style='margin-right:20px;'>
							<center>
								<img src='./images/Havard.jpg' width='150' height='200'><br>
								<font color='#804000'><b>Prof. Haavard Rue</b></font><br>
								<font color='#400000'><b>(Statistics, King Abdullah University of Science and Technology, Saudi Arabia)</b></font><br>
								<a href='https://www.kaust.edu.sa/en/study/faculty/haavard-rue' title='Detail' target='_blank'><b>Detail...</b></a>
							</center>
							</td>
							<td valign='top' align='center' width='25%' style='margin-left:20px;'>
							<center>
								<img src='./images/sawano.jpg' width='150' height='200'><br>
								<font color='#804000'><b>Prof. Yoshihiro Sawano<sup>*</sup></b></font><br>
								<font color='#400000'><b>(Mathematics, Tokyo Metropolitan University, Japan)</b></font><br>
								<a href='http://www.comp.tmu.ac.jp/yosihiro/paper/cv-english.html' title='Detail' target='_blank'><b>Detail...</b></a>
							</center>
							</td>
							<td valign='top' align='center' width='25%' style='margin-left:20px;'>
							<center>
								<img src='./images/norhaslinda.jpg' width='150' height='200'><br>
								<font color='#804000'><b>Assoc. Prof. Norhaslinda Kamaruddin</b></font><br>
								<font color='#400000'><b>(Computer Science, Universiti Teknologi MARA, Malaysia)</b></font><br>
								<a href='' title='Detail' target='_blank'><b>Detail...</b></a>
							</center>
							</td>
							</tr>
						</table>
						<br>
						<font color='#804000'><b><sup>*</sup>To be Confirmed</b></font><br>
						<hr width='100%' size='3' align='center' color='#800000'><br>
					</center>";
					*/
//$utama .= "</div>";
$tpl=new template;

$tpl -> define_theme("thememaster.htm");
$tpl -> define_tag("{mnu}",$mnu);
$tpl -> define_tag("{tglhari}",$tglhari);
$tpl -> define_tag("{headran}",$headran);
$tpl -> define_tag("{utama}",$utama);
$tpl -> define_tag("{kanan}",$kanan);
$tpl -> define_tag("{bawah}",$bawah);
$tpl -> define_tag("{menu}",$menu);
$tpl -> define_tag("{content}",$index);
$tpl -> parse();
$tpl -> printproses(); 
?>
<!--  -->
