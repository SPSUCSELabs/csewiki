<?php 
//must be run within dokuwiki
if(!defined('DOKU_INC')) die();

/**
 * Class action_plugin_mediaModal 
 * @author Noah Harvey (nharvey@spsu.edu)
 */
class action_plugin_mediaModal extends DokuWiki_Action_Plugin
{
		public function register(Doku_Event_Handler $controller)
		{
			$controller->register_hook('TPL_ACT_RENDER','BEFORE',$this,'modalizeMediaManager');
		}

		public function modalizeMediaManager(&$event, $param)
		{
			if($event->data != 'media') return;

			//insert modal and activate
			include_once("modal.php");

			//show page content under modal
			$event->data = 'show';

		}

}

?>
