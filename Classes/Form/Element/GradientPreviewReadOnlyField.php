<?php


namespace AndreasKiessling\AkGradientHeadlines\Form\Element;


use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class GradientPreviewReadOnlyField extends \TYPO3\CMS\Backend\Form\Element\InputTextElement
{
    const NODE_NAME = 'gradientPreviewHiddenField';

    public function render()
    {
        $result = parent::render();
        $result['html'] = str_replace(' type="text"', ' type="text" readonly ', $result['html']);
        $result['html'] = str_replace(' type="number"', ' type="text" readonly ', $result['html']);
        return $result;
    }

}