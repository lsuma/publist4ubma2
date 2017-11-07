<?php
namespace Unima\Publist4ubma2\ViewHelpers;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * ViewHelper print Names with rdf schema and "AND"
 *
 * @package TYPO3
 * @subpackage publist4ubma2
 */
class RenderNamesShortViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

        /**
         * Render the viewhelper
         *
         * @param string $somebody with people
         * @return string with output
         */
	public function render($somebody)
	{
		$output = '';
		if (strpos($somebody, ";") !== FALSE) {
			$peopleList = explode( ';', $somebody);
			$peopleNumber = count($peopleList);
			$i = 1;
			foreach ($peopleList as $guy) {
				if ($theName = explode( ',', $guy)) {
					$output .= $theName[0] . ', ' . substr($theName[1], 0, 1) . '.';
					if ($peopleNumber >= 3) {
						if ($i < ($peopleNumber - 1))
							$output .= ', ';
						elseif ($i < $peopleNumber)
							$output .= " " . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('and', 'publist4ubma2') . " ";
					}
					else {
						if (($i < $peopleNumber) && ($peopleNumber == 2))
							$output .= " " . \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('and', 'publist4ubma2') . " ";
					}
					$i++;
				}
			}

		}
		else {
			if ( trim($somebody) && ($theName = explode(',', $somebody)))
				$output .= $theName[0] . ', ' . substr($theName[1], 0, 1) . '.';
		}
		return $output;
	}
}

?>