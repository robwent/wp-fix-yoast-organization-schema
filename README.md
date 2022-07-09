# Fix Yoast Organization & Logo Schema Output

In the Yoast 11.0.0 update, schema implementation was changed.

[Changelog Here](https://yoast.com/yoast-seo-11-0/)

Unfortunately this had a negative effect on many sites where organization data started to be ignored and the logo enhancement section of Google Search Console showed a swift decline in valid pages until it disappeared all together.

This has been reported in the support forums many times, but users are generally told that it is not an issue with the plugin and they should check their logo file against Google's guidelines.

Google really doesn't seem to like the Organization data being encapsulated within the WebPage data. This plugin fixes that by taking the details from the Yoast settings and feeding them back into the output as a separate Organization piece outside the WebPage block. 

Essentially, it puts back the "Little blobs" that this update removed.
