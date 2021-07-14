<?php

interface Kalkulator
{
    public function cal();
}

class LuasPersegiPanjang implements Kalkulator
{
    public $panjang;
    public $lebar;
    public function cal()
    {
        return $this->panjang * $this->lebar;
    }
}

class VolumeBola implements Kalkulator
{
    public $jari;
    public $phi;
    public function cal()
    {
        return (4/3) * $this->phi * $this->jari * $this->jari;
    }
}

class VolumeKerucut implements Kalkulator
{
    public $tinggi;
    public $jari;
    public $phi;
    public function cal()
    {
        return (1/3) * $this->phi * $this->jari * $this->jari * $this->jari * $this->tinggi;
    }
}

class VolumeKubus implements Kalkulator
{
    public $rusuk;
    public function cal()
    {
        return $this->rusuk * $this->rusuk * $this->rusuk;
    }
}

class KelilingLingkaran implements Kalkulator
{
    public $jari;
    public $phi;
    public function cal()
    {
        return 2 * $this->phi * $this->jari;
    }
}

class BangunRuangFactory
{
    public function initializeBangunRuang($type, $satuan)
    {
        if ($type === 'luaspersegipanjang') {
            $data = new LuasPersegiPanjang();
            $data -> panjang = $satuan['panjang'];
            $data -> lebar = $satuan['lebar'];

            echo "Panjang : ", $satuan['panjang'], "<br>";
            echo "Lebar : ", $satuan['lebar'], "<br>";
            echo "Luas Persegi Panjang : ";
            return $data;
        }
        if ($type == 'volumebola') {
            $data = new VolumeBola();
            $data -> phi = $satuan['phi'];
            $data -> jari = $satuan['jari'];

            echo "phi : ", $satuan['panjang'], "<br>";
            echo "Lebar : ", $satuan['lebar'], "<br>";
            echo "Volume Bola : ";
            return $data;
        }
        if ($type === 'volumekerucut') {
            $data = new VolumeKerucut();
            $data -> phi = $satuan['phi'];
            $data -> jari = $satuan['jari'];
            $data -> tinggi = $satuan['tinggi'];

            echo "phi : ", $satuan['phi'], "<br>";
            echo "Jari : ", $satuan['jari'], "<br>";
            echo "Tinggi : ", $satuan['tinggi'], "<br>";
            echo "Volume Kerucut : ";
            return $data;
        }
        if ($type === 'volumekubus') {
            $data = new VolumeKubus();
            $data -> rusuk = $satuan['rusuk'];

            echo "Rusuk : ", $satuan['rusuk'], "<br>";
            echo "Volume Kubus : ";
            return $data;
        }
        if ($type === 'kelilinglingkaran') {
            $data = new KelilingLingkaran();
            $data -> phi = $satuan['phi'];
            $data -> jari = $satuan['jari'];

            echo "phi : ", $satuan['phi'], "<br>";
            echo "Jari : ", $satuan['jari'], "<br>";
            echo "Keliling Lingkaran : ";
            return $data;
        }
        throw new Exception("Silahkan Coba Lagi!!!");
    }
}

$pilihan = 'volumekubus';
$satuan = ['rusuk' => 17, 'panjang'=> 11, 'lebar'=> 6, 'jari'=> 8, 'tinggi'=> 19, 'phi' => 3.14];

$bangunRuangFactory = new BangunRuangFactory();
$bangunRuang = $bangunRuangFactory->initializeBangunRuang($pilihan, $satuan);
print_r($bangunRuang->cal());

?>