<?php

it('can load rajangkir config', function () {
    /** @var Kodepandai\LaravelRajaOngkir\Tests\TestCase $this */
    $this->assertEquals(config('rajaongkir.ACCOUNT_TYPE'), 'starter');
    $this->assertEquals(config('rajaongkir.API_KEY'), 'somerandomstring');
});
