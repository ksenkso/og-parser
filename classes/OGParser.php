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
    public function setURL(string $url): void
    {
        $this->url = $url;
        $this->baseUrl = trim(parse_url($url, PHP_URL_HOST), '/');
    }
    /**
     *
     */
    public function parse(): void
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
        $hasTitle = preg_match('/<title>(.*?)<\\/title>/is' , $pageContent, $title);
        $hasDescription = preg_match('/<meta name="description" content="(.*?)">/is' , $pageContent , $description);

        if (!$hasTitle) {
            $this->errors[] = 'В документе нет тега `title`!';
        } else {
            $this->data['title'] = $title[1];
        }
        if (!$hasDescription) {
            $this->errors[] = 'В документе нет мета-тега description!';
        } else {
            $this->data['description'] = $description[1];
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
}