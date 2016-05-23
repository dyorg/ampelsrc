<?php
/*
  6/15/09
  Author: Ed Robinson


  This is a REALLY simple XAJAX plugin to handle
  floatbox windows on XAJAX'ed pages.
 
  As written, the plugin doesn't do anything but open and close
  a window on the page. Extend it to fit your needs...
 
  The code assumes Floatbox V3.52.2 or later.
 
  The target page must have the following floatbox references in its <head> section
  with the paths adjusted to fit your layout.


  <link type="text/css" rel="stylesheet" href="floatbox/floatbox.css" />
  <script type="text/javascript" src="floatbox/floatbox.js"></script>
 
  Note: Floatbox will not work on a page running in the "quirks" mode.
        Use a good doctype tag...
*/


class floatbox extends xajaxResponsePlugin
{
  var $sCallName = "floatbox";


/*
  Function: makeWindow
  This function displays an FB window


  Params:
  $content - the content to be displayed in the FB window.
  $fbtitle - Optional title for the FB window.
 
  Usage: $resp->plugin("floatbox","makeWindow", $content [, $title]);
*/
  function makeWindow($content, $fbtitle='')
  {
      //Invoke the fb start() function. See the fb api documentation.
      $this->objResponse->script("fb.start({ href:\"#\",
                                          rev:\"width:max height:max scrolling:yes showPrint:true\",
                                          html:\"$content\",
                                                 title:\"$fbtitle\" })");
  }
 
/*
  Function: closeWindow
  Closes the top most Fb window.
  No parameters.
  Usage: $resp->plugin("floatbox","closeWindow");
*/  
  function closeWindow()
  {
    //Invoke the fb end() function. See the fb api documentation.
    $this->objResponse->script("fb.end()");
  }
}
$pluginManager = &xajaxPluginManager::getInstance();
$pluginManager->registerPlugin(new floatbox);
?>