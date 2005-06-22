﻿/*
 * FCKeditor - The text editor for internet
 * Copyright (C) 2003-2004 Frederico Caldeira Knabben
 * 
 * Licensed under the terms of the GNU Lesser General Public License:
 * 		http://www.opensource.org/licenses/lgpl-license.php
 * 
 * For further information visit:
 * 		http://www.fckeditor.net/
 * 
 * File Name: fcktoolbarbreak_gecko.js
 * 	FCKToolbarBreak Class: breaks the toolbars.
 * 	It makes it possible to force the toolbar to brak to a new line.
 * 	This is the Gecko specific implementation.
 * 
 * Version:  2.0 RC3
 * Modified: 2005-02-09 18:04:04
 * 
 * File Authors:
 * 		Frederico Caldeira Knabben (fredck@fckeditor.net)
 */

var FCKToolbarBreak = function()
{
	var oBreakDiv = document.createElement( 'div' ) ;
	
	oBreakDiv.style.clear = oBreakDiv.style.cssFloat = FCKLang.Dir == 'rtl' ? 'right' : 'left' ;
	
	FCKToolbarSet.DOMElement.appendChild( oBreakDiv ) ;
}