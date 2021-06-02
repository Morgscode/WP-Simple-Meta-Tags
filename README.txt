=== Plugin Name ===
Contributors: Luke Morgan
Author link: https://luke-morgan.com
Tags: SEO, WordPress, OpenGraph, Twitter Card, Meta Tags
Requires at least: 5.7.2
Tested up to: 5.7.2
Stable tag: 5.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A WordPress plugin which adds an Metabox API powered form to all post types so you can easily manage all of the meta tags which are still important for SEO for an each individual page or post-type. This plugin also handles generating these tags on the front-end of your website.

== Description ==

This plugin adds an WordPress Metabox powered API form to each page, post and custom post type on your website. It is intended to allow uses to manage their keys meta tags which are important for SEO in the modern day. 

These are: 

1. Title Tag
2. Meta Description
3. Canonical link
4. Robots meta tag
5. Social Media meta tags (OpenGraph and Twitter cards)
6. Responsive design meta tag

It's worth noting here that for users with detailed plans for how each individual page and post should be visible to search engines, and equally on individual social media platforms, this plugin may not be the ideal solution. 

The plugin offers a series of 5 fields that will asssume the end user is happy with the associated meta data being duplicated for the html page itself, and its associated social media meta tags. In my experience, this lighweight option will suit a majority of website owners who simply are concerned with consistent visibility and the right data being available to search engines. 

The front end implementation relies on native WordPress hooks and filters. It has not been tested to work against other similar plugins such as yoast which have their own hooks and functions for filtering wordpress meta tags related to search engine optimisations.

The robots form field should be used with caution and is ideally intedned for advanced users only. Any values entered will overwrite default generated robots values such as image-max-preview which may be considered useful. 

Overall, this plugin was developed as a reponse to the series of available and popular WordPress plugins for handling meta tags which I feel are convuluted and add unnecessary overhead to websites I've worked on. I genrally find myself switching features off immediately after install, and using only using it as an convenient way to manage the pages Title tag and Meta descriptions and canonical urls. 

== Changelog ==