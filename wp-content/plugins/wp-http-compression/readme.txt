=== WP HTTP Compression ===
Contributors: Steven de Salas
Tags: performance, gzip, http, compression, server, bandwith, reduction, speed, compress, compressed, plugin, performance, faster, loading
Requires at least: 3.4.1
Tested up to: 2.9
Stable tag: trunk
Donate link: http://desalasworks.com/wordpress-compression-plugin/

This plugin allows your WordPress blog to output pages compressed in gzip 
format if a browser supports compression. 

HTTP compression generally means a 60-80% REDUCTION in the size of your pages
(broadband usage) as well as an INCREASE in download speeds of 3x to 4x.

== Description ==

This plugin allows your WordPress blog to output pages compressed in gzip 
format if a browser supports compression. 

HTTP compression generally means a 60-80% REDUCTION in the size of your pages 
(broadband usage) as well as an INCREASE in download speeds of 3x to 4x.

To test if your blog is using compression use the following link:

http://ismyblogworking.com/

Check "Page GZip" on the right hand size.
Check "Bandwidth saved by compression" on the left hand side.

NOTE: This plugin should not be used alongside WP Super Cache or WP Cache
since those plugins are already implementing compression. Your blog
will keep working but those plugins will stop caching new pages.

RECENT NEWS - 20 March 2010: 

Its been reported by a user that there is a conflict 
using WP HTTP Compression together with Google Analytics Plugin (3.2.5). I'll
to look into this and release a patch for next release. 
Note that this conflict is NOT with Google Analytics itself but with
the PLUGIN. Google Analytics scripts and stat collection have been tested
and work fine with the WP HTTP Compression plugin.

== Changelog ==

= 1.0 =
* New wp-http-compression plugin released.

== Installation ==

1. Download the `wp-http-compression.zip` plugin to your desktop.
2. Navigate to the 'Plugins' menu in Wordpress
3. Click 'Add New'.
4. Select 'Upload' from the options at top of the page.
5. Select the file `wp-http-compression.zip` and press 'Install Now'.
6. You should get a message saying 'Plugin Installed successfully'.
7. Activate the plugin.
8. Go to http://ismyblogworking.com/ to test compression
9. Check "Page GZip" on the right hand size.
10. Check "Bandwidth saved by compression" on the left hand side.

And there you go! Who said that was hard? :)

TO REMOVE THE PLUGIN

1. Navigate to the 'Plungins' menu in Wordpress
2. Scroll down to 'WP HTTP Compression' plugin.
3. Click 'Deactivate'
4. Scroll down again and click 'Delete'

== Screenshots ==

1. What the plugin looks like once activated
2. Checking for bandwith saved