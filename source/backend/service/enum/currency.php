<?php

enum Currency: string
{
    case UnitedStates = 'USD';
    case Philippines = 'PHP';
    case Eurozone = 'EUR';
    case UnitedKingdom = 'GBP';
    case Japan = 'JPY';
    case China = 'CNY';
    case SouthKorea = 'KRW';
    case Australia = 'AUD';
    case Canada = 'CAD';
    case India = 'INR';
    case Singapore = 'SGD';
    case Thailand = 'THB';
    case Malaysia = 'MYR';
    case Indonesia = 'IDR';
    case Vietnam = 'VND';

    public function symbol(): string
    {
        return match ($this) {
            self::UnitedStates => '$',
            self::Philippines => '₱',
            self::Eurozone => '€',
            self::UnitedKingdom => '£',
            self::Japan => '¥',
            self::China => '¥',
            self::SouthKorea => '₩',
            self::Australia => 'A$',
            self::Canada => 'C$',
            self::India => '₹',
            self::Singapore => 'S$',
            self::Thailand => '฿',
            self::Malaysia => 'RM',
            self::Indonesia => 'Rp',
            self::Vietnam => '₫',
        };
    }

    public static function fromCountry(string $country): ?self
    {
        return match (ucwords(strtolower($country))) {
            'United States' => self::UnitedStates,
            'Eurozone' => self::Eurozone,
            'United Kingdom' => self::UnitedKingdom,
            'Japan' => self::Japan,
            'China' => self::China,
            'South Korea' => self::SouthKorea,
            'Australia' => self::Australia,
            'Canada' => self::Canada,
            'India' => self::India,
            'Singapore' => self::Singapore,
            'Thailand' => self::Thailand,
            'Malaysia' => self::Malaysia,
            'Indonesia' => self::Indonesia,
            'Vietnam' => self::Vietnam,
            default => self::Philippines,
        };
    }
}
