<?php
/**
 * Damn Small Rich Text Editor v0.2.2 for jQuery
 * by Roi Avidan <roi@avidansoft.com>
 * Demo: http://www.avidansoft.com/dsrte/
 * Released under the GPL License
 *
 * Limited BBCode plugin
 */

class dsRTEbbCodePlugin extends dsRTECommandButton
{
    /**
     * Default Constructor.
     */
    public function __construct()
    {
        parent::__construct( 'bbcode', 'bbcode', '', 'BBCode', 0 );
    }

    /**
     * This plugin requires additional JavaScript files to operate.
     * Return them for inclusion.
     */
    public function getScripts()
    {
        return implode( "\n", array(
            '<script type="text/javascript" src="lib/plugins/bbcode.js"></script>',
        ) );
    }
}

// Add this plugin to the editor
dsRTE::RegisterPlugin( 'bbcode', new dsRTEbbCodePlugin() );

?>