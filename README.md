=== Google Web Fonts for WordPress ===
Contributors: jeffsebring
Tags: fonts, typography, google web fonts
Requires at least: 3.2.1
Tested up to: 3.3
Stable tag: 2.0

== Description ==
Google Web Fonts for WordPress is a plugin that makes it easy to import fonts for use in theme stylesheets. Choose up to three of over 350 free fonts made available from the [Google Web Font Directory](http://www.google.com/webfonts).

= More Info =

* [Google Web Fonts for WordPress Plugin Home](http://jeffsebring.com/wordpress/plugins/google-web-fonts)
* [Typographic Web Design](http://jeffsebring.com/quotes/typographic-web-design/)
* [Jeff's WordPress Blog](http://jeffsebring.com)
* [Follow Jeff on Twitter](http://twitter.com/jeffsebring)

== Installation ==

1. Upload and activate Google Web Fonts for WordPress.
2. Navigate to the 'Fonts' menu under the 'Appearance' tab.
3. Choose your fonts from the dropdown list of all the fonts available and save your selections.
4. Preview fonts from the options menu, or click the preview for full font information.
5. Enable fonts for use with their corresponding checkboxes.
6. Add the provided css font-family properties code to your theme stylesheet.


== Frequently Asked Questions ==

= My font is not showing up =

If you have added the font family rule to the correct element in your stylesheet, try adding some specificity.

When styling a logo link with the class of .logo, I might add the #header id if I was having problems with strong specificity.

    #header .logo	{
    	font-family: 'Six Caps';
    	font-size: 1.5em; /* Adjustments to font sizes are likely to be needed. */
    }


== Changelog ==

= 2.0 =
* Complete rebuild
* List of fonts in dropdown, saved as transients from the Developer API.
* Font preview link to Google Web Font Directory info for the font.
* Allow enabling/disabling of fonts.
* Save options in theme_mods
