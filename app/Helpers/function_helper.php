<?php
function is_login($session)
{
    if (!$session) {
        return redirect()->to(base_url('auth'));
    }
}

function format_rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return 'Rp ' . $rupiah;
}

function dekripsi_password($password)
{
    $config = new \Config\Encryption();
    $encrypter = \Config\Services::encrypter($config);
    $decrypt = $encrypter->decrypt(base64_decode($password));
    return $decrypt;
}

function enkripsi_password($password)
{
    $config = new \Config\Encryption();
    $encrypter = \Config\Services::encrypter($config);
    $encrypt = base64_encode($encrypter->encrypt($password));
    return $encrypt;
}

function random_kode_produk()
{
    $rand = rand(1231, 7879);
    return 'LDR' . $rand;
}
