<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    public $spaltenBearbeiten = [
    'spalte' => 'required',
    'spaltenbeschreibung' => 'required',
    'sortid' => 'integer',
    'boardsid' => 'required',
    ];
    public $spaltenBearbeiten_errors = [
        'spalte' => ['required' => 'Bitte tragen Sie eine Spaltenbezeichnung ein.'],
        'spaltenbeschreibung' => ['required' => 'Bitte tragen Sie eine Spaltenbezeichnung ein.'],
        'sortid' => ['integer' => 'Bitte tragen Sie einen gültigen Wert ein.'],
        'boardsid' => ['required' => 'Bitte tragen Sie ein Board ein.']

    ];

    public $tasksBearbeiten = [
    'tasks' => 'required',
    'taskartenid' => 'required',
    'personenid' => 'required',
    'spaltenid' => 'required',
    ];
    public $tasksBearbeiten_errors = [
        'tasks' => ['required' => 'Bitte geben Sie eine Task an.'],
        'taskartenid' => ['required' => 'Bitte geben Sie eine Taskart an.'],
        'personenid' => ['required' => 'Bitte geben Sie eine Person an.'],
        'spaltenid' => ['required' => 'Bitte geben Sie eine Spalte an.'],
    ];

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
}
