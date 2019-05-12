<?php


namespace AndreasKiessling\AkGradientHeadlines\Form\Element;


use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class GradientPreview extends \TYPO3\CMS\Backend\Form\Element\AbstractFormElement
{
    const NODE_NAME = 'gradientPreview';

    public function render()
    {
        $result = $this->initializeResultArray();
        $data = $this->data['databaseRow'];

        if (!\is_array($data)) {
            return '';
        }

        $uid = $data['uid'] ?? 0;


        // can't do a preview for new records
        if ($uid < 1) {
            return $result;
        }

        $this->addRequireJsConfiguration();
        $result['requireJsModules'][] = ['TYPO3/CMS/AkGradientHeadlines/GradientPreviewLoader' => "function(GradientPreviewLoader) { new GradientPreviewLoader.init('gradient-preview-$uid'); }"];


        $replacements = [
            '###UID###' => $uid,
            '###START_COLOR###' => $data['start_color'],
            '###END_COLOR###' => $data['end_color'],
            '###ANGLE###' => $data['angle'],
        ];

        $htmlTemplate = '
        <div 
            id="gradient-preview-###UID###"
            data-uid="###UID###" 
            data-color1="###START_COLOR###" 
            data-color2="###END_COLOR###" 
            data-angle="###ANGLE###"
            ></div>
        ';

        $html = str_replace(
            array_keys($replacements),
            $replacements,
            $htmlTemplate
        );

        $result['html'] .= $html;

        return $result;
    }

    private function addRequireJsConfiguration(): void
    {
        GeneralUtility::makeInstance(PageRenderer::class)->addRequireJsConfiguration(
            [
                'paths' => [
                    'AkGradientHeadlines/Vue' => '../typo3conf/ext/ak_gradient_headlines/Resources/Public/JavaScript/vue',
                    'AkGradientHeadlines/GradientPreviewLoader' => '../typo3conf/ext/ak_gradient_headlines/Resources/Public/JavaScript/GradientPreviewLoader.js',
                    'AkGradientHeadlines/GradientWidget' => '../typo3conf/ext/ak_gradient_headlines/Resources/Public/JavaScript/GradientWidget',
                ],
                'shim' => [
                    'deps' => [
                        'TYPO3/CMS/AkGradientHeadlines/GradientConfigurator' => [
                            'TYPO3/CMS/AkGradientHeadlines/Vue',
                        ],
                    ],
                ],
            ]
        );
    }
}