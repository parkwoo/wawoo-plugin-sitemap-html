# wawoo-plugin-sitemap-html

Serves an HTML paginated sitemap of all posts at /sitemap-page, grouped by year.

## Install

```
cd /path/to/wawoo-cms
php bin/wawoo plugin:link /home/git/wawoo-plugin-sitemap-html
```

Enable via config.local.php ENABLED_PLUGINS or admin Plugins page.

## Test (testing contract)

```
cd /path/to/wawoo-cms
php bin/wawoo plugin:link /home/git/wawoo-plugin-sitemap-html
phpunit tests/Plugin/SitemapHtml*Test.php
```

## Requirements

`wawoo-cms >= 1.0.0`, PHP 8.3, no runtime deps.
