<?php
/**
 * DokuWiki Plugin HipChat (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Jeremy Ebler <jebler@gmail.com> 2011-09-29
 *
 * DokuWiki log: https://github.com/cosmocode/log.git
 * @author  Adrian Lang <lang@cosmocode.de> 2010-03-28
 * 
 * Hippy: https://github.com/rcrowe/Hippy.git
 * @author Rob Crowe <rcrowe@github>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

if (!defined('DOKU_LF')) define('DOKU_LF', "\n");
if (!defined('DOKU_TAB')) define('DOKU_TAB', "\t");
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once DOKU_PLUGIN.'hippy.php';
require_once DOKU_PLUGIN.'action.php';

class action_plugin_hipchat extends DokuWiki_Action_Plugin {

    function register(&$controller) {
       $controller->register_hook('ACTION_ACT_PREPROCESS', 'BEFORE', $this, 'handle_action_act_preprocess');
    }

    function handle_action_act_preprocess(&$event, $param) {
        if ($event->data !== 'save') {
            return;
        }
        $this->handle();
    }

    private function handle() {
		//global $ID;//prefer $INFO['id']
    	//global $DATE;
    	//global $PRE;
    	//global $TEXT;
		//global $SUF;
    	global $SUM;
		//global $lang;
		global $INFO;
		
		$fullname = $INFO['userinfo']['name'];
		$username = $INFO['client'];
		$page =  $INFO['namespace'] . $INFO['id'];
		$summary = $SUM;
		$minor = (boolean) $_REQUEST['minor'];
					
		
		//See conf/default.php for credentials
		$config = $this->getConf('hipchat');
		Hippy::config($config);
		
		//saveWikiText($ID,con($PRE,$TEXT,$SUF,1),$SUM,$_REQUEST['minor']); //use pretty mode for con
		$say = '<b>' .$fullname . '</b> updated the Wikipage <b>' . $page . '</b></br>';
		if($minor)$say += '[minor edit]';
		$say += '<em>' . $summary . '</em>';
		
		Hippy::speak($say, array('notify' => $minor));
    }
}

// vim:ts=4:sw=4:et:enc=utf-8:
