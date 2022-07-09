# Fix Yoast Organization & Logo Schema Output

In the update to Yoast 11.0.0, schema implementation was changed.

[Changelog Here](https://yoast.com/yoast-seo-11-0/)

Unfortunately this had a negative effect on many sites where organization data started to be ignored and the logo enhancement section of Google Search Console showed a swift decline in valid pages until it disappeared all together.

This has been reported in the support forms many times, but users are generally told that it is not an issue with the plugin and they should check their logo file against Google's guidelines.

Google really doesn't seem to like the organization data being encapsulated within the webpage data. This plugin fixes that by taking the details from the Yoast settings and feeding them back into the output as a separate Organization piece outside of WebPage. 

Essentially, it puts back the "Little blobs" that this plugin update removed.
