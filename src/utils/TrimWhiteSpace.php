<?php

namespace Assetku\BankService\utils;

class TrimWhiteSpace
{
    /**
     * @var array $fields
     */
    protected $fields;

    /**
     * @var array $data
     */
    protected $data;

    /**
     * get fields
     * 
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * set fields
     * 
     * @param string $fields
     * @return array
     */
    public function setFields(...$fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * get data
     * 
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * set data
     * 
     * @param array $data
     * @return array
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Replace every space in fields
     * 
     * @return string
     */
    protected function replace(string $field)
    {
        return str_replace(' ', '', $field);
    }

    /**
     * handle the trim replace space
     * 
     * @return array $field
     */
    public function handle()
    {
        $replaced = array_map(function($field, $key) {
            if (in_array($key, $this->fields)) {
                return $this->replace($field);
            }
            return $field;
        }, $this->data, array_keys($this->data));

        return $replaced;
    }
}