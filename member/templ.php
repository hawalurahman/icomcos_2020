<? error_reporting(0);
// Untuk keperluan pemisahan desain tampilan,script dan data
// =========================================================

if(ereg("templ.php", $PHP_SELF))
{
header("location: ../index.php");
die;
}

class template
{
var $TAGS = array();
var $THEME;
var $CONTENT;

function define_tag($tagname, $varname)
{
$this->TAGS[$tagname]=$varname;
}

function define_theme($themename)
{
$this->THEME=$themename;
}

function parse()
{
$this->CONTENT=file($this->THEME);
$this->CONTENT=implode("", $this->CONTENT);
while(list($key, $val)=each($this->TAGS))
{
$this->CONTENT=ereg_replace($key, $val, $this->CONTENT);
}}

function printproses()
{
echo $this->CONTENT;
}}

?>
