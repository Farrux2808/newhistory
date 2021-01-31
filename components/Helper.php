<?php

namespace app\components;

use app\modules\admin\models\Language;

/**
 * Created by PhpStorm.
 * User: Umar
 * Date: 16.11.2018
 * Time: 22:46
 */

class Helper
{
    public function dump($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        exit();
    }

    public function alias($str)
    {
        $str = preg_replace("/[^a-zA-ZА-Яа-я0-9\s]/", "", trim($str));
        return str_replace(' ', '_', $str);
    }

    public function formatPrice($price)
    {
        return number_format($price, 0, ',', ' ') . ' сум';
    }

    public function state($state)
    {
        if ($state == 'on') {
            return '<span class="label label-success">Активен</span>';
        } else {
            return '<span class="label label-danger">Отключен</span>';
        }
    }

    public function getLang()
    {
        $languages = Language::find()->select('path')->where(['status' => 1])->all();
        $l = [];
        foreach ($languages as $lang) {
            $l[] = $lang->path;
        }
        return $l;
    }

    public function checkLang($l)
    {
        $lang = $this->getLang();
        return in_array($l, $lang);
    }

    public function translit($s)
    {
        $s = (string)$s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "_", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
    }

}