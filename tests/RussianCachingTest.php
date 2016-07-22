<?php

use Cacher\RussianCaching;

class RussianCachingTest extends TestCase
{
    /** @test */
    public function it_caches_the_given_key()
    {
        $post = $this->makePost();

        $cache = new \Illuminate\Cache\Repository(
            new \Illuminate\Cache\ArrayStore
        );

        $doll = new RussianCaching($cache);

        $doll->put($post, '<div>view fragment</div>');

        $this->assertTrue($doll->has($post->getCacheKey()));
        $this->assertTrue($doll->has($post));
    }
}
