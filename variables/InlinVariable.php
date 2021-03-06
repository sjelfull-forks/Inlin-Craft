<?php
namespace Craft;

class InlinVariable
{
	public function er($fileName, $remote = false)
	{
		$documentRoot = craft()->inlin->getSetting('inlinPublicRoot')!=null ? craft()->inlin->getSetting('inlinPublicRoot') : $_SERVER['DOCUMENT_ROOT'];
		$filePath = $documentRoot . $fileName;

		if ($fileName !== '' && file_exists($filePath)) {

			$content = @file_get_contents($filePath);
			return TemplateHelper::getRaw( $content );

		} else if ($remote) {

			$content = @file_get_contents($fileName);
			return TemplateHelper::getRaw( $content );

		} else {
			Craft::log( 'Trying to load file ' . $filePath . ' failed.' );
			return '';
		}
	}
}