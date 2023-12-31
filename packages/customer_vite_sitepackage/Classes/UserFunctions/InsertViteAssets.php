<?php

/**
 * Fork of https://github.com/fgeierst/typo3-vite-demo/blob/master/packages/typo3_vite_demo/Classes/UserFunctions/InsertViteAssets.php (GNU General Public License v2.0)
 * Thanks very much toto @fgeierst!
 */

namespace noCompany\CustomerViteSitepackage\UserFunctions;

final class InsertViteAssets
{
    /**
     * Output a string
     *
     * @return string          HTML output
     */
    public function getScriptTags(): string
    {
        // Read the manifest file (generated by vite) and decode JSON
        $file = file_get_contents(
            \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:customer_vite_sitepackage/Resources/Public/CompiledJavaScript/manifest.json')
        );
        $manifest = json_decode($file, true);

        // Build urls, these are the public HTTP paths
        $path = '/typo3conf/ext/customer_vite_sitepackage/Resources/Public/CompiledJavaScript/';
        $scriptSrc = $path . $manifest['packages/customer_vite_sitepackage/Resources/Private/JavaScript/main.js']['file'];
        $stylesheetHref = $path . $manifest['packages/customer_vite_sitepackage/Resources/Private/JavaScript/main.js']['css'][0];

        // Return script and link tags
        $content = '<!-- Vite Assets -->';
        $content .= '<script src="' . $scriptSrc . '" defer></script>';
        $content .= '<link rel="stylesheet" href="' . $stylesheetHref . '">';

        return $content;
    }
}
