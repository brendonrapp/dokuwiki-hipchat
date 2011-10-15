# DokuWiki-Hipchat

Authors: [Jeremy Eblar](http://www.github.com/jeblar), [Brendon Rapp](http://www.github.com/LegionSB)

A DokuWiki plugin that notifies a HipChat room of wiki edits.

Setup
-----

1. Clone repository into your DokuWiku plugins folder, making the target folder name 'hipchat'

```
$ git clone https://github.com/jaguardesign/dokuwiki-hipchat.git hipchat
```

2. To fetch the required dependencies, run:

```
$ git submodule init
$ git submodule update
```

3. In your DokuWiki Configuration Settings, enter an API token, room name (or ID number), and the name you want the notifications to appear from in HipChat. 

4. Optionally, you can also define a comma-separated list of first-level namespaces to limit notifications to only those namespaces (without this setting, all namespaces will trigger notifications)

Requirements
------------

* DokuWiki
* Hippy - [mandatory] PHP version 5.x (developed using 5.2.9)
* Hippy - [mandatory] PHP's cURL module
