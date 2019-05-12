<?php


namespace AndreasKiessling\AkGradientHeadlines\DataProcessor;


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class CssGenerator implements \TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface
{
    /**
     * @param \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $cObj
     * @param array $contentObjectConfiguration
     * @param array $processorConfiguration
     * @param array $processedData
     * @return array
     */
    public function process(
        \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    )
    {
        $gradientId = (int) ($cObj->data['gradient'] ?? 0);
        $template = $processorConfiguration['template'] ?? '';
        // nothing to do if nothing was selected or we don't have template
        if (empty($template) || $gradientId === 0) {
            return $processedData;
        }

        $data = $this->getGradientConfiguration($gradientId);
        if ($data) {
            $this->generateInlineCss($processorConfiguration['template'], $cObj->data, $data);
        }

        return $processedData;
    }

    /**
     * @param int $gradientId
     * @return mixed
     */
    private function getGradientConfiguration(int $gradientId)
    {
        $table = 'tx_akgradientheadlines_domain_model_gradient';
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable($table);
        return $queryBuilder
            ->select('*')
            ->from($table)
            ->where(
                $queryBuilder->expr()->eq('uid', $gradientId)
            )
            ->execute()
            ->fetch();
    }

    /**
     * @param $template
     * @param $contentObjectData
     * @param $gradientData
     */
    private function generateInlineCss($templateString, $contentObjectData, $gradientData)
    {
        $template = GeneralUtility::makeInstance(StandaloneView::class);
        $template->setTemplateSource($templateString);
        $template->assignMultiple([
            'data' => $contentObjectData,
            'gradient' => $gradientData
        ]);

        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);

        $name = 'header-gradient-' . $contentObjectData['uid'];
        $pageRenderer->addCssInlineBlock(
            $name,
            $template->render()
        );
    }
}