<?php
/**
 * Created by PhpStorm.
 * User: yazun
 * Date: 25.10.2017
 * Time: 18:11
 */
declare(strict_types=1);
namespace app\tests;
use app\classes\OGParser;
use PHPUnit\Framework\TestCase;


class OGParserTest extends TestCase
{
    const YT_DATA = [
        'url' => 'https://www.youtube.com/channel/UC8kI2B-UUv7A5u3AOUnHNMQ',
        'baseUrl' => 'www.youtube.com',
        'title' => "Alexander Nevzorov\n - YouTube",
        'description' => 'Официальный You Tube канал режиссера, журналиста, публициста Александра Невзорова. Уроки Атеизма, архив программы &quot;600 секунд&quot;, ответы на вопросы подписчиков...'
    ];

    public function testYoutubeDataLoadedProperly()
    {
        $url = 'https://www.youtube.com/channel/UC8kI2B-UUv7A5u3AOUnHNMQ';
        $parser = new OGParser();
        $parser->setURL($url);
        $parser->parse();
        $data = $parser->getData();
        $exptected = array_map(function ($value) {return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS|FILTER_SANITIZE_STRING);}, self::YT_DATA);
        //$exptected['description'] = mb_detect_encoding($exptected['description'], 'UTF-8');
        $this->assertEquals($exptected, $data);
    }

    public function testDataAndErrorsAreClearedAfterRun()
    {
        $url1 = 'https://www.youtube.com/channel/UC8kI2B-UUv7A5u3AOUnHNMQ';
        $url2 = 'https://vk-messages-count.herokuapp.com/';
        $parser = new OGParser();
        // First run
        $parser->setURL($url2);
        $parser->parse();
        $errors = $parser->getErrors();
        // Second run
        $parser->setURL($url1);
        $parser->parse();
        $newErrors = $parser->getErrors();
        $this->assertNotEquals($errors, $newErrors);
    }
}