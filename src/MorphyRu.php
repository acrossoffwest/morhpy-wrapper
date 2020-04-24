<?php

namespace Acrossoffwest\MorphyWrapper;

class MorphyRu
{
    private $forms = [
        'ИМ',
        'РД',
        'ВН',
        'ДТ',
        'ПР',
        'ТВ',
    ];
    private Morphy $morphy;
    protected  ArrayMapper $exceptionWords;

    public function __construct(Morphy $morphy, array $exceptionWords = [])
    {
        $this->exceptionWords = array_mapper($exceptionWords);
        $this->morphy = $morphy;
    }

    /**
     * @param $word
     * @param string[] $case
     * @return string|null
     */
    private function getExceptionWord(string $word, $case=['ИМ'])
    {
        $exceptionWords = $this->exceptionWords;
        $case = !is_string($case) ? $case : explode(',', $case);
        return $exceptionWords->get(mb_strtolower($word).'.'.implode(',', $case));
    }

    /**
     * @param $word
     * @param string[] $case
     * @param string $delimeter
     * @return bool|mixed|string
     */
    public function getByCase($word, $case = ['ИМ'])
    {
        $word = trim($word);
        return $this->getExceptionWord($word, $case) ?? $this->getByCaseWithoutException($word, $case);
    }

    private function getByCaseWithoutException($word, $case = ['ИМ'])
    {
        $wordCases = $this->morphy->castFormByGramInfo(mb_strtoupper($word), null, $case, false);

        if (empty($wordCases)) {
            return mb_strtolower($word);
        }

        return mb_strtolower($wordCases[0]['form']);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getWordForms($word) {
        $result = [];

        foreach ($this->getFormsList() as $form) {
            $result[$form] = $this->getByCase($word, $form);
        }

        $result['ВН,ЕД'] = $this->getByCase($word, ['ВН', 'ЕД']);

        return $result;
    }

    private function getFormsList(): array
    {
        return $this->forms;
    }
}
