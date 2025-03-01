<?php

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nucleos\MapsBundle\Tests\Twig;

use Nucleos\MapsBundle\Twig\MapsExtensions;
use PHPUnit\Framework\TestCase;

final class MapsExtensionsTest extends TestCase
{
    /**
     * @var MapsExtensions
     */
    private $extension;

    protected function setUp(): void
    {
        $this->extension = new MapsExtensions();
    }

    public function testRenderGoogleMap(): void
    {
        static::assertSame(
            '<div
                    data-controller="@nucleos/maps-bundle/googlemaps"
                    data-googlemaps-latitude="12"
                    data-googlemaps-longitude="23"
                    data-googlemaps-zoom="13"
                    data-googlemaps-height="200"
                    data-googlemaps-title=""
                    data-googlemaps-apikey=""
                    ></div>',
            $this->extension->renderGoogleMap(12, 23)
        );
    }

    public function testRenderGoogleMapWithOptapiKeyions(): void
    {
        static::assertSame(
            '<div
                    data-controller="mycontroller @nucleos/maps-bundle/googlemaps"
                    data-googlemaps-latitude="12"
                    data-googlemaps-longitude="23"
                    data-googlemaps-zoom="5"
                    data-googlemaps-height="200"
                    data-googlemaps-title="Some title"
                    data-googlemaps-apikey="MY_KEY"
                    class="myclass"></div>',
            $this->extension->renderGoogleMap(
                12,
                23,
                [
                    'height'     => 200,
                    'title'      => 'Some title',
                    'zoom'       => 5,
                    'controller' => 'mycontroller',
                    'apiKey'     => 'MY_KEY',
                    'attr'       => [
                        'class' => 'myclass',
                    ],
                ]
            )
        );
    }

    public function testRenderOpenStreetMap(): void
    {
        static::assertSame(
            '<div
                    data-controller="@nucleos/maps-bundle/openstreetmap"
                    data-openstreetmap-latitude="12"
                    data-openstreetmap-longitude="23"
                    data-openstreetmap-zoom="13"
                    data-openstreetmap-height="200"
                    data-openstreetmap-title=""
                    ></div>',
            $this->extension->renderOpenStreetMap(12, 23)
        );
    }

    public function testRenderOpenStreetMapWithOptions(): void
    {
        static::assertSame(
            '<div
                    data-controller="mycontroller @nucleos/maps-bundle/openstreetmap"
                    data-openstreetmap-latitude="12"
                    data-openstreetmap-longitude="23"
                    data-openstreetmap-zoom="5"
                    data-openstreetmap-height="200"
                    data-openstreetmap-title="Some title"
                    class="myclass"></div>',
            $this->extension->renderOpenStreetMap(
                12,
                23,
                [
                    'height'     => 200,
                    'title'      => 'Some title',
                    'zoom'       => 5,
                    'controller' => 'mycontroller',
                    'attr'       => [
                        'class' => 'myclass',
                    ],
                ]
            )
        );
    }
}
