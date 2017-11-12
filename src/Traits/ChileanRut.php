<?php

namespace KissDev\ChileanRut\Traits;

trait ChileanRut
{
    public function clean($originalRut, $hasCheckDigit = true)
    {
        $cleanedRut = null;
        $originalRut = $this->cleanSpaceDotsAndLeftZeros($originalRut);

        $input = str_split($originalRut);
        $length = count($input);
        foreach ($input as $key => $char) {
            $last = ($key + 1) == $length && $hasCheckDigit;
            $cleanedRut = $this->concatenate($cleanedRut, $char, $last);
        }

        return strtoupper($cleanedRut);
    }

    private function cleanSpaceDotsAndLeftZeros($originalRut)
    {
        return ltrim(trim(str_replace('.', '', $originalRut)), '0');
    }

    public function hasValidLength($originalRut)
    {
        return strlen($originalRut) >= 3;
    }

    private function hasValidChar($char)
    {
        if (in_array($char, ['k', 'K']) || is_numeric($char)) {
            return true;
        }
        return false;
    }

    private function concatenate($cleanedRut, $char, $last = false)
    {
        if ($this->hasValidChar($char)) {
            if ($last) {
                $cleanedRut .= '-' . $char;
                return $cleanedRut;
            }
            $cleanedRut .= $char;
        }
        return $cleanedRut;
    }

    private function checkDigit($originalRut)
    {
        $txt = array_reverse(str_split($originalRut));
        $sum = 0;
        $factors = [2, 3, 4, 5, 6, 7, 2, 3, 4, 5, 6, 7];

        foreach ($txt as $key => $chr) {
            $sum += $chr * $factors[$key];
        }

        $a = $sum % 11;
        $b = 11 - $a;

        switch ($b) {
            case 11:
                $digitoVerificador = 0;
                break;
            case 10:
                $digitoVerificador = 'K';
                break;
            default:
                $digitoVerificador = $b;
                break;
        }
        return (string)$digitoVerificador;
    }

    public function verify($originalRut)
    {
        $originalRut = $this->clean($originalRut);

        if (!$this->hasValidLength($originalRut)) {
            return false;
        }

        list($number, $checkDigit) = explode('-', $originalRut);

        $digit = $this->checkDigit($number);

        if ($digit == $checkDigit) {
            return true;
        }

        return false;
    }
}