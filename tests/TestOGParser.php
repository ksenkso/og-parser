<?php
namespace app\tests;
use app\classes\OGParser;

class TestOGParser extends BaseTest
{
    const YT_DATA = [
        'url' => 'https://www.youtube.com/channel/UC8kI2B-UUv7A5u3AOUnHNMQ',
        'baseURL' => 'www.youtube.com',
        'title' => 'Alexander Nevzorov - YouTube',
        'description' => 'Официальный You Tube канал режиссера, журналиста, публициста Александра Невзорова. Уроки Атеизма, архив программы &quot;600 секунд&quot;, ответы на вопросы подписчиков...'
    ];

    private $parser;

    public function __construct(OGParser $parser)
    {
        $this->parser = $parser;
    }

    public function testYoutubeData()
    {
        $url = 'https://www.youtube.com/channel/UC8kI2B-UUv7A5u3AOUnHNMQ';
        $this->parser->setURL($url);
        $this->parser->parse();
        $data = $this->parser->getData();
        foreach (self::YT_DATA as $name => $field) {
            if (!$data[$name] === $field) {
                $this->failAssert($field, $data[$name]);
                break;
            }
        }
        $this->pass("Fetched values from YouTube are equal to expected");
    }

    public function testClearingData()
    {
        $url1 = 'https://www.youtube.com/channel/UC8kI2B-UUv7A5u3AOUnHNMQ';
        $url2 = 'https://vk-messages-count.herokuapp.com/';
        // First run
        $this->parser->setURL($url2);
        $this->parser->parse();
        $errors = $this->parser->getErrors();
        // Second run
        $this->parser->setURL($url1);
        $this->parser->parse();
        $newErrors = $this->parser->getErrors();
        if ((count($errors) !== 0)) {
            if (count($newErrors) !== 0) {
                $this->fail("Expected errors count in second run to be non-zero");
            }
        } else {
            $this->fail("Expected the errors count in the first run to be zero");
        }
        $this->pass("Errors are cleared properly");
    }
}