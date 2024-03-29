<?php
/**
 * Damn Small Rich Text Editor v0.2.2 for jQuery
 * by Roi Avidan <roi@avidansoft.com>
 * Demo: http://www.avidansoft.com/dsrte/
 * Released under the GPL License
 *
 * Insert Table command class.
 */

class dsRTETablePlugin extends dsRTECommandButton
{
    /**
     * Prepare the Link command's special hidden div with a Target and URL fields.
     */
    protected function getPanelHTML()
    {
        $html = '<div class="rte panel" id="'.$this->id.'-'.$this->arguments.'">';
        $html .= t( 'Rows' ).': ';
        $html .= '<input size="5" id="'.$this->id.'-'.$this->arguments.'-rows" />';
        $html .= t( 'Columns' ).': ';
        $html .= '<input size="5" id="'.$this->id.'-'.$this->arguments.'-cols" />';
        $html .= '<input type="button" id="'.$this->id.'-'.$this->arguments.'-ok" value="'.t( 'OK' ).'" />';
        $html .= '<input type="button" value="'.t( 'Cancel' ).'" onclick="$(\'#'.$this->id.'-'.$this->arguments.'\').slideUp()" />';
        $html .= '</div>';

        return $html;
    }

    /**
     * This plugin requires additional JavaScript files to operate.
     * Return them for inclusion.
     */
    protected function getScripts()
    {
        return implode( "\n", array(
            '<script type="text/javascript" src="lib/plugins/table.js"></script>',
        ) );
    }
}

?>