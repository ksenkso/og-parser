<?php
namespace app\classes;
/**
 * Class OGParser
 *
 * @package app\classes
 * @author ksensko <yazunya@gmail.com>
 */
class OGParser {
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $baseUrl;
    /**
     * @var array
     */
    private $errors;
    /**
     * @var array
     */
    private $data;
    public function __construct()
    {
        $this->errors = [];
        $this->data = [];
    }
    /**
     * @param string $url
     */
    public function setURL(string $url)
    {
        $this->url = $url;
        $this->baseUrl = trim(parse_url($url, PHP_URL_HOST), '/');
    }
    /**
     *
     */
    public function parse()
    {
        /**
         * Reset the errors and data arrays to prevent keeping information from previous usages.
         */
        $this->data = [];
        $this->errors = [];
        /**
         * Eager loading of the site content. This will load the entire HTML page. To load only head of the site this parser
         * should be changed to use something that can control data flow of the request.
         *
         */
        $pageContent = file_get_contents($this->url);
        /**
         * Парсим стандартные данные сайта
         * @var array $title переменная заголовка
         * @var array $description переменная описания страницы
         */
        $hasTitle = preg_match('/<meta property="og:title" content="(.*?)">/is' , $pageContent, $title);
        $hasDescription = preg_match('/<meta name="description" content="(.*?)">/is' , $pageContent , $description);
        $hasImage = preg_match('/<meta property="og:image" content="(.*?)">/is' , $pageContent , $image);

        if (!$hasTitle) {
            $this->errors[] = 'В документе нет тега `title`!';
        } else {
            $this->setField('title', $title[1]);
        }
        if (!$hasDescription) {
            $this->errors[] = 'В документе нет мета-тега description!';
        } else {
            $this->setField('description', $description[1]);
        }

        if (!$hasImage) {
            $this->errors[] = 'В документе нет мета-тега og:image!';
        } else {

            $this->setField('image', $image[1]);
        }
    }
    /**
     * Returns true if there was an error during the parsing process.
     *
     * @return bool
     */
    public function hasErrors(): bool
    {
        return !!count($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    /**
     * Returns the array of data about the given page. The keys of the array are strings.
     *
     * @return array
     */
    public function getData(): array
    {
        $data = $this->data;
        $data['url'] = $this->url;
        $data['baseUrl'] = $this->baseUrl;
        return $data;
    }

    /**
     * @param string $name The name of the data field
     * @param string $value The value of the data field
     */
    private function setField($name, $value)
    {

        $this->data[$name] = $value;
    }
}