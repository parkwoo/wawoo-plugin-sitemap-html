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

## CI

GitHub Actions runs on PHP 8.2 & 8.3 — it clones wawoo-cms core, links this plugin via `php bin/wawoo plugin:link --copy`, and runs `phpunit tests/Plugin/SitemapHtmlConfigTest.php`.

## Dependencies

Renders /sitemap-page; pairs with the seo core plugin (XML sitemap/robots). No runtime dependency on seo.

## Release

Manifests require `core >=1.0.0`; this repo is tagged `v1.0.0`; bump manifest + tag together on releases.
