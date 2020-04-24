# acrossoffwest/morphy-wrapper

phpMorphy --- morphological analyzer library for Russian, English, German and Ukrainian languages.  
```acrossoffwest/morphy-wrapper``` is Laravel wrapper for phpMorphy library with PHP7.4 support.

Source website (in russian): http://phpmorphy.sourceforge.net/
SF project: http://sourceforge.net/projects/phpmorphy  
Wrapper on Github: https://github.com/cijic/phpmorphy

This library allow retireve follow morph information for any word:
- Base (normal) form
- All forms
- Grammatical (part of speech, grammems) information

## Install

Via Composer
``` bash
$ composer require acrossoffwest/morphy-wrapper
```

## Easy way for usage Russian language

Get a word in necessary form


``` php
echo morphy_get_word_by_case('Москва', ['ПР']);
// Output: москве
```

Get all forms of a word

``` php
echo morphy_get_word_by_case('Фитнес', ['ПР'], [
   'фитнес' => [
       'ПР' => 'фитнесе'
   ]
]);
// Output: фитнесе
```

## Usage another languages
If you wanna use another languages you have to use Acrossoffwest\MorphyWrapper\Morphy class

``` php
use Acrossoffwest\MorphyWrapper\Morphy;

$morphy = new Morphy('en');
echo $morphy->getPseudoRoot('FIGHTY');
// Output: 
```
