Google Web Fonts for WordPress
=====================

* Contributors: jeffsebring
* Tags: fonts, typography, google web fonts
* Requires at least: 3.5
* Tested up to: 3.5
* Stable tag: 3.0.1

**Select up to 5 fonts from the [Google Web Font Directory](http://www.google.com/webfonts) to make available for use in stylesheets.**

###More Info

*This plugin does not automatically change your fonts, only enqueue's the font import stylesheet. Edit your theme or child theme stylesheet to use your chosen fonts.*

[Google Web Fonts for WordPress Plugin Home](http://jeffsebring.com/wordpress/plugins/google-web-fonts)

For more control over imported fonts, read [How to Use Web Fonts with WordPress](http://jeffsebring.com/2012/how-to-use-web-fonts-with-wordpress/).

Installation
-------------

1. Upload and activate Google Web Fonts for WordPress.
2. Navigate to the Theme Customizer.
3. Choose your fonts from the dropdown list of all the fonts available and save your selections.
4. Add the provided css font-family properties code to your theme or child theme stylesheet.


Frequently Asked Questions
-----------------------------------

###My font is not showing up

If you have added the font family rule to the correct element in your stylesheet, try adding some specificity.

When styling a logo link with the class of .logo, I might add the #header id if I was having problems with strong specificity.

    #header .logo	{
    	font-family: 'Six Caps';
    	font-size: 1.5em; /* Adjustments to font sizes may be needed. */
    }


Changelog
--------------

###3.0

* Another Rebuild!
* License update to GPLv3
* Uses Customizer UI
* Fixed error caused by remote file_get_contents being disabled
* Register activation hook to remove theme mods no longer used
* Updated Read Me to emphasize that plugin only enqueues import stylesheet with chosen fonts

###2.0

* Complete rebuild
* List of fonts in dropdown, saved as transients from the Developer API.
* Font preview link to Google Web Font Directory info for the font.
* Allow enabling/disabling of fonts.
* Save options in theme_mods

###2.0.1

* Set font api transiet timeout to 24 hours.

###2.0.2

* Bug Fixes
* Added initial Render Framework support

###2.0.3

* Readme Updated

###2.0.4

* Remove deactivation hook
