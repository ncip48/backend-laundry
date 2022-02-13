<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $login = [
        'email' => [
            'rules'  => 'required|valid_email',
            'errors' => [
                'required' => 'Email harus diisi!',
                'valid_email' => 'Masukkan email yang valid!'
            ],
        ],
        'password'    => [
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password harus diisi!',
                'min_length' => 'Minimal password 8 karakter!'
            ],
        ],
    ];

    public $karyawan = [
        'email' => [
            'rules'  => 'required|valid_email',
            'errors' => [
                'required' => 'Email harus diisi!',
                'valid_email' => 'Masukkan email yang valid!'
            ],
        ],
        'password'    => [
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password harus diisi!',
                'min_length' => 'Minimal password 8 karakter!'
            ],
        ],
        'nama'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama harus diisi!',
            ],
        ],
        'no_hp'    => [
            'rules'  => 'required|min_length[11]',
            'errors' => [
                'required' => 'No HP harus diisi!',
                'min_length' => 'Minimal no hp 11 karakter!'
            ],
        ],
        'alamat'    => [
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'Alamat harus diisi!',
                'min_length' => 'Minimal alamat 8 karakter!'
            ],
        ],
        'gaji'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Gaji harus diisi!'
            ],
        ],
    ];

    public $produk = [
        'nama_produk'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama produk harus diisi!'
            ],
        ],
        'satuan'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Satuan harus diisi!'
            ],
        ],
        'harga'    => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Harga harus diisi!'
            ],
        ],
    ];
}
