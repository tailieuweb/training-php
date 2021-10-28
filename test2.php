<?php
class DongVat
{
    public function __construct($ms, $gt)
    {
        $this->mauSac = $ms;
        $this->GioiTinh = $gt;
    }
    public function get_MauSac()
    {
        return $this->mauSac;
    }
    public function get_GoiTinh()
    {
        return $this->GioiTinh;
    }

    protected  $mauSac;
    protected $GioiTinh;

    public function Messenger()
    {
        echo "{$this->GioiTinh}, {$this->mauSac}";
    }

}

class ConCho extends DongVat
{
    public function Intro()
    {
        echo "Day la con cho  {$this->GioiTinh} , co mau {$this->mauSac}";
    }
    public function Messenger()
    {
        echo "Day la lop con cho";
    }
}

$ConCho = new ConCho("Vang","Duc");
$Dongvat[] = new ConCho("Vang","Cai");
foreach ($Dongvat as $key => $value) {
    echo $value->Messenger();
}
$ConCho->Intro();
$ConCho->Messenger();

?>