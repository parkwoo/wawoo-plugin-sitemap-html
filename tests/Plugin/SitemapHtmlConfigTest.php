<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Wawoo\Plugin\SitemapHtml\Config as SitemapConfig;

final class SitemapHtmlConfigTest extends TestCase
{
    protected function setUp(): void
    {
        $r = new ReflectionClass(SitemapConfig::class);
        if (!$r->hasProperty('cache')) {
            return;
        }
        $p = $r->getProperty('cache');
        $p->setAccessible(true);
        $p->setValue(null, null);
    }

    protected function tearDown(): void
    {
        unset($GLOBALS['WAWOO_SITEMAP_HTML']);
    }

    public function testSitemapDefaultsComeFromPluginJson(): void
    {
        $cfg = SitemapConfig::all();
        $this->assertSame(50, $cfg['per_page']);
        $this->assertSame('Sitemap', $cfg['title']);
    }

    public function testSitemapGlobalsOverridePluginJson(): void
    {
        $GLOBALS['WAWOO_SITEMAP_HTML'] = ['per_page' => 25, 'title' => 'Index'];
        $cfg = SitemapConfig::all();
        $this->assertSame(25, $cfg['per_page']);
        $this->assertSame('Index', $cfg['title']);
        $this->assertSame(25, SitemapConfig::perPage());
    }

    public function testSitemapPerPageClampsZero(): void
    {
        $GLOBALS['WAWOO_SITEMAP_HTML'] = ['per_page' => 0];
        $this->assertSame(1, SitemapConfig::perPage());
    }

    public function testSitemapPerPageClampsNegative(): void
    {
        $GLOBALS['WAWOO_SITEMAP_HTML'] = ['per_page' => -10];
        $this->assertSame(1, SitemapConfig::perPage());
    }

    public function testSitemapPerPageKeepsSaneValue(): void
    {
        $GLOBALS['WAWOO_SITEMAP_HTML'] = ['per_page' => 7];
        $this->assertSame(7, SitemapConfig::perPage());
    }
}
