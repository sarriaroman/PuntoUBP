<?php
	/**
	 * Elgg translation browser.
	 * 
	 * @package translationbrowser
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Mariusz Bulkowski
	 * @copyright  2008
	 * @link http://elgg.com/
	 */

	$english = array(
	
		/**
		 * Menu items and titles
		 */
		// Sections
			'translationbrowser' => 'Translation Browser',
			'translationbrowser:translate' => 'Translate',
			'translationbrowser:exporttranslations' => 'Export translations',
			
		// Titles
			'translationbrowser:selectlanguage' => 'Select language',
			'translationbrowser:selecttypeexport' => 'Please select an export type',
			'translationbrowser:languagebase' => 'Language Base',
			
	
		// Words
			'translationbrowser:yourselectedlanguage' => 'Your selected language',
			'translationbrowser:youwilltranslate' => "You will translate from ",
			'translationbrowser:to' => 'to',
			'translationbrowser:languagecore' => '- System language',
			'translationbrowser:selectmodule' => 'Now, please select the module that you wish to translate, then click on the "Translate" button.',
			'translationbrowser:updatefile' => 'Update internally the file',
			'translationbrowser:generatefile' => 'Generate php file',
			'translationbrowser:highlight' => 'Highlight untranslated fields',
			'translationbrowser:canyouedit' => 'you can edit this field value',
	
		// Status
			'translationbrowser:blankmodule' => 'You must select at least one module',
			'translationbrowser:languageerror' => 'The selected language is incorrect. Please try again or choose another language.',
			'translationbrowser:blanklang' => 'You must select at least one language',
			'translationbrowser:emptyfields' => 'You must complete at least one field',
			'translationbrowser:error' => 'Internal error. Please try again later',
			'translationbrowser:problem:permiss' => 'There was a problem acceding the folder. Please check privileges',
			'translationbrowser:error:filecreate' => 'There was a problem creating the file. Please check privileges',
			'translationbrowser:success' => 'The translatation was sucess.',
			'translationbrowser:generatedby' => 'Generate By translationbrowser.',
	
		// Actions
			'translationbrowser:save' => 'Save',
			'translationbrowser:save' => 'Translate',
			'translationbrowser:downloadallinzip' => 'Download all in zip',
		
		// Settings
		    'translationbrowser:userscanedit' => 'Users can edit',
	
		// Export
			'translationbrowser:exportdescription' => 'If you wish export translation, select language and then click in export button',
			'translationbrowser:export' => 'Export',
			
		// Credits
			'translationbrowser:infotxt' => "This file created by Translation Browser Elgg\n".
	        	              				"\t@author Mariusz Bulkowski http://seo4you.pl/\n".
		              						"\t@author v2 Pedro Prez  http://www.pedroprez.com.ar/"	
			
	
	);
					
	add_translation("en",$english);
?>