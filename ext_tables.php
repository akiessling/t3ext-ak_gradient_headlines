<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('ak_gradient_headlines', 'Configuration/TypoScript', 'Gradient Headlines');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_akgradientheadlines_domain_model_gradient', 'EXT:ak_gradient_headlines/Resources/Private/Language/locallang_csh_tx_akgradientheadlines_domain_model_gradient.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_akgradientheadlines_domain_model_gradient');

    }
);
