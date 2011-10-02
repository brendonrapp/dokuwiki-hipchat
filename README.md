# DokuWiki-Hipchat

Authors: [Jeremy Eblar](http://www.github.com/jeblar), [Brendon Rapp](http://www.github.com/LegionSB)

A DokuWiki plugin that notifies a HipChat room of wiki edits.

_this commit is untested_

Setup
-----

The project folder needs to be renamed 'hipchat' and placed in your DokuWiki plugins folder. For example, the path from the DokuWiki root to the action.php should be as follows:

DOKUWIKI_ROOT/plugins/hipchat/action.php

Enter your HipChat token, target room, and prefered username in 'conf/default.php'

Congratulatuons! Edit a wikipage, and try it out.

Included is some javascript that enforces summarys. If this not desired or your Doku Wiki setup already includes summary enforcement, delete 'conf/userscript.js'
http://www.dokuwiki.org/tips:summary_enforcement

Requirements
------------

* DokuWiki
* Hippy - [mandatory] PHP version 5.x (developed using 5.2.9)
* Hippy - [mandatory] PHP's cURL module
