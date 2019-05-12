<?php
defined('TYPO3_MODE') || die();

$tmp_ak_gradient_headlines_columns = [

    'gradient' => [
        'exclude' => true,
        'label' => 'LLL:EXT:ak_gradient_headlines/Resources/Private/Language/locallang_db.xlf:tx_akgradientheadlines_domain_model_ttcontent.gradient',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [['---', 0]],
            'foreign_table' => 'tx_akgradientheadlines_domain_model_gradient',
            'minitems' => 0,
            'maxitems' => 1,
        ],
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$tmp_ak_gradient_headlines_columns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'gradient', 'header', 'after:header_layout');

