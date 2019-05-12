<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:ak_gradient_headlines/Resources/Private/Language/locallang_db.xlf:tx_akgradientheadlines_domain_model_gradient',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'start_color,end_color',
        'iconfile' => 'EXT:ak_gradient_headlines/Resources/Public/Icons/tx_akgradientheadlines_domain_model_gradient.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, start_color, end_color, angle',
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,
            name,
            --pallette--;;gradient, 
            preview, 
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes' => [
        'gradient' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general',
            'showitem' => '
                start_color,end_color,angle,
            ',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_akgradientheadlines_domain_model_gradient',
                'foreign_table_where' => 'AND {#tx_akgradientheadlines_domain_model_gradient}.{#pid}=###CURRENT_PID### AND {#tx_akgradientheadlines_domain_model_gradient}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ak_gradient_headlines/Resources/Private/Language/locallang_db.xlf:tx_akgradientheadlines_domain_model_gradient.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,trim'
            ],
        ],
        'start_color' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ak_gradient_headlines/Resources/Private/Language/locallang_db.xlf:tx_akgradientheadlines_domain_model_gradient.start_color',
            'config' => [
                'type' => 'text',
                'renderType' => \AndreasKiessling\AkGradientHeadlines\Form\Element\GradientPreviewReadOnlyField::NODE_NAME,
                'size' => 6,
                'eval' => 'required,trim'
            ],
        ],
        'end_color' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ak_gradient_headlines/Resources/Private/Language/locallang_db.xlf:tx_akgradientheadlines_domain_model_gradient.end_color',
            'config' => [
                'type' => 'text',
                'renderType' => \AndreasKiessling\AkGradientHeadlines\Form\Element\GradientPreviewReadOnlyField::NODE_NAME,
                'size' => 6,
                'eval' => 'required,trim'
            ],
        ],
        'angle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ak_gradient_headlines/Resources/Private/Language/locallang_db.xlf:tx_akgradientheadlines_domain_model_gradient.angle',
            'config' => [
                'type' => 'text',
                'renderType' => \AndreasKiessling\AkGradientHeadlines\Form\Element\GradientPreviewReadOnlyField::NODE_NAME,
                'size' => 3,
                'eval' => 'int',

                'default' => 90,

            ]
        ],

        'preview' => [
            'label' => 'LLL:EXT:ak_gradient_headlines/Resources/Private/Language/locallang_db.xlf:tx_akgradientheadlines_domain_model_gradient.preview',
            'config' => [
                'type' => 'user',
                'renderType' => \AndreasKiessling\AkGradientHeadlines\Form\Element\GradientPreview::NODE_NAME,

                'parameters' => [
                    'longitude' => 'longitude',
                    'latitude' => 'latitude',
                    'address' => 'address',
                    'street' => 'street',
                    'zip' => 'zip',
                    'city' => 'city',
                ],
            ],
        ],
    ],
];
