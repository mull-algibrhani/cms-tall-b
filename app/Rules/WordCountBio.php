<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class WordCountBio implements ValidationRule
{
    private $min;
    private $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $wordCount = $this->countWords($value);

        if ($wordCount < $this->min || $wordCount > $this->max) {
            $fail("Biografi harus memiliki antara {$this->min} dan {$this->max} kata. Jumlah kata saat ini: $wordCount");
        }
    }

    private function countWords($value)
    {
        // Mengubah entitas HTML menjadi karakter biasa
        $decodedValue = html_entity_decode($value);
        // Menghapus tag HTML
        $cleanedValue = strip_tags($decodedValue);
        // Menghapus spasi berlebih dan newline
        $normalizedValue = preg_replace('/\s+/', ' ', $cleanedValue);
        // Menghitung kata yang tidak kosong termasuk angka
        return preg_match_all('/\b[\w\d]+\b/', trim($normalizedValue));
    }
}