<?php

namespace Assetku\BankService\utils;

use Illuminate\Support\Arr;

class TrimWhitespace
{
    /**
     * @var array $toBeTrimmed
     */
    protected $toBeTrimmed;

    /**
     * @var array $data
     */
    protected $data;

    /**
     * set to be trimmed
     *
     * @param $toBeTrimmed
     * @return TrimWhitespace
     */
    public function setToBeTrimmed($toBeTrimmed)
    {
        $this->toBeTrimmed = Arr::wrap($toBeTrimmed);

        return $this;
    }

    /**
     * Set data
     *
     * @param  array  $data
     * @return TrimWhitespace
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Handle the trimming process in data
     *
     * @return array
     */
    public function handle()
    {
        return collect($this->data)
            ->map(function ($value, string $key) {
                if (in_array($key, $this->toBeTrimmed)) {
                    return $this->trim($value);
                }

                return $value;
            })
            ->toArray();
    }

    /**
     * Trim every whitespace in the given value
     *
     * @param  string  $value
     * @return string
     */
    protected function trim(string $value)
    {
        return str_replace(' ', '', $value);
    }
}
