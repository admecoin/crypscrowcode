<?php

namespace sample\Test\Functional\introduction;

use sample\Test\Functional\WebTestCase;

/**
 * Class GenerateBcyAddressTest
 * @package sample\Test\Functional\introduction
 */
class GenerateBcyAddressTest extends WebTestCase
{
    public function setUp()
    {
        parent::SetUp();
        $className = $this->getClassName();
        $sampleName = substr($className, 0, -4);
        $this->url = self::baseUrl() . basename(__DIR__) . '/' . $sampleName . '.php';
    }

    /**
     * Returns just the classname of the test you are executing. It removes the namespaces.
     * @return string
     */
    public function getClassName()
    {
        return join('', array_slice(explode('\\', get_class($this)), -1));
    }

    public function testGenerateBcyAddress()
    {
        $this->client->request('GET', $this->url);
        $responseBody = (string)$this->client->getResponse()->getContent();

        $this->assertEquals(200, $this->client->getResponse()->getStatus());
        $this->assertNotContainsPhpErrors($responseBody);
    }
}