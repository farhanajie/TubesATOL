<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
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
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $register = [
        'username' => [
            'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} minimal 4 karakter',
                'max_length' => '{field} Maksimal 20 karakter',
                'is_unique' => 'Username sudah digunakan sebelumnya'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[4]|max_length[50]',
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} minimal 4 karakter',
                'max_length' => '{field} maksimal 50 karakter',
            ]
        ],
        'pass_confirm' => [
            'rules' => 'matches[password]',
            'errors' => [
                'matches' => 'Konfirmasi password tidak sesuai dengan password',
            ]

        ],
    ];
}
